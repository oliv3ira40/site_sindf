@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Prestação de Contas
@stop

@section('content')
    <main>
		<div class="bg_color_1">
			<div class="container margin_60_60">
				<div class="main_title">
					<h2>Prestação de Contas</h2>
				</div>
				
                                            <div class="td-pb-padding-side td-page-content">
                                            <p>Confira abaixo a prestação de contas do seu sindicato, conforme preceitua nosso estatuto em seu artigo 32, inciso V.</p>
<blockquote><p>“Artigo 32 – São atribuições do Diretor de Administração&nbsp;e Finanças:</p>
<p>V – Apresentar trimestralmente à Diretoria Executiva Nacional o balancete financeiro de receitas e despesas, promovendo a divulgação entre os filiados.”</p></blockquote>
<h5><a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/05/prest_ant_2015.zip">Clique aqui para acessar a prestação de contas anteriores de 2015.</a></h5>
<h5>Prestação de contas exercício 2015</h5>
<ul>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_jan_2015.pdf">Janeiro/2015</a>, <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_fev_2015.pdf">Fevereiro/2015</a>, <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_mar_2015.pdf">Março/2015</a>, <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_abr_2015.pdf">Abril/2015</a>, <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_maio_2015.pdf">Maio/2015</a>, <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_jun_2015.pdf">Junho/2015</a>, <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_jul_2015.pdf">Julho/2015</a>, <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/11/Balancete_Agosto_2016_.pdf">Agosto/2015</a>, <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_set_2015.pdf">Setembro/2015</a>, <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_out_2015.pdf">Outubro/2015</a>, <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_nov_2015.pdf">Novembro/2015</a>, <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_dez_2015.pdf">Dezembro/2015</a></li>
<li>Balancete Analítico 2015</li>
</ul>
<p><strong>Prestação de Contas Exercício 2016</strong></p>
<ul>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_Janeiro_2016.pdf">Janeiro 2016</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_Fevereiro_2016.pdf">Fevereiro 2016</a>; <a href="https://www.sindfazenda.org.br/prestacao-de-contas/balancetemarco2017/">Março 2016</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/02/Balancete_Abril_2016.pdf">Abril 2016</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/11/Balancete_Maio_2016-1.pdf">Maio/2016</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/11/Balancete_Junho_2016_.pdf">Junho/2016</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/11/Balancete_Julho_2016_.pdf">Julho/2016</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/11/Balancete_Agosto_2016_.pdf">Agosto/2016</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/11/Balancete_Setembro_2016_.pdf">Setembro/2016</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/11/Balancete_Outubro_2016_.pdf">Outubro/2016</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/11/Balancete_Novembro_2016.pdf">Novembro/2016</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/11/Balancete_Dezembro_2016.pdf">Dezembro/2016</a>;</li>
</ul>
<p><strong>Prestação de Contas Exercício 2017</strong></p>
<ul>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/11/Balancete_Janeiro_2017.pdf">Janeiro 2017</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2016/11/Balancete_Janeiro_2017.pdf">Fevereiro 2017</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2017/12/BalanceteMarco2017.pdf">Março 2017</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2017/12/BalanceteAbril2017.pdf">Abril 2017</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2017/12/BalanceteMaio2017.pdf">Maio 2017</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2017/12/BalanceteJunho2017.pdf">Junho 2017</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2017/12/BalanceteJulho2017.pdf">Julho 2017</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2017/12/BalanceteAgosto2017.pdf">Agosto 2017</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2017/12/BalanceteSetembro2017.pdf">Setembro 2017</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2018/03/Balancete_Outubro_2017.pdf">Outubro/2017;</a> <a href="https://www.sindfazenda.org.br/wp-content/uploads/2018/03/Balancete_Novembro_2017..pdf">Novembro/2017</a>; <a href="https://www.sindfazenda.org.br/wp-content/uploads/2018/03/Balancete_Dezembro_2017.pdf">Dezembro/2017</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2018/04/Balancete_Analitico_Janeiro_Dezembro_2017.pdf">BALANCETE ANALÍTICO 2017</a></li>
</ul>
<p><strong>Prestação de Contas Exercício 2018</strong></p>
<ol>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Janeiro2018.pdf">Janeiro 2018</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Fevereiro2018.pdf">Fevereiro 2018</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Março2018.pdf">Março 2018</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Abril2018.pdf">Abril 2018</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Maio2018.pdf">Maio 2018</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Junho2018.pdf">Junho 2018</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Julho2018.pdf">Julho 2018</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Agosto2018.pdf">Agosto 2018</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Setembro2018.pdf">Setembro 2018</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Outubro2018.pdf">Outubro/2018</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Novembro2018.pdf">Novembro/2018</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Dezembro2018.pdf">Dezembro/2018</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/BalanceteAnalitico2018.pdf">BALANCETE ANALÍTICO 2018</a></li>
</ol>
<p><strong>Prestação de Contas Exercício 2019</strong></p>
<ol>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Janeiro2019-1.pdf">Janeiro 2019</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Fevereiro2019.pdf">Fevereiro 2019;</a></li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Marco2019.pdf">Março 2019</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Abril2019.pdf">Abril 2019</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Maio2019.pdf">Maio 2019</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Junho2019.pdf">Junho 2019</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Julho2019.pdf">Julho 2019</a>;</li>
<li><a href="https://www.sindfazenda.org.br/wp-content/uploads/2019/11/Balancete_Agosto2019.pdf">Agosto 2019</a>;</li>
<li>Setembro 2019;</li>
<li>Outubro/2019;</li>
<li>Novembro/2019;</li>
<li>Dezembro/2019;</li>
<li>BALANCETE ANALÍTICO 2019</li>
</ol>
                                    </div>
                                                                    </div>
					
    </main>
@endsection