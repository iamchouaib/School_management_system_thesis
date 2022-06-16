@extends('layout.main')
@section('head')
    <title>@yield('title')</title>
@endsection

@section('content')
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="logo " class="w-6" src="{{ asset('dist/images/logo.svg') }}">
        <span class="hidden xl:block text-white text-lg ml-3 uppercase">
            Smart School is `Sad`
                </span>
    </a>
    <div class="container">
        <!-- BEGIN: Error Page -->
        <div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
            <div class="-intro-x lg:mr-20">
                <img alt="error svg image" class="h-48 lg:h-auto" src="{{ asset('dist/images/error-illustration.svg') }}">
            </div>
            <div class="text-white mt-10 lg:mt-0">
                <div class="intro-x text-8xl font-medium">@yield('code')</div>
                <div class="intro-x text-xl lg:text-3xl  font-medium mt-5">@yield('message')</div>
                <div class="intro-x text-sm mt-3">@yield('description')</div>
                <a href="/" class="intro-x btn py-3 px-4 text-white border-white dark:border-darkmode-400 dark:text-slate-200 mt-10">Back to Home</a>
            </div>
        </div>
        <!-- END: Error Page -->
    </div>
@endsection
