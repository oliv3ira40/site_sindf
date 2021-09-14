@extends('Admin.layout.layout')
@section('title', 'Excluindo post destacado')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::model($data['featured_post'], ['url'=>route('adm.featured_post.delete')]) !!}
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
                            <div class="form-control">
                                {{ $data['featured_post']->order }}
                            </div>
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
                            <div class="form-control">
                                {{ $data['featured_post']->Post->id }} -
                                {{ $data['featured_post']->Post->title }}
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::submit('Excluir', ['class'=>'btn btn-xs btn-block btn-trans btn-danger']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection