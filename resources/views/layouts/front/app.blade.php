<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="Modern Laravel Shop">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">

    @yield('css')
    <meta property="og:url" content="{{ request()->url() }}"/>
    @yield('og')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}"></script>
</head>
<body>
<noscript>
    <p class="alert alert-danger">
        You need to turn on your javascript. Some functionality will not work if this is disabled.
        <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
    </p>
</noscript>
<section>
    <div class="row hidden-xs">
        <div class="container">
            <div class="clearfix"></div>
            <div class="pull-right">
                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->check())
                        <li><a href="#{{--{{ route('accounts', ['tab' => 'profile']) }}--}}"><i class="fa fa-home"></i> My Account</a></li>
                        <li><a href="#{{--{{ route('logout') }}--}}"><i class="fa fa-sign-out"></i> Logout</a></li>
                    @else
                        <li><a href="#{{--{{ route('login') }}--}}"> <i class="fa fa-lock"></i> Login</a></li>
                        <li><a href="#{{--{{ route('register') }}--}}"> <i class="fa fa-sign-in"></i> Register</a></li>
                    @endif
                    <li id="cart" class="menubar-cart">
                        <a href="{{ route('cart.index') }}" title="View Cart" class="awemenu-icon menu-shopping-cart">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="cart-number">{{ $cartCount ?? 0 }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <header id="header-section">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header col-md-2">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
                </div>
                <div class="col-md-10">
                    @include('layouts.front.header-cart')
                </div>
            </div>
        </nav>
    </header>
</section>
@yield('content')

@include('layouts.front.footer')

<script src="{{ asset('js/front.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@yield('js')
</body>
</html>