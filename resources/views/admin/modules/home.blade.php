@extends('../layout/' . $layout)

@section('subhead')
    <title>Modules - smart School</title>
@endsection
@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">User List Layout</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2"
                    data-tw-toggle="modal" data-tw-target="#new_module"
            >
                <i class="w-5 h-5 mr-2 " data-lucide="package-plus"></i>
                Add module
            </button>


            <div class="dropdown">

                <button id="allow_edit" class="dropdown-toggle btn px-2 box">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-5 h-5" data-lucide="unlock"></i>
                    </span>
                </button>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">Logo</th>
                    <th class="whitespace-nowrap">MODULE NAME</th>
                    <th class="whitespace-nowrap">Teachers</th>
                    <th class="text-center whitespace-nowrap">Priority</th>
                    <th class="text-center whitespace-nowrap">IsPrimary</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($modules as $module)
                    <tr class="intro-x">
                        <td class="w-20">
                            <div class="w-10 h-10 image-fit zoom-in">
                                <img alt="" class="tooltip rounded-full"
                                     src="{{ asset('dist/images/placeholders/200x200.jpg') }}" title="Uploaded at">
                            </div>
                        </td>
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ $module->name }}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">description</div>
                        </td>
                        <td>

                            <select id="t{{$module->id}}" data-placeholder="Add Teacher" class="tom-select w-full"
                                    aria-expanded="true" multiple>
                                @foreach($module->users as $u)
                                    <option value="{{$u->id}}" selected>{{$u->name}}</option>
                                @endforeach


                                @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="text-center">{{ $module->priority }}</td>
                        <td class="sm:w-20 w-40">
                            <div
                                class="flex items-center justify-center {{ $module->isPrimary ? 'text-success' : 'text-danger' }}">
                                <i data-lucide="check-square"
                                   class="w-4 h-4 mr-2"></i> {{ $module->isPrimary ? 'Primary' : 'NotPrimary' }}
                            </div>
                        </td>
                        <td class="table-report__action w-56 ">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 btn btn-outline-primary"
                                   onclick="update_module({{$module->id}})">
                                    <i data-lucide="save" class="w-4 h-4 mr-1"></i> Save
                                </a>
                                <a class="flex items-center btn btn-outline-danger " href="javascript:;"
                                   data-tw-toggle="modal"
                                   data-tw-target="#delete-confirmation-modal">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{$modules->links()}}
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process
                            cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->


    <!-- BEGIN: Modal Content -->
    <div id="new_module" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"> <!-- BEGIN: Modal Header -->
                <div class="modal-header"><h2 class="font-medium text-base mr-auto">Broadcast Message</h2>
                    <button class="btn btn-outline-secondary hidden sm:flex"><i data-lucide="file"
                                                                                class="w-4 h-4 mr-2"></i> Download Docs
                    </button>
                    <div class="dropdown sm:hidden"><a class="dropdown-toggle w-5 h-5 block" href="javascript:;"
                                                       aria-expanded="false" data-tw-toggle="dropdown"> <i
                                data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li><a href="javascript:;" class="dropdown-item"> <i data-lucide="file"
                                                                                     class="w-4 h-4 mr-2"></i> Download
                                        Docs </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END: Modal Header -->

                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                    <div class="col-span-12 sm:col-span-6">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" class="border-remover form-control">
                        <div id="error-name" class="login__input-error text-danger -intro-y"></div>
                    </div>




                    <div class="col-span-12 sm:col-span-6">
                        <label for="users" class="form-label">Teachers</label>
                        <select id="users" data-placeholder="Select Teachers" class="tom-select w-full" multiple>
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-span-12 sm:col-span-6">
                        <label for="section_id" class="form-label">Section</label>
                        <select id="section_id" data-placeholder="Select Section" class="border-remover tom-select w-full">
                            @foreach($sections as $section)
                            <option value="{{$section->id}}">{{$section->name}}</option>
                            @endforeach
                        </select>
                        <div id="error-section_id" class="login__input-error text-danger  -intro-y"></div>
                    </div>


                    <div class="col-span-12 sm:col-span-6 flex items-end">
                        <div class="mr-2">
                            <label for="priority" class="form-label mr-2">Priority</label>
                            <div id="error-priority" class="login__input-error text-xs text-danger intro-y"></div>
                            <input id="priority" type="number" class="border-remover form-control" placeholder="1">
                        </div>


                        <div class="form-check form-switch">
                            <input id="primary" class="mb-2 form-check-input" type="checkbox" value="0">
                            <label for="primary" class="form-label ml-2 text-primary text-xs">isPrimary?</label>
                        </div>
                    </div>


                </div>
                <!-- END: Modal Body -->

                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel
                    </button>
                    <button id="btn-save" type="button" class="btn btn-primary w-20">Send</button>
                </div> <!-- END: Modal Footer --> </div>
        </div>
    </div>
    <!-- END: Modal Content -->

@endsection

@section('script')
    <script>


        function send_notification(name , action) {
            Swal.fire({
                position: 'bottom-end',
                icon: 'success',
                title: `${name} has been ${action}`,
                showConfirmButton: false,
                timer: 1500
            })
        }

        @foreach($modules as $module)

            select = document.getElementById('t' + {{$module->id}});
        select.tomselect.lock()

        @endforeach

        $('#allow_edit').on('click', function () {
            let select;

            @foreach($modules as $module)

                select = document.getElementById('t' + {{$module->id}});
            select.tomselect.unlock()

            @endforeach


        })

        function update_module(id) {

            let teachers = $('#t' + id).val()

            axios.post(`http://127.0.0.1:8000/u/admin/module/${id}`, {

                teachers: teachers,


            }).then(res => {

                send_notification('module' , 'updated')



            }).catch(err => {

            })


        }

        /* BEGIN : Save Module Onclick */
        $('#btn-save').on('click' , function (){
             save_module();
        })
        /* END : Save Module Onclick */



        const myModalEl = document.getElementById('new_module')
        myModalEl.addEventListener('hidden.tw.modal', function(event) {
            $('.border-remover').removeClass('border-danger')
            $('.login__input-error').html('')
        })



        /* BEGIN : SAVE_MODULE_FUNCTION */
        async function save_module() {





            const btn_save =  $('#btn-save')
            console.log('clicked')

           btn_save.html('<i data-loading-icon="three-dots" data-color="white" class="sv w-5 h-5 mx-auto"></i>')
            tailwind.svgLoader()
            await helper.delay(1500)

            axios.post(`{{route('team.module.save')}}`, {

                name: $('#name').val(),
                teachers : $('#users').val(),
                priority : $('#priority').val(),
                section_id: $('#section_id').val(),
                isPrimary : $('#primary').val(),


            }).then(res => {
                btn_save.html('Save')
                const myModal = tailwind.Modal.getInstance(document.querySelector("#new_module"));
                myModal.hide();

                send_notification('module' , 'created')

            }).catch(err => {



                for (const [key, val] of Object.entries(err.response.data.errors)) {
                    $(`#${key}`).addClass('border-danger')
                    $(`#error-${key}`).html(val)
                }


                btn_save.html('save')

            })

        }
        /* END : SAVE_MODULE_FUNCTION */

    </script>
@endsection
