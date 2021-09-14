@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    {{ $data_page['title'] }}
@stop

@section('content')
    <main>

        <div class="bg_color_2">
			<div class="container padding_35_35">
				<div id="login">
					<h1>
                        {{ $data_page['title_page'] }}
                        <br>
                        <small class="font-12">
                            {{ $data_page['instruction'] }}
                        </small>
                    </h1>
					<div class="box_form">
						{!! Form::open(['url'=>route('site.user.validate_date_of_birth')]) !!}
                            {!! Form::hidden('target', $target) !!}
                            {!! Form::hidden('data_page', implode('//', $data_page)) !!}
                            <div class="form-group">
                                <label for="cpf">CPF*</label>
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

							<div class="form-group text-center add_top_20">
								<input class="btn_1 btn-block medium border-r-0" type="submit" value="{{ $data_page['button'] }}">
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