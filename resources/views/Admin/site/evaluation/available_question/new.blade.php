@extends('Admin.layout.layout')
@section('title', 'Nova pergunta')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 m-b-10 header-title">
                    <a href="{{ route('adm.available_question.list', $data['evaluation']->id) }}">
                        Retorna a lista de perguntas
                    </a>
                    <a href="{{ route('adm.evaluation.edit', $data['evaluation']->id) }}" class="pull-right">
                        Retorna a {{ $data['evaluation']->name }}
                    </a>
                </h4>

                {!! Form::open(['route'=>'adm.available_question.save']) !!}
                    {!! Form::hidden('evaluation_id', $data['evaluation']->id) !!}
                    
                    <div class="row">
                        <div class="col-md-4">
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

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="question_type_id">Tipo de pergunta*</label>
                                @if ($errors->has('question_type_id'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('question_type_id')) }}
                                    </small>
                                @endif

                                <select id="question_type_id" name="question_type_id" class="form-control select2">
                                    @foreach ($data['question_type'] as $question_type)
                                        <option value="{{ $question_type->id }}">
                                            {{ $question_type->name }} -
                                            {{ $question_type->description }}
                                            ({{ $question_type->tag }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="question_topic_id">Tópico</label>
                                @if ($errors->has('question_topic_id'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('question_topic_id')) }}
                                    </small>
                                @endif

                                <select id="question_topic_id" name="question_topic_id" class="form-control select2">
                                    <option value="">Nenhum</option>
                                    @foreach ($data['question_topics'] as $question_topic)
                                        <option value="{{ $question_topic->id }}">
                                            {{ $question_topic->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="question_text">Pergunta*</label>
                                @if ($errors->has('question_text'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('question_text')) }}
                                    </small>
                                @endif
                                {!! Form::text('question_text', null, ['id'=>'question_text', 'class'=>'form-control', 'autofocus']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox2" checked type="checkbox" name="stay_on_page">
                                    <label for="checkbox2">
                                        Continuar adicionando perguntas
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <button class="btn btn-block btn-primary waves-effect w-md waves-light">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}   
            </div>
        </div>
    </div>

@endsection