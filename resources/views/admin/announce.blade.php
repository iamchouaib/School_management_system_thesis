@extends('../layout/' . $layout)

@section('subhead')
    <title>Add New Announce</title>
@endsection

@section('subcontent')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 id="title_show" class="text-lg font-medium mr-auto">Add New Announce</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="dropdown mr-2">
                <button class="dropdown-toggle btn box flex items-center" aria-expanded="false"
                        data-tw-toggle="dropdown">
                    English <i class="w-4 h-4 ml-2" data-lucide="chevron-down"></i>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="activity" class="w-4 h-4 mr-2"></i>
                                <span class="truncate">English</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="activity" class="w-4 h-4 mr-2"></i>
                                <span class="truncate">Fresh</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <button type="button" class="btn box mr-2 flex items-center ml-auto sm:ml-0">
                <i class="w-4 h-4 mr-2" data-lucide="eye"></i> Preview
            </button>
            <div class="dropdown">
                <button id="save" class="dropdown-toggle btn btn-primary shadow-md flex items-center">
                    Save <i class="w-4 h-4 ml-2" data-lucide="save"></i>
                </button>

            </div>
        </div>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <input type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Title" id="title">
            <div class="post intro-y overflow-hidden box mt-5">

                <div class="post__content tab-content">
                    <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div
                                class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Announce Content
                            </div>
                            <form method="get">
                                <div class="mt-5">
                                    <div id='cnt' class="editor">
                                        content
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-span-12 lg:col-span-4">
                <div class="intro-y box p-5">
                    <div>
                        <label class="form-label">Written By</label>
                        <div class="dropdown">
                            <div class="btn w-full btn-outline-secondary dark:bg-darkmode-800 dark:border-darkmode-800 flex items-center justify-start" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                                <div class="w-8 h-8 image-fit mr-3">
                                    <img class="rounded" alt="image profile" src="{{ asset('images/' . auth()->user()->profile->image) }}">
                                </div>
                                <div class="truncate">{{ auth()->user()->name }}</div>
                                <i class="w-4 h-4 ml-auto" data-lucide="lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="post-form-2" class="form-label">Post Date</label>
                        <input type="text" disabled class="datepicker form-control" id="post-form-2" data-single-mode="true">
                    </div>
                    <div class="mt-3">
                        <label for="post-form-3" class="form-label">To ? </label>
                        <select data-placeholder="Select categories" class="tom-select w-full" id="post-form-3" multiple>
                            <option value="1" selected>Admins</option>
                            <option value="2">parents</option>
                            <option value="3" selected>secretaries</option>
                            <option value="4">teachers</option>
                            <option value="5">all</option>
                        </select>
                    </div>
                </div>
            </div>
    <!-- END: Post Info -->
    </div>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>

    <script>
            (function () {
            async function submit_announce() {

                // Post form
                let title = $('#title').val()
                let contents = document.querySelector('.ck-content').innerHTML

                // Loading state
                $('#save').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>')
                tailwind.svgLoader()
                await helper.delay(1500)

                axios.post(``, {
                    content: contents,
                    title: title,
                }).then(res => {

                    $('#save').html('Save Again')

                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'success',
                        title: 'Your Announce has been published',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }).catch(err => {
                    $('#save').html('Try Again')
                    $('#title').addClass('border-danger')
                    $('#title_show').addClass('text-danger').html(err.response.data.message)
                })
            }

            document.querySelector('#save').addEventListener('click', function () {
            submit_announce()
        })
        })()

    </script>

@endsection
