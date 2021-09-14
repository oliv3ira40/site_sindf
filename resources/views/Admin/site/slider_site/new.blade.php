@extends('Admin.layout.layout')
@section('title', 'Novo slider')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::open(['url'=>route('adm.slider_site.save'), 'files'=>'true']) !!}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title" class="col-form-label">
                                Titulo
                                @if ($errors->has('title'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('title') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::text('title', null, ['class'=>'form-control', 'id'=>'title', 'autofocus']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="subtitle" class="col-form-label">
                                Sub-titulo
                                @if ($errors->has('subtitle'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('subtitle') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::text('subtitle', null, ['class'=>'form-control', 'id'=>'subtitle']) !!}
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="img" class="col-form-label">
                                Imagem
                                @if ($errors->has('img'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('img') }}
                                    </small>
                                @endif
                            </label>
                            <input type="file" name="img" class="dropify"/>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="link" class="col-form-label">
                                        Link
                                        @if ($errors->has('link'))
                                            <small class="text-danger txt-trans-initial font-bold">
                                                {{ $errors->first('link') }}
                                            </small>
                                        @endif
                                    </label>
                                    {!! Form::text('link', null, ['class'=>'form-control', 'id'=>'link']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="target" class="col-form-label">
                                        Target
                                        @if ($errors->has('target'))
                                            <small class="text-danger txt-trans-initial font-bold">
                                                {{ $errors->first('target') }}
                                            </small>
                                        @endif
                                    </label>
                                    {!! Form::text('target', null, ['class'=>'form-control', 'id'=>'target']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="post_id" class="col-form-label">
                                Usar dados do post
                                <br>
                                <small>
                                    Caso selecione um post a imagem utilizada sera a imagem registrada no post como "banner"
                                </small>
                                @if ($errors->has('post_id'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('post_id') }}
                                    </small>
                                @endif
                            </label>
                            <select name="post_id" class="select2">
                                <option value="">Selecione...</option>
                                @foreach ($data['post'] as $post)
                                    <option value='{{ $post->id }}'>
                                        {{ $post->id }} -
                                        {{ $post->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @if (in_array('adm.slider_site.list', HelpAdmin::permissionsUser()))
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox2" checked type="checkbox" name="stay_on_page">
                                    <label for="checkbox2">
                                        Permanecer na página
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::submit('Salvar', ['class'=>'btn btn-xs btn-block btn-trans btn-info']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection