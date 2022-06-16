@extends('../layout/' . $layout)

@section('subhead')
    <title>Grades - Admin - smart School </title>
@endsection

@section('subcontent')


    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            GRADES </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: FAQ Menu -->

        @foreach($session as $session)
            <a
               href="?session={{$session->id}}"
               class="grade intro-y col-span-12 lg:col-span-2 box py-10 border-2
@if(request('session') == $session->id) shadow border border-primary text-primary @endif ">
                <i data-lucide=""
                   class="cursor-pointer block w-10 h-10 text-primary mx-auto"></i>
                <div
                    class="font-medium text-center text-base mt-3 cursor-pointer">
                    {{$session->groupe->name }}{{$session->module->name}}</div>
                <div
                    class="text-slate-500 mt-2 w-3/4 text-center mx-auto"> {{$session->session_type}}
                </div>
            </a>
        @endforeach



        @if(request('session'))
            <div
                class="intro-y col-span-12 lg:col-span-12">
                <div class="box">
                    <div
                        class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <i data-lucide="lasso-select"
                           class="text-primary w-10 h-10 mr-2"></i>
                        <h2 class="font-medium text-base mr-auto">
                            Select Year to
                            Get </h2>
                    </div>
                    <div id="faq-accordion-1"
                         class="accordion p-5">
                        <div
                            class="accordion-item">
                            <div
                                id="faq-accordion-content-1"
                                class="accordion-header">
                                <button
                                    class="accordion-button flex"
                                    type="button"
                                    data-tw-toggle="collapse"
                                    data-tw-target="#faq-accordion-collapse-1"
                                    aria-expanded="true"
                                    aria-controls="faq-accordion-collapse-1">
                                    <i data-lucide="chevrons-down-up"
                                       class=" w-5 h-5 mr-2"></i>collapse
                                </button>
                            </div>
                            <div
                                id="faq-accordion-collapse-1"
                                class="accordion-collapse collapse show"
                                aria-labelledby="faq-accordion-content-1"
                                data-tw-parent="#faq-accordion-1">
                                <div
                                    class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed">
                                    <div
                                        class="overflow-x-auto">
                                        <table
                                            class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="whitespace-nowrap">
                                                    #
                                                </th>
                                                <th class="whitespace-nowrap">
                                                    First
                                                    Name
                                                </th>
                                                <th class="whitespace-nowrap">
                                                    Evaluation
                                                </th><th class="whitespace-nowrap">
                                                    Td Note
                                                </th> <th class="whitespace-nowrap">
                                                    Test
                                                </th> <th class="whitespace-nowrap">
                                                    Final note
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <form action="{{route('team.teacher.grade-students.store' ,request('session'))}}" method="post">

                                                @csrf

                                            @foreach($students as $student)
                                                <input hidden name="students[]" value="{{$student->id}}">
                                                <tr>
                                                    <td>
                                                        {{$student->id}}
                                                    </td>
                                                    <td>
                                                        {{$student->name}}
                                                    </td>
                                                    <td>
                                                        <div class="input-group mt-2">
                                                            <input name="evaluations[]" type="number" class="form-control" value="{{$student->note->evaluation}}" aria-label="evaluation" min="0" max="20">
                                                            <div class="input-group-text">/20</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group mt-2">
                                                             <input name="note_tds[]" type="number" class="form-control" placeholder="grade" value="{{$student->note->note_td}}" aria-label="td" min="0" max="20">
                                                            <div class="input-group-text">/20</div>
                                                        </div>
                                                    </td> <td>
                                                        <div class="input-group mt-2">
                                                            <input name="tasks[]" type="number" class="form-control" placeholder="grade"
                                                                   value="{{$student->note->task}}"
                                                                   aria-label="task" min="0" max="20">
                                                            <div class="input-group-text">/20</div>
                                                        </div>
                                                    </td> <td>
                                                        <div class="input-group mt-2">
                                                            <input type="text" class="form-control"
                                                                   value="{{$student->note->note}}"
                                                                   placeholder="=" aria-label="note">
                                                            <div class="input-group-text">/20</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach



                                                <button class="btn btn-primary"
                                                        type="submit">save </button>
                                            </form>
                                            </tbody>


                                        </table>

                                    </div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>


@endsection

@section('script')




@endsection

