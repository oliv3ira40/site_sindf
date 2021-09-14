@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Página não encontrada
@stop

@section('content')
    <main>

        <div id="error_page">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-md-10">
						<h2>404 <i class="icon_error-triangle_alt"></i></h2>
						<p>Desculpe, mas a página que você estava procurando não existe.</p>
						{{-- <form>
							<div class="search_bar_error">
								<input type="text" class="form-control" placeholder="What are you looking for?">
								<input type="submit" value="Search">
							</div>
						</form> --}}
					</div>
				</div>
			</div>
		</div>

    </main>
@endsection