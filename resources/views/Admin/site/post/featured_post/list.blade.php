@extends('Admin.layout.layout')
@section('title', 'Notícias destacadas')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <table class="datatable table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ordem</th>
                        <th>Post</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['featured_post'] as $featured_post)
                        <tr>
                            <td>
                                {{ $featured_post->id }}
                            </td>
                            <td>
                                {{ $featured_post->order }}
                            </td>
                            <td>
                                {{ $featured_post->Post->id }} -
                                {{ str_limit($featured_post->Post->title, '30') }}
                            </td>
                            <td>
                                @if (in_array('adm.featured_post.edit', HelpAdmin::PermissionsUser()))
                                    <a href="{{ route('adm.featured_post.edit', $featured_post->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>
                                @endif
                                
                                @if (in_array('adm.featured_post.alert', HelpAdmin::PermissionsUser()))
                                    <a href="{{ route('adm.featured_post.alert', $featured_post->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>
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