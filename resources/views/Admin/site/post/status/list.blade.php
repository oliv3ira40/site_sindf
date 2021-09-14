@extends('Admin.layout.layout')
@section('title', 'Lista de categorias')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <table class="datatable table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Posts</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['status_post'] as $status_post)
                        <tr>
                            <td>
                                {{ $status_post->id }}
                            </td>
                            <td>
                                {{ $status_post->name }}
                            </td>
                            <td>
                                {{ $status_post->Post->count() }}
                            </td>
                            <td>
                                @if (in_array('adm.status_post.edit', HelpAdmin::PermissionsUser()))
                                    <a href="{{ route('adm.status_post.edit', $status_post->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>
                                @endif
                                
                                @if (in_array('adm.status_post.alert', HelpAdmin::PermissionsUser()))
                                    <a href="{{ route('adm.status_post.alert', $status_post->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>
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