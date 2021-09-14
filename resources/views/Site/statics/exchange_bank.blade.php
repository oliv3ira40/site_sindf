@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Banco de Permutas
@stop

@section('content')
    <main>
		<div class="bg_color_1">
			<div class="container margin_60_60">
				<div class="main_title">
					<h2>Banco de Permutas</h2>
				</div>
				<div class="row justify-content-between">
					<div class="col-md-12 custom-main_title">
					    <div class="td-post-content td-pb-padding-side">

        <center><a href="https://www.sindfazenda.org.br/wp-content/uploads/2018/09/PERMUTA_1.jpg" data-caption="" class="td-modal-image"><img width="448" height="268"  src="https://www.sindfazenda.org.br/wp-content/uploads/2018/09/PERMUTA_1.jpg" alt="" title="PERMUTA_1"></a></div></center>
        <p align="justify">Visando oferecer sempre aos seus filiados serviços que tragam melhorias em sua vida funcional e considerando a necessidade de aproximar nossos filiados dos mais diversos lugares do Brasil, o SINDFAZENDA disponibiliza, para uso de seus filiados, uma ferramenta para troca de informações possibilitando a realização de permutas de vagas de trabalho.</p>
<p align="justify">O sistema foi pensado para um acesso da forma mais simples possível, bastando que o filiado acesse o <a href="https://sindfazenda.org.br/permuta/public/" target="_blank" rel="noopener noreferrer"><strong>BANCO DE PERMUTAS</strong></a> e insira os dados solicitados, principalmente sua atual lotação e o local para o qual deseja se mudar.</p>
<p align="justify">Essa ferramenta contou com a colaboração de nosso filiado, Rafael Batista Costa – BA, e possibilitará aos nossos filiados trocar informações com colegas de todas as unidades nos diversos estados e facilitará a permuta de vagas. Entretanto, o sindicato não se responsabiliza pelo teor da troca de mensagens nem tão pouco pelas vagas ofertadas, sendo estas informações de inteira responsabilidade do filiado e ainda sujeitas à ciência e concordância das respectivas chefias para a efetiva troca de unidade de lotação/exercício.</p>
<p align="center"><strong>“SINDFAZENDA trabalhando pela valorização do PECFAZ e por um serviço público de qualidade!”</strong></p>
        </div>

                       
    </main>
@endsection