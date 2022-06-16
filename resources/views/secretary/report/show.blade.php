@extends('../layout/' . $layout)

@section('subhead')
    <title>Invoice Layout - Midone - Tailwind HTML
        Admin Template</title>
@endsection

@section('subcontent')
    <div
        class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Report Card</h2>
        <div
            class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button
                class="btn btn-primary shadow-md mr-2">
                Print
            </button>
            <div class="dropdown ml-auto sm:ml-0">
                <button
                    class="dropdown-toggle btn px-2 box"
                    aria-expanded="false"
                    data-tw-toggle="dropdown">
                    <span
                        class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4"
                           data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href=""
                               class="dropdown-item">
                                <i data-lucide="file"
                                   class="w-4 h-4 mr-2"></i>
                                Export Word
                            </a>
                        </li>
                        <li>
                            <a href=""
                               class="dropdown-item">
                                <i data-lucide="file"
                                   class="w-4 h-4 mr-2"></i>
                                Export PDF
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: Invoice -->
    <div class="intro-y box overflow-hidden mt-5">
        <div
            class="border-b border-slate-200/60 dark:border-darkmode-400 text-center sm:text-left">
            <div
                class="px-5 py-10 sm:px-20 sm:py-20">
                <div
                    class="text-primary font-semibold text-3xl">
                    Smart School
                </div>
                <div class="mt-2">
                    id <span
                        class="font-medium">#{{$student->id}}</span>
                </div>
                <div
                    class="mt-1">{{now()->toFormattedDateString()}}</div>
            </div>
            <div
                class="flex flex-col lg:flex-row px-5 sm:px-20 pt-10 pb-10 sm:pb-20">
                <div>
                    <div
                        class="text-base text-slate-500">
                        Student Details
                    </div>
                    <div
                        class="text-lg font-medium text-primary mt-2">
                        {{$student->name}}</div>
                    <div
                        class="mt-1">{{$student->email}}</div>
                    <div
                        class="mt-1">{{$student->guardian->address}}</div>
                </div>
                <div
                    class="lg:text-right mt-10 lg:mt-0 lg:ml-auto">
                    <div
                        class="text-base text-slate-500">
                        Created by
                    </div>
                    <div
                        class="text-lg font-medium text-primary mt-2">
                        {{auth()->user()->name}}</div>
                    <div
                        class="mt-1">{{auth()->user()->email}}</div>
                </div>
            </div>
        </div>
        <div class="px-5 sm:px-16 py-10 sm:py-20">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">
                            Subject
                        </th>
                        <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap ">
                            evaluation
                        </th>
                        <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">
                            interro
                        </th>
                        <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">
                            Exam
                        </th>
                        <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">
                            grade
                        </th>
                        <th class="border-b-2 dark:border-darkmode-400 whitespace-nowrap">
                            Priority
                        </th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($student->sessions as $subject)

                        <tr>
                            <td class="border-b dark:border-darkmode-400">
                                <div
                                    class="font-medium whitespace-nowrap">
                                    {{$subject->module->name}}</div>
                                <div
                                    class="text-slate-500 text-sm mt-0.5 whitespace-nowrap">
                                    prof name
                                </div>
                            </td>
                            <td class=" border-b dark:border-darkmode-400 ">{{$subject->note->evaluation}}</td>
                            <td class=" border-b dark:border-darkmode-400 ">{{$subject->note->note_td}}</td>
                            <td class=" border-b dark:border-darkmode-400 font-medium">{{$subject->note->task}}</td>
                            <td class=" border-b dark:border-darkmode-400 font-medium">{{$subject->note->note}}</td>
                            <td class=" border-b dark:border-darkmode-400 font-medium">{{$subject->module->priority}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div
            class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
            <div
                class="text-center sm:text-left mt-10 sm:mt-0">
                <div
                    class="text-base text-slate-500">
                    Smart school
                </div>
                <div
                    class="text-lg text-primary font-medium mt-2">
                    Elon Musk
                </div>
                <div class="mt-1">
                    la tosalm minha 2
                </div>
                <div class="mt-1">Code :
                    LFT133243
                </div>
            </div>
            <div
                class="text-center sm:text-right sm:ml-auto">
                <div
                    class="text-base text-slate-500">
                    The average
                </div>
                <div
                    class="text-xl text-primary font-medium mt-2">
                    {{$moy}}
                </div>
                <div class="mt-1">
                    @if($moy < 10)
                        Not
                    @endif
                    Success
                </div>
            </div>
        </div>
    </div>
    <!-- END: Invoice -->
@endsection
