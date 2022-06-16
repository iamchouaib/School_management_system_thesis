@extends('../layout/' . $layout)

@section('subhead')
    <title>Schedule - Smart School </title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto" id="title_c">Schedule</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="btn btn-primary shadow-md mr-2" id="print">Print Schedule</button>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="share-2" class="w-4 h-4 mr-2"></i> Share
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Calendar Side Menu -->
        <div class="col-span-12 xl:col-span-4 2xl:col-span-3">
            <div class="box p-5 intro-y">
                <button type="button" disabled class="btn btn-primary w-full mt-2">
                    <i class="w-4 h-4 mr-2" data-lucide="edit-3"></i> Filter Teacher / Groupe
                </button>
                <div class="border-t border-b border-slate-200/60 dark:border-darkmode-400 mt-6 mb-5 py-3"
                     id="calendar-events">
                    <div class="relative mb-4">
                        <label for="choose_groupe" class="form-label">Groupes</label>
                        <select data-placeholder="Select your favorite actors" class="tom-select" name="chosen_teacher"
                                id="choose_groupe">

{{--                            @foreach($groupes as $groupe)--}}
{{--                                <option value="{{$groupe->id}}">{{$groupe->name}}</option>--}}
{{--                            @endforeach--}}


                        </select>
                    </div>

{{--                    <div class="relative">--}}
{{--                        <button id="calendar_teacher" class="w-full btn btn-outline-primary">--}}
{{--                            Full Calendar--}}
{{--                        </button>--}}

{{--                    </div>--}}


                </div>
            </div>
        </div>

        <!-- END: Calendar Side Menu -->
        <!-- BEGIN: Calendar Content -->
        <div class="col-span-12 xl:col-span-8 2xl:col-span-9">
            <div class="box p-5">
                <div class="full-calendar" id="calendar-teacher"></div>
            </div>
        </div>
        <!-- END: Calendar Content -->


    </div>

    <script>

        let id = {{auth()->user()->id}} ;
        document.querySelector('#print').addEventListener('click', function () {
            window.print();
        })

    </script>
@endsection

@section('script')

@endsection
