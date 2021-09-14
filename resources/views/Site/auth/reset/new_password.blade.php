@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Defina sua nova senha
@stop

@section('content')
    <main>

        <div class="bg_color_2">
			<div class="container padding_35_35">
				<div id="login">
					<h1>
                        Defina sua nova senha
                    </h1>
					<div class="box_form">
                        {!! Form::open(['url'=>route('site.save_new_password')]) !!}
                            {!! Form::hidden('remember_token', $user->remember_token) !!}

							<div class="form-group">
                                <label for="">Senha*</label>
                                {!! Form::text('password', null, ['class'=>'form-control', 'id'=>'password']) !!}
                                @if ($errors->has('password'))
                                    <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                        {{ $errors->first('password') }}
                                    </small>
                                @endif
                                @if (Session::has('password'))
                                    <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                        {{ Session::get('password') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Confirme a senha*</label>
                                {!! Form::text('password_confirmation', null, ['class'=>'form-control', 'id'=>'password']) !!}
                                @if ($errors->has('password_confirmation'))
                                    <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                        {{ $errors->first('password_confirmation') }}
                                    </small>
                                @endif
                                @if (Session::has('password_confirmation'))
                                    <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                        {{ Session::get('password_confirmation') }}
                                    </small>
                                @endif
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-12 text-center">
                                    <input class="btn_1 btn-block medium border-r-0" type="submit" value="Salvar">
                                </div>
                            </div>
						{!! Form::close() !!}
					</div>
					{{-- <p class="text-center link_bright">Do not have an account yet? <a href="#0"><strong>Register now!</strong></a></p> --}}
				</div>
			</div>
		</div>

    </main>
@endsection