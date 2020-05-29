<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Runescape mobile</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/contact.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/news.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/branding/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/branding/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/branding/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/branding/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/branding/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">  
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <header>
        <div class="toolbar">
            <div class="container">
                <ul>
                    {{-- saving id parameters when changing languages --}}
                    @if(!isset($id))
                        @php $id = null @endphp
                    @endif

                    {{-- saving page pagination page parameter when changing languages --}}
                    @if(isset($_GET['page']))
                        @php $page= $_GET['page'] @endphp
                    @else 
                        @php $page=null @endphp
                    @endif

                    <li class="lang"><a @if(App::getLocale() == 'en') class="active" @endif href="{{ route(Route::currentRouteName(), ['language' => 'en', 'page' => $page, 'id' => $id ]) }}">EN</a></li>  
                    <li class="lang"><a @if(App::getLocale() == 'nl') class="active" @endif href="{{ route(Route::currentRouteName(), ['language' => 'nl', 'page' => $page, 'id' => $id ]) }}">NL</a></li>  
                    <li><a href="">{{ __('header.donate') }}</a></li>
                    <li><a href="{{ route('contact', app()->getLocale()) }}">{{ __('header.contact') }}</a></li>
                    @guest
                        <li><a class="cta" href="{{ route('admin', app()->getLocale()) }}">{{ __('header.login') }}</a></li>
                    @endguest
                    @auth
                        <li><a class="cta" href="{{ route('admin', app()->getLocale()) }}">{{ __('header.admin') }}</a></li>
                    @endauth
                </ul>
            </div>
        </div>
        <nav>
            <div class="container">
                <ul>
                    <li class="logo" ><a href="{{ route('start', app()->getLocale()) }}">Runescape</a></li>
                    <li><a href="{{ route('start', app()->getLocale()) }}">{{ __('header.home') }}</a></li>
                    <li><a href="{{ route('news', app()->getLocale()) }}">{{ __('header.news') }}</a></li>
                    <li><a href="">{{ __('header.about') }}</a></li>
                </ul>
            </div>
        </nav>
    </header>
