@extends('Admin.layout.layout')
@section('title', 'Excluindo slider')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::open(['url'=>route('adm.slider_site.delete')]) !!}
                    {!! Form::hidden('id', $data['slider_site']->id) !!}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title" class="col-form-label">
                                Titulo
                            </label>
                            <div class="form-control">
                                {{ $data['slider_site']->title ?? '--' }}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="subtitle" class="col-form-label">
                                Sub-titulo
                            </label>
                            <div class="form-control">
                                {{ $data['slider_site']->subtitle ?? '--' }}
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="link" class="col-form-label">
                                Link
                            </label>
                            <div class="form-control">
                                {{ $data['slider_site']->link ?? '--' }}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="target" class="col-form-label">
                                Target
                            </label>
                            <div class="form-control">
                                {{ $data['slider_site']->target ?? '--' }}
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