@extends('../layout/base')

@section('body')
    <body class="py-5 relative">

    @yield('content')
    {{--    @include('../layout/components/dark-mode-switcher')--}}
    {{--    @include('../layout/components/main-color-switcher')--}}
    @if(session('status'))


        <div id="status" class="toastify-content flex"> <i class="text-success" data-lucide="check-circle"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium">Message !</div>
                <div class="text-slate-500 mt-1">{{session('status')}}</div>
            </div>
        </div>



    @endif
    <!-- BEGIN: JS Assets-->
    <script src="{{ mix('dist/js/app.js') }}"></script>
    <!-- END: JS Assets-->

    @yield('script')
    </body>
@endsection
