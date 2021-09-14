@extends('Site.layout.layout')
@section('title')
@if (HelpApplicationSetting::getAppName())
{{ HelpApplicationSetting::getAppName()->app_name }}
@endif
- Inscrição
@stop

@section('content')
<main>
    <div class="bg_color_1">
        <div class="container margin_60_60">
            <div class="main_title">
                <h2>INSCRIÇÃO</h2>
            </div>
            <div class="row justify-content-between">
                
                <div class="td-pb-padding-side td-page-content">
                    <div></div>
                    <div style="text-align: justify;"></div>
                    <div style="text-align: justify;">Preencha as fichas disponíveis para download no final da página
                        corretamente, com todos os dados solicitados, e encaminhe ao SINDFAZENDA, no endereço constante
                        em nossa página:</div><br>
                    <div style="text-align: justify;">SCS Qd 01 Bloco K – Sala 904 Ed. Denasa – Asa Sul</div>
                    <div style="text-align: justify;">Brasília/DF &nbsp;CEP 70398-900</div>
                    <div style="text-align: justify;"></div><br>
                    <div>Também poderá ser entregue ao seu representante regional do seu estado, mediante contra recibo.<br>
                    </div>
                    <div style="text-align: justify;"></div>
                    <div style="text-align: justify;">A efetivação da filiação se dará no mês subsequente ao recebimento
                        do pedido, ou ainda, no 2º mês subseqüente, dependendo da data de recebimento da mesma.</div><br>
                    <div style="text-align: justify;">Da mesma forma, o pedido de desfiliação será processado no mesmo
                        período. Considerando que há a necessidade de se processar o pedido junto ao Ministério do
                        Planejamento Orçamento e Gestão – MPOG.</div><br>
                    <div style="text-align: justify;"></div>
                    <div>Lembramos a todos, que tanto a filiação, como a desfiliação, só poderão ocorrer a pedido do
                        servidor, e mediante o encaminhamento do respectivo formulário.</div><br>
                    <div></div>
                    
                    <div>O pedido de desfiliação poderá ser feito em REQUERIMENTO SIMPLES, contendo:</div><br>
                    
                    <ul>
                        <li><b>- Nome completo;</b></li>
                        <li><b>- CPF, RG e Matricula SIAPE;</b></li>
                        <li><b>- Local de lotação;</b></li>
                        <li><b>- O conteúdo do requerimento, no mínimo, o pedido de desfiliação;</b></li>
                        <li><b>- Datado e Assinado.</b></li>
                    </ul>
                    <div></div>
                    <div><i>Obs.: Não há necessidade de justificar o pedido de desfiliação, pois ninguém é obrigado a
                        filiar-se ou a manter-se filiado a nenhum sindicato.</i></div><br>
                    <hr>
                    <div style="text-align: left;">Além das disposições constitucionais, abaixo, e de legislação
                        infraconstitucionais, a filiação ao SINDFAZENDA também obedece ao contido em nosso Estatuto,
                        principalmente o seu artigo 6º. Diante disto, o quadro social do SINDFAZENDA, ou seja, os
                        servidores que podem filiar-se ao mesmo são:</div><br>
                    
                    <ul>
                        <li><strong>- Todos os servidores pertencentes ao PECFAZ lotados Ministério da Fazenda;</strong></li>
                        <li><strong>- Ativos;</strong></li>
                        <li><strong>- Inativos e</strong></li>
                        <li><strong>- Pensionistas.</strong></li>
                    </ul>
                    
                    <div>Também está estabelecido no artigo 7º do nosso Estatuto, que a filiação se dará mediante
                        requerimento em formulário próprio.</div><br><BR><hr>
                    <h3 style="text-align: center;">Legislação pertinente</h3><br>
                    <h5 style="text-align: center;">Constituição Federal</h5>
                    <div></div>
                    <div><strong>Art. 8º É livre a associação profissional ou sindical, observado o seguinte:</strong>
                    </div>
                    <div><strong>I –</strong> a lei não poderá exigir autorização do Estado para a fundação de
                        sindicato, ressalvado o registro no órgão competente, vedadas ao Poder Público a interferência e
                        a intervenção na organização sindical;</div>
                    <div><strong>II –</strong> é vedada a criação de mais de uma organização sindical, em qualquer grau,
                        representativa de categoria profissional ou econômica, na mesma base territorial, que será
                        definida pelos trabalhadores ou empregadores interessados, não podendo ser inferior à área de um
                        Município;</div>
                    <div><strong>III –</strong> ao sindicato cabe a defesa dos direitos e interesses coletivos ou
                        individuais da categoria, inclusive em questões judiciais ou administrativas;</div>
                    <div><strong>IV –</strong> a assembléia geral fixará a contribuição que, em se tratando de categoria
                        profissional, será descontada em folha, para custeio do sistema confederativo da representação
                        sindical respectiva, independentemente da contribuição prevista em lei;</div>
                    <div><strong>V –</strong> ninguém será obrigado a filiar-se ou a manter-se filiado a sindicato;
                    </div>
                    <div><strong>VI –</strong> é obrigatória a participação dos sindicatos nas negociações coletivas de
                        trabalho;</div>
                    <div><strong>VII –</strong> o aposentado filiado tem direito a votar e ser votado nas organizações
                        sindicais;</div>
                    <div><strong>VIII –</strong> é vedada a dispensa do empregado sindicalizado a partir do registro da
                        candidatura a cargo de direção ou representação sindical e, se eleito, ainda que suplente, até
                        um ano após o final do mandato, salvo se cometer falta grave nos termos da lei.</div>
                    <div><strong>Parágrafo único</strong></div>
                    <div>As disposições deste artigo aplicam-se à organização de sindicatos rurais e de colônias de
                        pescadores, atendidas as condições que a lei estabelecer.</div>
                    <div></div>
                    <div><hr><br>
                        <h2>Ficha de filiação:</h2>
                        <p>
                            <a
                                href="https://www.sindfazenda.org.br/wp-content/uploads/2020/09/ficha_de_filiacao_Preenchimento_manual_2020.pdf" target="_blank">Clique
                                aqui</a> para preenchimento manual</p>
                        <p>
                            <a
                                href="https://www.sindfazenda.org.br/wp-content/uploads/2020/09/FICHA_DE_FILIACAO_AUTOMATICA_2020.doc" target="_blank">Clique
                                aqui</a> para preenchimento automático</p>
                        
                    </div>
                </div>
            </div>






</main>
@endsection