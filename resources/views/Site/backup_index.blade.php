<main>
    {{-- Sliders --}}
    <div id="rev_slider_72_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="doctor_slider_1" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <div id="rev_slider_72_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
            <ul>
                @foreach ($data['sliders_site'] as $slider_site)
                    @php
                        $link = '#';
                        if ($slider_site->link != null) {
                            $link = route('site.posts.detail', $slider_site->link);
                        }
                    @endphp
                    <li data-link="{{ $link }}" data-index="rs-{{ $slider_site->id }}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" {{-- data-thumb="assets/100x50_b9dee-42512210_ml.jpg" --}} data-delay="5000" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <img src="{{ asset(HelpSite::getStorageUrlSlider().$slider_site->img) }}" alt="" data-bgposition="center center" {{-- data-kenburns="on" --}} data-duration="10000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="110" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>

                        @if ($slider_site->title != null)
                            <div class="tp-caption tp-resizeme" id="slide-{{ $slider_site->id }}-layer-1"
                                data-x="110"
                                data-y="100"
                                data-width="['auto']"
                                data-height="['auto']"
                                data-type="text"
                                data-responsive_offset="on"
                                data-frames='[{
                                    "delay":510,
                                    "speed":800,
                                    "frame":"0",
                                    "from":"x:50px;opacity:0;",
                                    "to":"o:1;",
                                    "ease":"Power4.easeOut"},
                                    {"delay":"+3260","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                style="z-index: 5; white-space: nowrap; font-size: 40px; line-height: 22px; font-weight: 700; color: #3f4177;font-family:Poppins;text-transform:uppercase;background-color:rgba(0, 122, 255, 0);">
                                {{ str_limit($slider_site->title, '40') }}
                            </div>
                        @endif
                        @if ($slider_site->subtitle != null)
                            <div class="tp-caption tp-resizeme" id="slide-{{ $slider_site->id }}-layer-2" 
                                data-x="120"
                                data-y="135"
                                data-width="['auto']"
                                data-height="['auto']"
                                data-type="text"
                                data-responsive_offset="on"
                                data-frames='[{
                                    "delay":1170,
                                    "speed":800,
                                    "frame":"0",
                                    "from":"x:50px;opacity:0;",
                                    "to":"o:1;",
                                    "ease":"Power3.easeInOut"},
                                    {"delay":"+2730",
                                    "speed":300,
                                    "frame":"999",
                                    "to":"opacity:0;",
                                    "ease":"Power3.easeInOut"}]' 
                                data-textAlign="['inherit','inherit','inherit','inherit']" 
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                style="z-index: 6; white-space: nowrap; font-size: 30px; line-height: 22px; font-weight: 700; color: #3f4177;font-family:Poppins;text-transform:uppercase;">
                                {{ str_limit($slider_site->subtitle, '50') }}
                            </div>
                        @endif

                        {{-- @if ($slider_site->link != null)
                            <a class="btn_1" style="font-size: 20px; position: absolute; top: 520px; margin-left: 45%;" href="{{ route('site.posts.detail', $slider_site->link) }}" target="{{ $slider_site->target }}">
                                Saiba mais
                            </a>
                        @endif --}}
                    </li>
                @endforeach
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>

    {{-- Guia médico --}}
    <!-- <div class="bg_color_1 padding_t_20">
        <div style="height: auto; background: #77d6ce !important;" class="hero_home version_3">
            <div style="padding: 3% 4%;" class="content">
                <h3>Guia médico</h3>
                <p class="m-b-10" style="margin-bottom: 20px !important;">
                    Encontre médicos, clínicas, laboratórios, hospitais e parceiros que possam te atender. Clique no botão abaixo.
                </p>
                <a href="#" class="btn_1 medium">Acessar</a>
            </div>
        </div>
    </div> -->

    {{-- Calendario da saude / Plano aberto --}}
    <!-- @php $health_calendar = HelpPosts::getHealthCalendar() @endphp
    <div class="bg_color_1 pt-0">
        <div class="container margin_30_30">
            {{-- <div class="main_title">
                <h2>Discover the <strong>online</strong> appointment!</h2>
                <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel.</p>
            </div> --}}
            <div class="row">
                @if ($health_calendar)
                    <div class="col-md-8 div_health_calendar">
                        <a href="{{ route('site.posts.detail', $health_calendar->id) }}">
                            <h3 class="title_health_calendar" style="position: absolute;
                            color: white;
                            bottom: 10px;
                            right: 30px;
                            font-size: 28px;">
                                Calendário da saúde
                            </h3>
                            <img style="width: 100%" src="{{ asset(HelpAdmin::getStorageUrl().$health_calendar->image_banner) }}" alt="">
                        </a>
                    </div>
                @endif
                <div class="col-md-4">
                    <a href="https://www.youtube.com/watch?v=7l5kx97EhqY" target="_blank">
                        <iframe width="560" height="100%" src="https://www.youtube.com/embed/CIIefBGaEW4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        {{-- <div style="padding: 52px 45px 52px 45px;" class="box_feat box_open_plan custom-box-feat mb-0">
                            <i style="font-size: 70px;" class="icon-youtube-play"></i>
                            <h3 style="font-size: 20px;" class="title_open_plan">
                                Plano aberto
                            </h3>
                        </div> --}}
                    </a>
                </div>
                {{-- <div class="col-md-6">
                    <a href="{{ route('site.ombudsman') }}">
                        <div class="box_feat custom-box-feat mb-0">
                            <i style="font-size: 70px;" class="icon-phone"></i>
                            <h3 style="font-size: 20px;">
                                Ouvidoria
                            </h3>
                        </div>
                    </a>
                </div> --}}
            </div>
        </div>
    </div> -->

    {{-- Carteria digital Casembrapa / Portal do beneficiário / CREDENCIADO --}}
    <div class="cta_subscribe" style="margin-top: 20px; margin-bottom: 20px;">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-3 p-0">
                    <div style="height: 300px; padding: 20px 20px 20px 20px;" class="block_1">
                        <i style="font-size: 70px;" class="pe-7s-id p-b-10"></i>
                        <h3>Carteirinha digital</h3>
                        <p>
                            Clique no botão abaixo e acesse a sua<br> carteirinha digital e a de seus dependentes
                        </p>
                        <a href="{{ route('site.user.validate_cpf', ['target'=>'digital_wallet']) }}" class="btn_1">Acessar</a>
                    </div>
                </div>
                <div class="col-md-3 p-0">
                    <div style="height: 300px; padding: 20px 20px 20px 20px;" class="block_2">
                        <i style="font-size: 70px;" class="pe-7s-user p-b-10"></i>
                        <h3>Área do Beneficiário</h3>
                        <p>
                            Clique aqui e encontre conteúdos produzidos<br> especialmente para você e sua família
                        </p>
                        <a href="{{ route('site.recipient') }}" class="btn_1">Acessar</a>
                    </div>
                </div>
                <div class="col-md-3 p-0">
                    <div style="height: 300px; padding: 20px 20px 20px 20px;" class="block_1">
                        <i style="font-size: 70px;" class="pe-7s-users p-b-10"></i>
                        <h3>Área do Credenciado</h3>
                        <p>
                            Acesse nossos sistemas e confira dados<br> sobre autorização e faturamento
                        </p>
                        <a href="{{ route('site.accreditation') }}" class="btn_1">Acessar</a>
                    </div>
                </div>
                <div class="col-md-3 p-0">
                    <div style="height: 300px; padding: 20px 20px 20px 20px;" class="block_2">
                        <i style="font-size: 70px;" class="pe-7s-headphones p-b-10"></i>
                        <h3>Telemedicina</h3>
                        <p>
                            Pronto Atendimento
                        </p>
                        <a target="_blank" href="https://www.liviasaude.com.br/" class="btn_1">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- NOTICIAS EM DESTAQUE --}}
    {{-- @php $featureds_posts = HelpPosts::getFeaturedPost(5) @endphp
    <div class="bg_color_1">
        <div class="container margin_30_30">
            <div class="main_title">
                <h2>Notícias em destaque</h2>
            </div>
            <div class="row">
                @foreach ($featureds_posts->take(3) as $featured_post)
                    <div class="col-md-4">
                        <div class="box_list home">
                            <figure style="height: unset;">
                                <a href="{{ route('site.posts.detail', $featured_post->Post->id) }}">
                                    @if ($featured_post->Post->image_spotlight != null)
                                        <img class="width-100" src="{{ asset(HelpAdmin::getStorageUrl().$featured_post->Post->image_spotlight) }}" alt="">
                                    @else
                                        <img class="width-100" src="{{ asset(HelpAdmin::getStorageUrl().$featured_post->Post->image_banner) }}" alt="">
                                    @endif										
                                </a>
                                <div class="preview">
                                    <a href="{{ route('site.posts.detail', $featured_post->Post->id) }}">
                                        <span>Leia mais</span>
                                    </a>
                                </div>
                            </figure>
                            <div class="wrapper card-featured-post p-t-10 p-b-10">
                                <h3>
                                    <a href="{{ route('site.posts.detail', $featured_post->Post->id) }}">
                                        {{ str_limit($featured_post->Post->title, 95, '...') }}
                                    </a>
                                </h3>
                                <p class="mb-0">
                                    <a href="{{ route('site.posts.detail', $featured_post->Post->id) }}" class="text-black">
                                        {!! str_limit($featured_post->Post->thin_line, 180, '...') !!}
                                    </a>
                                </p>
                            </div>

                            <ul class="box_date_and_read_more wrapper p-t-15 p-b-15">
                                <li>
                                    {{ $featured_post->Post->created_at->format('d-m-Y') }}
                                </li>
                                <li>
                                    <a class="a_read_more" href="{{ route('site.posts.detail', $featured_post->Post->id) }}">Leia mais</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                @foreach ($featureds_posts->skip(3) as $featured_post)
                    <div class="col-md-6">
                        <div class="custom-strip-list strip_list wow fadeIn">
                            <div style="min-height: 140px;">
                                <h3>
                                    <a href="{{ route('site.posts.detail', $featured_post->Post->id) }}">
                                        {{ str_limit($featured_post->Post->title, 90, '...') ?? '' }}
                                    </a>
                                </h3>
                                <p class="mb-0">
                                    {!! str_limit($featured_post->Post->thin_line, 130, '...') ?? '' !!}
                                </p>
                            </div>
                            
                            <ul>
                                <li>{{ $featured_post->Post->created_at->format('d-m-Y') }}</li>
                                <li>
                                    <a href="{{ route('site.posts.detail', $featured_post->Post->id) }}">Leia mais</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    {{-- Corona --}}
    {{-- <div class="bg_color_1">
        <div style="height: auto; background: #98d5cd !important;" class="hero_home version_3">
            <div style="padding: 3% 4%;" class="content">
                <h3 style="font-size: 40px;">Casembrapa informa:</h3>
                <p style="font-size: 30px;" class="m-b-10">
                    Coronavírus
                </p>
                <a href="{{ route('site.coronavirus') }}" class="btn_1 medium">Acessar</a>
            </div>
        </div>
    </div> --}}

    {{-- Ultimas noticias --}}
    {{-- @php $last_posts = HelpPosts::getLastPosts(5); @endphp
    <div class="bg_color_1">
        <div class="container margin_30_30">
            <div class="main_title">
                <h1>Últimas noticias</h1>
                <p>Confira aqui todas as nossas últimas noticias</p>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <article class="blog wow fadeIn">
                        <div class="row no-gutters">
                            @if ($last_posts->first()->image_spotlight == null AND $last_posts->first()->image_banner == null)
                                <div class="col-md-12">
                                    <div class="post_info" style="min-height: auto;">
                                        <small>
                                            {{ $last_posts->first()->created_at->format('d-m-Y') }}
                                        </small>
                                        <h3>
                                            <a href="{{ route('site.posts.detail', $last_posts->first()->id) }}">
                                                {{ str_limit($last_posts->first()->title, 95, '...') }}
                                            </a>
                                        </h3>
                                        
                                        <a href="{{ route('site.posts.detail', $last_posts->first()->id) }}" class="text-black">
                                            {!! str_limit($last_posts->first()->thin_line, 180, '...') !!}
                                        </a>
                                        
                                        <p class="m-b-10">
                                            <a href="{{ route('site.posts.detail', $last_posts->first()->id) }}">Leia mais</a>
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-7">
                                    <figure>
                                        <a href="{{ route('site.posts.detail', $last_posts->first()->id) }}">
                                            @if ($last_posts->first()->image_spotlight != null)
                                                <img style="height: 100%;" src="{{ asset(HelpAdmin::getStorageUrl().$last_posts->first()->image_spotlight) }}" alt="">
                                            @else
                                                <img style="width: 100%; height: auto;" src="{{ asset(HelpAdmin::getStorageUrl().$last_posts->first()->image_banner) }}" alt="">
                                            @endif
                                            <div class="preview">
                                                <span>Leia mais</span>
                                            </div>
                                        </a>
                                    </figure>
                                </div>
                                <div class="col-md-5">
                                    <div class="post_info">
                                        <small>
                                            {{ $last_posts->first()->created_at->format('d-m-Y') }}
                                        </small>
                                        <h3>
                                            <a href="{{ route('site.posts.detail', $last_posts->first()->id) }}">
                                                {{ str_limit($last_posts->first()->title, 95, '...') }}
                                            </a>
                                        </h3>
                                        
                                        <a href="{{ route('site.posts.detail', $last_posts->first()->id) }}" class="text-black">
                                            {!! str_limit($last_posts->first()->thin_line, 180, '...') !!}
                                        </a>
                                        
                                        <p>
                                            <a href="{{ route('site.posts.detail', $last_posts->first()->id) }}">Leia mais</a>
                                        </p>
    
                                        <ul>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </article>
                </div>
                
                <aside class="col-md-3">
                    <div class="widget">
                        <ul class="comments-list">
                            @foreach ($last_posts->skip(1) as $post)
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
                </aside>
            </div>

            <p class="text-center add_top_30">
                <a href="{{ route('site.posts.list') }}" class="btn_1 medium">Ver todas as notícias</a>
            </p>
        </div>
    </div> --}}

    {{-- <div class="bg_color_1">
        <div class="container margin_30_30">
            <div class="main_title">
                <a href="{{ route('site.lgpd') }}">
                    <img class="img_lgpd_full" src="{{ asset('logos/lgpd_full.png') }}" alt="">
                </a>
            </div>
        </div>
    </div> --}}

    {{-- <div class="bg_color_1">
        <div class="container margin_60_60">
            <div class="main_title">
                <h2>Our founders</h2>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            </div>
            <div id="staff" class="owl-carousel owl-theme">
                <div class="item ">
                    <div class="col-md-6">
                        <a href="detail-page.html">
                            <div class="title">
                                <h4>Julia Holmes<em>CEO</em></h4>
                            </div><img src="http://via.placeholder.com/350x500.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="detail-page.html">
                            <div class="title">
                                <h4>Julia Holmes<em>CEO</em></h4>
                            </div><img src="http://via.placeholder.com/350x500.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <!-- /carousel -->
        </div>
    </div> --}}
    
    {{-- <div class="container margin_60_60">
        <div class="main_title">
            <h2>What user says about us</h2>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="about-review">
                    <div class="rating">
                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i> <strong>Satisfied!</strong>
                    </div>
                    <p>"Elitr doming consetetur ut has, noluisse interesset te vis. Nemore habemus mea at, has no probo mucius omittam. Scripta numquam eruditi ad pri, quo docendi vivendum ea. "</p>
                    <div class="user_review">
                        <figure><img src="http://via.placeholder.com/160x160.jpg"></figure>
                        <h4>Dr. Julia Roberts<span>Doctor</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-review">
                    <div class="rating">
                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i> <strong>Satisfied!</strong>
                    </div>
                    <p>"Elitr doming consetetur ut has, noluisse interesset te vis. Nemore habemus mea at, has no probo mucius omittam. Scripta numquam eruditi ad pri, quo docendi vivendum ea. "</p>
                    <div class="user_review">
                        <figure><img src="http://via.placeholder.com/160x160.jpg"></figure>
                        <h4>Dr. Julia Roberts<span>Doctor</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-review">
                    <div class="rating">
                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i> <strong>Satisfied!</strong>
                    </div>
                    <p>"Elitr doming consetetur ut has, noluisse interesset te vis. Nemore habemus mea at, has no probo mucius omittam. Scripta numquam eruditi ad pri, quo docendi vivendum ea. "</p>
                    <div class="user_review">
                        <figure><img src="http://via.placeholder.com/160x160.jpg"></figure>
                        <h4>Dr. Julia Roberts<span>Doctor</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg_color_1">
        <div class="container margin_60_60">
            <div class="main_title">
                <h2>Why Choose Findoctor</h2>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a class="box_feat_about" href="#0">
                        <i class="pe-7s-id"></i>
                        <h3>+ 5575 Doctors</h3>
                        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="box_feat_about" href="#0">
                        <i class="pe-7s-help2"></i>
                        <h3>H24 Support</h3>
                        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="box_feat_about" href="#0">
                        <i class="pe-7s-date"></i>
                        <h3>Instant Booking</h3>
                        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}

</main>