@extends('../layout/' . $layout)

@section('subhead')
    <title>Teacher - Sessions</title>
@endsection

@section('subcontent')

    @if($justification)


        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">
                        #
                    </th>
                    <th class="whitespace-nowrap">
                        Absent Date
                    </th>
                    <th class="whitespace-nowrap">
                        First Module
                    </th>
                    <th class="whitespace-nowrap">
                        Status
                    </th>
                    <th class="whitespace-nowrap">
                        Justify
                    </th>
                </tr>
                </thead>
                <tbody>


                <tr>
                    <td class="whitespace-nowrap">
                        #
                    </td>
                    <td class="whitespace-nowrap font-bold">{{\Carbon\Carbon::parse($justification->created_at)->format('l jS \\of F Y')}}</td>
                    <td class="whitespace-nowrap"> ... </td>
                    <td class="whitespace-nowrap">


                        @if($justification->justification_path)
                            <p class="btn btn-pending-soft">
                                processing ...
                            </p>
                        @else

                                <a href="javascript:;"
                                   class="tooltip btn btn-outline-danger"
                                   title="information  about the rules">
                                    required to
                                    justify</a>
                        @endif


                    </td>
                    <td class="whitespace-nowrap">


                        @if($justification->justification_path)
                            <button
                                data-tw-toggle="modal"
                                data-tw-target="#header-footer-modal-preview"
                                class="btn btn-pending w-32 mr-2 mb-2">
                                <i data-lucide="image"
                                   class="w-4 h-4 mr-2"></i>
                                Update
                            </button>
                        @else
                            <button
                                data-tw-toggle="modal"
                                data-tw-target="#header-footer-modal-preview"
                                class=" btn btn-primary-soft">
                                Justify
                            </button>
                        @endif

                    </td>
                </tr>


                </tbody>
            </table>
        </div>





    @else
        <div
            class="flex h-[420px] items-center justify-center ">
            <div
                class="w-3/4 mx-auto flex flex-col-reverse shadow-lg">
                <div
                    class="intro-y box mt-5 lg:mt-0">
                    <div
                        class="relative flex items-center p-5">
                        <div
                            class="w-12 h-12 image-fit">
                            <img alt="iamge"
                                 class="rounded-full"
                                 src="http://127.0.0.1:8000/dist/images/profile-3.jpg">
                        </div>
                        <div class="ml-4 mr-auto">
                            <div
                                class="font-medium text-base">{{$student->name}}</div>
                            <div
                                class="text-slate-500">{{$student->birthday}}</div>
                        </div>
                        <div class="font-bold">
                            <div
                                class="alert alert-success-soft w-full text-center">
                                No Absents
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="w-full text-center">
            <a href="/"
               class="intro-x btn btn-primary py-3 px-4 border-white dark:border-darkmode-400 dark:text-slate-200 mt-10">Back
                to Home</a>
        </div>


    @endif


    <!-- BEGIN: All Absences -->

    HERE
    <!-- END: ALL ABSENCES -->


    <!-- BEGIN: Modal Content -->
    <div id="header-footer-modal-preview"
         class="modal" tabindex="-1"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">

                <form method="post"
                      action="{{route('parent.attendance.store' , $justification->id ?? 1)}}"
                      enctype="multipart/form-data"
                      class="dropzone"
                >
                @csrf
                <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">
                            Justify this
                            Absent</h2>
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->

                    <div
                        class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                        <div
                            class="col-span-12 sm:col-span-12">

                            <input type="file"
                                   name="file"
                                   id="file">

                            @error('file') {{$message}} @enderror

                        </div>

                        <div
                            class="col-span-12 sm:col-span-12">
                            <label
                                for="modal-form-1"
                                class="form-label">Remarks</label>
                            <input
                                id="modal-form-1"
                                type="text"
                                class="form-control"
                                name="remarks"
                                placeholder="REMARKS">
                        </div>

                    </div>
                    <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->

                    <div class="modal-footer">

                        <button type="button"
                                data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-20 mr-1">
                            Cancel
                        </button>

                        <button type="submit"
                                class="btn btn-primary w-20">
                            Send
                        </button>


                    </div>
                </form>

                <!-- END: Modal Footer -->
            </div>
        </div>
    </div>
    <!-- END: Modal Content -->





@endsection

