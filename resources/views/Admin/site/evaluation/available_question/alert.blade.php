@extends('Admin.layout.layout')
@section('title', 'Excluindo pergunta')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Excluindo pergunta</h4>

                {!! Form::model($data['available_question'], ['url'=>route('adm.available_question.delete')]) !!}
                    {!! Form::hidden('id', null) !!}

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="first_name" class="col-form-label">
                                Pergunta
                            </label>
                            <div class="form-control">{{ $data['available_question']->question_text }}</div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="last_name" class="col-form-label">
                                Tipo de pergunta
                            </label>
                            <div class="form-control">
                                {{ $data['available_question']->QuestionType->name }}
                                <strong>
                                    ({{ $data['available_question']->QuestionType->tag }})
                                </strong>    
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email" class="col-form-label">
                                Respostas vinculadas
                            </label>
                            <div class="form-control">
                                {{ $data['available_question']->PossiblesQuestionAnswers->count() }}
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::submit('Excluir', ['class'=>'btn btn-xs btn-block btn-trans btn-danger']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection