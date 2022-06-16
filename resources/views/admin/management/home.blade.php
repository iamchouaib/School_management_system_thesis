@extends('../layout/' . $layout)

@section('subhead')
    <title>Grades - Admin - smart School </title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Smart Pupils</h2>
    </div>
    <!-- BEGIN: Pricing Layout -->
    <div class="intro-y box flex flex-col lg:flex-row mt-5">
        @foreach($grades as $grade)

            <div
                class="intro-y @if($loop->iteration == 2) border-b border-t lg:border-b-0 lg:border-t-0 flex-1 p-5 lg:border-l lg:border-r border-slate-200/60 dark:border-darkmode-400  @endif flex-1 px-5  py-16">
                <i data-lucide="{{$grade->logo}}" class="block w-12 h-12 text-primary mx-auto"></i>
                <div class="text-xl font-medium text-center mt-10">{{$grade->name}}</div>
                <div class="text-slate-600 dark:text-slate-500 text-center mt-5">
                    1 Domain <span class="mx-1">•</span> 10 Users <span class="mx-1">•</span> 20 Copies
                </div>
                <div class="text-slate-500 px-10 text-center mx-auto mt-2">{{$grade->description}}
                </div>
                <div class="flex justify-center">
                    <div class="relative text-5xl font-semibold mt-8 mx-auto">
                        <span class="absolute text-xs top-0 left-0 -ml-4">sections</span>
                        {{$grade->sections_count}}
                    </div>
                </div>
                <a href="{{route('team.grades.show' , $grade->id)}}" class="btn btn-rounded-primary py-3 px-4 block mx-auto mt-8">Explorer</a>
            </div>
        @endforeach

    </div>

@endsection
