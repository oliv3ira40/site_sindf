@extends('Admin.layout.layout')
@section('title', 'Lista de tags')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">

            {!! Form::model($filters, ['url' => route('adm.tags_posts.list')]) !!}
                <div class="form-group">
                    <label for="search">
                        Buscar tag
                    </label>
                    {!! Form::text('search', null, ['id'=>'search', 'class'=>'form-control']) !!}
                </div>
            {!! Form::close() !!}
            @if (isset($filters['search']) AND $filters['search'] != null)
                Tags encontrados:
                {{ $data['tag_post']->total() }}
                <br>
                <a href="{{ route('adm.tags_posts.list') }}">
                    <strong>
                        Remover filtro
                    </strong>
                </a>
                <hr class="m-b-10">
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Privado</th>
                        <th>Posts</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['tag_post'] as $tag_post)
                        <tr>
                            <td>
                                {{ $tag_post->id }}
                            </td>
                            <td>
                                {{ $tag_post->name }}
                            </td>
                            <td>
                                @if ($tag_post->private)
                                    <span class="badge badge-success">
                                        Sim
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        Não
                                    </span>
                                @endif
                            </td>
                            <td>
                                {{ $tag_post->PostsHasTagsPosts->count() }}
                            </td>
                            <td>
                                @if (in_array('adm.tag_post.edit', HelpAdmin::PermissionsUser()))
                                    <a href="{{ route('adm.tag_post.edit', $tag_post->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>
                                @endif
                                
                                @if (in_array('adm.tag_post.alert', HelpAdmin::PermissionsUser()))
                                    <a href="{{ route('adm.tag_post.alert', $tag_post->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data['tag_post']->appends(['search' => $filters['search'] ?? ''])->links() }}
        </div>
    </div>
</div>

@endsection