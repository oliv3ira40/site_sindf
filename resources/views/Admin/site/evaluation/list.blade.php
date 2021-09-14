@extends('Admin.layout.layout')
@section('title', 'Lista de pesquisas')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <div class="col-md-12">
                    <h4 class="m-t-0 m-b-10 header-title">
                        <a href="{{ route('adm.evaluation.new') }}">
                            Cadastrar nova pesquisa
                        </a>
                    </h4>
                </div>
                <table class="datatable table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>link</th>
                        <th>Nome</th>
                        {{-- <th>Tópicos</th>
                        <th>Perguntas</th> --}}
                        <th>Pesquisas finalizadas</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['evaluations'] as $evaluation)
                            <tr>
                                <td>
                                    {{ $evaluation->id }}
                                </td>
                                <td>
                                    iniciando-pesquisa/{{ $evaluation->id }}
                                </td>
                                <td>
                                    {{ $evaluation->name }}
                                </td>
                                {{-- <td>
                                    {{ $evaluation->QuestionTopics->count() }}
                                </td>
                                <td>
                                    {{ $evaluation->AvailableQuestions->count() }}
                                </td> --}}
                                <td>
                                    {{ $evaluation->CompletedEvaluations->count() }}
                                </td>
                                <td>
                                    <a href="{{ route('site.completed_evaluations.new', $evaluation->id) }}" target="_blank" class="my-btn btn btn-primary btn-xs btn-trans">
                                        Visualizar
                                    </a>
                                    @if (in_array('adm.evaluation.report', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.evaluation.report', $evaluation->id) }}" class="my-btn btn btn-info btn-xs btn-trans">
                                            Relatório
                                        </a>
                                    @endif
                                    @if (in_array('adm.evaluation.edit', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.evaluation.edit', $evaluation->id) }}" class="my-btn btn btn-warning btn-xs btn-trans">
                                            Editar
                                        </a>
                                    @endif
                                    @if (in_array('adm.evaluation.alert', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.evaluation.alert', $evaluation->id) }}" class="my-btn btn btn-danger btn-xs btn-trans">
                                            Excluir
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection