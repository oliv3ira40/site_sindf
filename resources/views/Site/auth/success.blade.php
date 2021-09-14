@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Logado com sucesso!
@stop

@section('content')
    <main>
        <div class="bg_color_2 m-b-20 m-t-20">
			<div class="container margin_35_35 padding_35_35">
				<div id="login">
					<h1>Logado com sucesso!</h1>
					<div class="box_form">
                        <h6>
                            A partir de agora você já tem acesso as áreas restritas, <a href="{{ $redirect }}">clique aqui</a> para voltar ao site
                        </h5>
					</div>
				</div>
			</div>
		</div>
    </main>
@endsection