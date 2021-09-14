@extends('Admin.layout.layout')
@section('title', 'Editando pesquisa')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {!! Form::model($data['evaluation'], ['route'=>'adm.evaluation.update']) !!}
                    {!! Form::hidden('evaluation[id]', $data['evaluation']->id) !!}
                
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Nome*</label>
                                @if ($errors->has('evaluation.name'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('evaluation.name')) }}
                                    </small>
                                @endif
                                {!! Form::text('evaluation[name]', $data['evaluation']->name, ['id'=>'name', 'class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                <label for="description">Descrição</label>
                                @if ($errors->has('evaluation.description'))
                                    <small class="text-danger font-bold">
                                        {{ $errors->first(('evaluation.description')) }}
                                    </small>
                                @endif
                                {!! Form::textarea('evaluation[description]', $data['evaluation']->description, ['id'=>'description', 'class'=>'form-control', 'rows'=>'3']) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="m-t-0 m-b-10 header-title">
                                        Configurações da pesquisa
                                    </h4>
                                </div>
                            </div>
    
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="allow_specific_groups_of_users">Direcionar a grupos de usuários específicos</label>
                                        @if ($errors->has('evaluation_settings.allow_specific_groups_of_users'))
                                            <small class="text-danger font-bold">
                                                {{ $errors->first(('evaluation_settings.allow_specific_groups_of_users')) }}
                                            </small>
                                        @endif
                                        <div class="check-box-position">
                                            {!! Form::checkbox('evaluation_settings[allow_specific_groups_of_users]', 1, $data['evaluation_settings']->allow_specific_groups_of_users, [
                                                'data-plugin'=>"switchery",
                                                'data-color'=>"#188ae2",
                                                'data-size'=>"small"])
                                            !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="send_notification_for_each_assessment">Notificar a cada pesquisa completa</label>
                                        @if ($errors->has('evaluation_settings.send_notification_for_each_assessment'))
                                            <small class="text-danger font-bold">
                                                {{ $errors->first(('evaluation_settings.send_notification_for_each_assessment')) }}
                                            </small>
                                        @endif
                                        <div class="check-box-position">
                                            {!! Form::checkbox('evaluation_settings[send_notification_for_each_assessment]', 1, $data['evaluation_settings']->send_notification_for_each_assessment, [
                                                'data-plugin'=>"switchery",
                                                'data-color'=>"#188ae2",
                                                'data-size'=>"small"])
                                            !!}
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="answered_only_once_per_user">Pesquisa única por usuário</label>
                                        @if ($errors->has('evaluation_settings.answered_only_once_per_user'))
                                            <small class="text-danger font-bold">
                                                {{ $errors->first(('evaluation_settings.answered_only_once_per_user')) }}
                                            </small>
                                        @endif
                                        <div class="check-box-position">
                                            {!! Form::checkbox('evaluation_settings[answered_only_once_per_user]', 1, $data['evaluation_settings']->answered_only_once_per_user, [
                                                'data-plugin'=>"switchery",
                                                'data-color'=>"#188ae2",
                                                'data-size'=>"small"])
                                            !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="login_required">Login obrigatório</label>
                                        @if ($errors->has('evaluation_settings.login_required'))
                                            <small class="text-danger font-bold">
                                                {{ $errors->first(('evaluation_settings.login_required')) }}
                                            </small>
                                        @endif
                                        <div class="check-box-position">
                                            {!! Form::checkbox('evaluation_settings[login_required]', 1, $data['evaluation_settings']->login_required, [
                                                'data-plugin'=>"switchery",
                                                'data-color'=>"#188ae2",
                                                'data-size'=>"small"])
                                            !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-t-10">
                        <div class="col-md-8">
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block btn-trans">
                                    Atualizar
                                </button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-0">
                                <a href="{{ route('adm.evaluation.report', $data['evaluation']->id) }}" class="btn btn-warning btn-block btn-trans">
                                    Relatório
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-0">
                                <a href="{{ route('site.completed_evaluations.new', $data['evaluation']->id) }}" target="_blank" class="btn btn-warning btn-block btn-trans">
                                    Visualizar
                                </a>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}   
            </div>
        </div>
    </div>

    <div class="row">
        {{-- <a href="{{ route('adm.image_for_evaluation.list', $data['evaluation']->id) }}" class="col-md-3">
            <div class="card-box">
                <h4 class="header-title mt-0 m-b-10">Imagens anexadas</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2">
                        <h2 class="mb-0 text-danger">
                            {{ $data['images_for_evaluation'] }}
                        </h2>
                        <p class="text-muted m-b-20">Registros</p>
                    </div>
                    <div class="progress progress-bar-danger-alt progress-sm mb-0">
                        <div class="progress-bar progress-bar-danger" role="progressbar"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                            style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </a> --}}

        <a href="{{ route('adm.question_topic.list', $data['evaluation']->id) }}" class="col-md-4">
            <div class="card-box">
                <h4 class="header-title mt-0 m-b-10">Tópicos criados</h4>
 
                <div class="widget-box-2">
                    <div class="widget-detail-2">
                        <h2 class="mb-0 text-primary">
                            {{ $data['question_topics'] }}
                        </h2>
                        <p class="text-muted m-b-20">Registros</p>
                    </div>
                    <div class="progress progress-bar-primary-alt progress-sm mb-0">
                        <div class="progress-bar progress-bar-primary" role="progressbar"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                            style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a href="{{ route('adm.available_question.list', $data['evaluation']->id) }}" class="col-md-4">
            <div class="card-box">
                <h4 class="header-title mt-0 m-b-10">Perguntas registradas</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2">
                        <h2 class="mb-0 text-success">
                            {{ $data['available_questions'] }}
                        </h2>
                        <p class="text-muted m-b-20">Registros</p>
                    </div>
                    <div class="progress progress-bar-success-alt progress-sm mb-0">
                        <div class="progress-bar progress-bar-success" role="progressbar"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                            style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </a>
        
        <a href="#" class="col-md-4">
            <div class="card-box">
                <h4 class="header-title mt-0 m-b-10">Pesquisas finalizadas</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2">
                        <h2 class="mb-0 text-warning">
                            {{ $data['completed_evaluations'] }}
                        </h2>
                        <p class="text-muted m-b-20">Registros</p>
                    </div>
                    <div class="progress progress-bar-warning-alt progress-sm mb-0">
                        <div class="progress-bar progress-bar-warning" role="progressbar"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                            style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

@endsection