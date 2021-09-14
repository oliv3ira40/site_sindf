@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Diretoria Executiva Nacional
@stop

@section('content')
    <main>

        {{-- <div id="breadcrumb">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li>Page active</li>
                </ul>
            </div>
        </div> --}}
        
        <div class="bg_color_1">
            <div class="container margin_60_35">
                <div class="main_title">
                    <h2>Diretoria Executiva Nacional</h2>
                </div>
                <div class="row justify-content-between">
                    <div class="col-md-12 custom-main_title">
                        <p align="center">
                            Diretoria Executiva Nacional – Triênio 04/2020 à 03/2023
                        </p>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box_list wow fadeIn">
                                    <figure>
                                        <a href="#">
                                            <img src="https://www.sindfazenda.org.br/wp-content/uploads/2020/04/5EAFA25C-AC6A-4C67-9073-E50068823729-225x300.jpeg" class="img-fluid"  alt="">
                                        </a>
                                    </figure>
                                    <div style="min-height: 130px !important;" class="card-members wrapper">
                                        <small>Presidente do SINDFAZENDA</small>
                                        <h3 style="min-height: 40px; text-transform: uppercase;">Neire Luiz Matos</h3>
                                        <p>Lotação: Aposentada/DF</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box_list wow fadeIn">
                                    <figure>
                                        <a href="#">
                                            <img src="https://www.sindfazenda.org.br/wp-content/uploads/2020/04/FotoOrlan-254x300.jpg" class="img-fluid" alt="">
                                        </a>
                                    </figure>
                                    <div style="min-height: 130px !important;" class="card-members wrapper">
                                        <small>Vice Presidente do SINDFAZENDA</small>
                                        <h3 style="min-height: 40px; text-transform: uppercase;">Orlan Francisco Oliveira dos Santos</h3>
                                        <p>Lotação: DRF – Aracaju/SE</p>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box_list wow fadeIn">
                                    <figure>
                                        <a href="#">
                                            <img src="https://www.sindfazenda.org.br/wp-content/uploads/2020/04/Jecirema-205x300.jpeg" class="img-fluid" alt="">
                                        </a>
                                    </figure>
                                    <div style="min-height: 130px !important;" class="card-members wrapper">
                                        <small>Secretária Geral do SINDFAZENDA</small>
                                        <h3 style="min-height: 40px; text-transform: uppercase;">Jecirema Alves Carvalho</h3>
                                        <p>Lotação: Aposentada/RO</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box_list wow fadeIn">
                                    <figure>
                                        <a href="#">
                                            <img src="https://www.sindfazenda.org.br/wp-content/uploads/2020/03/094AC30A-B187-465F-94B5-625C7D74587A-300x245.jpeg" class="img-fluid" alt="">
                                        </a>
                                    </figure>
                                    <div style="min-height: 130px !important;" class="card-members wrapper">
                                        <small>Diretor de Administração e Finanças</small>
                                        <h3 style="min-height: 40px; text-transform: uppercase;">Luis Roberto da Silva</h3>
                                        <p>Lotação: DRF – Goiânia/GO</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box_list wow fadeIn">
                                    <figure>
                                        <a href="#">
                                            <img src="https://www.sindfazenda.org.br/wp-content/uploads/2020/04/Irismar-229x300.jpeg" class="img-fluid" alt="">
                                        </a>
                                    </figure>
                                    <div style="min-height: 130px !important;" class="card-members wrapper">
                                        <small>Diretora de Assuntos Parlamentares</small>
                                        <h3 style="min-height: 40px; text-transform: uppercase;">Irismar Martins de Miranda</h3>
                                        <p>Lotação: Aposentada/DF</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box_list wow fadeIn">
                                    <figure>
                                        <a href="#">
                                            <img src="#" class="img-fluid" alt="">
                                        </a>
                                    </figure>
                                    <div style="min-height: 130px !important;" class="card-members wrapper">
                                        <small>Diretor de Assuntos Jurídicos</small>
                                        <h3 style="min-height: 40px; text-transform: uppercase;">-</h3>
                                        <p>-</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box_list wow fadeIn">
                                    <figure>
                                        <a href="#">
                                            <img src="https://www.sindfazenda.org.br/wp-content/uploads/2020/09/60AFC514-293F-44A3-805B-AB7CE8BF8478-225x300.jpeg" class="img-fluid" alt="">
                                        </a>
                                    </figure>
                                    <div style="min-height: 130px !important;" class="card-members wrapper">
                                        <small>Diretor de Aposentados e Pensionistas</small>
                                        <h3 style="min-height: 40px; text-transform: uppercase;">Sivaldo Fernandes Silva</h3>
                                        <p>Lotação: DRF – Vitória da Conquista/BA</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box_list wow fadeIn">
                                    <figure>
                                        <a href="#">
                                            <img src="https://www.sindfazenda.org.br/wp-content/uploads/2020/10/WYLINETE-300x300.jpg" class="img-fluid" alt="">
                                        </a>
                                    </figure>
                                    <div style="min-height: 130px !important;" class="card-members wrapper">
                                        <small>Diretora de Formação Sindical e Relações Intersindicais</small>
                                        <h3 style="min-height: 40px; text-transform: uppercase;">Maria Wylinete Fernandes Cavalcante</h3>
                                        <p>Lotação: Aposentada/CE</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            
           <div class="container margin_60_35">
                <div class="main_title">
                    <p align="center">
                            Conselho Fiscal Nacional – Triênio 04/2020 à 03/2023
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box_list wow fadeIn">
                                    <figure>
                                        <a href="#">
                                            <img src="https://www.sindfazenda.org.br/wp-content/uploads/2020/04/Euso-263x300.jpeg" class="img-fluid" alt="">
                                        </a>
                                    </figure>
                                    <div style="min-height: 130px !important;" class="card-members wrapper">
                                        <small>Membro Conselho Fiscal Nacional</small>
                                        <h3 style="min-height: 40px; text-transform: uppercase;">Euso Barbosa Ribeiro</h3>
                                    
                                            <p>
                                            Lotação: Aposentado/RR    
                                            </p>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box_list wow fadeIn">
                                    <figure>
                                        <a href="#">
                                            <img src="https://www.sindfazenda.org.br/wp-content/uploads/2020/04/JoseFonseca-300x300.jpeg" class="img-fluid" alt="">
                                        </a>
                                    </figure>
                                    <div style="min-height: 130px !important;" class="card-members wrapper">
                                        <small>Membro Conselho Fiscal Nacional</small>
                                        <h3 style="min-height: 40px; text-transform: uppercase;">José Fonseca dos Santos Filho</h3>
                                        <p>
                                            Lotação: Aposentado/DF   
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box_list wow fadeIn">
                                    <figure>
                                        <a href="#">
                                            <img src="https://www.sindfazenda.org.br/wp-content/uploads/2020/04/Auxiliadora-191x300.jpeg" class="img-fluid" alt="">
                                        </a>
                                    </figure>
                                    <div style="min-height: 130px !important;" class="card-members wrapper">
                                        <small>Membro Conselho Fiscal Nacional</small>
                                        <h3 style="min-height: 40px; text-transform: uppercase;">Maria Auxiliadora Reis Valente</h3>
                                      <p>
                                          Lotação: DRF – Macapá/AP
                                      </p>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
            <div class="container margin_60_35">
                <div class="main_title">
                    <div class="col-md-6">
                        <p align="left">
                            Suplente Diretoria Executiva Nacional – Triênio 04/2020 à 03/2023
                    </p>
                    <p align="left">
                    1º Suplente <br>
                    Christian Karla do Nascimento Jupetipe/MG<br><br>
                    2º Suplente<br>
                    Hayane Kraytch da Silva Ferreira/RJ<br><br>
                    3º Suplente<br>
                    Bruna Vieira Barbosa/SE<br><br>
                    4º Suplente<br>
                    Leonardo Lima Medeiros Cavalcanti/AM<br><br>
                    5º Suplente<br>
                    Rodrigo Melzi/SC<br><br>
                    6º Suplente<br>
                    Roberto Ferreira Anchieta/CE<br><br>
                    7º Suplente<br>
                    Celio da Penha/ES<br><br>
                    8º Suplente</p>
                </div>
                
                
                
            </div>
            </div>
        </div>
    </main>
@endsection

