<header id="header" class="header">
    <div class="container">
        <div class="row display-flex">
            <div class="col-md-2 margin-auto trigger-menu">

                <button type="button" class="navbar-toggle collapsed visible-xs" id="trigger-mobile">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="logo">
                    <a class="logo-wrapper" href="{{ route('home_page') }}" title="{{ config('app.name') }}"><img
                            src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}"></a>
                </div>
            </div>
            <div class="col-md-3 margin-auto">
                <div class="search">
                    <form class="search-bar" action="{{ route('search') }}" method="get" accept-charset="utf-8">
                        <input class="input-search" type="search" name="search_key" placeholder="{{ __('Tìm Kiếm') }}"
                            autocomplete="off">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-7 hd-bg-white main-menu-responsive">
                <div class="main-menu">
                    <div class="nav">
                        <ul>
                            <li class="nav-item {{ Helper::check_active(['home_page']) }}"><a
                                    href="{{ route('home_page') }}" title="{{ __('Home') }}">
                                    <span class="fas fa-home"></span>
                                    {{ __('Home') }}</a>
                            </li>
                            <li class="nav-item {{ Helper::check_active(['about_page']) }}"><a
                                    href="{{ route('about_page') }}" title="{{ __('About us') }}">
                                    <span class="fas fa-info"></span>
                                    {{ __('About us') }}</a>
                            </li>
                            <li
                                class="nav-item dropdown {{ Helper::check_active(['products_page', 'producer_page', 'product_page']) }}">
                                <a href="{{ route('products_page') }}" title="{{ __('Product') }}">
                                    <span class="fas fa-mobile-alt"></span>
                                    {{ __('Product') }} <i class="fas fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <ul class="dropdown-menu-item">
                                        <li>
                                            <h4>{{ __('Menu') }}</h4>
                                            <ul class="dropdown-menu-subitem">
                                                @foreach ($producers as $producer)
                                                    <li
                                                        class="{{ Helper::check_param_active('producer_page', $producer->id) }}">
                                                        <a href="{{ route('producer_page', ['id' => $producer->id]) }}"
                                                            title="{{ $producer->name }}">{{ $producer->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item {{ Helper::check_active(['posts_page', 'post_page']) }}"><a
                                    href="{{ route('posts_page') }}" title="{{ __('News') }}">
                                    <span class="far fa-newspaper"></span>
                                    {{ __('News') }}</a>
                            </li>
                            <li class="nav-item {{ Helper::check_active(['contact_page']) }}"><a
                                    href="{{ route('contact_page') }}" title="{{ __('Contact') }}">
                                    <span class="fas fa-id-card"></span>
                                    {{ __('Contact') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="accout-menu">
                        @if (Auth::guest())
                            <div class="not-logged-menu">
                                <ul>
                                    <li class="menu-item {{ Helper::check_active(['login']) }}"><a
                                            href="{{ route('login') }}" title="{{ __('Login') }}">
                                            <span class="fas fa-user"></span>
                                            {{ __('Login') }}</a>
                                    </li>
                                    <li class="menu-item {{ Helper::check_active(['register']) }}"><a
                                            href="{{ route('register') }}" title="{{ __('Register') }}">
                                            <span class="fas fa-key"></span>
                                            {{ __('Register') }}</a>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <div class="logged-menu">
                                <ul>
                                    <li
                                        class="menu-item dropdown {{ Helper::check_active(['orders_page', 'order_page', 'show_user', 'edit_user']) }}">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                            title="{{ Auth::user()->name }}">
                                            <div class="avatar"
                                                style="background-image: url('{{ Helper::get_image_avatar_url(Auth::user()->avatar_image) }}');">
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu">
                                            @if (Auth::user()->admin)
                                                <li><a href="{{ route('admin.dashboard') }}"><i
                                                            class="fas fa-tachometer-alt"></i> Website Management</a>
                                                </li>
                                            @else
                                                <li class="{{ Helper::check_active(['orders_page', 'order_page']) }}">
                                                    <a href="{{ route('orders_page') }}"><i
                                                            class="fas fa-clipboard-list"></i> Order Management</a>
                                                </li>
                                                <li class="{{ Helper::check_active(['show_user', 'edit_user']) }}"><a
                                                        href="{{ route('show_user') }}"><i class="fas fa-user-cog"></i>
                                                        Account Management</a></li>
                                            @endif
                                            <li><a id="logout" action="#"><i class="fas fa-power-off"></i>
                                                    {{ __('Logout') }}</a></li>
                                        </ul>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header><!-- /header -->

<div class="backdrop__body-backdrop___1rvky"></div>
<div class="mobile-main-menu">
    <div class="mobile-main-menu-top">
        <div class="mb-menu-top-header">
            <div class="mb-menu-logo">
                <a class="logo-wrapper" href="{{ route('home_page') }}" title="{{ config('app.name') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}">
                </a>
            </div>
            <button type="button" id="close-trigger-mobile">
                <i class="fas fa-times"></i>
            </button>
        </div>
        @if (Auth::guest())
            <div class="mb-menu-top-body">
                <div class="mb-menu-user">
                    <div style="background-image: url('{{ asset('images/no_login.svg') }}');"></div>
                </div>
                <div class="mb-menu-info">
                    <div class="info-top">Log in</div>
                    <div class="info-bottom">To get more offers</div>
                </div>
            </div>
            <div class="mb-menu-top-footer">
                <div class="mb-menu-action">
                    <a href="{{ route('login') }}" class="btn btn-success">
                        <i class="fas fa-user"></i> Log in
                    </a>
                </div>
                <div class="mb-menu-action">
                    <a href="{{ route('register') }}" class="btn btn-warning">
                        <i class="fas fa-key"></i> Register
                    </a>
                </div>
            </div>
        @else
            <div class="mb-menu-top-body">
                <div class="mb-menu-user">
                    <div
                        style="background-image: url('{{ Helper::get_image_avatar_url(Auth::user()->avatar_image) }}');">
                    </div>
                </div>
                <div class="mb-menu-info">
                    <div class="info-top">{{ Auth::user()->name }}</div>
                    <div class="info-bottom">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mb-menu-top-footer">
                @if (Auth::user()->admin)
                    <div class="mb-menu-action">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-success">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </div>
                    <div class="mb-menu-action">
                        <a id="mobile-logout" href="javascript:void(0);" class="btn btn-danger">
                            <i class="fas fa-power-off"></i> {{ __('header.Logout') }}
                        </a>
                    </div>
                @else
                    <div class="mb-menu-action">
                        <a href="{{ route('show_user') }}" class="btn btn-success">
                            <span class="fas fa-user-cog"></span> Account
                        </a>
                    </div>
                    <div class="mb-menu-action">
                        <a id="mobile-logout" href="javascript:void(0);" class="btn btn-danger">
                            <i class="fas fa-power-off"></i> {{ __('header.Logout') }}
                        </a>
                    </div>
                @endif
            </div>
        @endif
    </div>
    <div class="mobile-main-menu-middle">
        <div class="mb-menu-middle-header">
            <h3>CATEGORY</h3>
        </div>
        <div class="mb-menu-middle-body">
            <ul>
                <li class="mb-nav-item {{ Helper::check_active(['home_page']) }}"><a href="{{ route('home_page') }}"
                        title="{{ __('header.Home') }}">
                        <span class="fas fa-home"></span>
                        {{ __('header.Home') }}</a>
                </li>
                <li class="mb-nav-item {{ Helper::check_active(['about_page']) }}"><a
                        href="{{ route('about_page') }}" title="{{ __('header.About') }}">
                        <span class="fas fa-info"></span>
                        {{ __('header.About') }}</a>
                </li>
                <li
                    class="mb-nav-item has-item-child {{ Helper::check_active(['products_page', 'producer_page', 'product_page']) }}">
                    <a href="{{ route('products_page') }}" title="{{ __('header.Products') }}">
                        <span class="fas fa-mobile-alt"></span>
                        {{ __('header.Products') }}
                    </a>
                    <button id="action-collapse" data-toggle="collapse" data-target="#item-child-collapse"><i
                            class="fas fa-plus"></i></button>
                    <div id="item-child-collapse" class="collapse">
                        <ul>
                            @foreach ($producers as $producer)
                                <li class="{{ Helper::check_param_active('producer_page', $producer->id) }}"><a
                                        href="{{ route('producer_page', ['id' => $producer->id]) }}"
                                        title="{{ $producer->name }}">{{ $producer->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="mb-nav-item {{ Helper::check_active(['posts_page', 'post_page']) }}"><a
                        href="{{ route('posts_page') }}" title="{{ __('header.News') }}">
                        <span class="far fa-newspaper"></span>
                        {{ __('header.News') }}</a>
                </li>
                <li class="mb-nav-item {{ Helper::check_active(['contact_page']) }}"><a
                        href="{{ route('contact_page') }}" title="{{ __('header.Contact') }}">
                        <span class="fas fa-id-card"></span>
                        {{ __('header.Contact') }}</a>
                </li>
                @if (Auth::check() && !Auth::user()->admin)
                    <li class="mb-nav-item {{ Helper::check_active(['orders_page', 'order_page']) }}"><a
                            href="{{ route('orders_page') }}"><span class="fas fa-clipboard-list"></span> Order
                            form</a></li>
                @endif
            </ul>
        </div>
    </div>
    <div class="mobile-main-menu-bottom">
        <div class="mobile-support">
            <div class="text-support">SUPPORT</div>
            <div class="info-support">
                <i class="fa fa-phone" aria-hidden="true"></i> HOTLINE: <a href="tel: +84 123465789"
                    title="(+84) 123456789">(+84) 12345679</a>
            </div>
            <div class="info-support">
                <i class="fa fa-envelope" aria-hidden="true"></i> EMAIL: <a href="mailto:hoangnghiaduong0@gmail.com"
                    title="hoangnghiaduong0@gmail.com">hoangnghiaduong0@gmail.com</a>
            </div>
        </div>
    </div>
</div>
