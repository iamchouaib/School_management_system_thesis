<!-- Hero Area Start -->
<section id="hero-area" class="bg-blue-100 pt-48 pb-10">
    <div class="container">
        <div class="flex justify-between">
            <div class="w-full text-center">
                <h2 class="text-4xl font-bold leading-snug text-gray-700 mb-10 wow fadeInUp" data-wow-delay="1s">All Three Stage In One School
                    <br class="hidden lg:block">Facilitating the studies of our children </h2>
                <div class="text-center mb-10 wow fadeInUp" data-wow-delay="1.2s">
                    @guest('guardian')
                        <a href="#"
                           rel="nofollow"
                           class="btn">REGISTER</a>
                    @endguest

                        @auth('guardian')
                            <a href="{{ route('parent.students.create') }}"
                               rel="nofollow"
                               class="btn">Dashboard</a>
                        @endauth

                </div>
                <div class="text-center wow fadeInUp" data-wow-delay="1.6s">
                    <img class="img-fluid mx-auto" src="{{asset('assets/img/hero.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Area End -->
