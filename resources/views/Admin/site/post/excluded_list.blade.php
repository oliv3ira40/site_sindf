@extends('Admin.layout.layout')
@section('title', 'Lista de notícias excluidas')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <div class="col-md-12">
                    @if (in_array('adm.posts.list', HelpAdmin::PermissionsUser()))
                        <h4 class="m-t-0 header-title m-b-20">
                            <a class="text-white" href="{{ route('adm.posts.list') }}">
                                Acessar notícias registradas
                            </a>
                        </h4>
                    @endif
                </div>
                <table class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Imagem</th>
                            <th>Criador por</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['post'] as $post)
                            <tr>
                                <td>
                                    {{ $post->id }}
                                </td>
                                <td>
                                    {{ str_limit($post->title, 30) }}
                                </td>
                                <td>
                                    @if ($post->image_banner != null)
                                        <img width="100" src="{{ asset(HelpAdmin::getStorageUrl().$post->image_banner) }}">
                                    @else
                                        <img width="100" src="{{ asset(HelpAdmin::getStorageUrl().$post->image_spotlight) }}">
                                    @endif
                                </td>
                                <td>
                                    {{ HelpAdmin::completName($post->CreatedBy) }}
                                </td>
                                <td>
                                    {{ $post->StatusPost->name }}
                                </td>
                                <td>
                                    @if (in_array('adm.post.alert_restore', HelpAdmin::PermissionsUser()))
                                        <a href="{{ route('adm.post.alert_restore', $post->id) }}" class="my-btn btn btn-xs btn-trans btn-primary">
                                            Restaurar
                                        </a>
                                    @endif
                                    @if (in_array('adm.post.alert_definitive_exclusion', HelpAdmin::PermissionsUser()))
                                        <a href="{{ route('adm.post.alert_definitive_exclusion', $post->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">
                                            Excluir permanentemente
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