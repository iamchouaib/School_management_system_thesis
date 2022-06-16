@extends('../layout/' . $layout)

@section('subhead')
    <title>Teacher - Sessions</title>
@endsection

@section('subcontent')

    @if($students->count() == 0 )
        no student yet in this groupe
    @endif

    <div class="col-span-12 my-10">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">General Report</h2>
            <form method="post" action="{{route('team.teacher.seance.save' , $seance)}}">
                @csrf
                <button type="submit" class="btn btn-primary ml-auto flex items-center">
                    <i data-lucide="hard-drive" class="w-4 h-4 mr-3"></i>Save Session
                </button>
            </form>

        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">

            <x-d-general-raport>
                <i data-lucide="building" class="report-box__icon text-primary"></i>
                <x-d-general-raport-per class="bg-success" title="33% up this month">33%</x-d-general-raport-per>
                <x-d-general-raport-number>A3</x-d-general-raport-number>
                <x-d-general-raport-title>Groupe </x-d-general-raport-title>
            </x-d-general-raport>

            <x-d-general-raport>
                <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                <x-d-general-raport-per>33%</x-d-general-raport-per>
                <x-d-general-raport-number>2</x-d-general-raport-number>
                <x-d-general-raport-title>Seance Week</x-d-general-raport-title>
            </x-d-general-raport>

            <x-d-general-raport>
                <i data-lucide="users" class="report-box__icon text-warning"></i>
                <x-d-general-raport-per class="bg-danger" title="33% Lower than last month">33%
                </x-d-general-raport-per>
                <x-d-general-raport-number>25</x-d-general-raport-number>
                <x-d-general-raport-title>All Students</x-d-general-raport-title>
            </x-d-general-raport>

            <x-d-general-raport>
                <i data-lucide="user" class="report-box__icon text-success"></i>
                <x-d-general-raport-per class="bg-success" title="33% Up than last month">33%
                </x-d-general-raport-per>
                <x-d-general-raport-number></x-d-general-raport-number>
                <x-d-general-raport-title>Users In Smart School</x-d-general-raport-title>
            </x-d-general-raport>




        </div>
    </div>


    <div class="lg:flex">
        <!-- BEGIN: Modal Toggle -->
        <div class="text-center">
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#show_list" class="btn btn-primary">
                <i data-lucide="list-checks" class="w-4 h-4 mr-2"></i>
                Record the attendance</a>
            <div>

                <a class="btn btn-outline-danger my-4 " onclick="function show_homeWork() {
document.querySelector('#homeWork').classList.toggle('hidden');
                }
                show_homeWork()">Check Home Work</a>


                <div id="homeWork" class=" hidden -intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                    <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                        <div class="absolute left-0 top-0 mt-3 ml-3">
                            <input class="form-check-input border border-slate-500"
                                   type="checkbox" {{ true ? '' : 'checked' }}>
                        </div>

                        <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                            <div class="file__icon__file-name">check</div>
                        </a>

                        <a href="" class="block font-medium mt-4 text-center truncate">{{$home_work}}</a>
                        <div class="text-slate-500 text-xs text-center mt-0.5">last week</div>

                    </div>
                </div>

            </div>
        </div>

        <!-- END: Modal Toggle -->


        <div>
            <div class="ml-4  editor document-editor shadow">
                <div class=" document-editor__toolbar"></div>
                <div class="relative document-editor__editable-container">
                    <div class="absolute left-1">
                        <input id="home_work" type="text" class="lg:w-full form-control font-bold text-primary"
                               placeholder="home work">
                    </div>

                    <div class="document-editor__editable" id="textbook">
                        <p><span style="background-color:hsl(0, 0%, 100%);color:hsl(0, 0%, 0%);" class="text-big"><u>Date : {{now()->toFormattedDateString()}}</u></span>
                        </p>
                        <ul style="list-style-type:circle;">
                            <li><strong>Seance :&nbsp;</strong>{{$seance->nb_week}}</li>
                            <li><strong>module:&nbsp;</strong></li>
                            <li><strong>groupe:</strong></li>
                            <li><strong>Teacher: </strong> {{auth()->user()->name}}</li>
                        </ul>
                        <p><br data-cke-filler="true"></p>
                        <h2><strong>Table of Content</strong></h2>
                        <p><strong><br data-cke-filler="true"></strong></p>


                    </div>
                </div>
                <div class="text-danger" id="err"></div>
                <button id="btn-textBook" class=" mr-auto btn btn-primary">Save</button>
            </div>

        </div>


        <!-- BEGIN: Modal Content -->
        <div id="show_list" class="modal modal-slide-over" data-tw-backdrop="static" tabindex="-1"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <a data-tw-dismiss="modal" href="javascript:;">
                        <i data-lucide="x" class="w-8 h-8 text-slate-400"></i>
                    </a>
                    <div class="modal-header p-5">
                        <h2 class="font-medium text-base mr-auto">List of Students</h2>
                    </div>
                    <div class="modal-body">
                        <div class=" sm:w-full intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <p class="text-xs text-danger font-medium  mr-5">
                                Select only the absent students
                            </p>

                            <table class="table table-report  sm:mt-2">
                                <thead>
                                <tr class="bg-primary text-white font-bold">
                                    <th>Id</th>
                                    <th class="whitespace-nowrap">Name</th>
                                    <th class="whitespace-nowrap">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($students as $student)
                                    <tr class="-intro-x">
                                        <td>
                                            <div class="w-12 h-12 image-fit zoom-in">
                                                <img alt="{{$student->name}} image" class="tooltip rounded-full w-40"
                                                     {{--                                     src="{{ asset('images/' . $student->image) }}"--}}
                                                     src="{{ asset('images/profile-' . rand(1,9) . '.jpg') }}"
                                                     title="{{$student->name}}"
                                                >
                                            </div>
                                        </td>

                                        <td class="font-bold"><label class="cursor-pointer"
                                                                     for="{{$student->id}}">{{$student->name}} </label>
                                        </td>

                                        <td class="w-40 text-center">
                                            <div class="form-check mt-2">
                                                <input id="{{$student->id}}" name="students[]"
                                                       class="border border-2 border-primary w-8 h-8  form-check-input" type="checkbox"
                                                       value="{{$student->id}}"
                                                       @checked(!$student->attendance) @disabled(!$student->attendance)
                                                >
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <button type="button" id="btn-attendance" class="btn btn-danger mt-4">
                                <i data-lucide="hard-drive" class="w-4 h-4 mr-2"></i> Save Attendance
                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END: Modal Content -->

        @endsection


        @section('script')
            <script>


                async function save_attendance() {
                    $('#btn-attendance').html('<i data-loading-icon="puff" data-color="white" class="w-5 h-5 mr-2"></i> Saving')
                    tailwind.svgLoader()
                    await helper.delay(1500);


                    let students = [];
                    $('.form-check-input:checked').forEach(el => {
                        students.push(el.value)
                    })


                    axios.post(`{{route('team.teacher.seance.attendance' , $seance)}}`, {
                        students: students,
                    }).then(res => {
                        $(".form-check-input").attr('disabled', true);

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'bottom-end',
                            showConfirmButton: false,

                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: 'Saved in successfully'
                        })

                        $('#btn-attendance').html('<i data-lucide="check" class="w-4 h-4 mr-2"></i> Saved')
                        $('#btn-attendance').attr('disabled', true);

                    }).catch(err => {
                    })

                }

                async function save_textBook() {
                    console.log('clicked')
                    $('#btn-textBook').html('<i data-loading-icon="puff" data-color="white" class="w-5 h-5 mr-2"></i> Saving')
                    tailwind.svgLoader()
                    await helper.delay(1500);


                    axios.post(`{{route('team.teacher.save-text-book' , $seance->id)}}`, {

                        homework: $('#home_work').val(),
                        textbook: $('#textbook').html(),

                    }).then(res => {


                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'bottom-end',
                            showConfirmButton: false,

                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: 'Saved in successfully'
                        })

                        $('#btn-textBook').html('<i data-lucide="check" class="w-4 h-4 mr-2"></i> Update')


                    }).catch(err => {

                        $('#err').html(err.response.data.message)
                        $('#btn-textBook').html('<i data-lucide="" class="w-4 h-4 mr-2"></i> Retry')
                    })

                }


                $('#btn-attendance').on('keyup', function (e) {
                    if (e.keyCode === 13) {
                        save_attendance()
                    }
                })

                $('#btn-attendance').on('click', function () {
                    save_attendance()
                })


                $('#btn-textBook').on('click', function () {
                    save_textBook()
                })

            </script>
@endsection
