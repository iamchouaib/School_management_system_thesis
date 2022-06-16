@extends('../layout/' . $layout)

@section('subhead')
    <title>Semester - Smart School</title>
@endsection

@section('subcontent')

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Create New Semester</h2>
    </div>






    <form action="{{route('team.admin.semester.store')}}" method="post">

    @csrf

        <input id="regular-form-1 mb-5" type="text" class="form-control" placeholder="S2">

        <div class="relative w-1/4 mx-auto">

            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400"> <i data-lucide="calendar" class="w-4 h-4"></i> </div> <input type="text" name="date_in" class="datepicker form-control pl-12" data-single-mode="true">

            <div class=" rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400"> <i data-lucide="calendar" class="w-4 h-4"></i> </div> <input type="text" class="datepicker form-control pl-12" data-single-mode="true" name="date_to">

            <button class=" w-full btn btn-primary mt-4" type="submit">Add Semester</button>
        </div>




</form>



@endsection
