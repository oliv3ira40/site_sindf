@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Carteirinha digital
@stop

@section('content')
    <main>

        <div class="container margin_60_60">
			<div class="row">

                <div class="col-md-12">
                    <h4>
                        <a href="{{ route('site.user.validate_cpf', ['target'=>'digital_wallet']) }}">
                            Buscar carteirinha digital
                        </a>
                    </h4>
                </div>

                @if ($data['casembrapa_wallet'] != null)
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box_general_3 booking">
                                    <div class="title m-b-10">
                                        <strong>
                                            Carteirinha digital Casembrapa
                                        </strong>
                                    </div>

                                    <div>
                                        <div class="indent_title_in m-b-10">
                                            <i class="pe-7s-user"></i>
                                            <h3 class="font-16" style="padding-top: 0px;">
                                                {{ $data['casembrapa_wallet']->recipient }}
                                            </h3>
                                            
                                            Baixar carteirinha digital:
                                            @if (HelpWallet::getWalletPdfCasembrapa($data['casembrapa_wallet']->file_name))
                                                <a href="{{ HelpWallet::getWalletPdfCasembrapa($data['casembrapa_wallet']->file_name) }}" target="_blank" download="carteira_casembrapa">
                                                    <i style="font-size: 18px; position: unset;" class="icon-download"></i>
                                                    PDF
                                                </a>
                                            @endif
                                            <span class="div_loading_wallet_casembrapa">
                                                |<a href="#">
                                                    <i style="font-size: 18px; position: unset;" class="fa fa-spin fa-refresh m-l-10 m-r-5" aria-hidden="true"></i>
                                                    IMAGEM
                                                </a>
                                            </span>
                                            <div style="display: none;" class="div_download_wallet_casembrapa">
                                                |<a href="{{ HelpAdmin::getStorageUrl() }}" target="_blank" download="carteira_casembrapa.jpeg" class="img_download_wallet_casembrapa">
                                                    <i style="font-size: 18px; position: unset;" class="icon-download"></i>
                                                    IMAGEM
                                                </a>
                                            </div>
                                        </div>
                                        <hr class="mb-0">
                                        <div class="profile">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="wallet_casembrapa">
                                                        {!! HelpWalletCasembrapa::svgFullWallet($data['casembrapa_wallet']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($data['cassi_wallet'] != null)
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box_general_3 booking">
                                    <div class="title m-b-10">
                                        <strong>
                                            Carteirinha digital Cassi
                                        </strong>
                                    </div>

                                    <div>
                                        <div class="indent_title_in m-b-10">
                                            <i class="pe-7s-user"></i>
                                            <h3 class="font-16" style="padding-top: 0px;">
                                                {{ $data['cassi_wallet']->name }}
                                            </h3>

                                            Baixar carteirinha digital:
                                            @if (HelpWallet::getWalletPdfCassi($data['cassi_wallet']->file_name))
                                                <a href="{{ HelpWallet::getWalletPdfCassi($data['cassi_wallet']->file_name) }}" target="_blank" download="carteira_cassi">
                                                    <i style="font-size: 18px; position: unset;" class="icon-download"></i>
                                                    PDF
                                                </a>
                                            @endif
                                            <span class="div_loading_wallet_cassi">
                                                |<a href="#">
                                                    <i style="font-size: 18px; position: unset;" class="fa fa-spin fa-refresh m-l-10 m-r-5" aria-hidden="true"></i>
                                                    IMAGEM
                                                </a>
                                            </span>
                                            <div style="display: none;" class="div_download_wallet_cassi">
                                                |<a href="{{ HelpAdmin::getStorageUrl() }}" target="_blank" download="carteira_cassi.jpeg" class="img_download_wallet_cassi">
                                                    <i style="font-size: 18px; position: unset;" class="icon-download"></i>
                                                    IMAGEM
                                                </a>
                                            </div>
                                        </div>
                                        <hr class="mb-0">
                                        <div class="profile">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="wallet_cassi">
                                                        {!! HelpWalletCassi::svgFullWallet($data['cassi_wallet']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                
			</div>
		</div>

        <!-- FORMS -->
            @if ($data['casembrapa_wallet'] != null)
                {!! Form::open(['url'=>route('site.casembrapa_wallet.save_casembrapa_wallet'),
                    'id'=>'casembrapa_save_digital_wallet',
                    'files'=>'true'])
                !!}
                    {!! Form::hidden('id_casembrapa_wallet', $data['casembrapa_wallet']->id) !!}
                {!! Form::close() !!}
            @endif


            @if ($data['cassi_wallet'] != null)
                {!! Form::open(['url'=>route('site.cassi_wallet.save_cassi_wallet'),
                    'id'=>'cassi_save_digital_wallet',
                    'files'=>'true'])
                !!}
                    {!! Form::hidden('id_cassi_wallet', $data['cassi_wallet']->id) !!}
                {!! Form::close() !!}
            @endif
        <!-- FORMS -->
    </main>
@endsection