@extends('Admin.layout.layout')
@section('title', 'Lista de Usuários')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <div class="row">
                    <div class="col-md 6">
                        <h4 class="m-t-0 header-title">Lista de Usuários</h4>
                        <p class="text-muted font-14 m-b-10">
                            Nesta lista sera exibido todos os usuários cadastrados, incluindo os não excluídos permanentemente
                        </p>
                    </div>
                    <div class="col-md-6">
                        <ul class="pagination float-right">
                            {{ $users->links() }}
                        </ul>
                    </div>
                </div>
                {!! Form::model($filters, ['url' => route('adm.users.list')]) !!}
                    <div class="form-group">
                        <label for="search">
                            Buscar usuário
                        </label>
                        {!! Form::text('search', null, ['id'=>'search', 'class'=>'form-control']) !!}
                    </div>
                {!! Form::close() !!}
                @if (isset($filters['search']) AND $filters['search'] != null)
                    Usuários encontrados:
                    {{ $users->total() }}
                    <br>
                    <a href="{{ route('adm.users.list') }}">
                        <strong>
                            Remover filtro
                        </strong>
                    </a>
                    <hr class="m-b-10">
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Grupos</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ HelpAdmin::completName($user) }}
                                </td>
                                <td class="font-bold">
                                    <span style="background-color: {{ $user->Group->tag_color }};" class="badge badge-primary">
                                        {{ $user->Group->name }}
                                    </span>
                                </td>
                                <td>
                                    @if ($user->trashed())
                                        <span class="badge badge-danger">
                                            Bloqueado
                                        </span>
                                    @else
                                        <span class="badge badge-success">
                                            Ativo
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->trashed())
                                        @if (in_array('adm.users.to_restore', HelpAdmin::permissionsUser()))
                                            <a href="{{ route('adm.users.to_restore', $user->id) }}" class="my-btn btn btn-xs btn-trans btn-info">Restaurar</a>    
                                        @endif
                                        @if (in_array('adm.users.definitive_exclusion_alert', HelpAdmin::permissionsUser()))
                                            <a href="{{ route('adm.users.definitive_exclusion_alert', $user->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Exclusão Definitiva</a>    
                                        @endif    
                                    @else
                                        @if (in_array('adm.users.edit', HelpAdmin::permissionsUser()))
                                            <a href="{{ route('adm.users.edit', $user->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>    
                                        @endif

                                        @if (in_array('adm.users.alert', HelpAdmin::permissionsUser()))
                                            <a href="{{ route('adm.users.alert', $user->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>    
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->appends(['search' => $filters['search'] ?? ''])->links() }}
            </div>
        </div>
    </div>

@endsection