@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Fale Com o Jurídico
@stop

@section('content')
    <main>

		<div class="container margin_60_60">
			<div class="main_title">
				<h2>Fale Com o Jurídico</h2>
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
								<strong>PROCESSOS COLETIVOS</strong>
								<a href="https://www.sindfazenda.org.br/wp-content/uploads/2021/03/Andamento_processual_IsabelMar2021.pdf">CLIQUE AQUI PARA ACESSAR OS PROCESSOS COLETIVOS</a><br>
								
							</li>
							<li>
								<strong>CONTATOS:</strong>
								<a href="tel:556136930898">+55 (61) 3963-0898 (FIXO)</a> <br>
								<a href="tel:5561999172315">+55 (61) 9 9917-2315 (CLARO)</a><BR>
								<a href="mailto:juridico@sindfazenda.org.br">juridico@sindfazenda.org.br</a>
							</li>
							
						
							
						</ul>
					</div>
				</div>
				
			</div>
		</div>

    </main>
@endsection