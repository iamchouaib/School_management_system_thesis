@extends('../layout/' . $layout)

@section('subhead')
    <title>Update User</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Edit <span class="text-primary text-lg">Team  User </span></h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{route('team.admin.update-user' , $user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="intro-y box p-5">
                    <div>
                        <label for="name" class="form-label">Full Name</label>
                        <input id="name" type="text" name="name" class="form-control w-full" value="{{$user->name}}">
                        @error('name')
                        <div id="error-password" class="login__input-error text-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="role" class="form-label">Role </label>
                        <select data-placeholder="Select Roles" name="role[]" class="tom-select w-full"
                                id="role" multiple>
                            @foreach(\App\Models\Role::all() as $role)
                                <option value="{{$role->id}}" @selected($user->roles->contains('name' ,$role->name))>{{$role->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="gen" class="form-label">Role </label>
                        <select name="gender" class="tom-select w-full"
                                id="gen" >
                                <option value="male" >Male</option>
                                <option value="female" selected>Female</option>
                        </select>
                    </div>



                    <div class="mt-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <input id="email" name="email" type="text" class="form-control" value="{{str_replace('@smart.com', '' , $user->email )}}">
                            <div class="input-group-text">@samrt.com</div>
                        </div>
                            @error('email')
                            <div id="error-password" class="login__input-error text-danger mt-2">{{$message}}</div>
                            @enderror

                    </div>

                    <div class="mt-3">
                        <label class="form-label"> Some profile setting </label>
                        <div class="sm:grid grid-cols-3 gap-2">
                            <div class="input-group">
                                <div id="input-group-3" class="input-group-text">Facebook</div>
                                <input type="text" class="form-control" placeholder="Example">
                            </div>
                            <div class="input-group mt-2 sm:mt-0">
                                <div id="input-group-4" class="input-group-text">E-learning</div>
                                <input type="text" class="form-control" placeholder="Example">
                            </div>
                            <div class="input-group mt-2 sm:mt-0">
                                <div id="input-group-5" class="input-group-text">Date</div>
                                <input type="date" class="form-control" placeholder="Setif" ">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="isActive">Is Active ?</label>
                        <div class="form-switch mt-2">
                            <input id="isActive" name="active" type="checkbox" class="form-check-input" @checked($user->active)>
                        </div>
                    </div>

                    <div class="text-right mt-5">
                        <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-24">Update</button>
                    </div>

            </form>
        </div>
        <!-- END: Form Layout -->
    </div>
    <div class="flex intro-y col-span-12 lg:col-span-6 items-center justify-center">
        @if(session('password'))
            password :  {{session('password')}}
        @endif
        <img src="{{asset('dist/images/illustration.svg')}}" class="text-primary" alt="" srcset="">
    </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
