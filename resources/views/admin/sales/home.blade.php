@extends('../layout/' . $layout)

@section('subhead')
    <title>Point of Sale - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Resources</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#new-order-modal"
               class="btn btn-primary shadow-md mr-2">New Sale</a>
            <div class="pos-dropdown dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-lucide="chevron-down"></i>
                    </span>
                </button>
                <div class="pos-dropdown__dropdown-menu dropdown-menu">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="activity" class="w-4 h-4 mr-2"></i>
                                <span class="truncate">INV-0206020 - {{ $fakers[3]['users'][0]['name'] }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="activity" class="w-4 h-4 mr-2"></i>
                                <span class="truncate">INV-0206022 - {{ $fakers[4]['users'][0]['name'] }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="activity" class="w-4 h-4 mr-2"></i>
                                <span class="truncate">INV-0206021 - {{ $fakers[5]['users'][0]['name'] }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Item List -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="lg:flex intro-y">
                <div class="relative">
                    <input type="text" class="form-control py-3 px-4 w-full lg:w-64 box pr-10"
                           placeholder="Search item...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-lucide="search"></i>
                </div>
                <select class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto">
                    <option>Sort By</option>
                    <option>A to Z</option>
                    <option>Z to A</option>
                    <option>Lowest Price</option>
                    <option>Highest Price</option>
                </select>
            </div>
            <div class="grid grid-cols-12 gap-5 mt-5">
                @foreach($types as $type)

                    <div onclick="show_content('{{$type->id}}')" id="t{{$type->id}}"
                         class="ty flex items-center col-span-12 sm:col-span-4 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
                        <div>
                            <div
                                class="font-medium text-base">{{$type->name}}</div>
                            <div
                                class="text-slate-500">{{$type->sales_count}}
                                sales
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <div id="show-content" class="grid grid-cols-12 gap-5 mt-5 pt-5 border-t">
                {{--                js here--}}
            </div>
        </div>
        <!-- END: Item List -->
        <!-- BEGIN: Ticket -->
        <div class="col-span-12 lg:col-span-4">
            <div class="intro-y pr-1">
                <div class="box p-2">
                    <ul class="nav nav-pills" role="tablist">
                        <li id="ticket-tab" class="nav-item flex-1" role="presentation">
                            <button
                                class="nav-link w-full py-2 active"
                                data-tw-toggle="pill"
                                data-tw-target="#ticket"
                                type="button"
                                role="tab"
                                aria-controls="ticket"
                                aria-selected="true"
                            >
                                Ticket
                            </button>
                        </li>
                        <li id="details-tab" class="nav-item flex-1" role="presentation">
                            <button
                                class="nav-link w-full py-2"
                                data-tw-toggle="pill"
                                data-tw-target="#details"
                                type="button"
                                role="tab"
                                aria-controls="details"
                                aria-selected="false"
                            >
                                Details
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="ticket" class="tab-pane active" role="tabpanel" aria-labelledby="ticket-tab">
                    <div class="box p-2 mt-5">
                        @foreach (array_slice($fakers, 0, 5) as $key => $faker)
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-item-modal"
                               class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white dark:bg-darkmode-600 hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md">
                                <div class="max-w-[50%] truncate mr-1">{{ $faker['foods'][0]['name'] }}</div>
                                <div class="text-slate-500">x 1</div>
                                <i data-lucide="edit" class="w-4 h-4 text-slate-500 ml-2"></i>
                                <div class="ml-auto font-medium">${{ $faker['totals'][0] }}</div>
                            </a>
                        @endforeach
                    </div>
                    <div class="box flex p-5 mt-5">
                        <input type="text" class="form-control py-3 px-4 w-full bg-slate-100 border-slate-200/60 pr-10"
                               placeholder="Use coupon code...">
                        <button class="btn btn-primary ml-2">Apply</button>
                    </div>
                    <div class="box p-5 mt-5">
                        <div class="flex">
                            <div class="mr-auto">Subtotal</div>
                            <div class="font-medium">$250</div>
                        </div>
                        <div class="flex mt-4">
                            <div class="mr-auto">Discount</div>
                            <div class="font-medium text-danger">-$20</div>
                        </div>
                        <div class="flex mt-4">
                            <div class="mr-auto">Tax</div>
                            <div class="font-medium">15%</div>
                        </div>
                        <div class="flex mt-4 pt-4 border-t border-slate-200/60 dark:border-darkmode-400">
                            <div class="mr-auto font-medium text-base">Total Charge</div>
                            <div class="font-medium text-base">$220</div>
                        </div>
                    </div>
                    <div class="flex mt-5">
                        <button class="btn w-32 border-slate-300 dark:border-darkmode-400 text-slate-500">Clear Items
                        </button>
                        <button class="btn btn-primary w-32 shadow-md ml-auto">Charge</button>
                    </div>
                </div>
                <div id="details" class="tab-pane" role="tabpanel" aria-labelledby="details-tab">
                    <div class="box p-5 mt-5">
                        <div class="flex items-center border-b border-slate-200 dark:border-darkmode-400 pb-5">
                            <div>
                                <div class="text-slate-500">Time</div>
                                <div class="mt-1">02/06/20 02:10 PM</div>
                            </div>
                            <i data-lucide="clock" class="w-4 h-4 text-slate-500 ml-auto"></i>
                        </div>
                        <div class="flex items-center border-b border-slate-200 dark:border-darkmode-400 py-5">
                            <div>
                                <div class="text-slate-500">Customer</div>
                                <div class="mt-1">{{ $fakers[0]['users'][0]['name'] }}</div>
                            </div>
                            <i data-lucide="user" class="w-4 h-4 text-slate-500 ml-auto"></i>
                        </div>
                        <div class="flex items-center border-b border-slate-200 dark:border-darkmode-400 py-5">
                            <div>
                                <div class="text-slate-500">People</div>
                                <div class="mt-1">3</div>
                            </div>
                            <i data-lucide="users" class="w-4 h-4 text-slate-500 ml-auto"></i>
                        </div>
                        <div class="flex items-center pt-5">
                            <div>
                                <div class="text-slate-500">Table</div>
                                <div class="mt-1">21</div>
                            </div>
                            <i data-lucide="mic" class="w-4 h-4 text-slate-500 ml-auto"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Ticket -->
    </div>

    <!-- BEGIN: New Sale Modal -->
    <div id="new-order-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 id="show_err" class="font-medium text-base mr-auto">New Resource</h2>
                </div>
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12">
                        <label for="name_sale" class="form-label">Name</label>
                        <input id="name_sale" type="text" class="form-control flex-1" placeholder="TP1 TD1 ...">
                    </div>
                    <div class="col-span-12">
                        <label for="type_id" class="form-label">Type</label>

                        <select id="type_id" class="tom-select w-full">
                            @foreach($types as $type)
                                <option value="{{$type->id}}" >{{$type->name}}</option>
                            @endforeach
                        </select>


                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Cancel
                    </button>
                    <button type="button" id="new_sale" class="btn btn-primary w-32">Create Resource</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END: New Sale Modal -->

    <!-- BEGIN: Update Sale Modal -->
    <div id="update-sale" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Sale Updating</h2>

                </div>
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3" id="nameS">
                    {{--                  js here--}}
                </div>
                <div class="modal-footer text-right">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel
                    </button>
                    <button type="button" class="btn btn-primary w-24">
                        <i data-lucide="upload-cloud" class="w-4 h-4 mr-2"></i>
                        Update
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Update Sale Modal -->
@endsection


@section('script')

    <script>



        async function show_content(id) {

            $(`.ty`).removeClass('bg-primary text-white')

            $("#show-content").find('#test').remove()


            $(`#t${id}`).append('<i data-loading-icon="three-dots" data-color="blue" class="sv w-5 h-5 mx-auto"></i>')
            tailwind.svgLoader()
            await helper.delay(500)


            //get sales
            axios.get(`/api/type/${id}/sales`, {}).then(res => {

                //each sales and append to Parent

                res.data.forEach(function (sale) {
                    $('#show-content').append(` <a id="test" onclick="update_sale(${sale.id})"
                       class="intro-y block col-span-12 sm:col-span-4 2xl:col-span-3">
                <div class="box rounded-md p-3 relative zoom-in">
                    <div class="flex-none relative block before:block before:w-full before:pt-[100%]">
                                <div class="absolute top-0 left-0 w-full h-full image-fit">
                                    <img alt="image sale" class="rounded-md" src=${ (sale.name == 'library') ?  "{{ asset('images/l.jpg') }}" : "{{ asset('images/sale.jpg') }}" }>
                                </div>
                    </div>
                            <div class="block font-medium text-center truncate mt-3">${sale.name}</div>
                            <div
                                class="mt-2 pt-2 border-t border-slate-200/60 dark:border-darkmode-400 font-bold flex items-center justify-center ${sale.reserved ? 'text-danger' : 'text-success'}">
                                <i data-lucide="${sale.reserved ? 'x-circle' : 'check-circle'}
                                   class="w-4 h-4 mr-2"></i> ${sale.reserved ? 'Reserved' : 'Free'}
                    </div>

                </div>
            </a>`)
                })
                $(`#t${id}`).find('.sv').remove()
                $(`#t${id}`).addClass('bg-primary text-white')


            }).catch(err => {

            })
        }

        function update_sale(id) {


            axios.get(`/api/sale/${id}`, {}).then(res => {
                const myModal = tailwind.Modal.getInstance(document.querySelector("#update-sale"));
                myModal.show()

                $('#nameS').find('.chouaib')
                    .remove()

                $(`#nameS`).append(`
<div class="chouaib">
<div class="form-inline mt-5">
    <label for="name" class="form-label sm:w-20">Name</label>
    <input id="name" type="text" class="form-control w-40" value="${res.data.name}">
</div>

<div class="form-check form-switch form-inline mt-5">
    <label for="re" class="form-label sm:w-20">reserved?</label>
    <input id="re" class="form-check-input" type="checkbox" ${res.data.reserved ? checked = "checked" : checked = "false"}>
</div>

</div>

`)

            }).catch(err => {

            })


        }


        const myModalEl = document.getElementById('new-order-modal')
        myModalEl.addEventListener('hidden.tw.modal', function(event) {
            $('#name_sale').removeClass('border-danger')
            $('#show_err').text('New Resource').removeClass('text-danger')
        })

        $('#new_sale').on('click', function () {
            axios.post(`/api/sale/store`, {

                type_id: $('#type_id').val(),
                name: $('#name_sale').val(),



            }).then(res => {

                const myModal = tailwind.Modal.getInstance(document.querySelector("#new-order-modal"));
                myModal.hide()
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    title: 'One Sale has been Added',
                    showConfirmButton: false,
                    timer: 1000
                })

            }).catch(err => {
                $('#name_sale').addClass('border-danger')
                $('#show_err').addClass('text-danger').text(err.response.data.message)
            })

        })


    </script>

@endsection
