@extends('../layout/' . $layout)

@section('subhead')
    <title>Add New Session</title>
@endsection

@section('subcontent')

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-bold mr-auto">Manage Scheduler</h2>
    </div>
    <!-- BEGIN: Modal Content -->
    <div id="schedule" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto" id="tosave">To Save Session </h2>
                    <button class="btn btn-outline-secondary hidden sm:flex">
                        <i data-lucide="calendar" class="w-4 h-4 mr-2"></i> {{$group->name}}
                    </button>
                    <div class="dropdown sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"
                           data-tw-toggle="dropdown">
                            <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                        </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li>
                                    <a href="javascript:;" class="dropdown-item">
                                        <i data-lucide="calendar" class="w-4 h-4 mr-2"></i> {{$group->name}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END: Modal Header -->


                <!-- BEGIN: Add Session Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                    {{--module--}}
                    <div class="col-span-12 sm:col-span-6">

                        <label for="moduleS" class="form-label">Module</label>
                            <select class="form-select w-full" id="moduleS" name="module_id">
                                <option>Select Teacher</option>
                                @foreach($modules as $module   )
                                    <option
                                        value="{{$module->id}}" @selected(request('module') == $module->id)>{{$module->name}}</option>
                                @endforeach
                            </select>


                    </div>

                    {{--Teachers by requesting Modules--}}
                    <div class="col-span-12 sm:col-span-6">
                        <label for="teacher" class="form-label">Teacher</label>

                        <select class="form-select" id="teacher" name="user_id">
                        </select>

                    </div>

                    {{--type--}}
                    <div class="col-span-12 sm:col-span-6">
                        <label for="session_type" class="form-label">Session Type</label>

                        <select id="session_type" class="form-select" name="session_type">
                            <option value="td">TD</option>
                            <option value="tp">TP</option>
                        </select>
                    </div>

                    {{--Sales--}}
                    <div class="col-span-12 sm:col-span-6">
                        <label for="sale" class="form-label">Sale</label>

                        <select id="sale" class="form-select " name="sale_id">
                            @foreach($sales as $sale)
                                <option value="{{$sale->id}}">{{$sale->name}}</option>
                            @endforeach

                        </select>

                        <input type="hidden" class="form-control" id="day" name="day">
                        <input type="hidden" class="form-control" id="time" name="duration">
                    </div>

                    </div>
                <!-- END: Modal Body -->

                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel
                    </button>
                    <button class="btn btn-primary w-20" id="addSession">Save </button>
                </div>
                <!-- END: Modal Footer -->


                </div>


            </div>

    </div>

    <!-- END: Modal Content -->


    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">

            {{--            The tete--}}
            <div class="intro-y flex flex-col sm:flex-row items-center ">
                <h2 class="text-sm font-medium mr-auto">Schedule
                    <button class="cursor-pointer btn btn-outline-success text-sm font-bold text-success">
                        Group {{$group->name}}
                </button>
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <button class="btn btn-primary shadow-md mr-2">Print Schedule</button>
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
                                        <i data-lucide="book" class="w-4 h-4 mr-2"></i> Modules
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item">
                                        <i data-lucide="clock-3" class="w-4 h-4 mr-2"></i> Seances
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{--            the content--}}

            <div class="col-span-12 xl:col-span-8 2xl:col-span-9 mt-4">
                <div class="box p-5">
                    <div class="full-calendar" id="calendar"></div>
                </div>
            </div>
            <!-- END: Calendar Content -->
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('#moduleS').change(function () {
            let module = document.querySelector('#moduleS').value;

            jQuery.get("http://127.0.0.1:8000/api/module/" + module  , function (data, status) {

                jQuery('#teacher').find('option')
                    .remove()
                    .end()

                jQuery.each(data, function (key, value) {
                    jQuery('#teacher')
                        .append('<option value='+ value.id + ' >' + value.name + '</option>')


                });


            });
        });


        (function () {
        //
        })()
    </script>






@endsection
