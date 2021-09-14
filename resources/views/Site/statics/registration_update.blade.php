@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Sobre
@stop

@section('content')
    <main>
		<div class="bg_color_1">
			<div class="container margin_60_60">
				<div class="main_title">
					<h2>A Casembrapa</h2>
				</div>
				<div class="row justify-content-between">
					<div class="col-md-12 custom-main_title">
						<p align="justify">
                            A Caixa de Assistência dos Empregados da Empresa Brasileira de Pesquisa Agropecuária (Casembrapa) foi constituída em outubro de 2007 como uma operadora de saúde suplementar de médio porte. A partir de 2009 o Plano passou a utilizar o sistema integrado de gestão de saúde, que permitiu maior controle e acompanhamento de todos os processos da operadora. A instituição funciona no modelo de autogestão, com natureza assistencial, sem fins lucrativos, abrangência em todo território nacional e sede em Brasília (DF).
                        </p>

						<p align="justify">
                            Os objetivos sociais da Casembrapa, conforme o artigo 6o do Estatuto Social, são os seguintes: prestar aos seus associados assistência suplementar à saúde; praticar ações para a prevenção de doenças, promoção, reabilitação e recuperação da saúde; celebrar convênios de reciprocidade com outras operadoras para melhor atendimento aos associados e dependentes; e firmar convênios de cooperação técnica com a Agência Nacional de Saúde (ANS) e o Ministério da Saúde para promoção de estudos e pesquisas para o aperfeiçoamento da assistência à saúde suplementar e da autogestão.
                        </p>
					</div>
				</div>
            </div>
		</div>
		
		<div class="container margin_60_60">
			<div class="col-md-12 custom-main_title">
				<h3>
                    Missão, Visão e Valores da Casembrapa:
                </h3>
                </br>
				<p align="justify">
                    A Missão, a Visão e os Valores da Casembrapa foram definidos na criação da operadora, tendo sido redefinidos em 2013 e revisitados em 2016, sempre após consulta com toda a equipe da Casembrapa.
                </p>
				<p align="justify">
                    <strong>Missão:</strong>
                    Proporcionar aos associados atendimento humanizado de saúde, com racionalidade no uso dos recursos.
                </p>
				<p align="justify">
                    <strong>Visão:</strong>
                    Ser referência de operadora de autogestão na promoção e manutenção da saúde dos associados.
                </p>
				<p align="justify">
                    <strong>Valores:</strong>
                </p>
                <p align="justify">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>- Ética:</strong>
                    agir com justiça, coerência e equidade;
                </p>
                <p align="justify">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>- Transparência:</strong>
                    dar visibilidade às decisões, ações e informações;
                </p>
                <p align="justify">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>- Cordialidade:</strong>
                    cuidar do outro com respeito e tolerância;
                </p>
                <p align="justify">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>- Eficiência:</strong>
                    realizar as atividades com qualidade, precisão e celeridade.
                </p>			
			</div>
		</div>
		
		<div class="bg_color_1">
			<div class="container margin_60_60">
				<div class="col-md-12 custom-main_title">
					<h3>
                        A gestão da Casembrapa é composta pelos seguintes órgãos:
                    </h3>
					<p align="justify">
                        I. Conselho de Administração;
                    </p>
					<p align="justify">
                        II. Diretoria Executiva;
                    </p>
					<p align="justify">
                        III. Conselho Fiscal.
                    </p>
                    </br>

                    <p align="justify">
                        O <strong>Conselho de Administração</strong> é o órgão com poder de deliberação superior, responsável pelo estabelecimento dos objetivos, pelas políticas assistenciais, as diretrizes fundamentais e orientações gerais de organização, a operação e a administração da Casembrapa. O colegiado é formado por quatro conselheiros, sendo dois representantes da Embrapa; e dois representantes dos beneficiários, sendo um indicado pelo Sindicato Nacional dos Trabalhadores de Pesquisa em Desenvolvimento Agropecuário (SINPAF) e outro pela Federação das Associações dos Empregados da Embrapa (FAEE). O mandato de cada membro deste conselho é de quatro anos, com direito à reeleição.
                    </p>
                    <p align="justify">
                        A <strong>Diretoria Executiva</strong> é responsável pelo cumprimento das normas legais, estatutárias e regulamentares. Fazem parte dela três membros, com mandato de três anos, e com direito à reeleição: o presidente, o diretor financeiro e o diretor administrativo. O presidente e o diretor financeiro são indicados pela Diretoria Executiva da Embrapa, a partir de uma lista tríplice, e escolhidos pelo Conselho de Administração. A escolha do diretor administrativo também cabe ao conselho, mas a partir de uma lista tríplice indicada por consenso entre o SINPAF e a FAEE.
                    </p>
                    <p align="justify">
                        O <strong>Conselho Fiscal</strong> é responsável pelo controle interno. É ele que zela pela gestão econômico-financeira do plano. São quatro membros titulares e quatro suplentes, sendo dois representantes dos empregados e dois da Embrapa em cada grupo. O tempo de mandato de cada membro é de três anos, com direito à reeleição.
                    </p>
                    <p align="justify">
                        Para fiscalizar e acompanhar a gestão e os recursos da Casembrapa, a Embrapa realiza uma auditoria anual no plano. Em cumprimento à exigência da ANS, a cada trimestre também ocorre uma inspeção feita por empresa externa.
                    </p>
                    </br></br>
    
                    <img style="width: 100%" src="{{asset('pages/about/img-02-about.png')}}">
				</div>

			    <div class="col-md-4">
			    </div>
			</div>
		</div>
		
		<div class="container margin_60_60">
			<div class="col-md-12 custom-main_title">
				<h3>
                    Plano do Perfil
                </h3>
				<p align="justify">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consta no artigo 8° do Estatuto Social da Casembrapa que a carteira de beneficiários é composta por:
                </p>
				<p align="justify">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Associados Titulares: empregado ativo e ex-empregado da Embrapa, aposentado e demitido sem justa causa;
                </p>
				<p align="justify">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Dependentes dos Associados Titulares:
                </p>
                <p align="justify">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. cônjuge ou companheira(o);
                </p>
                <p align="justify">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. filho (natural ou adotivo), ou enteado solteiro, menor de 21 anos, sem renda própria, ou se inválido, enquanto durar a invalidez;
                </p>
                <p align="justify">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. filho (natural ou adotivo), ou enteado solteiro, acima de 21 anos e menor de 24 anos, sem renda própria, matriculado regularmente em curso superior;
                </p>
                <p align="justify">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. menor sob guarda ou tutela concedida por decisão judicial, solteiro e sem renda própria, observado o disposto nos itens b e c.
                </p>
                </br></br>
                <img style="width: 100%;" src="{{asset('pages/about/img-01-about.png')}}">
		    </div>
		</div>
    </main>
@endsection