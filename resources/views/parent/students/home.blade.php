@extends('../layout/' . $layout)

@section('subhead')
    <title>My child - Smart - School Management</title>
@endsection

@section('subcontent')


    <h2 class="intro-y text-lg font-medium mt-10">Students List </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2">Add New User</button>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="users" class="w-4 h-4 mr-2"></i> Add Group
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="message-circle" class="w-4 h-4 mr-2"></i> Send Message
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->

        @if($students->count() == 0)
            no child yet
        @endif
        @foreach ($students as $student)
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box">
                    <div
                        class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                            <img alt="image profile" class="rounded-full"
                                 src="{{ asset('dist/images/preview-2.jpg') }}">
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">{{$student->name}}</a>
                            <div class="text-slate-500 text-xs mt-0.5">
                                2018 ,2019 , 2022
                            </div>
                            <div class="text-slate-500 text-xs mt-0.5">
                               High school
                                <span>2018</span> ,
                            </div>
                        </div>
                        <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                            <a href=""
                               class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"
                               title="Facebook">
                                <i class="w-3 h-3 fill-current" data-lucide="facebook"></i>
                            </a>
                            <a href=""
                               class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"
                               title="Twitter">
                                <i class="w-3 h-3 fill-current" data-lucide="twitter"></i>
                            </a>
                            <a href=""
                               class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip"
                               title="Linked In">
                                <i class="w-3 h-3 fill-current" data-lucide="linkedin"></i>
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5">
                        <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto">
                            <div class="flex text-slate-500 text-xs">
                                <div class="mr-auto">Progress</div>
                                <div>
{{--                                    @if($student->grades->last()?->id == 1)--}}
{{--                                        {{$pr = intval($student->grades->last()->pivot->year / 12 * 100 )}}--}}
{{--                                    @elseif($student->grades->last()?->id == 2)--}}
{{--                                        {{$pr = intval(($student->grades->last()->pivot->year + 5) / 12 *100 )}}--}}
{{--                                    @elseif($student->grades->last()?->id == 3)--}}
{{--                                        {{$pr = intval(($student->grades->last()->pivot->year + 9) / 12 *100) }}--}}
{{--                                    @else--}}
{{--                                        {{$pr = 0}}--}}
{{--                                    @endif--}}
                                    20 %
                                </div>

                            </div>
                            <div class="progress h-1 mt-2 bg-red-50">
                                <div style="width:20%" class="progress-bar bg-success" role="progressbar"
                                     aria-valuenow="0"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <a href="{{route('parent.attendance' , $student)}}" class="btn btn-primary py-1 px-2 mr-2"> <i data-lucide="eye" class="w-4 h-4 mr-2"></i> Attendance</a>
                        <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                    </div>
                </div>
            </div>
    @endforeach
    <!-- END: Users Layout -->

        <!-- END: Pagination -->
    </div>
@endsection
