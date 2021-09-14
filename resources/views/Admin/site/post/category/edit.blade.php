@extends('Admin.layout.layout')
@section('title', 'Editando categoria')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::model($data['category_post'], ['url'=>route('adm.category_post.update')]) !!}
                     {!! Form::hidden('id') !!}

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name" class="col-form-label">
                                Nome
                                @if ($errors->has('name'))
                                <small class="text-danger txt-trans-initial font-bold">
                                    {{ $errors->first('name') }}
                                </small>
                                @endif
                            </label>
                            {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name', 'autofocus']) !!}
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="private">
                                    Categoria privada
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
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::submit('Atualizar', ['class'=>'btn btn-xs btn-block btn-trans btn-info']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection