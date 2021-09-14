<?php

namespace App\Http\Controllers\Admin\Evaluations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\HelpEvaluation;
use App\Helpers\HelpAdmin;

use App\Models\Site\Evaluation\AllowedGroup;
use App\Models\Site\Evaluation\AvailableQuestion;
use App\Models\Site\Evaluation\CompletedEvaluation;
use App\Models\Site\Evaluation\Evaluation;
use App\Models\Site\Evaluation\EvaluationSetting;
use App\Models\Site\Evaluation\ExclusiveConditionForResponse;
use App\Models\Site\Evaluation\ImageForEvaluation;
use App\Models\Site\Evaluation\PossibleQuestionAnswer;
use App\Models\Site\Evaluation\QuestionTopic;
use App\Models\Site\Evaluation\QuestionType;
use App\Models\Site\Evaluation\ResponseReceived;
use App\Models\Site\Evaluation\ResponsibleForTheEvaluation;

class EvaluationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }



    function list() {
        $data['evaluations'] = Evaluation::orderBy('created_at', 'desc')->get();
        
        return view('Admin.site.evaluation.list', compact('data'));
    }
    
    function new() {
        return view('Admin.site.evaluation.new');
    }
    function save(Request $req) {
        $data = $req->all();
        $data['name_slug'] = str_slug($data['name']);

        $evaluation = Evaluation::create($data);
        $evaluation_setting['evaluation_id'] = $evaluation->id;
        EvaluationSetting::create($evaluation_setting);

        session()->flash('notification', 'success:Pesquisa criada!');
        return redirect()->route('adm.evaluation.edit', $evaluation->id);
    }

    function edit($id) {
        $data['evaluation'] = Evaluation::find($id);
        
        $data['completed_evaluations'] = $data['evaluation']->CompletedEvaluations()->count();
        $data['images_for_evaluation'] = $data['evaluation']->ImagesForEvaluation()->count();
        $data['question_topics'] = $data['evaluation']->QuestionTopics()->count();
        $data['available_questions'] = $data['evaluation']->AvailableQuestions()->count();
        $data['evaluation_settings'] = $data['evaluation']->EvaluationSettings;

        // dd($data);

        return view('Admin.site.evaluation.edit', compact('data'));
    }
    function update(Request $req) {
        $data = $req->all();
        $data['evaluation']['name_slug'] = str_slug($data['evaluation']['name']);

        $evaluation = Evaluation::find($data['evaluation']['id']);
        $evaluation->update($data['evaluation']);
        
        if (!isset($data['evaluation_settings']['allow_specific_groups_of_users'])) $data['evaluation_settings']['allow_specific_groups_of_users'] = 0; 
        if (!isset($data['evaluation_settings']['send_notification_for_each_assessment'])) $data['evaluation_settings']['send_notification_for_each_assessment'] = 0; 
        if (!isset($data['evaluation_settings']['answered_only_once_per_user'])) $data['evaluation_settings']['answered_only_once_per_user'] = 0; 
        if (!isset($data['evaluation_settings']['login_required'])) $data['evaluation_settings']['login_required'] = 0; 
        $evaluation_settings = $evaluation->EvaluationSettings;
        $evaluation_settings->update($data['evaluation_settings']);

        session()->flash('notification', 'success:Pesquisa atualizada!');
        return redirect()->route('adm.evaluation.edit', $evaluation->id);
    }

    function alert($id) {
        $data['type_of_evaluation'] = Evaluation::find($id);

        return view('Admin.site.evaluation.alert', compact('data'));
    }
    function delete(Request $req) {
        $data = $req->all();
        $evaluation = Evaluation::find($data['id']);

        $evaluation->delete();

        session()->flash('notification', 'success:Tipo de pesquisa excluída!');
        return redirect()->route('adm.evaluation.list');
    }

    function report($id) {
        $evaluation = Evaluation::find($id);
        $data = HelpEvaluation::getDataForReporting($evaluation);

        return view('Admin.site.evaluation.report', compact('data'));
    }
    function downloadReport(Request $req) {
        set_time_limit(999999999999999999);
        ini_set('memory_limit', '256M');
        
        $data = $req->all();
        $evaluation = Evaluation::find($data['evaluation_id']);
        
        $data['data_downloading'] = HelpEvaluation::getDataForDownloadingReport($evaluation, $data['date_range']);

        if (!$data['data_downloading']) {
            session()->flash('notification', 'info:Não existe registros com essa data');
            return redirect()->route('adm.evaluation.report', $evaluation->id);
        }

        HelpEvaluation::GenerateReport($data['file_format'], $data['data_downloading']);
    }

    function barAllQuestions(Request $req) {
        $data = $req->all();
        $checkbox_type_of_question = TypeOfQuestionAnswer::where('tag', 'checkbox')->first();

        $data['type_of_evaluation'] = Evaluation::find($data['type_evaluation_id']);
        $data['availables_questions'] = $data['type_of_evaluation']->AvailablesQuestions
            ->where('type_of_question_answer_id', $checkbox_type_of_question->id)->sortBy('position');
        $data['evaluations'] = $data['type_of_evaluation']->Evaluations->sortBy('created_at');
        
        if ($data['type_of_evaluation']->use_specific_responses)
        {
            $data['responses_availables'] = $data['type_of_evaluation']->SpecificResponses()->orderBy('created_at', 'asc')->get();
            $data['evaluations'] = $data['evaluations']->where('use_specific_responses', 1);
        } else {
            $data['responses_availables'] = ResponseAvailable::orderBy('created_at', 'asc')->get();
            $data['evaluations'] = $data['evaluations']->where('use_specific_responses', 0);
        }
        
        $data['evaluations_array'] = $data['evaluations']->pluck('id')->toArray();
        $data['responses_receiveds'] = ResponseReceived::whereIn('evaluation_id', $data['evaluations_array'])->get();
        $data['bar_morris']['data'] = [];
        $count = 1;
        $key = 0;
        foreach ($data['availables_questions'] as $available_question) {
            $data['bar_morris']['data'][$key]['question'] = 'Pergunta - '.$count++;
            
            foreach ($data['responses_availables'] as $response_available) {
                $responses_receiveds = $data['responses_receiveds']->where('available_question_id', $available_question->id);
                // HABILITADO specific_responses
                if ($data['type_of_evaluation']->use_specific_responses)
                {
                    $responses_receiveds_filter = $responses_receiveds->where('specific_response_id', $response_available->id);
                } else {
                    $responses_receiveds_filter = $responses_receiveds->where('response_available_id', $response_available->id);
                }

                $percent = HelpAdmin::calcPercent($responses_receiveds_filter->count(), $responses_receiveds->count());
                $value = $responses_receiveds_filter->count().' - '.$percent;

                $data['bar_morris']['data'][$key][$response_available->id] = $value;
            }
            $key++;
        }

        $data['bar_morris']['position_responses'] = [];
        $data['bar_morris']['name_responses'] = [];
        foreach ($data['responses_availables'] as $response_available) {
            $data['bar_morris']['position_responses'][] = $response_available->id;
            
            $data['bar_morris']['name_responses'][] = $response_available->answer_text;
        }

        $data['bar_morris']['colors'] = [
            '#00FFFF',
            '#00CED1',
            '#008080',
            '#7FFFD4',
            '#00FF7F',
            '#3CB371',
            '#ADFF2F',
            '#9ACD32',
            '#6B8E23',
            '#B8860B',
            '#8B4513',
            '#D2691E',
            '#F4A460',
            '#7B68EE',
            '#9370DB',
            '#EE82EE',
            '#DA70D6',
            '#DDA0DD',
            '#C71585',
            '#FF1493',
            '#FF69B4',
            '#DB7093',
            '#F08080',
            '#CD5C5C',
            '#DC143C',
            '#FF4500',
            '#FF8C00',
            '#FFA500',
            '#FFD700',
            '#FFFF00',
            '#F0E68C',
        ];
        
        return $data['bar_morris'];
    }
    function donutByQuestion(Request $req) {
        $data = $req->all();
        
        // $data['evaluation'] = Evaluation::find(2);
        $data['evaluation'] = Evaluation::find($data['evaluation_id']);
        
        $data['question_type'] = QuestionType::where('tag', 'radio')->first();
        $data['available_questions'] = $data['evaluation']->AvailableQuestions
            ->where('question_type_id', $data['question_type']->id)->sortBy('position');

        $data['donut_morris']['data'] = [];
        foreach ($data['available_questions'] as $available_question) {
        
            $possibles_question_answers = $available_question->PossiblesQuestionAnswers->sortBy('position');

            foreach ($possibles_question_answers as $key => $answer) {
                // dd($answer->ResponsesReceived);
                $value_n = $answer->ResponsesReceived->count();
                $value_percent = HelpAdmin::calcPercent($answer->ResponsesReceived->count(), $available_question->ResponsesReceived->count());

                $data['donut_morris']['data'][$available_question->id][$answer->id] = [
                    'label' => $answer->response_text,
                    'value' => $value_n.' - '.$value_percent,
                ];
            }
        }
        $data['donut_morris']['colors'] = [
            '#00FFFF',
            '#00CED1',
            '#008080',
            '#7FFFD4',
            '#00FF7F',
            '#3CB371',
            '#ADFF2F',
            '#9ACD32',
            '#6B8E23',
            '#B8860B',
            '#8B4513',
            '#D2691E',
            '#F4A460',
            '#7B68EE',
            '#9370DB',
            '#EE82EE',
            '#DA70D6',
            '#DDA0DD',
            '#C71585',
            '#FF1493',
            '#FF69B4',
            '#DB7093',
            '#F08080',
            '#CD5C5C',
            '#DC143C',
            '#FF4500',
            '#FF8C00',
            '#FFA500',
            '#FFD700',
            '#FFFF00',
            '#F0E68C',
        ];

        return $data['donut_morris'];
    }
    function barByQuestion(Request $req) {
        // $data = $req->all();
        
        $data['evaluation'] = Evaluation::find(2);
        // $data['evaluation'] = Evaluation::find($data['evaluation_id']);
        
        $data['question_type'] = QuestionType::where('tag', 'select')->first();
        $data['available_questions'] = $data['evaluation']->AvailableQuestions
            ->where('question_type_id', $data['question_type']->id)->sortBy('position');
        $data['bar_morris']['colors'] = [
            '#00FFFF',
            '#00CED1',
            '#008080',
            '#7FFFD4',
            '#00FF7F',
            '#3CB371',
            '#ADFF2F',
            '#9ACD32',
            '#6B8E23',
            '#B8860B',
            '#8B4513',
            '#D2691E',
            '#F4A460',
            '#7B68EE',
            '#9370DB',
            '#EE82EE',
            '#DA70D6',
            '#DDA0DD',
            '#C71585',
            '#FF1493',
            '#FF69B4',
            '#DB7093',
            '#F08080',
            '#CD5C5C',
            '#DC143C',
            '#FF4500',
            '#FF8C00',
            '#FFA500',
            '#FFD700',
            '#FFFF00',
            '#F0E68C',
        ];

        foreach ($data['available_questions'] as $available_question) {
            $possibles_question_answers = $available_question->PossiblesQuestionAnswers->sortBy('position');
            $question_id = 'question_'.$available_question->id;
            
            $data['bar_morris'][$question_id]['ids_answers_array'] = $possibles_question_answers->pluck('id')->toArray();
            $data['bar_morris'][$question_id]['text_answers_array'] = $possibles_question_answers->pluck('response_text')->toArray();
            
            $data['bar_morris'][$question_id]['data']['question'] = '';
            foreach ($possibles_question_answers as $answer) {
                $value_n = $answer->ResponsesReceived->count();
                $value_percent = HelpAdmin::calcPercent($answer->ResponsesReceived->count(), $available_question->ResponsesReceived->count());

                $data['bar_morris'][$question_id]['data'][$answer->id] = $value_n.' - '.$value_percent;
            }
        }

        return $data;
    }

    function getEvalutationsByDate(Request $req) {
        $data = $req->all();
        $data['type_of_evaluation'] = Evaluation::find($data['type_evaluation_id']);
        $data['evaluations'] = $data['type_of_evaluation']->Evaluations;
    
        if ($data['type_of_evaluation']->use_specific_responses)
        {
            $data['evaluations'] = $data['evaluations']->where('use_specific_responses', 1);
        } else {
            $data['evaluations'] = $data['evaluations']->where('use_specific_responses', 0);
        }

        if ($data['date_range'] != null)
        {
            $data['date_range'] = explode(' - ', $data['date_range']);
            $data['evaluations'] = $data['evaluations']
                ->where('created_at', '>=', $data['date_range'][0])
                ->where('created_at', '<=', $data['date_range'][1]);
        }

        return $data['evaluations']->count();
    }
}