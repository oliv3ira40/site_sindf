@extends('Admin.layout.layout')
@section('title', 'Relatório da pesquisa')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card-box task-detail" style="height: 306px; overflow-x: auto;">
                <h4 class="font-600 mb-0 mt-0">
                    Pesquisa: {{ $data['evaluation']->name }}

                    <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal">
                        Exportar relatório
                    </a>
                </h4>

                <ul class="list-inline task-dates m-b-0 m-t-20">
                    <div class="row">
                        <li class="col-md-4">
                            <h5 class="font-600 m-b-5">
                                Pesquisas respondidas
                            </h5>
                            <p class="mb-0">
                                {{ $data['completed_evaluations']->count() }}
                            </p>
                        </li>
                        <li class="col-md-4">
                            <h5 class="font-600 m-b-5">Última resposta registrada</h5>
                            <p class="mb-0">
                                {{ $data['completed_evaluations']->last()->created_at->format('d/m/Y H:i') }}
                            </p>
                        </li>
                    </div>
                </ul>

                <div class="task-tags m-t-20 mb-0">
                    <h5 class="font-600">
                        Perguntas registradas:
                        {{ $data['available_questions']->count() }}
                    </h5>

                    <div class="row">
                        @php $count = 1; @endphp
                        @foreach ($data['available_questions'] as $question)
                            <h6 class="mb-0 col-md-6" style="text-align: justify;">
                                <b>{{ $count++ }} - </b>{{ $question->question_text }}
                            </h6>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">Usuários participantes</h4>
                <div style="height: 230px; overflow-x: auto;">
                    @foreach ($data['completed_evaluations'] as $completed_evaluation)
                        <div class="media m-b-10">
                            <div class="media-body" style="border-bottom: solid #98a6ad 0.1px;">
                                @if ($completed_evaluation->User)
                                    <h5 class="mt-0 m-b-5">
                                        <b class="text-muted">Nome: </b>
                                        {{ HelpAdmin::completName($completed_evaluation->User) }}
                                    </h5>
                                    <h5 class="mt-0 m-b-5">
                                        <b class="text-muted">CPF: </b>
                                        {{ $completed_evaluation->User->cpf }}
                                    </h5>
                                    
                                    <h5 class="mt-0 m-b-5">
                                        <b class="text-muted">Matrícula: </b>
                                        {{ $completed_evaluation->User->registration }}
                                    </h5>
                                @endif
                                <h5 class="mt-0 m-b-10">
                                    <b class="text-muted">IP: </b>
                                    {{ $completed_evaluation->ip_adress }}
                                </h5>
                                <h5 class="mt-0 m-b-10">
                                    <b class="text-muted">Data do registro: </b>
                                    {{ $completed_evaluation->created_at->format('d/m/Y H:i') }}
                                </h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">Resultado geral por pergunta</h4>

                <div class="text-center">
                    <ul class="list-inline chart-detail-list mb-0">
                        @foreach ($data['responses_availables'] as $key => $response_available)
                            <li class="list-inline-item">
                                <h5 style="color: {{ $data['colors'][$key] }}; font-size: 13px;">
                                    <i class="fa fa-circle m-r-5"></i>
                                    {{ $response_available->answer_text }}
                                </h5>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div id="bar_all_questions" style="height: 300px;"></div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        @php $count = 1; @endphp
        @foreach ($data['available_questions'] as $available_question)
            <div class="col-md-6">
                <div style="height: 430px; overflow: auto;" class="card-box">
                    <h4 class="header-title m-t-0 m-b-10">
                        {{ $count++.' - '.$available_question->question_text }}
                    </h4>

                    @if ($available_question->QuestionType->tag == 'select')
                        <div id="bar_by_question_{{ $available_question->id }}" style="height: 280px;"></div>
                        <div style="height: 78px; overflow: auto;" class="text-center">
                            <ul style="text-align: left;" class="list-inline chart-detail-list">
                                @foreach ($available_question->PossiblesQuestionAnswers as $key => $possibles_question_answers)
                                    <li class="list-inline-item">
                                        <i style="color: {{ $data['colors'][$key] }};" class="fa fa-circle m-r-5"></i>
                                        <h5 style="font-size: 12px; display: inline-block;" class="mb-0 dbq_{{ $available_question->id.'_'.$possibles_question_answers->id }}">
                                            {{ $possibles_question_answers->response_text }}
                                        </h5>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif ($available_question->QuestionType->tag == 'radio')
                        <div id="donut_by_question_{{ $available_question->id }}" style="height: 306px;"></div>
            
                        <div class="text-center">
                            <ul style="text-align: left;" class="list-inline chart-detail-list mb-0">
                                @foreach ($available_question->PossiblesQuestionAnswers as $key => $possibles_question_answers)
                                    <li class="list-inline-item">
                                        <i style="color: {{ $data['colors'][$key] }};" class="fa fa-circle m-r-5"></i>
                                        <h5 style="font-size: 12px; display: inline-block;" class="mb-0 dbq_{{ $available_question->id.'_'.$possibles_question_answers->id }}">
                                            {{ $possibles_question_answers->response_text }}
                                        </h5>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif ($available_question->QuestionType->tag == 'textarea')
                        <div style="height: 350px; overflow-x: auto;">
                            @foreach ($available_question->ResponsesReceived->sortByDesc('created_at') as $responses_received) 
                                <div class="media m-b-10">
                                    <div class="media-body" style="border-bottom: solid #98a6ad 0.1px;">
                                        {{-- @if ($responses_received->CompletedEvaluation->User)
                                            <h5 class="mt-0 m-b-5">
                                                <b class="text-muted">Usuário: </b>
                                                {{ HelpAdmin::completName($responses_received->CompletedEvaluation->User) }}
                                            </h5>
                                        @endif --}}
                                        <h5 class="mt-0 m-b-5">
                                            <b class="text-muted">Resposta: </b>
                                            {{ $responses_received->text_response }}
                                        </h5>
                                        <h5 class="mt-0 m-b-10">
                                            <b class="text-muted">Data do registro: </b>
                                            {{ $responses_received->created_at->format('d/m/Y H:i') }}
                                        </h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    {{-- FORMS --}}
        {!! Form::open(['url'=>route('site.evaluation.donut_by_question'), 'id'=>'form-donut_by_question']) !!}
            {!! Form::hidden('evaluation_id', $data['evaluation']->id) !!}
        {!! Form::close() !!}

        {!! Form::open(['url'=>route('site.evaluation.bar_by_question'), 'id'=>'form-bar_by_question']) !!}
            {!! Form::hidden('evaluation_id', $data['evaluation']->id) !!}
        {!! Form::close() !!}
        
        {{-- {!! Form::open(['url'=>route('admin.evaluation.get_evalutations_by_date'), 'id'=>'form-get_evalutations_by_date']) !!}
            {!! Form::hidden('evaluation_id', $data['evaluation']->id) !!}
        {!! Form::close() !!} --}}
    {{-- FORMS --}}

    {{-- MODAL --}}
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content p-t-20 p-b-20">
                    {!! Form::open(['url'=>route('adm.evaluation.download_report'), 'target'=>'_blank']) !!}
                        {!! Form::hidden('evaluation_id', $data['evaluation']->id) !!}
                        <div class="modal-header">
                            <h4 class="modal-title mt-0" id="myModalLabel">
                                Pesquisa {{ $data['evaluation']->name }}
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body pt-0 pb-0">
                            <h5>Data de registro:</h5>
                            <input class="form-control date_range_01" id="date_range" type="text" name="date_range" value="" autocomplete="off"/>
                            
                            {{-- <h5>
                                <b class="text-muted">Pesquisas selecionas: </b>
                                <span id="count_evaluations">
                                    {{ $data['evaluations']->count() }}
                                </span>
                            </h5> --}}

                            <h5>Formato de arquivo:</h5>
                            <select name="file_format" class="form-control select2">
                                <option selected value="pdf" >PDF</option>
                                {{-- <option value="excel" >Excel</option> --}}
                            </select>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="download_report btn btn-trans btn-success btn-block" value="Baixar relatório">
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    {{-- MODAL --}}

@endsection