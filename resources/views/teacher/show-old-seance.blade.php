@extends('../layout/' . $layout)

@section('subhead')
    <title>Teacher - Sessions</title>
@endsection

@section('subcontent')


        <div
            class="intro-y flex items-center h-10 my-10" >

            @auth('web')
                <div class="text-center">
                    <a href="javascript:;"
                       data-tw-toggle="modal"
                       data-tw-target="#show_list"
                       class="btn btn-primary">
                        <i data-lucide="list-checks"
                           class="w-4 h-4 mr-2"></i>
                        Absents Students</a>
                    <div>
                    </div>
                </div>
            @endauth


            <h2 class="text-lg font-medium truncate mr-5">
               Seance For {{$session->seance_date}}
            </h2>

            @auth('web')
                <div class="text-center">
                    <a href="javascript:;"
                       data-tw-toggle="modal"
                       data-tw-target="#show_list"
                       class="btn btn-primary">
                        <i data-lucide="list-checks"
                           class="w-4 h-4 mr-2"></i>
                        Absents Students</a>
                    <div>
                    </div>
                </div>
            @endauth

        </div>





                <div
                    class="ml-4  editor document-editor shadow">
                    <div
                        class="document-editor__editable-container">
                        <div
                            class="document-editor__editable"
                            id="textbook">
                       {!! $text_book !!}
                        </div>
                    </div>
                </div>




            <!-- BEGIN: Modal Content -->
            <div id="show_list"
                 class="modal modal-slide-over"
                 data-tw-backdrop="static"
                 tabindex="-1"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <a data-tw-dismiss="modal"
                           href="javascript:;">
                            <i data-lucide="x"
                               class="w-8 h-8 text-slate-400"></i>
                        </a>
                        <div
                            class="modal-header p-5">
                            <h2 class="font-medium text-base mr-auto">
                                List of
                                Students</h2>
                        </div>
                        <div class="modal-body">
                            <div
                                class=" sm:w-full intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                <p class="text-xs text-danger font-medium  mr-5">
                                    Select only
                                    the absent
                                    students
                                </p>

                                <table
                                    class="table table-report  sm:mt-2">
                                    <thead>
                                    <tr class="bg-primary text-white font-bold">
                                        <th>Id
                                        </th>
                                        <th class="whitespace-nowrap">
                                            Name
                                        </th>
                                        <th class="whitespace-nowrap">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($students as $student)
                                        <tr class="-intro-x">
                                            <td>
                                                <div
                                                    class="w-12 h-12 image-fit zoom-in">
                                                    <img
                                                        alt="{{$student->name}} image"
                                                        class="tooltip rounded-full w-40"
                                                        {{--                                     src="{{ asset('images/' . $student->image) }}"--}}
                                                        src="{{ asset('images/profile-' . rand(1,9) . '.jpg') }}"
                                                        title="{{$student->name}}"
                                                    >
                                                </div>
                                            </td>

                                            <td class="font-bold">
                                                <label
                                                    class="cursor-pointer"
                                                    for="{{$student->id}}">{{$student->name}} </label>
                                            </td>

                                            <td class="w-40 text-center">
                                                <div
                                                    class="form-check mt-2">
                                                    <input
                                                        id="{{$student->id}}"
                                                        name="students[]"
                                                        class="border border-2 border-primary w-8 h-8  form-check-input"
                                                        type="checkbox"
                                                        value="{{$student->id}}"
                                                        @checked(!$student->attendance) @disabled(!$student->attendance)
                                                    >
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Modal Content -->

@endsection

