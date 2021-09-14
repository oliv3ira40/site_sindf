<?php

namespace App\Http\Controllers\Admin\Evaluations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompletedEvaluationController extends Controller
{
    function getQuestionsAndResponses($type_evaluation_id = null)
    {
        if ($type_evaluation_id == null) {
            $data['type_of_evaluation'] = TypeOfEvaluation::first();
        } else {
            $data['type_of_evaluation'] = TypeOfEvaluation::find($type_evaluation_id);
        }

        if ($data['type_of_evaluation'])
        {
            
            $data['_token'] = csrf_token();
            $data['type_evaluation_id'] = $data['type_of_evaluation']->id;
            $data['availables_questions'] = $data['type_of_evaluation']->AvailablesQuestions->sortBy('position');
            $data['responses_availables'] = ResponseAvailable::orderBy('created_at', 'asc')->get();

            return $data;
        } else {
            return 0;
        }
    }
    function new($type_evaluation_id = null)
    {
        if ($type_evaluation_id == null) {
            $data['type_of_evaluation'] = TypeOfEvaluation::first();
        } else {
            $data['type_of_evaluation'] = TypeOfEvaluation::find($type_evaluation_id);
        }

        if ($data['type_of_evaluation'])
        {
            $data['availables_questions'] = $data['type_of_evaluation']->AvailablesQuestions->sortBy('position');
            $data['pictures_header'] = $data['type_of_evaluation']->PicturesOfTypeOfEvaluation
                ->where('position', '-1');
            $data['pictures_footer'] = $data['type_of_evaluation']->PicturesOfTypeOfEvaluation
                ->where('position', '-2');
            $data['pictures_type_of_evaluation'] = $data['type_of_evaluation']->PicturesOfTypeOfEvaluation
                ->whereNotIn('position', ['-1', '-2'])->sortBy('position');

            if ($data['type_of_evaluation']->use_specific_responses) {
                $data['responses_availables'] = $data['type_of_evaluation']->SpecificResponses()->orderBy('created_at', 'asc')->get();
            } else {
                $data['responses_availables'] = ResponseAvailable::orderBy('created_at', 'asc')->get();
            }

            $data['form_itens'] = collect($data['availables_questions'])->merge($data['pictures_type_of_evaluation'])->sortBy('position');
            
            return view('Admin.evaluations.new', compact('data'));
        } else {
            return view('Admin.evaluations.key_not_found');
        }
    }
    
    function save(saveEvaluation $req)
    {
        $data = $req->all();
        $data['type_of_evaluation'] = TypeOfEvaluation::find($data['type_evaluation_id']);

        $handle_form_conditions = HelpEvaluation::HandleFormConditions($data['radio_questions']);
        if ($handle_form_conditions != null) return $handle_form_conditions;

        $data_evaluation = [
            'type_evaluation_id'        => $data['type_evaluation_id'],
            'use_specific_responses'    => $data['type_of_evaluation']->use_specific_responses,
        ];
        $evaluation = Evaluation::create($data_evaluation);

        $data['evaluation_participant']['evaluation_id'] = $evaluation->id;
        EvaluationParticipant::create($data['evaluation_participant']);

        //
        if (isset($data['checkbox_questions'])) {
            if ($data['type_of_evaluation']->use_specific_responses)
            {
                foreach ($data['checkbox_questions'] as $question_id => $response_id) {
                    $data_checkbox_questions = [                
                        'evaluation_id'         => $evaluation->id,
                        'specific_response_id' => $response_id,
                        'available_question_id' => $question_id,
                    ];
                    ResponseReceived::create($data_checkbox_questions);
                }
            } else {
                foreach ($data['checkbox_questions'] as $question_id => $response_id) {
                    $data_checkbox_questions = [                
                        'evaluation_id'         => $evaluation->id,
                        'response_available_id' => $response_id,
                        'available_question_id' => $question_id,
                    ];
                    ResponseReceived::create($data_checkbox_questions);
                }
            }
        }

        //
        if (isset($data['textarea_questions'])) {
            foreach ($data['textarea_questions'] as $question_id => $text) {
                $data_textarea_questions = [                
                    'answer_text'           => $text,
                    'available_question_id' => $question_id,
                    'evaluation_id'         => $evaluation->id,
                ];
                TextAnswerToQuestion::create($data_textarea_questions);
            }
        }

        //
        if (isset($data['radio_questions'])) {
            foreach ($data['radio_questions'] as $question_id => $response) {
                $data_radio_questions = [                
                    'response'              => $response,
                    'evaluation_id'         => $evaluation->id,
                    'available_question_id' => $question_id,
                ];
                AnswersToRadioTypeQuestion::create($data_radio_questions);
            }
        }

        $host_name = request()->getHttpHost();
        $storage_url = '';
        if ($host_name == '127.0.0.1:8000') {

            session()->flash('notification', 'success:Pesquisa concluída!');
            return redirect()->route('admin.evaluation.thanks_for_rating');
        } else {
            return redirect('https://www.saudebrb.com.br/pesquisa/pesquisa-finalizada/');
        }
    }


    function thanksForRating()
    {
        return view('Admin.evaluations.thanks_for_rating');
    }
}
