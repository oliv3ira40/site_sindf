@extends('Site.layout.layout')
@section('title')
    @if (HelpApplicationSetting::getAppName())
        {{ HelpApplicationSetting::getAppName()->app_name }}
    @endif
    - {{ $data['post']->title }}
@stop
@section('keywords')
	<meta name="keywords" content="{{ $data['post']->metakey }}">
@stop

@section('content')
    <main>

        <div class="container margin_60">
			<div class="row">
				<div class="col-md-9">
					<div class="bloglist singlepost">
						@if (\Auth::user() AND in_array('adm.post.edit', HelpAdmin::permissionsUser()))
							<a class="float-right" href="{{ route('adm.post.edit', $data['post']) }}" target="_blank">Editar</a>
						@endif
						<p>
							@if ($data['post']->image_spotlight != null)
								<img width="100%;" src="{{ asset(HelpAdmin::getStorageUrl().$data['post']->image_spotlight) }}" alt="">
							@else
								<img width="100%;" src="{{ asset(HelpAdmin::getStorageUrl().$data['post']->image_banner) }}" alt="">
							@endif
						</p>
						<h1>
							{!! nl2br($data['post']->title) !!}
						</h1>
						<p style="font-style: italic;" class="m-b-10">
							{!! nl2br($data['post']->thin_line) !!}
						</p>
						<div class="postmeta">
							<ul>
								<li>
									<a href="#">
										<i class="icon_clock_alt"></i>
										{{ $data['post']->created_at->format('d-m-Y') }}
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icon_pencil-edit"></i>
										{{ HelpAdmin::completName($data['post']->Author) }}
									</a>
								</li>
								{{-- <li>
									<a href="#">
										<i class="icon_comment_alt"></i>
										(14) Comments
									</a>
								</li> --}}
							</ul>
						</div>
						<div class="post-content">
							{!! nl2br(HelpPosts::treatImgPostContent($data['post']->content)) !!}
						</div>
					</div>
				</div>
				
				<div class="col-md-3">
					{{-- Todos as noticias / artigos --}}
					<h4>
						<a href="{{ route('site.posts.list') }}">
							<strong>
								Todos as notícias
							</strong>
						</a>
					</h4>
					<hr class="m-b-10">
					
					{{-- Buscar --}}
					<div class="widget">
						{!! Form::open(['url'=>route('site.posts.list')]) !!}
							<div class="form-group">
								{!! Form::text('search', null, ['id'=>'search', 'class'=>'form-control', 'placeholder'=>'Buscar notícia']) !!}
							</div>
							<button type="submit" id="submit" class="btn_1 btn-block border-r-0">Buscar</button>
						{!! Form::close() !!}
					</div>

					@php $last_posts = HelpPosts::getLastPosts(5); @endphp
					<div class="widget">
						<div class="widget-title">
							<h4>Ultimas notícias</h4>
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
								<h3 style="margin-top: 0px;">
									<a href="{{ route('site.posts.detail', $post->id) }}" title="">
										{{ str_limit($post->title, 35, '...') }}
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

					{{-- Tags populares --}}
					<div class="widget">
						<div class="widget-title">
							<h4>Tags populares</h4>
						</div>
						<div class="tags">
							@foreach ($data['tags'] as $tag)
								<a href="{{ route('site.posts.list', ['tag_post_id'=>$tag->id]) }}">
									{{ $tag->name }}
								</a>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>

    </main>
@endsection