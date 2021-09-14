@extends('Admin.layout.layout')
@section('title', 'Excluindo arquivo')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::model($file, ['url'=>route('adm.file.delete')]) !!}
                    {!! Form::hidden('path', null) !!}

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
                            <div class="form-control">
                                {{ $file['basename'] }}
                            </div>
                        </div>
                    </div>

                    @if (in_array($file['extension'], ['png', 'jpg', 'jpeg']))
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <img style="max-width: 50%;" src="{{ asset(HelpAdmin::getStorageUrl().$file['path']) }}">
                            </div>
                        </div>
                    @endif

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