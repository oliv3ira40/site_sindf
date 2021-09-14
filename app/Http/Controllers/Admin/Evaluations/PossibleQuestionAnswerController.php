<?php

namespace App\Http\Controllers\Admin\Evaluations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Site\Evaluation\AvailableQuestion;
use App\Models\Site\Evaluation\Evaluation;
use App\Models\Site\Evaluation\PossibleQuestionAnswer;

class PossibleQuestionAnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    function list()
    {
        dd('list');
    }
    
    function new()
    {
        dd('new');
    }
    function save(Request $req)
    {
        $data = $req->all();

        PossibleQuestionAnswer::create($data);

        session()->flash('notification', 'success:Resposta registrada!');
        return redirect()->route('adm.available_question.edit', $data['available_question_id']);
    }

    function edit($id)
    {
        $data['possibles_answers'] = PossibleQuestionAnswer::find($id);
        $data['question'] = $data['possibles_answers']->AvailableQuestion;
        $data['evaluation'] = $data['question']->Evaluation;

        return view('Admin.site.evaluation.response_available.edit', compact('data'));
    }
    function update(Request $req)
    {
        $data = $req->all();
        if($data['position'] == null) $data['position'] = 0;
        
        $response_available = PossibleQuestionAnswer::find($data['id']);
        $response_available->update($data);

        session()->flash('notification', 'success:Resposta atualizada!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on') {
            return redirect()->route('adm.possible_question_answer.edit', $response_available->id);
        } else {
            return redirect()->route('adm.available_question.edit', $data['question_id']);
        }
    }

    function alert($id)
    {
        $data['possible_answer'] = PossibleQuestionAnswer::find($id);
        $data['question'] = $data['possible_answer']->AvailableQuestion;

        return view('Admin.site.evaluation.response_available.alert', compact('data'));
    }
    function delete(Request $req)
    {
        $data = $req->all();
        $possible_answer = PossibleQuestionAnswer::find($data['id']);

        $possible_answer->delete();

        session()->flash('notification', 'success:Resposta excluída!');
        return redirect()->route('adm.available_question.edit', $data['question_id']);
    }
}
