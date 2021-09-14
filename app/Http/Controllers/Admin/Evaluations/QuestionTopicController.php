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

class QuestionTopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    function list($evaluation_id) {
        $data['evaluation'] = Evaluation::find($evaluation_id);
        $data['question_topics'] = $data['evaluation']->QuestionTopics;

        if ($data['question_topics']->count()) {
            return view('Admin.site.evaluation.question_topic.list', compact('data'));
        } else {
            return redirect()->route('adm.question_topic.new', $evaluation_id);
        }
    }
    
    function new($evaluation_id) {
        $data['evaluation'] = Evaluation::find($evaluation_id);
        $data['available_questions'] = $data['evaluation']->AvailableQuestions;
        
        return view('Admin.site.evaluation.question_topic.new', compact('data'));
    }
    function save(Request $req) {
        $data = $req->all();

        if ($data['question_topic']['position'] == null) $data['question_topic']['position'] = 0;
        $question_topic = QuestionTopic::create($data['question_topic']);

        if (isset($data['available_questions_id'])) {
            foreach ($data['available_questions_id'] as $available_questions_id) {
                $available_questions = AvailableQuestion::find($available_questions_id);
                
                $available_questions->update(['question_topic_id' => $question_topic->id]);
            }
        }

        session()->flash('notification', 'success:Tópico criado!');
        return redirect()->route('adm.question_topic.list', $data['question_topic']['evaluation_id']);
    }

    function edit($id) {
        $data['question_topic'] = QuestionTopic::find($id);
        $data['evaluation'] = $data['question_topic']->Evaluation;

        return view('Admin.site.evaluation.question_topic.edit', compact('data'));
    }
    function update(Request $req) {
        $data = $req->all();
        if($data['position'] == null) $data['position'] = 0;
        // dd($data);
        
        $question_topic = QuestionTopic::find($data['id']);
        $question_topic->update($data);

        session()->flash('notification', 'success:Tópico atualizado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.question_topic.edit', $question_topic->id);
        } else {
            return redirect()->route('adm.question_topic.list', $data['evaluation_id']);
        }
    }

    function alert($id) {
        $data['question_topic'] = QuestionTopic::find($id);
        $data['evaluation'] = $data['question_topic']->Evaluation;

        // dd($data);
        return view('Admin.site.evaluation.question_topic.alert', compact('data'));
    }
    function delete(Request $req) {
        $data = $req->all();

        $question_topic = QuestionTopic::find($data['id']);
        $question_topic->delete();

        session()->flash('notification', 'success:Tópico excluído!');
        return redirect()->route('adm.question_topic.list', $data['evaluation_id']);
    }
}
