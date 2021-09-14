        <!-- /header -->
        <header class="header_sticky custom-header">
            
            <a href="#menu" class="btn_mobile">
                <div class="hamburger hamburger--spin" id="hamburger">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </a>

            <div style="height: 35px" class="sub-menu sub-menu-custom">
                <div class="container">
                    <ul class="ul-sub-menu-custom" style="display: inline-flex; margin-bottom: 0px; float: right;">
                        @if (!\Auth::user() AND Session::has('temporary_user'))
                            <li class="btn-sub-menu">
                                <a href="{{ route('site.logout') }}">
                                    {{ HelpSite::firstAndLastName() }} - Sair
                                </a>
                            </li>
                        @elseif (!\Auth::user())
                            <li class="btn-sub-menu">
                                <a href="{{ route('site.page_login') }}">
                                    Área Restrita |
                                </a>
                            </li>
                            <li class="btn-sub-menu">
                                <a href="{{ route('adm.email_entry') }}">
                                    Webmail
                                </a>
                            </li>
                        @else
                            @if (in_array('adm.index', HelpAdmin::permissionsUser()))
                                <li class="btn-sub-menu">
                                    <a href="{{ route('adm.index') }}">
                                        @if (HelpAdmin::IsUserDeveloper())
                                            ADM |
                                        @elseif (HelpAdmin::IsUserAdministrator())
                                            Painel do administrador |
                                        @else
                                            {{ HelpSite::firstAndLastName() }} |
                                        @endif
                                    </a>
                                </li>
                                <li class="btn-sub-menu">
                                    <a href="{{ route('site.logout') }}">
                                        Sair
                                    </a>
                                </li>
                            @else
                                <li class="btn-sub-menu">
                                    <a href="{{ route('site.logout') }}">
                                        {{ HelpSite::firstAndLastName() }} - Sair
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
            
            <div class="container menu-site">
                <div class="row" style="margin: 0px 0px">
                    <div class="col-md-3">
                        <div class="">
                            <h1 style="margin-bottom: 0px;">
                                <a href="{{ route('site.index') }}" title="{{ HelpApplicationSetting::getAppName()->app_name }}">
                                    @if (HelpAppearanceSetting::getLogoWhiteBackground())
                                        <img class="logo-site" src="{{ asset(HelpAdmin::getStorageUrl().HelpAppearanceSetting::getLogoWhiteBackground()->logo_for_white_background) }}" alt="logomarca">
                                    @else
                                        ??
                                    @endif
                                </a>
                            </h1>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <nav id="menu" class="main-menu" style="width: 100%;">
                            <ul class="ul_menu_site" style="width: 100%;">
                                @foreach (HelpMenus::TopMenu() as $item)
                                    <li class="default_li li_menu_site">
                                        <span>
                                            @php
                                                $url = '#';
                                                if (isset($item['url']) AND $item['url'] != '#') {
                                                    $url = HelpAdmin::treatsRouteUrl($item['url']);
                                                } elseif (isset($item['file']) AND $item['file'] != '#') {
                                                    $url = asset($item['file']);
                                                } elseif (isset($item['full_url']) AND $item['full_url'] != '#') {
                                                    $url = $item['full_url'];
                                                } else {}
                                            @endphp

                                            <a class="a-menu-site {{ $item['class'] }}" id="{{ $item['id'] }}" target="{{ $item['target'] }}" href="{{ $url }}">
                                                {{ $item['label'] }}
                                                @if ($item['i'] != '#')
                                                    <i class="{{ $item['i'] }}"></i>
                                                @endif
                                            </a>
                                        </span>

                                        @if (isset($item['sub_menu']))
                                            <ul class="ul-menu-site">
                                                @foreach ($item['sub_menu'] as $sub_item)
                                                    @php
                                                        $sub_url = '#';
                                                        if (isset($sub_item['url']) AND $sub_item['url'] != '#') {
                                                            $sub_url = HelpAdmin::treatsRouteUrl($sub_item['url']);
                                                        } elseif (isset($sub_item['file']) AND $sub_item['file'] != '#') {
                                                            $sub_url = asset($sub_item['file']);
                                                        } elseif (isset($sub_item['full_url']) AND $sub_item['full_url'] != '#') {
                                                            $sub_url = $sub_item['full_url'];
                                                        } else {}
                                                    @endphp
                                                    <li class="li_menu_site">
                                                        <a class="a-menu-site" target="{{ $sub_item['target'] }}" href="{{ $sub_url }}">
                                                            {{ $sub_item['label'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach

                                <li id="menu_search" class="hide" style="width: 90%; top: -12px;">
                                    {!! Form::open(['url'=>route('site.posts.list'), 'id'=>'form_menu_search']) !!}
                                        <div class="search_bar_list">
            								{!! Form::text('search', null, ['class'=>'form-control', 'placeholder'=>'', 'style'=>'height: 40px; border: solid 1px #1ab892;']) !!}
                                            <input type="submit" value="Buscar" style="height: 40px; background-color: #1ab892;">
                                        </div>
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </nav>
                        <!-- /main-menu -->
                    </div>
                </div>
            </div>

        </header>
        <!-- /header -->