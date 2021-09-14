@extends('Admin.layout.layout')
@section('title', 'Editando pergunta')

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

                {!! Form::model($data['available_question'], ['route'=>'adm.available_question.update']) !!}
                    {!! Form::hidden('id', $data['available_question']->id) !!}
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
                                        @if ($question_type->id == $data['available_question']->question_type_id)
                                            <option selected value="{{ $question_type->id }}">
                                                {{ $question_type->name }} -
                                                {{ $question_type->description }}
                                                ({{ $question_type->tag }})
                                            </option>
                                        @else
                                            <option value="{{ $question_type->id }}">
                                                {{ $question_type->name }} -
                                                {{ $question_type->description }}
                                                ({{ $question_type->tag }})
                                            </option>
                                        @endif
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
                                        @if ($question_topic->id == $data['available_question']->question_topic_id)
                                            <option selected value="{{ $question_topic->id }}">
                                                {{ $question_topic->name }}
                                            </option>
                                        @else
                                            <option value="{{ $question_topic->id }}">
                                                {{ $question_topic->name }}
                                            </option>
                                        @endif
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
                                <label for="title_confirmation_text">Titulo para o texto de confirmação</label>
                                @if ($errors->has('title_confirmation_text'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('title_confirmation_text')) }}
                                    </small>
                                @endif
                                {!! Form::text('title_confirmation_text', null, ['id'=>'title_confirmation_text', 'class'=>'form-control', 'autofocus']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="confirmation_text">Texto de confirmação</label>
                                @if ($errors->has('confirmation_text'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('confirmation_text')) }}
                                    </small>
                                @endif
                                {!! Form::textarea('confirmation_text', null, ['id'=>'confirmation_text', 'class'=>'form-control', 'rows'=>'4']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="m-t-0 m-b-10 header-title">
                                        Configurações da questão
                                    </h4>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="reading_the_mandatory_confirmation_text">Leitura obrigatória do texto de confirmação</label>
                                        @if ($errors->has('reading_the_mandatory_confirmation_text'))
                                            <small class="text-danger font-bold">
                                                {{ $errors->first(('reading_the_mandatory_confirmation_text')) }}
                                            </small>
                                        @endif
                                        <div class="check-box-position">
                                            {!! Form::checkbox('reading_the_mandatory_confirmation_text', 1, $data['available_question']->reading_the_mandatory_confirmation_text, [
                                                'data-plugin'=>"switchery",
                                                'data-color'=>"#188ae2",
                                                'data-size'=>"small"])
                                            !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox2" checked type="checkbox" name="stay_on_page">
                                    <label for="checkbox2">
                                        Continuar editando essa pergunta
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <button class="btn btn-block btn-primary waves-effect w-md waves-light">
                                    Atualizar pergunta
                                </button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}   
            </div>
        </div>
    </div>

    @if ($data['available_question']->QuestionType->tag != 'textarea')
        <div class="row">
            <div class="col-8">
                <div class="card-box table-responsive">
                    <div class="col-md-12">
                        <h4 class="m-t-0 m-b-10 header-title">
                            Possíveis resposta para essa pergunta
                        </h4>
                    </div>
                    <table class="datatable table table-bordered">
                        <thead>
                        <tr>
                            <th>Posição</th>
                            <th>Resposta</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['possibles_question_answers'] as $possible_answer)
                                <tr>
                                    <td>
                                        {{ $possible_answer->position }}
                                    </td>
                                    <td>
                                        {{ $possible_answer->response_text }}
                                    </td>
                                    <td>
                                        @if (in_array('adm.possible_question_answer.edit', HelpAdmin::permissionsUser()))
                                            <a href="{{ route('adm.possible_question_answer.edit', $possible_answer->id) }}" class="my-btn btn btn-warning btn-xs btn-trans">
                                                Editar
                                            </a>
                                        @endif
                                        @if (in_array('adm.possible_question_answer.alert', HelpAdmin::permissionsUser()))
                                            <a href="{{ route('adm.possible_question_answer.alert', $possible_answer->id) }}" class="my-btn btn btn-danger btn-xs btn-trans">
                                                Excluir
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-box">
                    <div class="col-md-12">
                        <h4 class="m-t-0 m-b-10 header-title">
                            Cadastrar nova resposta
                        </h4>
                    </div>

                    {!! Form::open(['route'=>'adm.possible_question_answer.save']) !!}
                        {!! Form::hidden('available_question_id', $data['available_question']->id) !!}
                        
                        <div class="row">
                            <div class="col-md-12">
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
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="response_text">Resposta*</label>
                                    @if ($errors->has('response_text'))
                                        <small class="text-danger font-bold">
                                            {{ $errors->first(('response_text')) }}
                                        </small>
                                    @endif
                                    {!! Form::text('response_text', null, ['id'=>'response_text', 'class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <button class="btn btn-block btn-primary waves-effect w-md waves-light">
                                        Nova resposta
                                    </button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}   
                </div>
            </div>
        </div>
    @endif

@endsection