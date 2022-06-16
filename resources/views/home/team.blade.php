<section id="team" class="py-24 text-center">
    <div class="container">
        <div class="text-center">
            <h2 class="mb-12 section-heading wow fadeInDown" data-wow-delay="0.3s">Our Team</h2>
        </div>
        <div class="flex flex-wrap justify-center">

            @foreach($teachers as $teacher)
                <!-- Team Item Starts -->
                    <div class="max-w-sm sm:w-1/2 md:w-1/2 lg:w-1/3">
                        <div class="team-item">
                            <div class="team-img relative">
                                <img style="width: 100%; height: 400px" src="{{asset('images/' . $teacher->profile->image )}}" alt="">

                            </div>
                            <div class="text-center px-5 py-3">
                                <h3 class="team-name">{{$teacher->name}}</h3>
                                <p> Teaching : {{$teacher->modules->implode('name' , ' , ')}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Team Item Ends -->
            @endforeach

        </div>
    </div>
</section>
