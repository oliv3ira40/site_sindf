@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Fale Conosco
@stop

@section('content')
    <main>

		<div class="container margin_60_60">
			<div class="main_title">
				<h2>Fale Conosco</h2>
			</div>
			<div class="row">
				<div class="col-md-6 ml-auto">
					<div class="box_general">
						<h3>Formulário de Contato</h3>
						<br>

						{!! Form::open(['url'=>route('site.contact_form.send'), 'id'=>'contact_form']) !!}
							<div class="row">
								<div class="col-md-6">
									<div class="form-group m-b-10">
										<label class="mb-0" for="name">Nome</label>
										{!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name']) !!}
										@if ($errors->has('name'))
											<small class="pl-0 text-danger txt-trans-initial font-12">
												{{ $errors->first('name') }}
											</small>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group m-b-10">
										<label class="mb-0" for="subject">Assunto</label>
										{!! Form::text('subject', null, ['class'=>'form-control', 'id'=>'subject']) !!}
										@if ($errors->has('subject'))
											<small class="pl-0 text-danger txt-trans-initial font-12">
												{{ $errors->first('subject') }}
											</small>
										@endif
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group m-b-10">
										<label class="mb-0" for="email">E-mail</label>
										{!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) !!}
										@if ($errors->has('email'))
											<small class="pl-0 text-danger txt-trans-initial font-12">
												{{ $errors->first('email') }}
											</small>
										@endif
									</div>
								</div>
							</div><div class="row">
								<div class="col-md-12">
									<div class="form-group m-b-10">
										<label class="mb-0" for="message">Mensagem</label>
										{!! Form::textarea('message', null, ['class'=>'form-control', 'id'=>'message', 'rows'=>'5', 'style'=>'height:100px;']) !!}
										@if ($errors->has('message'))
											<small class="pl-0 text-danger txt-trans-initial font-12">
												{{ $errors->first('message') }}
											</small>
										@endif
									</div>
								</div>
							</div>
							

							{{-- recaptcha --}}
							<div class="row">
								<div class="col-md-12">
									<div class="g-recaptcha" data-sitekey="{{ HelpSite::getSiteKayRecaptcha() }}"></div>
									@if ($errors->has('g-recaptcha-response'))
										<small class="pl-0 text-danger txt-trans-initial font-12">
											{{ $errors->first('g-recaptcha-response') }}
										</small>
									@endif
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<input type="submit" value="Enviar Mensagem" class="btn_1 btn-block medium border-r-0 add_top_20" id="submit-contact">
								</div>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
				<div class="col-md-6">
					<div id="contact_info">
						<ul>
							<li>
								<strong>E-mails:</strong>
								<a href="mailto:sindfazenda@sindfazenda.org.br">sindfazenda@sindfazenda.org.br</a><br>
								<a href="mailto:juridico@sindfazenda.org.br">juridico@sindfazenda.org.br</a>
							</li>
							<li>
								<strong>Telefones:</strong>
								<a href="tel:556136930898">+55 (61) 3963-0898 (FIXO)</a> <br>
								<a href="tel:5561999172315">+55 (61) 9 9917-2315 (CLARO)</a>
							</li>
							
							<li>
								<p><strong>Endereço:</strong>
								SCS Qd 01 Bloco K - Sala 904 <br>
								Ed. Denasa - Asa Sul Brasília/DF <br>
								CEP 70398-900</p>
							</li>
							<li>
							    <p><strong>Horário de funcionamento durante a pandemia:</strong>
                                Segunda a sexta - Das 09h30 às 16h </p> 
							</li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>

    </main>
@endsection