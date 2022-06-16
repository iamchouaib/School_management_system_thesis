@extends('../layout/' . $layout)

@section('subhead')
    <title>Grades - Admin - smart School </title>
@endsection

@section('subcontent')


    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">GRADES </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: FAQ Menu -->

        @foreach($grades as $grade)
            <a id="g-{{$grade->id}}" onclick="show_section('{{$grade->id}}')"
               class="grade intro-y col-span-12 lg:col-span-4 box py-10 border-2">
                <i data-lucide="{{$grade->logo}}" class="block w-12 h-12 text-primary mx-auto"></i>
                <div class="font-medium text-center text-base mt-3 cursor-pointer">{{$grade->name}}</div>
                <div class="text-slate-500 mt-2 w-3/4 text-center mx-auto"> {{substr($grade->description , 0 , 50 )}}
                    ...
                </div>
            </a>
    @endforeach



    <!-- END: FAQ Menu -->
        <!-- BEGIN: FAQ Content -->
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="box">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <i data-lucide="lasso-select" class="text-primary w-10 h-10 mr-2"></i>
                    <h2 class="font-medium text-base mr-auto">Select Year to Get </h2>
                </div>
                <div id="faq-accordion-1" class="accordion p-5">
                    <div class="accordion-item">
                        <div id="faq-accordion-content-1" class="accordion-header">
                            <button class="accordion-button flex" type="button" data-tw-toggle="collapse"
                                    data-tw-target="#faq-accordion-collapse-1" aria-expanded="true"
                                    aria-controls="faq-accordion-collapse-1">
                                <i data-lucide="chevrons-down-up" class=" w-5 h-5 mr-2"></i>collaps
                            </button>
                        </div>
                        <div id="faq-accordion-collapse-1" class="accordion-collapse collapse show"
                             aria-labelledby="faq-accordion-content-1" data-tw-parent="#faq-accordion-1">
                            <div class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed">
                                <div id="sections_aria" class="grid grid-cols-12 gap-5 mt-5">

                                    {{-- js--}}


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: FAQ Content -->

        <!-- BEGIN: FAQ Content -->
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="box">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <i data-lucide="lasso-select" class="text-primary w-10 h-10 mr-2"></i>
                    <h2 class="font-medium text-base mr-auto">Select Year to Get </h2>
                </div>
                <div id="faq-accordion-1" class="accordion p-5">
                    <div class="accordion-item">
                        <div id="faq-accordion-content-1" class="accordion-header">
                            <button class="accordion-button flex" type="button" data-tw-toggle="collapse"
                                    data-tw-target="#faq-accordion-collapse-1" aria-expanded="true"
                                    aria-controls="faq-accordion-collapse-1">
                                <i data-lucide="chevrons-down-up" class=" w-5 h-5 mr-2"></i>collaps
                            </button>
                        </div>
                        <div id="faq-accordion-collapse-1" class="accordion-collapse collapse show"
                             aria-labelledby="faq-accordion-content-1" data-tw-parent="#faq-accordion-1">
                            <div class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed">
                                <div id="groupes_aria" class="">

                                    {{-- js--}}


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: FAQ Content -->
    </div>
















    {{--    {{dd($students)}}--}}
    {{--        <div class="flex p-10 w-full bg-primary/10 mb-4 border shadow border-primary">--}}
    {{--            <div class="flex-1">--}}
    {{--                <h1 class="text-4xl text-primary font-medium leading-none uppercase">{{$grade->name}}</h1>--}}
    {{--                <p class=" mt-2">{{$grade->description}}</p>--}}
    {{--            </div>--}}
    {{--            <div class="flex-1 flex items-center justify-center">--}}
    {{--                <div class="text-center mr-2">--}}
    {{--                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview"--}}
    {{--                       class="btn btn-primary">Edit</a>--}}
    {{--                </div>--}}
    {{--                <div class="text-center">--}}
    {{--                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-modal-preview"--}}
    {{--                       class="btn btn-danger">Delete</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}







            <!-- BEGIN: delete Content -->
            <div id="delete-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="p-5 text-center">
                                <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Are you sure?</div>
                                <div class="text-slate-500 mt-2">Do you really want to delete <span
                                        class="text-danger font-bold">this </span> groupe  <br>
                                    all Sessions and her packages will delete ..
                                </div>
                            </div>
                            <div class="px-5 pb-8 text-center">
                                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                                    Cancel
                                </button>
                                <input
                                    type="hidden"
                                    id="groupe">
                                <button type="button" class="btn btn-danger w-24" onclick="doDelete()">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!-- END: Modal Content -->



    {{--        <!-- BEGIN: Modal edit Content -->--}}
    {{--        <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">--}}
    {{--            <div class="modal-dialog">--}}
    {{--                <div class="modal-content">--}}
    {{--                    <!-- BEGIN: Modal Header -->--}}
    {{--                    <div class="modal-header">--}}
    {{--                        <h2 class="font-medium text-base mr-auto">{{$grade->name}}</h2>--}}
    {{--                    </div>--}}
    {{--                    <!-- END: Modal Header -->--}}
    {{--                    <!-- BEGIN: Modal Body -->--}}
    {{--                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">--}}
    {{--                        <div class="col-span-12 sm:col-span-6">--}}
    {{--                            <label for="name" class="form-label">Name</label>--}}
    {{--                            <input disabled id="name" type="text" class="form-control" value="{{$grade->name}}">--}}
    {{--                        </div>--}}
    {{--                        <div class="col-span-12 sm:col-span-6">--}}
    {{--                            <label for="namee" class="form-label">To</label>--}}
    {{--                            <input id="namee" type="text" class="form-control" placeholder="New Name">--}}
    {{--                        </div>--}}
    {{--                        <div class="col-span-12 sm:col-span-12">--}}
    {{--                            <label for="des" class="form-label">Description</label>--}}
    {{--                            <input id="des" type="text" class="form-control" value="{{$grade->description}}">--}}
    {{--                        </div>--}}

    {{--                        <div class="col-span-12 sm:col-span-6">--}}
    {{--                            <label for="modal-form-5" class="form-label">delete Sections</label>--}}
    {{--                            <select class="tom-select w-full" multiple>--}}
    {{--                                @foreach($grade->sections as $section)--}}
    {{--                                    <option value="{{$section->id}}">{{$section->name}}</option>--}}
    {{--                                @endforeach--}}
    {{--                            </select>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-span-12 sm:col-span-6">--}}
    {{--                            <label for="year" class="form-label">years</label>--}}
    {{--                            <input id="year" class="form-select" type="number" value="{{$grade->years}}">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <!-- END: Modal Body -->--}}
    {{--                    <!-- BEGIN: Modal Footer -->--}}
    {{--                    <div class="modal-footer">--}}
    {{--                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">--}}
    {{--                            Cancel--}}
    {{--                        </button>--}}
    {{--                        <button type="button" class="btn btn-primary w-20">Send</button>--}}
    {{--                    </div>--}}
    {{--                    <!-- END: Modal Footer -->--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <!-- END: Modal Content -->--}}











@endsection

@section('script')

    <script>


        function show_section(id) {
            $('.grade').removeClass('border-primary dark:border-primary')

            $('#groupes_aria').find('.tb').remove()

            $(`#g-${id}`).addClass('border-primary dark:border-primary')

            axios.get(`http://127.0.0.1:8000/api/section/${id}`, {})
                .then(res => {
                    $('#sections_aria').find('.rm').remove();
                    res.data.forEach(function (section) {
                        $('#sections_aria').append(
                            `        <div id="s-${section.id}" class="-intro-y rm section border border-slate-300 col-span-12 sm:col-span-4 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
                                                  <a onclick="show_groupes(${section.id})">
                                            <div class="font-medium text-base">
                                         <span class="font-bold cursor-pointer"> ${section.name}</span>
                                         <span class="text-primary font-bold"> <span class="text-pending">(</span> ${section.year} </span> year <span class="text-pending">)</span> </div>
                                           <div class="text-slate-500 mt-2 ">${section.groups_count} groupes </div>
                                                  </a>

                                               </div>`)


                    })


                })
                .catch(err => {
                })

            $('#groupes_aria').append(`

 <div class="tb intro-y overflow-auto lg:overflow-visible bg-primary p-4 text-white">
        <table  class="table table-report -mt-2 font-bold text-primary">
            <thead>
            <tr class="text-secondary">
                <th class="whitespace-nowrap ">#</th>
                <th class="whitespace-nowrap">Name</th>
                <th class="whitespace-nowrap">Students</th>
                <th class="whitespace-nowrap ">Action</th>
            </tr>
            </thead>
            <tbody id="tbody">

</tbody>
</table>
</div>
                        `)

        }


        function show_groupes(id) {

            $('.section').removeClass('bg-primary text-white dark:bg-primary')

            $(`#s-${id}`).addClass('bg-primary text-white dark:bg-primary')
            // $('#groupes_aria').find('.rm').remove();


            axios.get(`http://127.0.0.1:8000/api/groupesBySection/${id}`, {})
                .then(res =>    {


                    $('#tbody').find('tr').remove();

                    res.data.forEach((groupe) => {

                        const tableRow = document.createElement('tr')

                        tableRow.setAttribute('id' , `t${groupe.id}`)
                        tableRow.classList.add('intro-x' , 'py-2' , 'bg-secondary')

                        const idColumn = document.createElement('td')
                        const nameColumn = document.createElement('td')
                        const studentsColumn = document.createElement('td')
                        const actionColumn = document.createElement('td')
                        actionColumn.classList.add('table-report__action' , 'w-56')



                        const actionLink = document.createElement('a')
                        actionLink.classList.add('btn'  , 'btn-warning' ,'font-bold','mr-2');
                         actionLink.setAttribute('href' , '/u/admin/group/'+groupe.id)
                        actionLink.append('Schedule')

                        const actionDLink = document.createElement('a')
                        actionDLink.classList.add('btn'  , 'btn-outline-danger' ,'font-bold');
                         actionDLink.setAttribute('onclick' , `delete_group('${groupe.id}')`)





                        actionDLink.append('Delete')







                        idColumn.append(groupe.id)
                        nameColumn.append(groupe.name)
                        studentsColumn.append(groupe.students_count + ' ( ' + groupe.modules_count + ' module(s) )')
                        actionColumn.append(actionLink)
                        actionColumn.append(actionDLink)


                        tableRow.append(idColumn)
                        tableRow.append(nameColumn)
                        tableRow.append(studentsColumn)
                        tableRow.append(actionColumn)


                        document.querySelector('#tbody').append(tableRow)


                    }); //endForeach


                })
                .catch(err => {
                })


        }


        function delete_group(id){

            const myModel = tailwind.Modal.getInstance(document.querySelector("#delete-modal-preview"));
            myModel.show();
            $('#groupe').val(id) ;


        }

        function doDelete(){

            idGro = $('#groupe').val()

            console.log(idGro)

            // axios.post(`http://127.0.0.1:8000/api/deleteGroup/${idGro}`, {})
            //     .then(res => {

                   $(`#t${idGro}`).remove()

                // })
                // .catch(err => {
                // })

        }




    </script>


@endsection
