@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Esqueci a senha
@stop

@section('content')
    <main>

        <div class="bg_color_2">
			<div class="container padding_35_35">
				<div id="login">
					<h1>
                        Informe os dados abaixo
                    </h1>
					<div class="box_form">
                        {!! Form::open(['url'=>route('site.validate_personal_data')]) !!}
                            @if (Session::has('info_old_route'))
                                <div class="divider">
                                    <span class="text-danger txt-trans-initial font-bold">
                                        {{ Session::get('info_old_route') }}
                                    </span>
                                </div>
                            @endif
                            @if (Session::has('info'))
                                <div class="divider">
                                    <span class="text-danger txt-trans-initial font-bold">
                                        {{ Session::get('info') }}
                                    </span>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="cpf">CPF* (somente números)</label>
                                {!! Form::number('cpf', null, ['class'=>'form-control', 'id'=>'cpf', 'autofocus']) !!}
                                
                                @if ($errors->has('cpf'))
                                    <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                        {{ $errors->first('cpf') }}
                                    </small>
                                @endif
                                @if (Session::has('cpf'))
                                    <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                        {{ Session::get('cpf') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="registration">Matrícula* (somente números)</label>
                                {!! Form::number('registration', null, ['class'=>'form-control', 'id'=>'registration']) !!}
                                
                                @if ($errors->has('registration'))
                                    <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                        {{ $errors->first('registration') }}
                                    </small>
                                @endif
                                @if (Session::has('registration'))
                                    <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                        {{ Session::get('registration') }}
                                    </small>
                                @endif
                            </div>
							<div class="form-group">
                                <label for="date_of_birth">Data de nascimento*</label>
                                {!! Form::text('date_of_birth', null, ['class'=>'form-control mask_date', 'placeholder'=>'dd/mm/aaaa']) !!}
                                @if ($errors->has('date_of_birth'))
                                    <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                        {{ $errors->first('date_of_birth') }}
                                    </small>
                                @endif
                                @if (Session::has('date_of_birth'))
                                    <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                        {{ Session::get('date_of_birth') }}
                                    </small>
                                @endif
                            </div>

                            {{-- recaptcha --}}
                            <div class="row">
                                <div class="form-group col-md-12 m-b-20">
                                    <div class="g-recaptcha" data-sitekey="{{ HelpSite::getSiteKayRecaptcha() }}"></div>
                                    @if ($errors->has('g-recaptcha-response'))
                                        <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                            {{ $errors->first('g-recaptcha-response') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-12 text-center mb-0">
                                    <input class="btn_1 btn-block medium border-r-0" type="submit" value="Resetar senha">
                                </div>
                            </div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>

    </main>
@endsection