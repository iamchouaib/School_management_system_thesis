@extends('../layout/' . $layout)

@section('subhead')
    <title>Calendar - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto" id="title_c">Calendar</h2>
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
                        <label for="choose_teacher" class="form-label">Teacher</label>
                        <select data-placeholder="Select your favorite actors" class="tom-select" name="chosen_teacher"
                                id="choose_teacher">

                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach


                        </select>
                    </div>

                    <div class="relative">
                        <button id="full_calendar" class="w-full btn btn-outline-primary">
                            Full Calendar
                        </button>

                    </div>


                </div>
            </div>
        </div>

        <!-- END: Calendar Side Menu -->
        <!-- BEGIN: Calendar Content -->
        <div class="col-span-12 xl:col-span-8 2xl:col-span-9">
            <div class="box p-5">
                <div class="full-calendar" id="calendar-admin"></div>
            </div>
        </div>
        <!-- END: Calendar Content -->


        <!-- BEGIN: Modal Content -->
        <div id="schedule_events" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto" id="tosave">To Save Session </h2>
                        <button class="btn btn-outline-secondary hidden sm:flex">
                            <i data-lucide="calendar" class="w-4 h-4 mr-2"></i> event
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
                                            <i data-lucide="calendar" class="w-4 h-4 mr-2"></i> events
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END: Modal Header -->


                    <!-- BEGIN: Add Session Body -->
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3" id="find_parent">


                        <div class="col-span-12 sm:col-span-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-input border-remover w-full" id="title"
                                   placeholder="event title">
                            <div id="error-title" class="login__input-error text-danger"></div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 mt-2">
                            <label for="roles" class="form-label">To ?</label>
                            <select data-placeholder="to?" class="border-remover tom-select w-full" id="roles" multiple>
                                <option value="you" selected>For you</option>
                                <option value="guardian">Guardians</option>

                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            <div id="error-roles" class="login__input-error text-danger mt-2"></div>
                        </div>
                        <div class="col-span-12 sm:col-span-12 mt-2">
                            <label for="groupes" class="text-xs form-label">Groupe if you want to specify
                                guardian</label>

                            <select data-placeholder="to?" class="border-remover tom-select w-full" id="groupes"
                                    multiple>

                                @foreach($groupes as $groupe)
                                    <option value="{{$groupe->id}}">{{$groupe->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                        <!-- END: Modal Body -->

                        <!-- BEGIN: Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                                Cancel
                            </button>
                            <button class="btn btn-primary w-20" id="save_event">Save</button>
                        </div>
                        <!-- END: Modal Footer -->
                    </div>

                </div>

            </div>


            <!-- END: Modal Content -->
        </div>

        <script>
            document.querySelector('#print').addEventListener('click', function () {
                window.print();
            })


        </script>
@endsection

@section('script')

@endsection
