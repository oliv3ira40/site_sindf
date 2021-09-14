@extends('Admin.layout.layout')
@section('title', 'Perguntas registras')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <div class="col-md-12">
                    <h4 class="m-t-0 m-b-10 header-title">
                        <a href="{{ route('adm.available_question.new', $data['evaluation']->id) }}">
                            Cadastrar novas pergunta
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
                        <th>Pergunta</th>
                        <th>Tipo da pergunta</th>
                        <th>Tópico</th>
                        <th>Respostas vinculadas</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['available_questions'] as $question)
                            <tr>
                                <td>
                                    {{ $question->position }}
                                </td>
                                <td>
                                    {{ $question->question_text }}
                                </td>
                                <td>
                                    {{ $question->QuestionType->name }}
                                    <strong>
                                        ({{ $question->QuestionType->tag }})
                                    </strong>
                                </td>
                                <td>
                                    @if ($question->QuestionTopic)
                                        {{ $question->QuestionTopic->name }}
                                    @else
                                        ---
                                    @endif
                                </td>
                                <td>
                                    @if ($question->QuestionType->tag == 'textarea')
                                        <span class="text-warning">
                                            Não é necessário
                                        </span>
                                    @else
                                        @if ($question->PossiblesQuestionAnswers->count())
                                            <span class="text-success">                                            
                                                {{ $question->PossiblesQuestionAnswers->count() }}
                                            </span>
                                        @else
                                            <span class="text-danger">
                                                0
                                            </span>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if (in_array('adm.available_question.edit', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.available_question.edit', $question->id) }}" class="my-btn btn btn-warning btn-xs btn-trans">
                                            Editar
                                        </a>
                                    @endif
                                    @if (in_array('adm.available_question.alert', HelpAdmin::permissionsUser()))
                                        <a href="{{ route('adm.available_question.alert', $question->id) }}" class="my-btn btn btn-danger btn-xs btn-trans">
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