<?php

namespace App\Http\Controllers\Site\Evaluation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\HelpAdmin;

use App\Http\Requests\Site\Evaluation\CompletedEvaluation\ReqSave;

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

class CompletedEvaluationController extends Controller
{

    function new($evaluation_id) {
        $data['auth_user'] = \Auth::user();
        if ($data['auth_user'] == null) {
            return redirect()->route('site.index');
        }
        
        $data['evaluation'] = Evaluation::find($evaluation_id);
        if ($data['evaluation']->id == 2) {
            return view('Site.evaluation.completed_evaluation.finished', compact('data'));
        } else {
            if ($data['auth_user']->cpf != '00000000000' AND !HelpAdmin::IsUserDeveloper()) {
                return redirect()->route('site.index');
            }
        }
        $data['images_for_evaluation'] = $data['evaluation']->ImagesForEvaluation->sortBy('position');
        $data['evaluation_settings'] = $data['evaluation']->EvaluationSettings;
        $data['question_topics'] = $data['evaluation']->QuestionTopics->sortBy('position');
        $data['all_questions'] = $data['evaluation']->AvailableQuestions;
        // $data['no_topic_question'] = $data['all_questions']->where('question_topic_id', null);
        $data['quest_with_confirm_text'] = $data['all_questions']->where('confirmation_text', '!=', null)->pluck('id')->toArray();
        $data['quest_w_conf_t_required_reading'] = $data['all_questions']
            ->where('confirmation_text', '!=', null)
            ->where('reading_the_mandatory_confirmation_text', 1);

        if ($data['evaluation_settings']->login_required AND !$data['auth_user']) {
            
            return redirect()->route('site.page_login', [
                'old_route' => route('site.completed_evaluations.new', $data['evaluation']->id),
                'type' => 'evaluations',
            ]);
        }
        
        // dd(!HelpAdmin::IsUserDeveloper() AND !HelpAdmin::IsUserCollaborator() AND !HelpAdmin::IsUserAdministrator());
        if ($data['evaluation_settings']->answered_only_once_per_user AND $data['evaluation_settings']->login_required) {
            if (!HelpAdmin::IsUserDeveloper() AND !HelpAdmin::IsUserCollaborator() AND !HelpAdmin::IsUserAdministrator()) {
                $completed_evaluations = $data['evaluation']->CompletedEvaluations->where('user_id', $data['auth_user']->id)->count();
                
                if ($completed_evaluations != 0) {
                    return redirect()->route('site.completed_evaluations.already_answered');
                }
            }
        }

        return view('Site.evaluation.completed_evaluation.new', compact('data'));
    }
    function save(ReqSave $req) {
        $data = $req->all();
        $data['ip_adress'] = \Request::ip();
        $user = \Auth::user();
        if ($user != null) $data['user_id'] = $user->id;
        // dd($data);

        $completed_evaluation = CompletedEvaluation::create($data);

        if (isset($data['questions'])) {
            $data_question = [
                'completed_evaluation_id' => $completed_evaluation->id,
                'evaluation_id' => $data['evaluation_id']
            ];
            foreach ($data['questions'] as $key => $answer) {
                $data_question['available_question_id'] = $key;
                $data_question['possible_question_answer_id'] = $answer;
                
                ResponseReceived::create($data_question);
            }
        }

        if (isset($data['textarea_questions'])) {
            $data_textarea_questions = [
                'completed_evaluation_id' => $completed_evaluation->id,
                'evaluation_id' => $data['evaluation_id']
            ];
            foreach ($data['textarea_questions'] as $key => $answer) {
                $data_textarea_questions['available_question_id'] = $key;
                $data_textarea_questions['text_response'] = $answer;
                
                ResponseReceived::create($data_textarea_questions);
            }
        }

        return redirect()->route('site.completed_evaluations.completed');
    }

    function completed() {
        return view('Site.evaluation.completed_evaluation.completed');
    }
    function alreadyAnswered() {
        return view('Site.evaluation.completed_evaluation.already_answered');
    }
}
