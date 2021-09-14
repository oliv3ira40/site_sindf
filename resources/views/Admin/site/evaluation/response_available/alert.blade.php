@extends('Admin.layout.layout')
@section('title', 'Excluindo resposta')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Excluindo resposta</h4>

                {!! Form::model($data['possible_answer'], ['url'=>route('adm.possible_question_answer.delete')]) !!}
                    {!! Form::hidden('id', null) !!}
                    {!! Form::hidden('question_id', $data['question']->id) !!}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="" class="col-form-label">
                                Posição
                            </label>
                            <div class="form-control">{{ $data['possible_answer']->position }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="col-form-label">
                                Pergunta
                            </label>
                            <div class="form-control">{{ $data['possible_answer']->response_text }}</div>
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