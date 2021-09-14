@extends('Admin.layout.layout')
@section('title', 'Atualizar tópico')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 m-b-10 header-title">
                    <a href="{{ route('adm.question_topic.list', $data['evaluation']->id) }}">
                        Retorna a lista de tópicos
                    </a>
                    <a href="{{ route('adm.evaluation.edit', $data['evaluation']->id) }}" class="pull-right">
                        Retorna a {{ $data['evaluation']->name }}
                    </a>
                </h4>

                {!! Form::model($data['question_topic'], ['route'=>'adm.question_topic.update']) !!}
                    {!! Form::hidden('id', $data['question_topic']->id) !!}
                    {!! Form::hidden('evaluation_id', $data['evaluation']->id) !!}
                    
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
                                <label for="name">Nome*</label>
                                @if ($errors->has('name'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('name')) }}
                                    </small>
                                @endif
                                {!! Form::text('name', null, ['id'=>'name', 'class'=>'form-control', 'autofocus']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox2" checked type="checkbox" name="stay_on_page">
                                    <label for="checkbox2">
                                        Continuar editando essa tópico
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <button class="btn btn-block btn-primary waves-effect w-md waves-light">
                                    Atualizar tópico
                                </button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}   
            </div>
        </div>
    </div>

@endsection