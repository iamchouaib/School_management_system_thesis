@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">General Report</h2>
                        <a href="" class="ml-auto flex items-center text-primary">
                            <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                        </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">

                            <x-d-general-raport>
                                <i data-lucide="building" class="report-box__icon text-primary"></i>
                                <x-d-general-raport-per class="bg-success" title="33% up this month">33%</x-d-general-raport-per>
                                <x-d-general-raport-number>{{$sales}}</x-d-general-raport-number>
                                <x-d-general-raport-title>Salle and Tp</x-d-general-raport-title>
                            </x-d-general-raport>

                            <x-d-general-raport>
                                <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                <x-d-general-raport-per>33%</x-d-general-raport-per>
                                <x-d-general-raport-number>{{$students * 438}} $</x-d-general-raport-number>
                                <x-d-general-raport-title>Students amounts</x-d-general-raport-title>
                            </x-d-general-raport>

                            <x-d-general-raport>
                                <i data-lucide="users" class="report-box__icon text-warning"></i>
                                <x-d-general-raport-per class="bg-danger" title="33% Lower than last month">33%
                                </x-d-general-raport-per>
                                <x-d-general-raport-number>{{$students}}</x-d-general-raport-number>
                                <x-d-general-raport-title>All Students</x-d-general-raport-title>
                            </x-d-general-raport>

                            <x-d-general-raport>
                                <i data-lucide="user" class="report-box__icon text-success"></i>
                                <x-d-general-raport-per class="bg-success" title="33% Up than last month">33%
                                </x-d-general-raport-per>
                                <x-d-general-raport-number>{{$users_count}}</x-d-general-raport-number>
                                <x-d-general-raport-title>Users In Smart School</x-d-general-raport-title>
                            </x-d-general-raport>




                    </div>
                </div>
                <!-- END: General Report -->
                <!-- BEGIN: Sales Report -->
                <div class="col-span-12 lg:col-span-6 mt-8">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Employee and Student Count</h2>
                    </div>
                    <div class="intro-y box p-5 mt-12 sm:mt-5">

                        <div class="report-chart">
                            <div class="h-[215px]">
                                <canvas id="report-students" class="mt-6 -mb-6"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Sales Report -->
                <!-- BEGIN: Weekly Top Seller -->
                <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Student age groups</h2>
                    </div>
                    <div class="intro-y box p-5 mt-5">
                        <div class="mt-3">
                            <div class="h-[215px]">
                                <canvas id="report-pie-chart"></canvas>
                            </div>
                        </div>
                        <div class="w-52 sm:w-auto mx-auto mt-8">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                <span class="truncate">Students </span>
                                <span class="font-medium ml-auto">{{ (int) ($students * 100  / ($students + $users_count + $parents_count)) }}%</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-2 h-2 bg-warning   rounded-full mr-3"></div>
                                <span class="truncate">Team Users</span>
                                <span class="font-medium ml-auto">{{(int) ($users_count * 100  / ($students + $users_count + $parents_count))}}%</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                <span class="truncate">Students Guardians </span>
                                <span class="font-medium ml-auto">{{(int) ($parents_count * 100  / ($students + $users_count + $parents_count))}}%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Weekly Top Seller -->
                <!-- BEGIN: Sales Report -->
                <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Gender groups</h2>
                    </div>
                    <div class="intro-y box p-5 mt-5">
                        <div class="mt-3">
                            <div class="h-[215px]">
                                <canvas id="report-donut-chart"></canvas>
                            </div>
                        </div>
                        <div class="w-52 sm:w-auto mx-auto mt-8">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                <span class="truncate">17 - 30 Years old</span>
                                <span class="font-medium ml-auto">62%</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                <span class="truncate">31 - 50 Years old</span>
                                <span class="font-medium ml-auto">33%</span>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                <span class="truncate">>= 50 Years old</span>
                                <span class="font-medium ml-auto">10%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Sales Report -->

                <!-- BEGIN: Weekly Best Sellers -->
                <div class="col-span-12 xl:col-span-4 mt-6">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Pending parent accounts</h2>
                    </div>
                    <div class="mt-5">

                        @if($parents->count() == 0 )
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <img alt="Smart School" src="{{ asset('dist/images/placeholders/200x200.jpg')}}">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium"> No Parent</div>
                                        <div class="text-slate-500 text-xs mt-0.5"></div>
                                    </div>
                                    <div class="py-1 px-2 rounded-full text-xs bg-danger text-white cursor-pointer font-medium">No Action</div>
                                </div>
                            </div>
                        @endif

                        @foreach ($parents as $parent)


                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <img alt="Smart School" src="{{ asset('dist/images/placeholders/200x200.jpg')}}">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">{{ $parent->name}}</div>
                                        <div class="text-slate-500 text-xs mt-0.5">{{ $parent->ceated_at }}</div>
                                    </div>
                                    <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">137 Sales</div>
                                </div>
                            </div>
                        @endforeach


                        <a href="" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View More</a>
                    </div>
                </div>
                <!-- END: Weekly Best Sellers -->

                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Students </h2>

                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <div class="intro-y box p-5 mt-5">
                            <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                                <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto" >
                                    <div class="sm:flex items-center sm:mr-4">
                                        <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Field</label>
                                        <select id="tabulator-html-filter-field" class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
                                            <option value="name">Name</option>
                                            <option value="groupe">Groupe</option>
                                            <option value="remaining_stock">Remaining Stock</option>
                                        </select>
                                    </div>
                                    <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                        <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Type</label>
                                        <select id="tabulator-html-filter-type" class="form-select w-full mt-2 sm:mt-0 sm:w-auto" >
                                            <option value="like" selected>like</option>
                                            <option value="=">=</option>
                                            <option value="<">&lt;</option>
                                            <option value="<=">&lt;=</option>
                                            <option value=">">></option>
                                            <option value=">=">>=</option>
                                            <option value="!=">!=</option>
                                        </select>
                                    </div>
                                    <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                        <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Value</label>
                                        <input id="tabulator-html-filter-value" type="text" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0"  placeholder="Search...">
                                    </div>
                                    <div class="mt-2 xl:mt-0">
                                        <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16" >Go</button>
                                        <button id="tabulator-html-filter-reset" type="button" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1" >Reset</button>
                                    </div>
                                </form>
                                <div class="flex mt-5 sm:mt-0">
                                    <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2">
                                        <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print
                                    </button>
                                    <div class="dropdown w-1/2 sm:w-auto">
                                        <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto" aria-expanded="false" data-tw-toggle="dropdown">
                                            <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export <i data-lucide="chevron-down" class="w-4 h-4 ml-auto sm:ml-2"></i>
                                        </button>
                                        <div class="dropdown-menu w-40">
                                            <ul class="dropdown-content">
                                                <li>
                                                    <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item">
                                                        <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export CSV
                                                    </a>
                                                </li>
                                                <li>
                                                    <a id="tabulator-export-json" href="javascript:;" class="dropdown-item">
                                                        <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export JSON
                                                    </a>
                                                </li>
                                                <li>
                                                    <a id="tabulator-export-xlsx" href="javascript:;" class="dropdown-item">
                                                        <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export XLSX
                                                    </a>
                                                </li>
                                                <li>
                                                    <a id="tabulator-export-html" href="javascript:;" class="dropdown-item">
                                                        <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export HTML
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-x-auto scrollbar-hidden">
                                <div id="tabulator" class="mt-5 table-report table-report--tabulator"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>
        <div class="col-span-12 2xl:col-span-3">
            <div class="2xl:border-l -mb-10 pb-10">
                <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                    <!-- BEGIN: Transactions -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">Admins </h2>
                        </div>
                        <div class="mt-5">
                            @foreach ($users as $user)
                                <div class="intro-x">
                                    <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="img profile" src="{{ asset('images/' . $user->profile->image) }}">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">{{ $user->name }}</div>
                                            <div class="text-slate-500 text-xs mt-0.5"> {{ $user->created_at }} </div>
                                        </div>
                                        <div class="{{ $user->active ? 'text-success' : 'text-danger' }}">{{ $user->active ? '+' : '-' }}${{ $user->profile->salary }}</div>
                                    </div>
                                </div>
                            @endforeach
                            <a href="" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View More</a>
                        </div>
                    </div>
                    <!-- END: Transactions -->
                    <!-- BEGIN: Recent Activities -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">Recent Activities</h2>
                            <a href="" class="ml-auto text-primary truncate">Show More</a>
                        </div>
                        <div class="mt-5 relative before:block before:absolute before:w-px before:h-[85%] before:bg-slate-200 before:dark:bg-darkmode-400 before:ml-5 before:mt-5">

                            @foreach($events as $event)
                                <div class="intro-x relative flex items-center mb-3">
                                    <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="Smart - images School" src="{{ asset('images/profile-' .$loop->index+1 .'.jpg') }}">
                                        </div>
                                    </div>
                                    <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                        <div class="flex items-center">
                                            <div class="font-medium">Admin</div>
                                            <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                        </div>
                                        <div class="text-slate-500 mt-1">{{$event->title}}</div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- END: Recent Activities -->
                    <!-- BEGIN: Important Notes -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-12 xl:col-start-1 xl:row-start-1 2xl:col-start-auto 2xl:row-start-auto mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-auto"> Secretary Notes</h2>
                            <button data-carousel="important-notes" data-target="prev" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2">
                                <i data-lucide="chevron-left" class="w-4 h-4"></i>
                            </button>
                            <button data-carousel="important-notes" data-target="next" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2">
                                <i data-lucide="chevron-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                        <div class="mt-5 intro-x">
                            <div class="box zoom-in">
                                <div class="tiny-slider" id="important-notes">
                                    @foreach($announces as $announce)
                                        <div class="p-5">
                                            <div class="text-base font-medium truncate">{{$announce->title}}</div>
                                            <div class="text-slate-400 mt-1">{{$announce->created_at->diffForHumans()}}</div>
                                            <div class="text-slate-500 text-justify mt-1">{{$announce->content}}</div>
                                            <div class="font-medium flex mt-5">
                                                <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
                                                <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Important Notes -->
                    <!-- BEGIN: Schedules -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 xl:col-start-1 xl:row-start-2 2xl:col-start-auto 2xl:row-start-auto mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">Schedules</h2>
                            <a href="" class="ml-auto text-primary truncate flex items-center">
                                <i data-lucide="plus" class="w-4 h-4 mr-1"></i> Add New Schedules
                            </a>
                        </div>
                        <div class="mt-5">
                            <div class="intro-x box">
                                <div class="p-5">
                                    <div class="flex">
                                        <i data-lucide="chevron-left" class="w-5 h-5 text-slate-500"></i>
                                        <div class="font-medium text-base mx-auto">April</div>
                                        <i data-lucide="chevron-right" class="w-5 h-5 text-slate-500"></i>
                                    </div>
                                    <div class="grid grid-cols-7 gap-4 mt-5 text-center">
                                        <div class="font-medium">Su</div>
                                        <div class="font-medium">Mo</div>
                                        <div class="font-medium">Tu</div>
                                        <div class="font-medium">We</div>
                                        <div class="font-medium">Th</div>
                                        <div class="font-medium">Fr</div>
                                        <div class="font-medium">Sa</div>
                                        <div class="py-0.5 rounded relative text-slate-500">29</div>
                                        <div class="py-0.5 rounded relative text-slate-500">30</div>
                                        <div class="py-0.5 rounded relative text-slate-500">31</div>
                                        <div class="py-0.5 rounded relative">1</div>
                                        <div class="py-0.5 rounded relative">2</div>
                                        <div class="py-0.5 rounded relative">3</div>
                                        <div class="py-0.5 rounded relative">4</div>
                                        <div class="py-0.5 rounded relative">5</div>
                                        <div class="py-0.5 bg-success/20 dark:bg-success/30 rounded relative">6</div>
                                        <div class="py-0.5 rounded relative">7</div>
                                        <div class="py-0.5 bg-primary text-white rounded relative">8</div>
                                        <div class="py-0.5 rounded relative">9</div>
                                        <div class="py-0.5 rounded relative">10</div>
                                        <div class="py-0.5 rounded relative">11</div>
                                        <div class="py-0.5 rounded relative">12</div>
                                        <div class="py-0.5 rounded relative">13</div>
                                        <div class="py-0.5 rounded relative">14</div>
                                        <div class="py-0.5 rounded relative">15</div>
                                        <div class="py-0.5 rounded relative">16</div>
                                        <div class="py-0.5 rounded relative">17</div>
                                        <div class="py-0.5 rounded relative">18</div>
                                        <div class="py-0.5 rounded relative">19</div>
                                        <div class="py-0.5 rounded relative">20</div>
                                        <div class="py-0.5 rounded relative">21</div>
                                        <div class="py-0.5 rounded relative">22</div>
                                        <div class="py-0.5 bg-pending/20 dark:bg-pending/30 rounded relative">23</div>
                                        <div class="py-0.5 rounded relative">24</div>
                                        <div class="py-0.5 rounded relative">25</div>
                                        <div class="py-0.5 rounded relative">26</div>
                                        <div class="py-0.5 bg-primary/10 dark:bg-primary/50 rounded relative">27</div>
                                        <div class="py-0.5 rounded relative">28</div>
                                        <div class="py-0.5 rounded relative">29</div>
                                        <div class="py-0.5 rounded relative">30</div>
                                        <div class="py-0.5 rounded relative text-slate-500">1</div>
                                        <div class="py-0.5 rounded relative text-slate-500">2</div>
                                        <div class="py-0.5 rounded relative text-slate-500">3</div>
                                        <div class="py-0.5 rounded relative text-slate-500">4</div>
                                        <div class="py-0.5 rounded relative text-slate-500">5</div>
                                        <div class="py-0.5 rounded relative text-slate-500">6</div>
                                        <div class="py-0.5 rounded relative text-slate-500">7</div>
                                        <div class="py-0.5 rounded relative text-slate-500">8</div>
                                        <div class="py-0.5 rounded relative text-slate-500">9</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END: Schedules -->
                </div>
            </div>
        </div>
    </div>

    <input id="users_count" hidden value="{{$users_count}}">
    <input id="students_count" hidden value="{{$students}}">
    <input id="parents_count" hidden value="{{$parents_count}}">
@endsection

@section('script')
    <script>



    </script>
@endsection
