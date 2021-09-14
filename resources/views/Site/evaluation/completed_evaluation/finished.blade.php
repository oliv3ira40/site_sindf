@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Pesquisa encerrada
@stop

@section('content')
    <main>

        <div class="container margin_60_60">
			<div class="main_title">
				<h2>{{ $data['evaluation']->name }}</h2>
			</div>
			<div class="row">
				<div class="col-md-12 ml-auto">
					<div class="box_general">
                        {{-- <h3>{{ $data['evaluation']->name }}</h3> --}}
                        <div class="text-center">
                            <h5>
                                Pesquisa encerrada
                            </h5>
                        </div>
					</div>
				</div>
			</div>
		</div>

    </main>
@endsection