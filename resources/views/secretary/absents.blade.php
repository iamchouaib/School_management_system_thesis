@extends('../layout/' . $layout)

@section('subhead')
    <title>Modules - smart School</title>
@endsection
@section('subcontent')




    <h2 class="intro-y text-lg font-medium mt-10">
        Manage Absences</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div
            class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div
                class=" md:block mx-auto text-slate-500">
                Justification Requests
            </div>
        </div>
        <!-- BEGIN: Data List -->
        @if($justifications->count() == 0 )
            <div
                class="intro-y col-span-12 text-center overflow-auto lg:overflow-visible">
                No justification Yet
            </div>
        @else
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
                            Absent Date
                        </th>
                        <th class="text-center whitespace-nowrap">
                            JUSTIFICATION FILE
                        </th>
                        <th class="text-center whitespace-nowrap">
                            Guardian said
                        </th>
                        <th class="text-center whitespace-nowrap">
                            ACTIONS
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($justifications as $justification)
                        <tr class="intro-x">
                            <td>

                                {{$studentAll[$loop->index]->name}}

                                <div
                                    class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    groupe
                                    : {{$studentAll[$loop->index]->groupe->name}}
                                </div>


                            </td>

                            <td>


                                {{$studentAll[$loop->index]->guardian->name}}

                                <div
                                    class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    {{$studentAll[$loop->index]->guardian->email}}
                                </div>


                            </td>


                            <td>
                                <p
                                    class="font-medium whitespace-nowrap">{{ $justification->created_at}}</p>
                                <div
                                    class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                    {{now()->diffForHumans($justification->created_at)}}
                                </div>
                            </td>
                            <td>
                                <a href="{{asset('storage/'.$justification->justification_path)}}">click</a>

                            </td>
                            <td class="w-40">
                                {{$justification->remarks}}
                            </td>
                            <td class="table-report__action w-56">
                                <div
                                    class="flex justify-center items-center">

                                    <form
                                        action="{{route('team.secretary.absences.accept' , $justification->id)}}"
                                        method="post">
                                        @csrf
                                        <input
                                            type="hidden"
                                            name="student_id"
                                            value="{{$student[$loop->index]->id}}">
                                        <button
                                            type="submit"
                                            class="flex items-center mr-3 text-success">
                                            <i data-lucide="check-square"
                                               class="w-4 h-4 mr-1"></i>
                                            Accept
                                        </button>

                                    </form>

                                    <form
                                        action="{{route('team.secretary.absences.decline' ,$justification->id)}}"
                                        method="post">
                                        @csrf
                                        <button
                                            type="submit"
                                            class="flex items-center mr-3 text-danger">
                                            <i data-lucide="check-square"
                                               class="w-4 h-4 mr-1"></i>
                                            Accept
                                        </button>

                                    </form>

                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

    @endif
    <!-- END: Data List -->
        <!-- BEGIN: not jusify -->
        <div
            class="mt-4 intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div
                class=" md:block mx-auto text-slate-500">
                All Absences
            </div>
        </div>
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
                        Absent Date
                    </th>
                    <th class="text-center whitespace-nowrap">
                        Notify Parent Again
                    </th>
                    <th class="text-center whitespace-nowrap">
                        ACTIONS
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($justificationsAll as $justification)
                    <tr class="intro-x">
                        <td>

                            {{$student[$loop->index]->name}}

                            <div
                                class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                groupe
                                : {{$student[$loop->index]->groupe->name}}
                            </div>


                        </td>

                        <td>


                            {{$student[$loop->index]->guardian->name}}

                            <div
                                class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                {{$student[$loop->index]->guardian->email}}
                            </div>


                        </td>


                        <td>
                            <p
                                class="font-medium whitespace-nowrap">{{ $justification->created_at}}</p>
                            <div
                                class="text-slate-500 text-xs whitespace-nowrap mt-0.5">
                                {{now()->diffForHumans($justification->created_at)}}
                            </div>
                        </td>
                        <td>
                            <a href="/notify/1"
                               class="btn btn-primary">Notify
                                Parent</a></td>
                        <td class="table-report__action w-56">
                            <div
                                class="flex justify-center items-center">

                                <form
                                    action="{{route('team.secretary.absences.accept' , $justification->id)}}"
                                    method="post">
                                    @csrf
                                    <input
                                        type="hidden"
                                        name="student_id"
                                        value="{{$student[$loop->index]->id}}">
                                    <button
                                        type="submit"
                                        class="flex items-center mr-3 text-success">
                                        <i data-lucide="check-square"
                                           class="w-4 h-4 mr-1"></i>
                                        Accept
                                    </button>

                                </form>

                                <form
                                    action="{{route('team.secretary.absences.decline' ,$justification->id)}}"
                                    method="post">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="flex items-center mr-3 text-danger">
                                        <i data-lucide="check-square"
                                           class="w-4 h-4 mr-1"></i>
                                        Accept
                                    </button>

                                </form>

                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <!-- END: Pagination -->
    </div>






@endsection

@section('script')

@endsection
