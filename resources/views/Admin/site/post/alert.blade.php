@extends('Admin.layout.layout')
@section('title', 'Excluindo notícia')

@section('content')

    <style>
        .dropify-wrapper {
            height: 90px;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::model($data['post'], ['url' => route('adm.post.delete')]) !!}
                    {!! Form::hidden('id') !!}

                    {{-- Titulo / Linha fina --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">Titulo</label>
                            <div class="form-control">
                                {{ $data['post']->title }}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="thin_line">Linha fina</label>
                            <div class="form-control">
                                {{ $data['post']->thin_line }}
                            </div>
                        </div>
                    </div>

                    {{-- Categorias / Tags / Autor / Status da noticia --}}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="status_post_id">Status da noticia</label>
  
                            <div class="form-control">
                                {{ $data['post']->StatusPost->name }}
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="author_id">Criado por</label>
                        
                            <div class="form-control">
                                {{ HelpAdmin::completName($data['post']->CreatedBy) }}
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="author_id">Autor</label>
                        
                            <div class="form-control">
                                {{ HelpAdmin::completName($data['post']->Author) }}
                            </div>
                        </div>
                    </div>

                    {{-- Excluir --}}
                    <div class="form-group">
                        {!! Form::submit('Excluir', ['class'=>'form-control btn btn-trans btn-block btn-danger']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection