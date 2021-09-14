@extends('Admin.layout.layout')
@section('title', 'Nova notícia')

@section('content')

    <style>
        .dropify-wrapper {
            height: 90px;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::open(['url' => route('adm.post.save'), 'files' => true]) !!}

                    {{-- Titulo / Linha fina --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">
                                Titulo*
                            </label>

                            {!! Form::textarea('title', null, ['class'=>'form-control', 'rows'=>'2', 'style'=>'min-height: unset;']) !!}
                            @if ($errors->has('title'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('title') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="thin_line">
                                Linha fina
                            </label>
                            {!! Form::textarea('thin_line', null, ['class'=>'form-control', 'rows'=>'2', 'style'=>'min-height: unset;']) !!}
                            
                            @if ($errors->has('thin_line'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('thin_line') }}
                                </small>
                            @endif
                        </div>
                    </div>

                    {{-- Img Banner / Img Destaque / Palavras-Chave --}}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="image_banner">
                                Img Banner (Tamanho recomendado: 1920x600 px)
                            </label>

                            <input type="file" name="image_banner" class="form-control dropify" data-default-file="">
                            @if ($errors->has('image_banner'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('image_banner') }}
                                </small>
                            @endif

                            <small class="form-text text-muted">
                                Utilizada em sliders e na apresentação do post na página de noticias
                            </small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image_spotlight">
                                Img Destaque (Tamanho recomendado: 800x800 px)
                            </label>
        
                            <input type="file" name="image_spotlight" class="form-control dropify" data-default-file="">
                            @if ($errors->has('image_spotlight'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('image_spotlight') }}
                                </small>
                            @endif

                            <small class="form-text text-muted">
                                Utilizada na página inicial (Ultimas noticias e notícias em destaque) e na pagina detalhada especifica de cada post  
                            </small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="metakey">
                                Palavras-Chave
                                @if ($errors->has('metakey'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('metakey') }}
                                    </small>
                                @endif
                            </label>
        
                            {!! Form::textarea('metakey', null, ['class'=>'form-control', 'rows'=>'3']) !!}
                        </div>
                    </div>

                    {{-- Categorias / Tags / Autor / Status da noticia --}}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="category_post_id">
                                Categorias
                                {{-- <small class="m-l-5">
                                    <a href="#" data-toggle="modal" data-target=".new_category_modal">Adicionar categoria</a>
                                </small> --}}
                            </label>
        
                            <select name="category_post_id[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Selecione...">
                                @foreach ($data['category_post'] as $category_post)
                                    <option value="{{ $category_post->id }}">{{ $category_post->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_post_id'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('category_post_id') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tag_post_id">
                                Tags
                                {{-- <small class="m-l-5">
                                    <a href="#" data-toggle="modal" data-target=".new_tag_modal">Adicionar tag</a>
                                </small> --}}
                            </label>
        
                            <select name="tag_post_id[]" class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Selecione...">
                                @foreach ($data['tag_post'] as $tag_post)
                                    <option value="{{ $tag_post->id }}">{{ $tag_post->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('tag_post_id'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('tag_post_id') }}
                                </small>
                            @endif
                        </div>

                        <div class="form-group col-md-2">
                            <label for="status_post_id">
                                Status da noticia*
                            </label>
                        
                            <select name="status_post_id" class="form-control select2">
                                <option value="null">Selecione...</option>
                                @foreach ($data['status_post'] as $status_post)
                                    <option value="{{ $status_post->id }}">{{ $status_post->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status_post_id'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('status_post_id') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            <label for="author_id">
                                Autor*
                            </label>
                        
                            <select name="author_id" class="form-control select2">
                                <option value="null">Selecione...</option>
                                @foreach (HelpPosts::getAuthorsUsers() as $authors_user)
                                    <option value="{{ $authors_user->id }}">{{ HelpAdmin::completName($authors_user) }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('author_id'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('author_id') }}
                                </small>
                            @endif
                        </div>
                    </div>

                    {{-- Criar slider / Destacar noticia --}}
                    {{-- <div class="form-group">
                        <div class="row">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">Criar slider</label>
            
                                <div>
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#1AB394" data-size=""/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="exampleInputEmail1">Destacar noticia</label>
            
                                <div>
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#1AB394" data-size=""/>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                    <br><hr>
                    {{-- Conteudo --}}
                    <div class="form-group">
                        <label for="content">
                            Conteudo
                        </label>

                        <a class="float-right" href="{{ route('adm.files.all_files') }}" target="_blank">
                            <strong>
                                Inserir arquivos / Arquivos disponíveis
                            </strong>
                        </a>

                        {!! Form::textarea('content', null, ['id'=>'elm2', 'class'=>'form-control']) !!}
                        @if ($errors->has('content'))
                            <small class="text-danger txt-trans-initial font-bold">
                                {{ $errors->first('content') }}
                            </small>
                        @endif
                    </div>

                    {{-- Salvar --}}
                    <div class="form-group">
                        {!! Form::submit('Salvar', ['class'=>'form-control btn-trans btn btn-block btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{-- new_category_modal --}}
    {{-- <div class="modal fade new_category_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Nova categoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body pb-0">
                    {!! Form::open(['url'=>route('adm.category_post.new_ajax'), 'id'=>'form_category_post_new']) !!}
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="thin_line">Nome</label>
                                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                {!! Form::submit('Salvar', ['class'=>'form-control btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div> --}}
    {{-- new_tag_modal --}}
    {{-- <div class="modal fade new_tag_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Nova tag</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>route('adm.tag_post.new_ajax'), 'id'=>'form_tag_post_new']) !!}
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="thin_line">Nome</label>
                                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                {!! Form::submit('Salvar', ['class'=>'form-control btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div> --}}

@endsection