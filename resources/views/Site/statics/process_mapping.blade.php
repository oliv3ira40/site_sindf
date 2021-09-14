@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Mapeamento de Processos
@stop

@section('content')
    <main>
		<div class="bg_color_1">
			<div class="container margin_60_60">
				<div class="main_title">
					<h2>Mapeamento de Processos</h2>
				</div>
			        <div>Como é do conhecimento de todos, a RFB está apresentando trabalho realizado sobre mapeamento de processos de trabalho e competências dos cargos em exercíco no órgão para o desenvolvimentos das diversas etapas desses processos.</div>
                        <div>Abaixo disponibilizaremos os arquivos apresentados ao SINDFAZENDA, assim como o formulário para sugestões e criticas. Solicitamos aos filiados que analisem cada documento e encaminhe para o sindicato, via e-mail, sugestões e criticas.</div>
                        <div>As reuniões ocorrem todas as terças-feiras, durante os meses de Julho e Agosto/2015. Na medida que tivermos acesso disponibilizaremos nessa página.</div>
                        <div></div>
                        <div>
                        <ul>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/ApresentacaoAnaliseAtribuicoes-ReuniaoEntidades30Junho2015.pdf">Apresentação inicial do Mapeamento de Processos de Trabalho</a></li>
                        </ul>
                        </div>
                        <h4></h4>
                        <h3>COSIT</h3>
                        <h5>Formulários</h5>
                        <ul>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.02-01-Validar-Consulta.pdf">Descritivo 05.01.03.02-01 Validar Consulta</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.02-02-Preparar-Distribuição-de-Consulta.pdf">Descritivo 05.01.03.02-02 Preparar Distribuição de Consulta</a> <a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.02-03-Elaborar-Solução-de-Consulta.pdf">Descritivo </a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.02-03-Elaborar-Solução-de-Consulta.pdf">05.01.03.02-03 Elaborar Solução de Consulta</a> <a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.02-04-Finalizar-Processo-de-Consulta.pdf">Descritivo </a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.02-04-Finalizar-Processo-de-Consulta.pdf">05.01.03.02-04 Finalizar Processo de Consulta</a> <a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo05.01.03.02SolucionarConsultasExternas.pdf">Descritivo</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo05.01.03.02SolucionarConsultasExternas.pdf">05.01.03.02SolucionarConsultasExternas</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Formulario_Mapeamento_assinado.pdf">Formulario_Mapeamento_assinado</a></li>
                        </ul>
                        <br><hr>
                        
                        <h5>Diagramas</h5>
                        <ul>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.02-04-Finalizar-Processo-de-Consulta.pdf">05.01.03.02-04 Finalizar Processo de Consulta</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.02-03-Elaborar-Solução-de-Consulta.pdf">05.01.03.02-03 Elaborar Solução de Consulta</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.02-02-Preparar-Distribuição-de-Consulta.pdf">05.01.03.02-02 Preparar Distribuição de Consulta</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.02-01-Validar-Consulta.pdf">05.01.03.02-01 Validar Consulta</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.02-Solucionar-Consultas-Externas.pdf">05.01.03.02 Solucionar Consultas Externas</a></li>
                        </ul>
                        <div></div>
                        <div></div>
                        
                        <br><hr>
                        <h3>SUFIS</h3>
                        <ul>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/03.03.03.05-Contextualização.pdf">03.03.03.05 Contextualização</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/03.03.03.05-REALIZAR-PROCEDIMENTO-FISCAL-DE-REVISÃO-MALHA-ITR.pdf">03.03.03.05 REALIZAR PROCEDIMENTO FISCAL DE REVISÃO-MALHA ITR</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/03.03.04-Contextualização.pdf">03.03.04 Contextualização</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/03.03.04-FORMALIZAR-REPRESENTAÇÃO-PARA-FINS-PENAIS.pdf">03.03.04 FORMALIZAR REPRESENTAÇÃO PARA FINS PENAIS</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/03.03.09-Contextualização.pdf">03.03.09 Contextualização</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/03.03.09-VERIFICAR-A-ADERÊNCIA-DOS-PROCESSOS-DE-INTERESSE-DA-FISCALIZAÇÃO-NA-2ª-INSTÂNCIA-ADMINISTRATIVA.pdf">03.03.09 VERIFICAR A ADERÊNCIA DOS PROCESSOS DE INTERESSE DA FISCALIZAÇÃO NA 2ª INSTÂNCIA ADMINISTRATIVA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.04.01-Contextualização.pdf">05.04.01 Contextualização</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.04.01-PRESTAR-SUBSÍDIO-À-DEFESA-DA-FAZENDA-NACIONAL-NO-CONTENCIOSO-ADMINISTRATIVO.pdf">05.04.01 PRESTAR SUBSÍDIO À DEFESA DA FAZENDA NACIONAL NO CONTENCIOSO ADMINISTRATIVO</a> <a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-03.03.03.05.-REALIZAR-PROCEDIMENTO-FISCAL-DE-REVISÃO-MALHA-ITR.pdf">Descritivo </a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-03.03.03.05.-REALIZAR-PROCEDIMENTO-FISCAL-DE-REVISÃO-MALHA-ITR.pdf">03.03.03.05. REALIZAR PROCEDIMENTO FISCAL DE REVISÃO-MALHA ITR</a> <a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-03.03.04-FORMALIZAR-REPRESENTAÇÃO-PARA-FINS-PENAIS.pdf">Descritivo </a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-03.03.04-FORMALIZAR-REPRESENTAÇÃO-PARA-FINS-PENAIS.pdf">03.03.04 FORMALIZAR REPRESENTAÇÃO PARA FINS PENAIS</a> <a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-03.03.09.-VERIFICAR-A-ADERÊNCIA-DOS-PROCESSOS-DE-INTERESSE.pdf">Descritivo </a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-03.03.09.-VERIFICAR-A-ADERÊNCIA-DOS-PROCESSOS-DE-INTERESSE.pdf">03.03.09. VERIFICAR A ADERÊNCIA DOS PROCESSOS DE INTERESSE</a> <a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.04.01.-PRESTAR-SUBSÍDIO-À-DEFESA-DA-FAZENDA-NACIONAL-NO-CONTENCIOSO-ADMINISTRATIVO.pdf">Descritivo </a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.04.01.-PRESTAR-SUBSÍDIO-À-DEFESA-DA-FAZENDA-NACIONAL-NO-CONTENCIOSO-ADMINISTRATIVO.pdf">05.04.01. PRESTAR SUBSÍDIO À DEFESA DA FAZENDA NACIONAL NO CONTENCIOSO ADMINISTRATIVO</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/servicos/mapeamento-de-processos/sufis_investigacao/">ACOMPANHAMENTO</a></li>
                        </ul>
                        <h3></h3>
                        
                        <br><hr>
                        <h3>SUTRI</h3>
                        <ul>
                        <li>&nbsp;<a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.01-FORMULAR-ATOS-NORMATIVOS-1.pdf">05.01.01 FORMULAR ATOS NORMATIVOS</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.02-FORMULAR-ATOS-INTERPRETATIVOS-1.pdf">05.01.02 FORMULAR ATOS INTERPRETATIVOS</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.03-SOLUCIONAR-RECURSO-OU-REPRESENTAÇÃO-DE-DIVERGÊNCIA-2.pdf">05.01.03.03 SOLUCIONAR RECURSO OU REPRESENTAÇÃO DE DIVERGÊNCIA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.03-02-PREPARAR-DISTRIBUIÇÃO-DE-RECURSO-OU-REPRESENTAÇÃO-DE-DIVERGÊNCIA-1.pdf">05.01.03.03-02 PREPARAR DISTRIBUIÇÃO DE RECURSO OU REPRESENTAÇÃO DE DIVERGÊNCIA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.03-03-ELABORAR-SOLUÇÃO-DE-RECURSOS-OU-REPRESENTAÇÃO-DE-DIVERGÊNCIA-1.pdf">05.01.03.03-03 ELABORAR SOLUÇÃO DE RECURSOS OU REPRESENTAÇÃO DE DIVERGÊNCIA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.03-04-FINALIZAR-PROCESSO-DE-DIVERGÊNCIA-1.pdf">05.01.03.03-04 FINALIZAR PROCESSO DE DIVERGÊNCIA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.04-01.-VALIDAR-CONSULTA-1.pdf">05.01.03.04-01. VALIDAR CONSULTA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.04-02.-PREPAR-DISTRIBUIÇÃO-E-SOLUÇÃO-DE-CONSULTA-1.pdf">05.01.03.04-02. PREPAR DISTRIBUIÇÃO E SOLUÇÃO DE CONSULTA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.04-03.-REVISAR-MINUTA-1.pdf">05.01.03.04-03. REVISAR MINUTA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.04-04.-FINALIZAR-PROCESSO-DE-CONSULTA-1.pdf">05.01.03.04-04. FINALIZAR PROCESSO DE CONSULTA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.01.03.04.-SOLUCIONAR-CONSULTAS-INTERNAS-1.pdf">05.01.03.04. SOLUCIONAR CONSULTAS INTERNAS</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.03.01-JULGAR-IMPUGNAÇÕES-E-MANIFESTAÇÕES-DE-INCONFORMIDADE-1.pdf">05.03.01 JULGAR IMPUGNAÇÕES E MANIFESTAÇÕES DE INCONFORMIDADE</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.03.01-01-TRIAR-E-CLASSIFICAR-PROCESSO-ADMINISTRATIVO-FISCAL-1.pdf">05.03.01-01 TRIAR E CLASSIFICAR PROCESSO ADMINISTRATIVO FISCAL</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.03.01-02-ADMINISTRAR-E-DISTRIBUIR-PROCESSO-ADMINISTRATIVO-FISCAL-1.pdf">05.03.01-02 ADMINISTRAR E DISTRIBUIR PROCESSO ADMINISTRATIVO FISCAL</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.03.01-03-JULGAR-PROCESSO-ADMINISTRATIVO-FISCAL-1.pdf">05.03.01-03 JULGAR PROCESSO ADMINISTRATIVO FISCAL</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.03.01-03.01-TRATAR-PEDIDOS-DE-PROCESSO-POR-CONEXÃO-1.pdf">05.03.01-03.01 TRATAR PEDIDOS DE PROCESSO POR CONEXÃO</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.03.01-03.02-PREENCHER-FORMULÁRIO-DE-REGISTRO-DE-ATIVIDADES-1.pdf">05.03.01-03.02 PREENCHER FORMULÁRIO DE REGISTRO DE ATIVIDADES</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.03.01-04-INFORMAR-RESULTADO-DO-JULGAMENTO-1.pdf">05.03.01-04 INFORMAR RESULTADO DO JULGAMENTO</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.03.01-05.-TRATAR-RESOLUÇÃO-E-DESPACHOS-DE-DEVOLUÇÃODILIGÊNCIAPERÍCIA-1.pdf">05.03.01-05. TRATAR RESOLUÇÃO E &nbsp;DESPACHOS DE DEVOLUÇÃODILIGÊNCIAPERÍCIA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.03.01-06-TRATAR-PEDIDOS-DE-DEVOLUÇÃO-1.pdf">05.03.01-06 TRATAR PEDIDOS DE DEVOLUÇÃO</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.03.02-Contextualização-1.pdf">05.03.02 Contextualização</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.03.02-JULGAR-RECURSOS-HIERÁRQUICOS-1.pdf">05.03.02 JULGAR RECURSOS HIERÁRQUICOS</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.03.03-JULGAR-IMPUGNAÇÕES-A-PENALIDADES-DE-PERDIMENTO-1.pdf">05.03.03 JULGAR IMPUGNAÇÕES A PENALIDADES DE PERDIMENTO</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/05.03.05-APRECIAR-PEDIDO-DE-RELEVAÇÃO-DE-PENA-DE-PERDIMENTO-1.pdf">05.03.05 APRECIAR PEDIDO DE RELEVAÇÃO DE PENA DE PERDIMENTO</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Contextualização-05.01.01.-FORMULAR-ATOS-NORMATIVOS-1.pdf">Contextualização </a><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Contextualização-05.01.01.-FORMULAR-ATOS-NORMATIVOS-1.pdf">05.01.01. FORMULAR ATOS NORMATIVOS</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Contextualização-05.01.02.-FORMULAR-ATOS-INTERPRETATIVOS-1.pdf">Contextualização 05.01.02. FORMULAR ATOS INTERPRETATIVOS</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Contextualização-05.01.03.03.-SOLUCIONAR-RECURSO-OU-REPRESENTAÇÃO-1.pdf">Contextualização 05.01.03.03. SOLUCIONAR RECURSO OU REPRESENTAÇÃO</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Contextualização-05.03.01.-JULGAR-IMPUGNAÇÕES-E-MANIFESTAÇÕES-DE-INCONFORMIDADE.pdf">Contextualização 05.03.01. JULGAR IMPUGNAÇÕES E MANIFESTAÇÕES DE INCONFORMIDADE</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Contextualização-05.03.03.-JULGAR-IMPUGNAÇÕES-A-PENALIDADES-DE.pdf">Contextualização 05.03.03. JULGAR IMPUGNAÇÕES A PENALIDADES DE</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Contextualização-05.03.05.-APRECIAR-PEDIDO-DE-RELEVAÇÃO-DE-PENA-DE.pdf">Contextualização 05.03.05. APRECIAR PEDIDO DE RELEVAÇÃO DE PENA</a></li>
                        <li>&nbsp;<a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Contextualização-do-Processo-05.01.03.04.pdf">Contextualização do Processo – 05.01.03.04</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.04-01.pdf">Descritivo – 05.01.03.04-01</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.04-02.pdf">Descritivo – 05.01.03.04-02</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.04-03.pdf">Descritivo – 05.01.03.04-03</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.04-04.pdf">Descritivo – 05.01.03.04-04</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.04.pdf">Descritivo – 05.01.03.04</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.03.01-01pdf.pdf">Descritivo – 05.03.01-01</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.03.01-02.pdf">Descritivo – 05.03.01-02</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.03.01-03.01.pdf">Descritivo – 05.03.01-03.01</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.03.01-03.02.pdf">Descritivo – 05.03.01-03.02</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.03.01-03.pdf">Descritivo – 05.03.01-03</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.03.01-04.pdf">Descritivo – 05.03.01-04</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.03.01-05.pdf">Descritivo – 05.03.01-05</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.03.01-06.pdf">Descritivo – 05.03.01-06</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.03.01.pdf">Descritivo – 05.03.01</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.01.-FORMULAR-ATOS-NORMATIVOS.pdf">Descritivo 05.01.01. FORMULAR ATOS NORMATIVOS</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.02.-FORMULAR-ATOS-INTERPRETATIVOS.pdf">Descritivo 05.01.02. FORMULAR ATOS INTERPRETATIVOS</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.03-01.-VALIDAR-RECURSO-OU-REPRESENTAÇÃO-DE-DIVERGÊNCIA.pdf">Descritivo 05.01.03.03-01. VALIDAR RECURSO OU REPRESENTAÇÃO DE DIVERGÊNCIA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.03-02.-PREPARAR-DISTRIBUIÇÃO-DE-RECURSO-OU-REPRESENTAÇÃO-DE-DIVERGÊNCIA.pdf">Descritivo 05.01.03.03-02.</a><a style="line-height: 1.5;" href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.03-02.-PREPARAR-DISTRIBUIÇÃO-DE-RECURSO-OU-REPRESENTAÇÃO-DE-DIVERGÊNCIA.pdf">P</a><a style="line-height: 1.5;" href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.03-02.-PREPARAR-DISTRIBUIÇÃO-DE-RECURSO-OU-REPRESENTAÇÃO-DE-DIVERGÊNCIA.pdf">REPARAR DISTRIBUIÇÃO DE RECURSO OU REPRESENTAÇÃO DE DIVERGÊNCIA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.03-03.-ELABORAR-SOLUÇÃO-DE-RECURSOS-OU-REPRESENTAÇÃO-DE-DIVERGÊNCIA-1.pdf">Descritivo 05.01.03.03-03.</a><a style="line-height: 1.5;" href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.03-03.-ELABORAR-SOLUÇÃO-DE-RECURSOS-OU-REPRESENTAÇÃO-DE-DIVERGÊNCIA-1.pdf">ELABORAR SOLUÇÃO DE RECURSOS OU REPRESENTAÇÃO DE DIVERGÊNCIA (1)</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.03-03.-ELABORAR-SOLUÇÃO-DE-RECURSOS-OU-REPRESENTAÇÃO-DE-DIVERGÊNCIA.pdf">Descritivo 05.01.03.03-03. ELABORAR SOLUÇÃO DE RECURSOS OU REPRESENTAÇÃO DE DIVERGÊNCIA</a> <a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.03-04.-FINALIZAR-PROCESSO-DE-DIVERGÊNCIA.pdf">Descritivo 05.01.03.03-04. FINALIZAR PROCESSO DE DIVERGÊNCIA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.01.03.03.-SOLUCIONAR-RECURSO-OU-REPRESENTAÇÃO-DE-DIVERGÊNCIA.pdf">Descritivo 05.01.03.03. SOLUCIONAR RECURSO OU REPRESENTAÇÃO DE DIVERGÊNCIA</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.03.02.-JULGAR-RECURSOS-HIERÁRQUICOS.pdf">Descritivo 05.03.02. JULGAR RECURSOS HIERÁRQUICOS</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.03.03.-JULGAR-IMPUGNAÇÕES-A-PENALIDADES-DE-PERDIMENTO.pdf">Descritivo 05.03.03. JULGAR IMPUGNAÇÕES A PENALIDADES DE PERDIMENTO</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Descritivo-05.03.05.-APRECIAR-PEDIDO-DE-RELEVAÇÃO-DE-PENA-DE-PERDIMENTO.pdf">Descritivo 05.03.05. APRECIAR PEDIDO DE RELEVAÇÃO DE PENA DE PERDIMENTO</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/wp-content/uploads/2016/02/Mapeamento_Sufis_Sutri_07_07_2015.pdf">Mapeamento_Sufis_Sutri_07_07_2015</a></li>
                        </ul>
                        
                        <br><hr>
                        <h3>SUARA</h3>
                        <ul>
                        <li><a href="http://portal.sindfazenda.org.br/servicos/mapeamento-de-processos/suara_gerircreditotributario/">GERIR CRÉDITO TRIBUTÁRIO </a></li>
                        <li><a href="http://portal.sindfazenda.org.br/servicos/mapeamento-de-processos/suara_orientacaocontribuinte/">ORIENTAÇÃO AO CONTRIBUINTE</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/servicos/mapeamento-de-processos/suaragerircadastrocontribuinteparte01/">GERIR CADASTROS TRIBUTÁRIOS E ADUANEIROS Parte01</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/servicos/mapeamento-de-processos/suaragerircadastrocontribuinteparte02/">GERIR CADASTROS TRIBUTÁRIOS E ADUANEIROS Parte02</a></li>
                        </ul>
                        
                        <br><hr>
                        <h3>SUARI</h3>
                        <ul>
                        <li><a href="http://portal.sindfazenda.org.br/servicos/mapeamento-de-processos/reuniao_28-07-2015suari_controleaduaneiro/">CONTROLE ADUANEIRO PARTE 01</a></li>
                        <li><a href="http://portal.sindfazenda.org.br/servicos/mapeamento-de-processos/reuniao_28-07-2015suari_controleaduaneiroparte02/">CONTROLE ADUANEIRO PARTE 01</a></li>
                        </ul>
                                                            </div>
                                                                                            </div>

						
    </main>
@endsection