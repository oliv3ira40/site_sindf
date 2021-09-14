@extends('Admin.layout.layout')
@section('title', 'Defina sua nova senha')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::open(['url'=>route('adm.definitive_password_save')]) !!}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password" class="col-form-label">
                                Senha*
                                @if ($errors->has('password'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('password') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password_confirmation" class="col-form-label">
                                Confirme a senha*
                                @if ($errors->has('password_confirmation'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('password_confirmation') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::password('password_confirmation', ['class'=>'form-control', 'id'=>'password_confirmation']) !!}
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::submit('Salvar', ['class'=>'btn btn-xs btn-block btn-trans btn-info']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection