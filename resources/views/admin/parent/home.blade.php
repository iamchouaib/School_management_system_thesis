@extends('../layout/' . $layout)

@section('subhead')
    <title>Guardians - Smart School</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">New Parent Approve </h2>
    <div class="grid grid-cols-12 gap-6 mt-5"   >
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="hidden md:block mx-auto text-slate-500 uppercase">Page  {{request('page') ?? 'first'}} </div>
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
                    <th class="whitespace-nowrap">IMAGES</th>
                    <th class="whitespace-nowrap">GUARDIAN NAME</th>
                    <th class="text-center whitespace-nowrap">INFORMATION</th>
                    <th class=" whitespace-nowrap">JOB</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @if($parents->count() == 0 )
                    <tr>


                            <td colspan="4" class=" font-bold alert alert-success-soft show flex items-center mb-2" role="alert">
                                <i data-lucide="megaphone" class="w-6 h-6 mr-2"></i>   No Pending Guardian Now
                            </td>


                    </tr>

                @endif
                @foreach ($parents as $parent)
                    <tr id="c{{$parent->id}}" class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="" class="tooltip rounded-full" src="{{ asset('images/' . $parent->photo) }}" title="Uploaded at ">
                                </div>
                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                    <img alt="" class="tooltip rounded-full" src="{{ asset('images/' . $parent->photo) }}" title="Uploaded at ">
                                </div>
                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                    <img alt="" class="tooltip rounded-full" src="{{ asset('images/' . $parent->photo) }}" title="Uploaded at ">
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="" class="font-bold whitespace-nowrap">{{ $parent->name }}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $parent->email }}</div>
                        </td>
                        <td class="text-center text-xs">{{ $parent->address}}</td>
                        <td class="">

                          {{$parent->job}}

{{--                            --}}
{{--                            <div class="flex items-center justify-center {{ $parent->isActive ? 'text-success' : 'text-danger' }}">--}}
{{--                                <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $parent->isActive ? 'Active' : 'Inactive' }}--}}
{{--                            </div>--}}
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <button class="btn btn-success flex text-bold items-center mr-3 text-white" id="a{{$parent->id}}" onclick="accept_parent('{{$parent->id}}')">
                                    <i data-lucide="user-plus" class="w-4 h-4 mr-1"></i> Accept
                                </button>
                                <button class="btn btn-danger mr-1 mb-2" id="d{{$parent->id}}" onclick="delete_parent('{{$parent->id}}')">
                                    <i data-lucide="trash" class="w-5 h-5 mr-1"></i>
                                </button>
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
            {{$parents->links()}}

            @if($parents->count() != 0)
                <select class="w-20 form-select box mt-3 sm:mt-0">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                </select>
            @endif

        </div>
        <!-- END: Pagination -->
    </div>



@endsection


@section('script')
    <script>




async function delete_parent(id) {


    $('#d' + id).html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>')
    tailwind.svgLoader()
    await helper.delay(1500)

    axios.post('http://127.0.0.1:8000/u/admin/parents/request/' + id, {}).then(res => {
        $('#c' + id).remove();
    })
        .catch(err => {

        })



}

async function accept_parent(id) {


    $('#a' + id).html('<i data-loading-icon="circles" data-color="white" class="w-5 h-5 mx-auto"></i>')
    tailwind.svgLoader()
    await helper.delay(1500)

    axios.post('http://127.0.0.1:8000/u/admin/parents/accept/' + id, {}).then(res => {
        $('#c' + id).remove();
    })
        .catch(err => {

        })



}


    </script>
@endsection



