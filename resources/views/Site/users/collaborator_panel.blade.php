@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Painel do colaborador
@stop

@section('content')
    <main>
        
        <div class="container margin_60">
            <div class="row">
                <div class="col-md-8">
                    <div class="box_general_3 booking">
                        <div class="title m-b-10">
                            <strong>
                                Painel do colaborador
                            </strong>
                            <a class="float-right text-white" href="{{ route('site.logout') }}">
                                <strong>
                                    Sair
                                </strong>
                            </a>
                        </div>

                        <div class="profile">
                            <div class="row">
                                <div class="col-md-12">
                                    <small>
                                        {{ $data['user']->Group->name }}
                                    </small>
                                    <h1>{{ $data['casembrapa_wallet']->recipient }}</h1>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="contacts">
                                                <li>
                                                    <h6>Matrícula</h6>
                                                    {{ $data['casembrapa_wallet']->recipient }}
                                                </li>
                                                <li>
                                                    <h6>Data de nascimento</h6>
                                                    {{ $data['casembrapa_wallet']->birth_date }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="contacts">
                                                <li>
                                                    <h6>CNS</h6>
                                                    {{ $data['casembrapa_wallet']->cns }}
                                                </li>
                                                <li>
                                                    <h6>Validade</h6>
                                                    {{ $data['casembrapa_wallet']->validity_date_portfolio }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Carteirinha Casembrapa --}}
                    <div class="box_general_3">
                        <div class="indent_title_in pl-0">
                            <h3 class="font-16" style="padding-top: 0px;">
                                Carteirinha Casembrapa
                            </h3>
                            <a style="display: none;" href="{{ HelpAdmin::getStorageUrl() }}" download="carterira-digital-casembrapa.jpg" class="btn_download_wallet">
                                <i style="font-size: 20px; position: unset;" class="icon-download"></i>
                                Baixar carteirinha digital
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wallet">
                                    {!! HelpWalletCasembrapa::svgFullWallet($data['casembrapa_wallet']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
					<div class="box_general_3 booking">
                        <div class="title">
                            <strong>
                                Buscar dependente
                            </strong>
                        </div>
						{!! Form::open(['url'=>route('site.wallet.digital_wallet')]) !!}
							<div class="form-group">
                                <label for="cpf">CPF*</label>
                                {!! Form::number('cpf', null, ['class'=>'form-control', 'id'=>'cpf', 'autofocus', 'required']) !!}
                                
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
								<input class="btn_1 btn-block medium border-r-0" type="submit" value="Buscar">
							</div>
						{!! Form::close() !!}
					</div>
					<!-- /box_general -->
				</div>
            </div>
            <!-- /row -->
        </div>

    </main>

    <!-- FORMS -->
        {{-- {!! Form::open(['url'=>route('site.casembrapa_wallet.save_digital_wallet'),
            'id'=>'casembrapa_save_digital_wallet',
            'files'=>'true'])
        !!}
            {!! Form::hidden('id_casembrapa_wallet', $data['casembrapa_wallet']->id) !!}
        {!! Form::close() !!} --}}
    <!-- FORMS -->
@endsection