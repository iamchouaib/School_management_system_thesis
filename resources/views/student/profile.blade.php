@extends('../layout/' . $layout)

@section('subhead')
    <title>Profile - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Profile Layout</h2>
    </div>
    <!-- BEGIN: Profile Info -->

    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="{{ asset('images/'.$student->image) }}">
                    <div class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-primary rounded-full p-2">
                        <i class="w-4 h-4 text-white" data-lucide="camera"></i>
                    </div>
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ $student->name}}</div>
                    <div class="text-slate-500"> Student </div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <i data-lucide="mail" class="w-4 h-4 mr-2"></i> {{ $student->email }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <i data-lucide="hash" class="w-4 h-4 mr-2"></i>
                        Class {{$student->groupe->name}}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <i data-lucide="{{ $student->groupe->section->grade->logo }}" class="w-4 h-4 mr-2"></i> Stage  {{ $student->groupe->section->grade->name }}
                    </div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-5">Grad Report </div>
                <div class="flex items-center justify-center lg:justify-start mt-2">
                    <div class="mr-2 w-20 flex">
                        Evaluation<span class="ml-3 font-medium text-success">+23%</span>
                    </div>
                    <div class="w-3/4">
                        <div class="h-[55px]">
                            <canvas class="simple-line-chart-1 -mr-5"></canvas>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center lg:justify-start">
                    <div class="mr-2 w-20 flex">
                        Grad: <span class="ml-3 font-medium text-danger">-2%</span>
                    </div>
                    <div class="w-3/4">
                        <div class="h-[55px]">
                            <canvas class="simple-line-chart-2 -mr-5"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul
            class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center"
            role="tablist"
        >
            <li id="dashboard-tab" class="nav-item" role="presentation">
                <a
                    href="javascript:;"
                    class="nav-link py-4 active"
                    data-tw-target="#dashboard"
                    aria-controls="dashboard"
                    aria-selected="true"
                    role="tab"
                >
                    Dashboard
                </a>
            </li>


        </ul>
    </div>

    <!-- END: Profile Info -->



    <div class="intro-y tab-content mt-5">
        <div id="dashboard" class="tab-pane active" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="grid grid-cols-12 gap-6">

                <!-- BEGIN: Work In Progress -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-0 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto my-5">Study In Progress</h2>
                    </div>
                    <div class="p-5">
                        <div class="tab-content">
                            <div id="work-in-progress-new" class="tab-pane active" role="tabpanel" aria-labelledby="work-in-progress-new-tab">
                                <div>
                                    <div class="flex">
                                        <div class="mr-auto">To complete {{
    $student->groupe->section->grade->name}} Stage</div>
                                        <div>{{$n = $student->groupe->section->year / $student->groupe->section->grade->years * 100 }}  % </div>
                                    </div>
                                    <div class="progress h-1 mt-2">
                                        <div class="progress-bar w-1/2 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"

                                        style="width: {{$n}} % ;"></div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="flex">
                                        <div class="mr-auto">Completed Tasks</div>
                                        <div>2 / 20</div>
                                    </div>
                                    <div class="progress h-1 mt-2">
                                        <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="flex">
                                        <div class="mr-auto">Tasks In Progress</div>
                                        <div>42</div>
                                    </div>
                                    <div class="progress h-1 mt-2">
                                        <div class="progress-bar w-3/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <a href="" class="btn btn-secondary block w-40 mx-auto mt-5">View More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Work In Progress -->


                <!-- BEGIN: Daily Sales -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-0 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto my-5">Grades last Semester</h2>
                    </div>
                    <div class="p-5">
                        @foreach($student->sessions as $session)
                            <div class="relative flex items-center" >
                                <div class="w-12 h-12 flex-none image-fit">
                                    <i class="w-10 h-10 bg-primary rounded-full text-white" data-lucide="{{$session->module->logo}}"></i>
                                </div>
                                <div class="ml-4 mr-auto">
                                    <a href="" class="font-medium">{{$session->module->name}}</a>
                                    <div class="text-slate-500 mr-5 sm:mr-5">{{$session->module->users->first->name->name}}</div>
                                </div>
                                <div class="font-medium text-slate-600 dark:text-slate-500">{{$session->note->note}}</div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- END: Daily Sales -->
            </div>
        </div>
    </div>
@endsection
