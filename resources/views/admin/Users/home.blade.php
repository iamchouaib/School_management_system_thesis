@extends('../layout/' . $layout)

@section('subhead')
    <title>Users List - smart School</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">User List Layout</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#form_add_user" class="btn btn-primary">
                <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i> New User
                </a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing {{request('perPage') ?? '5'}} of all users</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <form action="" method="get">
                        <input type="text" name="search" class="form-control w-56 box pr-10" placeholder="Search..."
                               value="{{request('search')}}">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                    </form>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">IMAGES</th>
                    <th class="whitespace-nowrap">FULL NAME</th>
                    <th class="text-center whitespace-nowrap">ROLES</th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="{{$user->name}} image" class="tooltip rounded-full"
                                         src="{{ asset('images/' . $user->profile->image) }}"
                                         title="Uploaded at {{ now()->diffForHumans() }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href=""
                               class="font-medium whitespace-nowrap">{{ $user->name == auth()->user()->name ? 'its Me' : $user->name}}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $user->email }}</div>
                        </td>
                        <td class="lg:flex">

{{--                {{$user->roles->implode('name' , ' , ')}} --}}
                            @foreach($user->roles as $role)
                                <span
                                    class="uppercase block mb-1 font-bold {{$role->name == 'admin' ? 'bg-pending'  : ($role->name =='teacher' ? 'bg-primary' : 'bg-danger') }} ml-1 text-xs p-2 rounded-full text-white"> {{ $role->name }}

                                    @if($role->name == 'teacher')
                                        <span class="lowercase text-xs font-normal text-gray-300" >   {{$user->modules->implode('name' , ',')}}  </span>
                                    @endif
                                </span>

                            @endforeach
                        </td>
                        <td class="w-40">
                            <div
                                class="flex items-center justify-center {{ $user->active ? 'text-success' : 'text-danger' }}">
                                <i data-lucide="check-square"
                                   class="w-4 h-4 mr-2"></i> {{ $user->active ? 'Active' : 'Inactive' }}
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{route('team.admin.edit-user' ,$user->id)}}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                   data-tw-target="#delete-confirmation-modal">
                                    <input type="hidden" id="user" name="id" value="{{$user->id}}">
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
            {{$users->links()}}
            <form method="get" id="perpageform">
                <select id='perp' class="w-20 form-select box mt-3 sm:mt-0" name="perPage">
                    <option value="5" @selected(request('perPage') == 5)>5</option>
                    <option value="10" @selected(request('perPage') == 10)>10</option>
                    <option value="15" @selected(request('perPage') == 15)>15</option>
                    <option value="50" @selected(request('perPage') == 50)>50</option>

                </select>
            </form>
        </div>
        <script>
            document.querySelector('#perp').addEventListener('change', function () {
                document.querySelector('#perpageform').submit();
            })
        </script>

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
                    <form action="{{route('team.admin.destroy')}}" method="post">
                        @csrf
                        <input id="id_user" type="hidden" name ="id" value="">
                        <script>
                            let userId = document.getElementById('user').value;
                            document.getElementById('id_user').value = userId;
                        </script>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-danger w-24">Delete</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->




    <!-- BEGIN: Modal Content -->
    <div id="form_add_user" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" id="user-form">

                <div class="intro-y box p-5">
                    <div>
                        <label for="name" class="form-label">Full Name</label>
                        <input id="name" type="text" name="name" class="form-control w-full" placeholder="jon Doe">

                        <div id="error-name" class="login__input-error text-danger mt-2"></div>
                    </div>

                    <div class="mt-3">
                        <label for="role" class="form-label">Role </label>
                        <select data-placeholder="To do Add new Role" class="tom-select w-full"
                                id="role" multiple>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach

                        </select>
                        <div id="error-role" class="login__input-error text-danger mt-2"></div>

                    </div>

                    <div class="mt-3">
                        <label for="gender" class="form-label">Gender </label>
                        <select  class="tom-select w-full"
                                id="gender" >
                            <option value="male" selected >Male</option>
                            <option value="female">Female</option>
                        </select >
                    </div>



                    <div class="mt-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <input id="email" type="text" class="form-control" placeholder="Exemple">
                            <div class="input-group-text">@samrt.com</div>
                        </div>
                        <div id="error-email" class="login__input-error text-danger mt-2"></div>


                    </div>


                    <div class="mt-3">
                        <label for="active">Is Active ?</label>
                        <div class="form-switch mt-2">
                            <input id="active" name="active" type="checkbox" value="1" class="form-check-input">
                        </div>
                        <div id="error-active" class="login__input-error text-danger mt-2"></div>
                    </div>

                    <div class="text-right mt-5">
                        <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" id="user_submit" class="btn btn-primary w-24">Save</button>
                    </div>

        </div>

        </div>
    </div>
    <!-- END: Modal Content -->

@endsection

@section('script')

    <script>


        (function () {
            async function save_user() {
                // Reset state
                $('#user-form').find('.login__input').removeClass('border-danger')
                $('#user-form').find('.login__input-error').html('')



                // Loading state
                $('#user_submit').html('<i data-loading-icon="ball-triangle" data-color="white" class="w-5 h-5 mx-auto"></i>')
                tailwind.svgLoader()
                await helper.delay(1500)

                axios.post(`{{route('team.admin.store')}}`, {

                    // Post form
                     name  : $('#name').val(),
                     role  : $('#role').val(),
                     email  : $('#email').val()+'@smart.com',
                     active  : $('#active').val(),
                     gender : $('#gender').val(),


                }).then(async res => {

                    tailwind.Modal.getInstance(document.querySelector("#form_add_user")).hide()

                    const {value: password} = await Swal.fire({
                        title: 'PASSWORD : ',
                        input: 'text',
                        inputLabel: 'Password',
                        inputValue: `${res.data.password}`,
                        inputAttributes: {
                            maxlength: 10,
                            autocapitalize: 'off',
                            autocorrect: 'off'
                        }
                    })

                    if (password) {
                        Swal.fire(`password : ${password}`)

                        /*send email */


                    }

                }).catch(err => {
                    $('#user_submit').html('save')
                        for (const [key, val] of Object.entries(err.response.data.errors)) {
                            console.log(key)
                            $(`#${key}`).addClass('border-danger')
                            $(`#error-${key}`).html(val).addClass('-intro-y')
                        }

                })
            }









            $('#user_submit').on('keyup', function(e) {
                if (e.keyCode === 13) {
                    save_user()
                }
            })

            $('#user_submit').on('click', function() {
                    save_user()
            })
        })()
    </script>
@endsection
