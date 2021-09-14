@extends('Admin.layout.layout')
@section('title', 'Excluindo tópico')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Excluindo tópico</h4>

                {!! Form::model($data['question_topic'], ['url'=>route('adm.question_topic.delete')]) !!}
                    {!! Form::hidden('id', $data['question_topic']->id) !!}
                    {!! Form::hidden('evaluation_id', $data['evaluation']->id) !!}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="" class="col-form-label">
                                Posição
                            </label>
                            <div class="form-control">{{ $data['question_topic']->position }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="col-form-label">
                                Nome
                            </label>
                            <div class="form-control">{{ $data['question_topic']->name }}</div>
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