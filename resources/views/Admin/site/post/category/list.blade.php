@extends('Admin.layout.layout')
@section('title', 'Lista de categorias')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            {!! Form::model($filters, ['url' => route('adm.categories_posts.list')]) !!}
                <div class="form-group">
                    <label for="search">
                        Buscar categoria
                    </label>
                    {!! Form::text('search', null, ['id'=>'search', 'class'=>'form-control']) !!}
                </div>
            {!! Form::close() !!}
            @if (isset($filters['search']) AND $filters['search'] != null)
                Categorias encontradas:
                {{ $data['category_post']->total() }}
                <br>
                <a href="{{ route('adm.categories_posts.list') }}">
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
                    @foreach ($data['category_post'] as $category)
                        <tr>
                            <td>
                                {{ $category->id }}
                            </td>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td>
                                @if ($category->private)
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
                                {{ $category->PostsHasCategoriesPosts->count() }}
                            </td>
                            <td>
                                @if (in_array('adm.category_post.edit', HelpAdmin::PermissionsUser()))
                                    <a href="{{ route('adm.category_post.edit', $category->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>
                                @endif
                                
                                @if (in_array('adm.category_post.alert', HelpAdmin::PermissionsUser()))
                                    <a href="{{ route('adm.category_post.alert', $category->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data['category_post']->appends(['search' => $filters['search'] ?? ''])->links() }}
        </div>
    </div>
</div>

@endsection