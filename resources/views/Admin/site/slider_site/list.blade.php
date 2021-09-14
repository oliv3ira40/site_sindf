@extends('Admin.layout.layout')
@section('title', 'Lista de sliders')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <table class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Sub-titulo</th>
                            <th>Imagem</th>
                            <th>Data de cadastro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['sliders_site'] as $slider_site)
                            <tr>
                                <td>
                                    {{ $slider_site->id }}
                                </td>
                                <td>
                                    {{ str_limit($slider_site->title, 30) }}
                                </td>
                                <td>
                                    {{ str_limit($slider_site->subtitle, 30) }}
                                </td>
                                <td>
                                    <img width="100" src="{{ asset(HelpAdmin::getStorageUrl().$slider_site->img) }}">
                                </td>
                                <td class="font-bold">{{ $slider_site->created_at }}</td>
                                <td>
                                    @if (in_array('adm.slider_site.edit', HelpAdmin::PermissionsUser()))
                                        <a href="{{ route('adm.slider_site.edit', $slider_site->id) }}" class="my-btn btn btn-xs btn-trans btn-warning">Editar</a>
                                    @endif
                                    
                                    @if (in_array('adm.slider_site.alert', HelpAdmin::PermissionsUser()))
                                        <a href="{{ route('adm.slider_site.alert', $slider_site->id) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a>
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