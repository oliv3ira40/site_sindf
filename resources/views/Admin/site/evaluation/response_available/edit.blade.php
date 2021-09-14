@extends('Admin.layout.layout')
@section('title', 'Editando resposta')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 m-b-10 header-title">
                    <a href="{{ route('adm.available_question.edit', $data['question']->id) }}">
                        Retorna a pergunta
                    </a>
                    <a href="{{ route('adm.evaluation.edit', $data['evaluation']->id) }}" class="pull-right">
                        Retorna a {{ $data['evaluation']->name }}
                    </a>
                </h4>

                {!! Form::model($data['possibles_answers'], ['route'=>'adm.possible_question_answer.update']) !!}
                    {!! Form::hidden('id', $data['possibles_answers']->id) !!}
                    {!! Form::hidden('question_id', $data['question']->id) !!}
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position">Posição</label>
                                @if ($errors->has('position'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('position')) }}
                                    </small>
                                @endif
                                {!! Form::number('position', null, ['id'=>'position', 'class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="response_text">Resposta*</label>
                                @if ($errors->has('response_text'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('response_text')) }}
                                    </small>
                                @endif
                                {!! Form::text('response_text', null, ['id'=>'response_text', 'class'=>'form-control', 'autofocus']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox2" checked type="checkbox" name="stay_on_page">
                                    <label for="checkbox2">
                                        Continuar editando essa resposta
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <button class="btn btn-block btn-primary waves-effect w-md waves-light">
                                    Atualizar resposta
                                </button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}   
            </div>
        </div>
    </div>

@endsection