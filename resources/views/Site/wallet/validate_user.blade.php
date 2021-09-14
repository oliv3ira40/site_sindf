@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Buscar carteirinha digital Casembrapa
@stop

@section('content')
    <main>

        <div class="bg_color_2">
			<div class="container padding_35_35">
				<div id="login">
					<h1>
                        Carteirinha digital
                        <br>
                        <small class="font-14">
                            Confirme sua data de nascimento
                        </small>
                    </h1>
					<div class="box_form">
						{!! Form::open(['url'=>route('site.wallet.digital_wallet')]) !!}
                            {!! Form::hidden('cpf', $data['cpf']) !!}
                        
                            <div class="form-group">
                                <label for="birth_date">DATA DE NASCIMENTO* (dd/mm/aaaa)</label>
                                {!! Form::text('birth_date', null, ['class'=>'form-control mask_date', 'id'=>'birth_date', 'autofocus']) !!}
                                
                                @if ($errors->has('birth_date'))
                                    <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                        {{ $errors->first('birth_date') }}
                                    </small>
                                @endif
                                @if (Session::has('birth_date'))
                                    <small class="pl-0 text-danger txt-trans-initial font-12 font-bold">
                                        {{ Session::get('birth_date') }}
                                    </small>
                                @endif
                            </div>

							<div class="form-group text-center add_top_20">
								<input class="btn_1 btn-block medium border-r-0" type="submit" value="Confirmar data de nascimento">
							</div>
						{!! Form::close() !!}
					</div>
					{{-- <p class="text-center link_bright">Do not have an account yet? <a href="#0"><strong>Register now!</strong></a></p> --}}
				</div>
				<!-- /login -->
			</div>
		</div>

    </main>
@endsection