@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Teste
@stop

@section('content')
    <main>
		<div class="bg_color_1">
			<div class="container margin_60_60">
				<div class="main_title">
					<h2>Teste</h2>
				</div>
			</div>
		</div>
	</main>
@endsection