@extends('Admin.layout.layout')
@section('title', 'Editando notícia')

@section('content')

    <style>
        .dropify-wrapper {
            height: 90px;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::model($data['post'], ['url' => route('adm.post.update'), 'files' => true]) !!}
                    {!! Form::hidden('id', null) !!}

                    {{-- Titulo / Linha fina --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">Titulo*</label>
                            
                            {!! Form::textarea('title', null, ['class'=>'form-control', 'rows'=>'3', 'style'=>'min-height: unset;']) !!}
                            @if ($errors->has('title'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('title') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="thin_line">Linha fina</label>
                            
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

                            <input type="file" name="image_banner" class="form-control dropify" data-default-file="{{ asset(HelpAdmin::getStorageUrl().$data['post']->image_banner) }}">
                            
                            <small class="form-text text-muted">
                                Utilizada em sliders e na apresentação do post na página de noticias
                            </small>
                            @if ($errors->has('image_banner'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('image_banner') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image_spotlight">
                                Img Destaque (Tamanho recomendado: 800x800 px)
                            </label>
        
                            <input type="file" name="image_spotlight" class="form-control dropify" data-default-file="{{ asset(HelpAdmin::getStorageUrl().$data['post']->image_spotlight) }}">
                            
                            <small class="form-text text-muted">
                                Utilizada na página inicial (Ultimas noticias e notícias em destaque) e na pagina detalhada especifica de cada post  
                            </small>
                            @if ($errors->has('image_spotlight'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('image_spotlight') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="metakey">
                                Palavras-Chave
                            </label>
        
                            {!! Form::textarea('metakey', null, ['class'=>'form-control', 'rows'=>'3']) !!}
                            @if ($errors->has('metakey'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('metakey') }}
                                </small>
                            @endif
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
                                    @if (in_array($category_post->id, $data['posts_has_categories_array']));
                                        <option selected value="{{ $category_post->id }}">
                                            {{ $category_post->name }}
                                            {{ ($category_post->private) ? '(privada)' : '' }}
                                        </option>
                                    @else
                                        <option value="{{ $category_post->id }}">
                                            {{ $category_post->name }}
                                            {{ ($category_post->private) ? '(privada)' : '' }}
                                        </option>
                                    @endif
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
                                    @if (in_array($tag_post->id, $data['posts_has_tags_array']));
                                        <option selected value="{{ $tag_post->id }}">
                                            {{ $tag_post->name }}
                                            {{ ($tag_post->private) ? '(privada)' : '' }}
                                        </option>
                                    @else
                                        <option value="{{ $tag_post->id }}">
                                            {{ $tag_post->name }}
                                            {{ ($tag_post->private) ? '(privada)' : '' }}
                                        </option>
                                    @endif    
                                @endforeach
                            </select>
                            @if ($errors->has('tag_post_id'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('tag_post_id') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            <label for="status_post_id">Status da noticia*</label>
                        
                            <select name="status_post_id" class="form-control select2">
                                <option value="null">Selecione...</option>
                                @foreach ($data['status_post'] as $status_post)
                                    @if ($data['post']->status_post_id == $status_post->id)
                                        <option selected value="{{ $status_post->id }}">{{ $status_post->name }}</option>
                                    @else
                                        <option value="{{ $status_post->id }}">{{ $status_post->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('status_post_id'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('status_post_id') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            <label for="author_id">Autor*</label>
                        
                            <select name="author_id" class="form-control select2">
                                <option value="null">Selecione...</option>
                                @foreach (HelpPosts::getAuthorsUsers() as $authors_user)
                                    @if ($data['post']->author_id == $authors_user->id)
                                        <option selected value="{{ $authors_user->id }}">{{ HelpAdmin::completName($authors_user) }}</option>
                                    @else
                                        <option value="{{ $authors_user->id }}">{{ HelpAdmin::completName($authors_user) }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('author_id'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('author_id') }}
                                </small>
                            @endif
                        </div>
                    </div>

                    {{-- Postagem privada / Criar slider --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="private">
                                    Postagem privada
                                    <small class="text-warning font-bold">
                                        (Somente usuários logados terão acesso)
                                    </small>
                                </label>
                                @if ($errors->has('private'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('private')) }}
                                    </small>
                                @endif
                                <div class="check-box-position">
                                    {!! Form::checkbox('private', 1, null, [
                                        'data-plugin'=>"switchery",
                                        'data-color'=>"#188ae2",
                                        'data-size'=>"small"])
                                    !!}
                                </div>
                            </div>
                        </div>

                        @if (!$data['post']->SliderSite)
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="create_slider">Criar slider</label>
                                    @if ($errors->has('create_slider'))
                                        <small class="text-danger font-bold">
                                            {{ $errors->first(('create_slider')) }}
                                        </small>
                                    @endif
                                    <div class="check-box-position">
                                        {!! Form::checkbox('create_slider', 1, null, [
                                            'data-plugin'=>"switchery",
                                            'data-color'=>"#188ae2",
                                            'data-size'=>"small"])
                                        !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <hr>
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
                        <a class="float-right p-r-10" href="{{ route('site.posts.detail', $data['post']->id) }}" target="_blank">
                            <strong>
                                Visualizar no site
                            </strong>
                        </a>
                        
                        {!! Form::textarea('content', HelpPosts::treatImgPostContent($data['post']->content), ['id'=>'elm1', 'class'=>'form-control']) !!}
                        @if ($errors->has('content'))
                            <small class="text-danger txt-trans-initial font-bold">
                                {{ $errors->first('content') }}
                            </small>
                        @endif
                    </div>

                    {{-- Atualizar --}}
                    <div class="form-group">
                        {!! Form::submit('Atualizar', ['class'=>'form-control btn btn-trans btn-block btn-primary']) !!}
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