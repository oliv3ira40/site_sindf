@extends('Admin.layout.layout')
@section('title', 'Página inicial')

@section('content')

    @if (HelpAdmin::IsUserDeveloper())
        <div class="row">
            <a href="{{ route('adm.users.list') }}" class="col-xl-4 col-md-4">
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-10 text-success">Usuários</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <h2 class="mb-0 text-success">{{ $data['count_users'] }}</h2>
                            <p class="text-muted m-b-20">cadastrados</p>
                        </div>
                        <div class="progress progress-bar-success-alt progress-sm mb-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('adm.groups.list') }}" class="col-xl-4 col-md-4">
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-10 text-primary">Grupos</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <h2 class="mb-0 text-primary">{{ $data['count_groups'] }}</h2>
                            <p class="text-muted m-b-20">disponíveis</p>
                        </div>
                        <div class="progress progress-bar-primary-alt progress-sm mb-0">
                            <div class="progress-bar progress-bar-primary" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('adm.created_permissions.list') }}" class="col-xl-4 col-md-4">
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-10 text-warning">Permissões</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <h2 class="mb-0 text-warning">{{ $data['count_permissions'] }}</h2>
                            <p class="text-muted m-b-20">cadastrados</p>
                        </div>
                        <div class="progress progress-bar-warning-alt progress-sm mb-0">
                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Últimos usuários registrados</h4>
                    <p class="text-muted font-14 m-b-30">
                        Nesta lista sera exibido todos os usuários cadastrados, incluindo os excluídos
                    </p>

                    <table class="datatable table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Grupos</th>
                                <th>E-mail</th>
                                <th>Status</th>
                                <th>Data de cadastro</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['latest_users'] as $user)
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
                                        {{ $user->email }}
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
                                        {{ $user->created_at->format('d/m/Y H:i') }}
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
                </div>
            </div>
        </div>
    @endif

    @if (HelpAdmin::IsUserAdministrator())
        <div class="row">
            <a href="{{ route('adm.users.list') }}" class="col-md-6">
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-10 text-success">Usuários</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <h2 class="mb-0 text-success">{{ $data['count_users'] }}</h2>
                            <p class="text-muted m-b-20">cadastrados</p>
                        </div>
                        <div class="progress progress-bar-success-alt progress-sm mb-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('adm.posts.list') }}" class="col-md-6">
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-10">Notícias</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <h2 class="mb-0">{{ $data['count_posts'] }}</h2>
                            <p class="text-muted m-b-20">registradas</p>
                        </div>
                        <div class="progress progress-bar-primary-alt progress-sm mb-0">
                            <div class="progress-bar progress-bar-primary" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Últimos usuários registrados</h4>
                    <p class="text-muted font-14 m-b-30">
                        Nesta lista sera exibido todos os usuários cadastrados, incluindo os excluídos
                    </p>

                    <table class="datatable table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Grupos</th>
                                <th>E-mail</th>
                                <th>Status</th>
                                <th>Data de cadastro</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['latest_users'] as $user)
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
                                        {{ $user->email }}
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
                                        {{ $user->created_at->format('d/m/Y H:i') }}
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
                </div>
            </div>
        </div>
    @endif

    @if (HelpAdmin::IsUserCollaborator())
        <div class="row">
            <a href="{{ route('adm.posts.list') }}" class="col-xl-4 col-md-4">
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-10 text-success">Notícias</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <h2 class="mb-0 text-success">{{ $data['count_posts'] }}</h2>
                            <p class="text-muted m-b-20">registradas</p>
                        </div>
                        <div class="progress progress-bar-success-alt progress-sm mb-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('adm.featured_post.list') }}" class="col-xl-4 col-md-4">
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-10 text-primary">Notícias destacadas</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <h2 class="mb-0 text-primary">{{ $data['count_featured_post'] }}</h2>
                            <p class="text-muted m-b-20">destacadas</p>
                        </div>
                        <div class="progress progress-bar-primary-alt progress-sm mb-0">
                            <div class="progress-bar progress-bar-primary" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('adm.slider_site.list') }}" class="col-xl-4 col-md-4">
                <div class="card-box">
                    <h4 class="header-title mt-0 m-b-10 text-warning">Sliders</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <h2 class="mb-0 text-warning">{{ $data['count_slider_site'] }}</h2>
                            <p class="text-muted m-b-20">criados</p>
                        </div>
                        <div class="progress progress-bar-warning-alt progress-sm mb-0">
                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Últimos notícias registradas</h4>

                    <table class="datatable table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Link</th>
                                <th>Imagem</th>
                                <th>Criador por</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['latest_posts'] as $post)
                                <tr>
                                    <td>
                                        {{ $post->id }}
                                    </td>
                                    <td>
                                        {{ str_limit($post->title, 50) }}
                                    </td>
                                    <td>
                                        noticias/
                                        {{ $post->id }}
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
                                        <a href="{{ route('site.posts.detail', $post->id) }}" target="_blank" class="my-btn btn btn-xs btn-trans btn-primary">Visualizar</a>
                                        
                                        @if (in_array('adm.post.edit', HelpAdmin::PermissionsUser()))
                                            <a href="{{ route('adm.post.edit', $post->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>
                                        @endif
                                        
                                        @if (in_array('adm.post.alert', HelpAdmin::PermissionsUser()))
                                            <a href="{{ route('adm.post.alert', $post->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

@endsection