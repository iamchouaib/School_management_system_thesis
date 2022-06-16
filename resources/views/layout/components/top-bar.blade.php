@php
    use App\Models\Announce;$announces =  Announce::latest()->paginate(5);
if(!is_null(Auth::guard('guardian')->user())){
    $loggedin_user = Auth::guard('guardian')->user();
}else{
    $loggedin_user = Auth::user();
}
@endphp

<!-- BEGIN: Top Bar -->


    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Application</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{Request::path()}}</li>
            </ol>
        </nav>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
                <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
            </div>
            <a class="notification sm:hidden" href="">
                <i data-lucide="search" class="notification__icon dark:text-slate-500"></i>
            </a>
            <div class="search-result">
                <div class="search-result__content">
                    <div class="search-result__content__title">Pages</div>
                    <div class="mb-5">
                        <a href="" class="flex items-center">
                            <div
                                class="w-8 h-8 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full">
                                <i class="w-4 h-4" data-lucide="inbox"></i>
                            </div>
                            <div class="ml-3">Mail Settings</div>
                        </a>
                        <a href="{{route('team.admin.users')}}" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full">
                                <i class="w-4 h-4" data-lucide="users"></i>
                            </div>
                            <div class="ml-3">Team & Roles</div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <!-- END: Search -->
        <!-- BEGIN: Notifications -->
        <div class="intro-x dropdown mr-auto sm:mr-6">
            <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                 aria-expanded="false" data-tw-toggle="dropdown">
                <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i>
            </div>
            <div class="notification-content pt-2 dropdown-menu">
                <div class="notification-content__box dropdown-content">
                    <div class="notification-content__title">Notifications</div>
                    @foreach ($announces as $announce)
                        <div class="cursor-pointer relative flex items-center {{ true ? 'mt-5' : '' }}">

                                {{--  To Do--}}


                                    <div class="w-12 h-12 flex-none image-fit mr-1"><img
                                            alt="{{$loggedin_user->name}} profile image" class="rounded-full"
                                            @auth('web') src="{{asset('images/'.$loggedin_user->photo ) }}" @endauth>
                                            @auth('guardian') src="{{asset('images/'.$loggedin_user->photo ) }}" @endauth>

                                        <div


                                    class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">{{ $announce->title }}</a>
                                    <div
                                        class="text-xs text-slate-400 ml-auto whitespace-nowrap">{{ $announce->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="w-full truncate text-slate-500 mt-0.5">{!! $announce->content  !!} </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- END: Notifications -->
        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">


                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button"
                     aria-expanded="false" data-tw-toggle="dropdown">
                    <img alt="{{$loggedin_user->name}} profile image"
                         @auth('web')src="{{asset('images/'.$loggedin_user->photo )}}"> @endauth
                         @auth('guardian')src="{{asset('images/'.$loggedin_user->photo )}}"> @endauth

                </div>

            <div class="dropdown-menu w-56">
                <ul class="dropdown-content bg-primary text-white">
                    <li class="p-2">
                        <div class="font-medium">{{ $loggedin_user->name }}</div>
                        <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{ $fakers[0]['jobs'][0] }}</div>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    <li>
                        <a href="{{route('profile')}}" class="dropdown-item hover:bg-white/5">
                            <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item hover:bg-white/5">
                            <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Add Account
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item hover:bg-white/5">
                            <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item hover:bg-white/5">
                            <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    <li>
                       @auth('web') <form action="{{ route('team.logout') }}" method="post"> @endauth
                       @auth('guardian') <form action="{{ route('logout') }}" method="post"> @endauth

                            @csrf
                            <button type="submit" class="dropdown-item hover:bg-white/5">
                                <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>


<!-- END: Top Bar -->
