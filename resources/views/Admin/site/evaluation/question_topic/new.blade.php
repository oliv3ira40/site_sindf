@extends('Admin.layout.layout')
@section('title', 'Novo tópico')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::open(['route'=>'adm.question_topic.save']) !!}
                    {!! Form::hidden('question_topic[evaluation_id]', $data['evaluation']->id) !!}    
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="question_topic[position]">Posição</label>
                                @if ($errors->has('question_topic.position'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('question_topic.position')) }}
                                    </small>
                                @endif
                                {!! Form::number('question_topic[position]', null, ['id'=>'question_topic[position]', 'class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="question_topic[name]">Nome*</label>
                                @if ($errors->has('question_topic.name'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('question_topic.name')) }}
                                    </small>
                                @endif
                                {!! Form::text('question_topic[name]', null, ['id'=>'question_topic[name]', 'class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="question_topic[description]">Descrição</label>
                                @if ($errors->has('question_topic.description'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('question_topic.description')) }}
                                    </small>
                                @endif
                                {!! Form::textarea('question_topic[description]', null, ['id'=>'question_topic[description]', 'class'=>'form-control', 'rows'=>'3']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row m-t-10">
                        <div class="col-md-12">
                            <h4 class="m-t-0 m-b-10 header-title">
                                Vincular perguntas
                            </h4>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="available_questions_id[]" class="col-form-label">
                                    Perguntas registradas
                                    @if ($errors->has('available_questions_id'))
                                        <small class="text-danger txt-trans-initial font-bold">
                                            {{ $errors->first('available_questions_id') }}
                                        </small>
                                    @endif
                                </label>
                                <select id="my_multi_select3" name="available_questions_id[]" class="multi-select" multiple>
                                    @foreach ($data['available_questions'] as $available_questions)
                                        {{-- @if ($available_questions->question_topic_id == $data['evaluation']->id)
                                            <option selected value='{{ $available_questions->id }}'>
                                                {{ $available_questions->question_text }}
                                            </option>
                                        @else
                                            <option value='{{ $available_questions->id }}'>
                                                {{ $available_questions->question_text }}
                                            </option>
                                        @endif --}}
                                        <option value='{{ $available_questions->id }}'>
                                            {{ $available_questions->question_text }}
                                            @if ($available_questions->QuestionTopic)
                                                 ({{ $available_questions->QuestionTopic->name }})
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row m-t-10">
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