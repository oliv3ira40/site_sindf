@extends('Admin.layout.layout')
@section('title', 'Configurações de aparência')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">Editando Aparência</h4>
                {!! Form::open([
                    'url'=>route('adm.application_appearance_settings.update'),
                    'files'=>'true'
                ]) !!}
                    {!! Form::hidden('old_logo_for_white_background', $data['application_appearance_setting']->logo_for_white_background) !!}
                    {{-- {!! Form::hidden('old_logo_for_black_background', $data['application_appearance_setting']->logo_for_black_background) !!} --}}
                    {!! Form::hidden('old_reduced_logo', $data['application_appearance_setting']->reduced_logo) !!}
                    {!! Form::hidden('old_favicon', $data['application_appearance_setting']->favicon) !!}

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="logo_for_white_background" class="col-form-label">
                                Logo para fundo branco
                                @if ($errors->has('logo_for_white_background'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('logo_for_white_background') }}
                                    </small>
                                @endif
                            </label>
                            @if ($data['application_appearance_setting']->logo_for_white_background)
                                <input type="file" name="logo_for_white_background" class="dropify" data-default-file="{{ asset(HelpAdmin::getStorageUrl().$data['application_appearance_setting']->logo_for_white_background) }}"/>
                            @else
                                <input type="file" name="logo_for_white_background" class="dropify"/>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="reduced_logo" class="col-form-label">
                                Logo reduzida
                                @if ($errors->has('reduced_logo'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('reduced_logo') }}
                                    </small>
                                @endif
                            </label>
                            @if ($data['application_appearance_setting']->reduced_logo)
                                <input type="file" name="reduced_logo" class="dropify" data-default-file="{{ asset(HelpAdmin::getStorageUrl().$data['application_appearance_setting']->reduced_logo) }}"/>
                            @else
                                <input type="file" name="reduced_logo" class="dropify"/>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="favicon" class="col-form-label">
                                Favicon
                                @if ($errors->has('favicon'))
                                    <small class="text-danger txt-trans-initial font-bold">
                                        {{ $errors->first('favicon') }}
                                    </small>
                                @endif
                            </label>
                            @if ($data['application_appearance_setting']->favicon)
                                <input type="file" name="favicon" class="dropify" data-default-file="{{ asset(HelpAdmin::getStorageUrl().$data['application_appearance_setting']->favicon) }}"/>
                            @else
                                <input type="file" name="favicon" class="dropify"/>
                            @endif
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