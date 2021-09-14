@extends('Admin.layout.layout')
@section('title', 'Tópicos criados')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <div class="col-md-12">
                    <h4 class="m-t-0 m-b-10 header-title">
                        <a href="{{ route('adm.question_topic.new', $data['evaluation']->id) }}">
                            Cadastrar novos tópicos
                        </a>
                        <a href="{{ route('adm.evaluation.edit', $data['evaluation']->id) }}" class="pull-right">
                            Retorna a {{ $data['evaluation']->name }}
                        </a>
                    </h4>
                </div>
                <table class="datatable table table-bordered">
                    <thead>
                    <tr>
                        <th>Posição</th>
                        <th>Nome</th>
                        <th>Perguntas</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['question_topics'] as $topic)
                            <tr>
                                <td>
                                    {{ $topic->position }}
                                </td>
                                <td>
                                    {{ $topic->name }}
                                </td>
                                <td>
                                    {{ $topic->AvailableQuestions->count() }}
                                </td>
                                <td>
                                    @if (in_array('adm.question_topic.edit', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.question_topic.edit', $topic->id) }}" class="my-btn btn btn-warning btn-xs btn-trans">
                                            Editar
                                        </a>
                                    @endif
                                    @if (in_array('adm.question_topic.alert', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.question_topic.alert', $topic->id) }}" class="my-btn btn btn-danger btn-xs btn-trans">
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