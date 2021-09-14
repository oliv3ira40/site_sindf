<?php

namespace App\Http\Controllers\Admin\Evaluations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

use App\Http\Requests\Admin\Site\Evaluation\AvailableQuestion\reqUpdate;

class AvailableQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    function list($evaluation_id)
    {
        $data['evaluation'] = Evaluation::find($evaluation_id);
        $data['available_questions'] = $data['evaluation']->AvailableQuestions;

        if ($data['available_questions']->count()) {
            return view('Admin.site.evaluation.available_question.list', compact('data'));
        } else {
            return redirect()->route('adm.available_question.new', $evaluation_id);
        }
    }

    function new($evaluation_id)
    {
        $data['evaluation'] = Evaluation::find($evaluation_id);
        $data['question_type'] = QuestionType::all();
        $data['question_topics'] = $data['evaluation']->QuestionTopics;

        return view('Admin.site.evaluation.available_question.new', compact('data'));
    }
    function save(Request $req)
    {
        $data = $req->all();
        if($data['position'] == null) $data['position'] = 0;
        $available_question = AvailableQuestion::create($data);

        session()->flash('notification', 'success:Pergunta registrada!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.available_question.new' ,$data['evaluation_id']);
        } else {
            if ($available_question->QuestionType->tag != 'textarea') {
                return redirect()->route('adm.available_question.edit' ,$available_question->id);
            } else {
                return redirect()->route('adm.available_question.list' ,$data['evaluation_id']);
            }
        }
    }

    function edit($id)
    {
        $data['available_question'] = AvailableQuestion::find($id);
        $data['evaluation'] = $data['available_question']->Evaluation;
        $data['question_type'] = QuestionType::all();
        $data['question_topics'] = $data['evaluation']->QuestionTopics;
        $data['possibles_question_answers'] = $data['available_question']->PossiblesQuestionAnswers;

        return view('Admin.site.evaluation.available_question.edit', compact('data'));
    }
    function update(reqUpdate $req)
    {
        $data = $req->all();
        if($data['position'] == null) $data['position'] = 0;
        if(!isset($data['reading_the_mandatory_confirmation_text'])) $data['reading_the_mandatory_confirmation_text'] = 0;

        $available_question = AvailableQuestion::find($data['id']);
        $available_question->update($data);

        session()->flash('notification', 'success:Pergunta atualizada!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.available_question.edit', $available_question->id);
        } else {
            return redirect()->route('adm.available_question.list', $available_question->evaluation_id);
        }
    }

    function alert($id)
    {
        $data['available_question'] = AvailableQuestion::find($id);

        return view('Admin.site.evaluation.available_question.alert', compact('data'));
    }
    function delete(Request $req)
    {
        $data = $req->all();
        $available_question = AvailableQuestion::find($data['id']);

        $available_question->delete();

        session()->flash('notification', 'info:Pergunta excluída!');
        return redirect()->route('adm.available_question.list', $available_question->evaluation_id);
    }
}
