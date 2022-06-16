@extends('../layout/' . $layout)

@section('subhead')
    <title>Add Student - Parent</title>
@endsection

@section('subcontent')

    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">
            Add New Student To School</h2>
    </div>

    <!-- BEGIN: Wizard Layout -->
    <div id="login-form"
         class="intro-y box py-10 sm:py-20 mt-5">
        <div id="line"
             class="relative before:hidden before:lg:block before:absolute before:w-[69%] before:h-[3px] before:top-0 before:bottom-0 before:mt-4 before:bg-slate-200 before:dark:bg-darkmode-400 flex flex-col lg:flex-row justify-center px-5 sm:px-20 transition">
            <div
                class="intro-x lg:text-center flex items-center lg:block flex-1 z-10">
                <button
                    class="w-10 h-10 rounded-full btn btn-primary">
                    1
                </button>
                <div
                    class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">
                    Student Personal Information
                </div>
            </div>
            <div
                class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button id="rounded-2"
                        class=" w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400 ">
                    2
                </button>
                <div
                    class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">
                    Student Personal Information
                </div>
            </div>
        </div>


        {{--        /*school*/--}}

        <div id="school"
             class="hidden px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="font-medium text-base">
                School Settings
            </div>
            <div
                class="px-5 sm:px-20 mt-10 pt-10 border-t dark:border-darkmode-400">

                <div
                    class="grid grid-cols-12 gap-4 gap-y-5 mt-5">


                    <div
                        class="intro-y col-span-12 sm:col-span-6">
                        <label for="name" class="form-label">GradeYear</label>
                        <select id="section"
                                class="tom-select sm:mt-2 sm:mr-2"
                                aria-label="Choose">

                            @foreach($grades as $grade)
                                <option
                                    disabled>{{$grade->name}}</option>
                                @foreach($grade->sections as $section)
                                    <option
                                        value="{{$section->id}}">{{$section->year}}
                                        ({{$section->name}}
                                        )
                                    </option>

                                @endforeach
                            @endforeach

                        </select>
                        <div id="error-section"
                             class="login__input-error text-danger mt-2"></div>
                    </div>


                    <div
                        class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <button onclick="hide_school()"
                                class="btn btn-secondary w-24">
                            Previous
                        </button>
                        <button id="save-child"
                                type="submit"
                                class="btn btn-primary w-24 ml-2">
                            Save
                        </button>
                    </div>
                </div>
            </div>

        </div>


        {{--        /*personal*/--}}
        <div id="personal"
             class=" px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="font-medium text-base">
                School Settings
            </div>
            <div
                class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
                <div
                    class="font-medium text-base">
                    Profile Settings
                </div>
                <div
                    class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                    <div
                        class="intro-y col-span-12 sm:col-span-6">
                        <label for="name"
                               class="form-label">Name</label>
                        <input id="name"
                               type="text"
                               class="form-control"
                               placeholder="Mohamed taha">
                        <div id="error-name"
                             class="login__input-error text-danger mt-2"></div>
                    </div>
                    <div
                        class="intro-y col-span-12 sm:col-span-6">
                        <label for="gender"
                               class="form-label">Gender</label>
                        <select id="gender"
                                class="form-control tom-select">
                            <option value="male">
                                Male
                            </option>
                            <option
                                value="female">
                                Female
                            </option>
                        </select>
                    </div>


                    <div
                        class="relative intro-y col-span-12 sm:col-span-6">
                        <label for="birthday"
                               class="form-label">Date
                            of Birth</label>
                        <div
                            class="absolute rounded-l w-10 h-10 flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                            <i data-lucide="calendar"
                               class="w-4 h-4"></i>
                        </div>
                        <input id="birthday"
                               type="text"
                               class="datepicker form-control pl-12"
                               data-single-mode="true">
                    </div>


                    <div
                        class="intro-y col-span-12 sm:col-span-6">
                        <label for="image"
                               class="form-label">Image</label>
                        <input
                            id="image"
                            type="file"
                            class="form-control">
                        <div id="error-image"
                             class="login__input-error text-danger mt-2"></div>
                    </div>

                    <div
                        class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <button type="button"
                                disabled
                                class="btn btn-secondary w-24">
                            Previous
                        </button>
                        <a onclick="show_school()"
                           class="btn btn-primary w-24 ml-2">Next</a>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END: Wizard Layout -->

@endsection

@section('script')
    <script>
        function show_school() {
            $('#personal').addClass('hidden')
            $('#rounded-2')
                .removeClass('bg-slate-100')
                .removeClass('text-slate-500')
                .addClass('btn-primary')
            $('#school').removeClass('hidden')
            $('#line').addClass('before:bg-primary')
        }

        function hide_school() {
            $('#personal').removeClass('hidden')
            $('#rounded-2')
                .addClass('bg-slate-100')
                .addClass('text-slate-500')
                .removeClass('btn-primary')
            $('#school').addClass('hidden')
            $('#line').removeClass('before:bg-primary')
        }

        (function () {


            async function save_child() {
                // Reset state
                $('#login-form').find('.form-control').removeClass('border-danger')
                $('#login-form').find('.login__input-error').html('')


                // Loading state
                $('#save-child').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>')
                tailwind.svgLoader()
                await helper.delay(1500)

                   let name =  $('#name').val();
                   let gender =   $('#gender').val();
                   let birthday =  $('#birthday').val();
                   let section =  $('#section').val();
                   let image =  $('#image').val();




                axios.post(`{{route('parent.students.store')}}`, {
                    name: name,
                    gender: gender,
                    birthday: birthday,
                    section:section,
                    image:image,
                }).then(res => {
                    $('#save-child').html('save');

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
                        title: 'Saved in successfully . now waiting for approval'
                    })

                }).catch(err => {
                    hide_school();
                    $('#save-child').html('save again')

                    if (err.response.data.message == 'student already exist') {

                        $('#name').addClass('border-danger')
                        $('#error-name').html(err.response.data.message)

                    }else{
                        for (const [key, val] of Object.entries(err.response.data.errors)) {
                            $(`#${key}`).addClass('border-danger')
                            $(`#error-${key}`).html(val)
                        }
                    }



                })
            }

            $('#save-child').on('keyup', function (e) {
                if (e.keyCode === 13) {
                    save_child()
                }
            })

            $('#save-child').on('click', function () {
                save_child()
            })
        })()


    </script>
@endsection

