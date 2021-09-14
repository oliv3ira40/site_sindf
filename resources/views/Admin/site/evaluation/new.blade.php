@extends('Admin.layout.layout')
@section('title', 'Nova pesquisa')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::open(['route'=>'adm.evaluation.save']) !!}
                    <div class="row">
                        {{-- <div class="col-md-12">
                            <h4 class="m-t-0 m-b-10 header-title">??</h4>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nome*</label>
                                @if ($errors->has('name'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('name')) }}
                                    </small>
                                @endif
                                {!! Form::text('name', null, ['id'=>'name', 'class'=>'form-control', 'autofocus']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                @if ($errors->has('description'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('description')) }}
                                    </small>
                                @endif
                                {!! Form::textarea('description', null, ['id'=>'description', 'class'=>'form-control', 'rows'=>'3']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <button class="btn btn-block btn-primary waves-effect w-md waves-light">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}   
            </div>
        </div>
    </div>

@endsection