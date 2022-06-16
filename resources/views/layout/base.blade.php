<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ auth()->check() && auth()->user()->profile->dark_mode ? 'dark' : '' }}{{ $color_scheme != 'default' ? ' ' . $color_scheme : '' }}">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="smart school is a company ... ">
    <meta name="keywords" content="school , smart , absence , attendance ,teacher , manage , admin ">
    <meta name="author" content="GL Team">

    @yield('head')

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />
{{--    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
{{--    <!-- END: CSS Assets-->--}}
</head>
<!-- END: Head -->

@yield('body')

</html>
