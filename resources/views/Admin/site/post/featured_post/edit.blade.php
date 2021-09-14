@extends('Admin.layout.layout')
@section('title', 'Editando post destacado')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::model($data['featured_post'], ['url'=>route('adm.featured_post.update')]) !!}
                     {!! Form::hidden('id') !!}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="order" class="col-form-label">
                                Posição
                                @if ($errors->has('order'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('order') }}
                                    </small>
                                @endif
                            </label>
                            {!! Form::text('order', null, ['class'=>'form-control', 'id'=>'order', 'autofocus']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="post_id" class="col-form-label">
                                Selecione o post a ser destacado
                                @if ($errors->has('post_id'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('post_id') }}
                                    </small>
                                @endif
                            </label>
                            <select name="post_id" class="select2">
                                <option value="">Selecione...</option>
                                @foreach ($data['post'] as $post)
                                    @if ($data['featured_post']->post_id == $post->id)
                                        <option selected value='{{ $post->id }}'>
                                            {{ $post->id }} -
                                            {{ $post->title }}
                                        </option>
                                    @else 
                                        <option value='{{ $post->id }}'>
                                            {{ $post->id }} -
                                            {{ $post->title }}
                                        </option>
                                    @endif
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