@extends('../layout/' . $layout)

@section('subhead')
    <title>Add User</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Add <span class="text-primary text-lg">Team  User </span></h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{route('team.admin.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="intro-y box p-5">
                    <div>
                        <label for="name" class="form-label">Full Name</label>
                        <input id="name" type="text" name="name" class="form-control w-full" placeholder="jon Doe">
                        @error('name')
                        <div id="error-password" class="login__input-error text-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="role" class="form-label">Role </label>
                        <select data-placeholder="Select your favorite actors" name="role[]" class="tom-select w-full"
                                id="role" multiple>
                            @foreach(\App\Models\Role::all() as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="gen" class="form-label">Role </label>
                        <select name="gender" class="tom-select w-full"
                                id="gen" >
                                <option value="male" selected >Male</option>
                                <option value="female">Female</option>
                        </select>
                    </div>



                    <div class="mt-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <input id="email" name="email" type="text" class="form-control" placeholder="Exemple">
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
                            <input id="isActive" name="active" type="checkbox" value="1" class="form-check-input">
                        </div>
                    </div>

                    <div class="mt-5">
                        <label for="isActive"></label>
                        <span class="text-primary mr-1">Upload a file</span>
                        <div >
                            <input type="file" name="photo">
                        </div>
                        @error('photo')
                        <div id="error-password" class="login__input-error text-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="text-right mt-5">
                        <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
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
