@extends('../layout/' . $layout)

@section('subhead')
    <title>Modules - smart School</title>
@endsection
@section('subcontent')




    <h2 class="intro-y text-lg font-medium mt-10">
        User List Layout</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div
            class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div
                class="hidden md:block mx-auto text-slate-500">
                Be professional Please !
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div
            class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table
                class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">
                        Student
                    </th>
                    <th class="whitespace-nowrap">
                        Guardian
                    </th>
                    <th class="whitespace-nowrap">
                        REGISTRATION DATE
                    </th>
                    <th class="text-center whitespace-nowrap">
                        ACTIONS
                    </th>

                    <th id="groupeShowTh" class="text-center whitespace-nowrap hidden">
                        GRADE - SECTION (GROUP)
                    </th>


                </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr class="intro-x">
                        <td>

                            {{$student->name}}



                        </td>

                        <td>


                            {{$student->guardian->name}}

                            <div
                                class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                {{$student->guardian->email}}
                            </div>


                        </td>


                        <td>
                            <p
                                class="font-medium whitespace-nowrap">{{ $student->created_at}}</p>
                            <div
                                class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                {{\Carbon\Carbon::parse($student->created_at)->diffForHumans()}}
                            </div>
                        </td>



                        <td class="table-report__action w-56 ">
                            <div
                                class="flex justify-center items-center">


                                    <button
                                        type="submit" onclick="show_groupe({{$student->id}})"
                                        class="flex items-center mr-3 text-success">
                                        <i data-lucide="check-square"
                                           class="w-4 h-4 mr-1"></i>
                                        Accept
                                    </button>




                                    <button
                                        type="submit"
                                        class="flex items-center mr-3 text-danger">
                                        <i data-lucide="check-square"
                                           class="w-4 h-4 mr-1"></i>
                                        Decline
                                    </button>


                            </div>

                        </td>

                        <td id="groupeShow-{{$student->id}}" class="hidden">
                            <span class="text-primary text-xs font-bold ">  {{$student->section->grade->name}}  ({{$student->section->name}})</span>
                            <select id="group" class="tom-select" >


                                @foreach($student->section->groups as $group)
                                    <option value="{{$group->id}}">  {{$group->name}} </option>
                                @endforeach

                            </select>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->

        <div
            class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{--            {{$users->links()}}--}}
        </div>

        <!-- END: Pagination -->
    </div>
@endsection

@section('script')

    <script>
        function show_groupe(id) {
            $(`#groupeShow-${id}`).removeClass('hidden')
            $(`#groupeShowTh`).removeClass('hidden')
        }
    </script>

@endsection
