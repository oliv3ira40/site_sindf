@extends('Admin.layout.layout')
@section('title', 'Arquivos disponíveis')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                {!! Form::open(['url'=>route('adm.file.insert_files'), 'files'=>'post']) !!}
                    <div class="form-group">
                        <label for="content">
                            Inserir novos arquivos (máximo 10Mbs)
                            @if ($errors->has('new_files'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('new_files') }}
                                </small>
                            @endif
                        </label>
                        
                        {!! Form::file('new_files[]', ['class'=>'form-control', 'multiple']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Salvar arquivos', ['class'=>'btn btn-block btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
                <br><hr>


                
                {!! Form::model($filters, ['url' => route('adm.files.all_files')]) !!}
                    <div class="form-group">
                        <label for="search">
                            Buscar arquivo
                        </label>
                        {!! Form::text('search', null, ['id'=>'search', 'class'=>'form-control']) !!}
                    </div>
                {!! Form::close() !!}
                @if (isset($filters['search']) AND $filters['search'] != null)
                    Arquivos encontrados:
                    {{ $data['all_files']->total() }}
                    <br>
                    <a href="{{ route('adm.files.all_files') }}">
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
                            <th>Arquivo</th>
                            <th class="custom_tr">Link</th>
                            <th style="width: 170px !important;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $n = count($data['all_files']) @endphp
                        @foreach ($data['all_files'] as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td class="custom_td">
                                    
                                    @if (date('m/d') == $item->created_at->format('m/d'))
                                        {{ str_limit($item->name, 40) }}
                                        <small class="m-l-5 badge badge-success">Arquivo novo</small>
                                    @else
                                        {{ str_limit($item->name, 40) }}
                                    @endif
                                </td>
                                <td>
                                    @if (in_array($item->extension, ['jpg', 'jpeg', 'png']))
                                        <img style="width: 100px;" src="{{ asset(HelpAdmin::getStorageUrl()).'/'.$item->path }}">
                                    @endif
                                </td>
                                <td class="custom_td">
                                    {{ asset(HelpAdmin::getStorageUrl()).'/'.$item->path }}
                                </td>
                                <td>
                                    <a href="{{ asset(HelpAdmin::getStorageUrl()).'/'.$item->path }}" target="_blank" class="my-btn btn btn-xs btn-trans btn-info">Visualizar</a>
                                    <a href="{{ asset(HelpAdmin::getStorageUrl()).'/'.$item->path }}" download class="my-btn btn btn-xs btn-trans btn-success">Baixar</a>
                                    @if (in_array('adm.file.alert', HelpAdmin::permissionsUser()))
                                        {{-- <a href="{{ route('adm.file.alert', ['path' => $item->id]) }}" class="my-btn btn btn-xs btn-trans btn-danger">Excluir</a> --}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data['all_files']->appends(['search' => $filters['search'] ?? ''])->links() }}
            </div>
        </div>
    </div>

@endsection