@extends('Admin.layout.layout')
@section('title', 'Configurações da aplicação')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Editando configurações</h4>
                {!! Form::model($data['application_setting'], [
                    'url'=>route('adm.application_settings.update'),
                    'files'=>'true'
                ]) !!}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="app_name" class="col-form-label">
                                Nome da aplicação
                                @if ($errors->has('app_name'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('app_name') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::text('app_name', null, ['class'=>'form-control', 'id'=>'app_name']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="copyright" class="col-form-label">
                                Copyright
                                @if ($errors->has('copyright'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('copyright') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::text('copyright', null, ['class'=>'form-control', 'id'=>'copyright']) !!}
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::submit('Atualizar', ['class'=>'btn btn-xs btn-block btn-trans btn-info']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
@endsection