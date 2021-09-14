@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - Notícias publicadas
@stop

@section('content')
    <main>

        <div class="container margin_60">
			<div class="main_title">
				<h1>Notícias publicadas</h1>
				{{-- <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel.</p> --}}
			</div>
			<div class="row">
				<div class="col-md-9">
					@if ($data['posts']->count())
						@foreach ($data['posts'] as $post)
							@php
								$post->title = str_replace(['<strong>', '</strong>'], '', $post->title);
								$post->thin_line = str_replace(['<strong>', '</strong>'], '', $post->thin_line);
							@endphp
							<article class="blog wow fadeIn">
								<div class="row no-gutters">
									@if (!Storage::exists($post->image_spotlight) AND !Storage::exists($post->image_banner))
										<div class="col-md-12">
											<div style="height: 210px !important; min-height: unset;" class="post_info">
												<small>
													{{ $post->created_at->format('d-m-y') }}
												</small>
												@if (\Auth::user() AND in_array('adm.post.edit', HelpAdmin::permissionsUser()))
													<a class="float-right" href="{{ route('adm.post.edit', $post) }}" target="_blank">Editar</a>
												@endif

												<h3>
													<a href="{{ route('site.posts.detail', $post->id) }}">
														{{ str_limit($post->title, 95, '...') }}
													</a>
												</h3>

												<a href="{{ route('site.posts.detail', $post->id) }}" class="text-black">
													{!! str_limit($post->thin_line, 180, '...') !!}
												</a>
												
												<ul>
													{{-- <li style="padding-left: 15px;">
														Autoria: Jessica Hoops
													</li> --}}
													<li>
														<a href="{{ route('site.posts.detail', $post->id) }}">Leia mais</a>
													</li>
												</ul>
											</div>
										</div>
									@else
										<div class="col-md-5">
											<figure style="max-height: 230px !important;">
												<a href="{{ route('site.posts.detail', $post->id) }}">
													@if ($post->image_banner != null)
														<img class="img-list-post-banner" src="{{ asset(HelpAdmin::getStorageUrl().$post->image_banner) }}" alt="">
													@else
														<img class="img-list-post-spotlight" src="{{ asset(HelpAdmin::getStorageUrl().$post->image_spotlight) }}" alt="">
													@endif
													<div class="preview">
														<span>Leia mais</span>
													</div>
												</a>
											</figure>
										</div>
										<div class="col-md-7">
											<div style="height: 230px !important; min-height: unset; padding: 10px 20px;" class="post_info">
												<small>
													{{ $post->created_at->format('d-m-y') }}
												</small>
												@if (\Auth::user() AND in_array('adm.post.edit', HelpAdmin::permissionsUser()))
													<a class="float-right" href="{{ route('adm.post.edit', $post) }}" target="_blank">Editar</a>
												@endif

												<h3>
													<a href="{{ route('site.posts.detail', $post->id) }}">
														{{ str_limit($post->title, 95, '...') }}
													</a>
												</h3>

												<a href="{{ route('site.posts.detail', $post->id) }}" class="text-black">
													{!! str_limit($post->thin_line, 180, '...') !!}
												</a>
												
												<ul>
													{{-- <li style="padding-left: 15px;">
														Autoria: Jessica Hoops
													</li> --}}
													<li>
														<a href="{{ route('site.posts.detail', $post->id) }}">Leia mais</a>
													</li>
												</ul>
											</div>
										</div>
									@endif
								</div>
							</article>
						@endforeach
						
						<ul class="pagination">
							<li>
								{{ $data['posts']->appends($filters)->links() }}
							</li>
						</ul>
					@else
						<h4 style="text-align: center;">Nenhuma notícia foi encontrada</h4>
					@endif
				</div>
				
				<div class="col-md-3">
					
					@if (count($filters))
						Notícias filtradas: {{ $data['posts']->total() }}
						<br>
						<a href="{{ route('site.posts.list') }}">
							<strong>
								Remover filtros
							</strong>
						</a>
						<hr class="m-b-10">
					@endif

					{{-- Buscar --}}
					<div class="widget">
						{!! Form::model($filters, ['url'=>route('site.posts.list')]) !!}
							<div class="form-group">
								{!! Form::text('search', null, ['id'=>'search', 'class'=>'form-control', 'placeholder'=>'Buscar notícia']) !!}
							</div>
							<button type="submit" id="submit" class="btn_1 btn-block border-r-0">Buscar</button>
						{!! Form::close() !!}
					</div>

					@php $last_posts = HelpPosts::getLastPosts(5); @endphp
					<div class="widget">
						<div class="widget-title">
							<h4>Últimas notícias</h4>
						</div>
						<ul class="comments-list">
							@foreach ($last_posts as $post)
							<li>
								<div class="alignleft mini-block-posts">
									<a href="{{ route('site.posts.detail', $post->id) }}">
										@if ($post->image_spotlight != null)
											<img src="{{ asset(HelpAdmin::getStorageUrl().$post->image_spotlight) }}" alt="">
										@else
											<img src="{{ asset(HelpAdmin::getStorageUrl().$post->image_banner) }}" alt="">
										@endif
									</a>
								</div>
								<small>
									{{ $post->created_at->format('d-m-Y') }}
								</small>
								<h3>
									<a href="{{ route('site.posts.detail', $post->id) }}" title="">
										{{ str_limit($post->title, 45, '...') }}
									</a>
								</h3>
							</li>
							@endforeach
						</ul>
					</div>

					{{-- Categorias --}}
					<div class="widget">
						<div class="widget-title">
							<h4>Categorias</h4>
						</div>
						<ul class="cats">
							@foreach ($data['categories'] as $category)
								<li>
									<a href="{{ route('site.posts.list', ['category_post_id'=>$category->id]) }}">
										{{ $category->name }}
										<span>({{ $category->PostsHasCategoriesPosts()->count() }})</span>
									</a>
								</li>
							@endforeach
						</ul>
					</div>

					{{-- Tags --}}
					{{-- <div class="widget">
						<div class="widget-title">
							<h4>Tags</h4>
						</div>
						<div class="tags">
							@foreach ($data['tags'] as $tag)
								<a href="{{ route('site.posts.list', ['tag_post_id'=>$tag->id]) }}">
									{{ $tag->name }}
								</a>
							@endforeach
						</div>
					</div> --}}
				</div>
			</div>
		</div>

    </main>
@endsection