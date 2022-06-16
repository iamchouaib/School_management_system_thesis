<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('dist/images/logo.svg')}}" type="image/png">

    <title>Shine - TailwindCSS Startup and SaaS Landing Page Template</title>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/LineIcons.2.0.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/tiny-slider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/tailwind.css')}}">
</head>
<body>

@include('home.header')

@include('home.intro')

<!-- Services Section Start -->
@include('home.section')
<!-- Services Section End -->


<!-- Feature Section Start -->
@include('home.feature')
<!-- Feature Section End -->

<!-- Team Section Start -->
@include('home.team')
<!-- Team Section End -->

<!-- Clients Section Start -->
@include('home.sponsor')
<!-- Clients Section End -->

<!-- Testimonial Section Start -->
@include('home.dev')
<!-- Testimonial Section End -->




<!-- Contact Section Start -->
<section id="contact" class="py-24">
    <div class="container">
        <div class="text-center">
            <h2 class="mb-12 text-4xl text-gray-700 font-bold tracking-wide wow fadeInDown" data-wow-delay="0.3s">
                Contact</h2>
        </div>

        <div class="flex flex-wrap contact-form-area wow fadeInUp" data-wow-delay="0.4s">
            <div class="w-full md:w-1/2">
                <div class="contact">
                    <h2 class="uppercase font-bold text-xl text-gray-700 mb-5 ml-3">Contact Form</h2>
                    <form id="contactForm" action="assets/contact.php">
                        <div class="flex flex-wrap">
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                <div class="mx-3">
                                    <input type="text" class="form-input rounded-full" id="name" name="name"
                                           placeholder="Name" required data-error="Please enter your name">
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                <div class="mx-3">
                                    <input type="text" placeholder="Email" id="email" class="form-input rounded-full"
                                           name="email" required data-error="Please enter your email">
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mx-3">
                                    <input type="text" placeholder="Subject" id="subject" name="subject"
                                           class="form-input rounded-full" required
                                           data-error="Please enter your subject">
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mx-3">
                                    <textarea class="form-input rounded-lg" id="message" name="message"
                                              placeholder="Your Message" rows="5" data-error="Write your message"
                                              required></textarea>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="submit-button mx-3">
                                    <button class="btn" id="form-submit" type="submit">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="ml-3 md:ml-12 wow fadeIn">
                    <h2 class="uppercase font-bold text-xl text-gray-700 mb-5">Get In Touch</h2>
                    <div>
                        <div class="flex flex-wrap mb-6 items-center">
                            <div class="contact-icon">
                                <i class="lni lni-map-marker"></i>
                            </div>
                            <p class="pl-3">Skopje, Macedonia</p>
                        </div>
                        <div class="flex flex-wrap mb-6 items-center">
                            <div class="contact-icon">
                                <i class="lni lni-envelope"></i>
                            </div>
                            <p class="pl-3">
                                <a href="#" class="block">email@gmail.com</a>
                                <a href="#" class="block">tomsaulnier@gmail.com</a>
                            </p>
                        </div>
                        <div class="flex flex-wrap mb-6 items-center">
                            <div class="contact-icon">
                                <i class="lni lni-phone-set"></i>
                            </div>
                            <p class="pl-3">
                                <a href="#" class="block">+42 374 5967</a>
                                <a href="#" class="block">+99 123 5967</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Section Start -->
<section id="google-map-area">
    <div class="mx-6 mb-6">
        <div class="flex">
            <div class="w-full">
                <object style="border:0; height: 450px; width: 100%;"
                        data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3217.7301241293035!2d6.567817615303791!3d36.24604928006658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12f1655aaa0d63ab%3A0xa80cc72a9da3c77b!2sConstantine%202%20University!5e0!3m2!1sen!2sdz!4v1652957461811!5m2!1sen!2sdz"></object>
            </div>
        </div>
    </div>
</section>
<!-- Map Section End -->

<!-- Footer Section Start -->
<footer id="footer" class="bg-gray-800 py-16">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="mx-3 mb-8">
                    <div class="footer-logo mb-3">
                        <img src="assets/img/logo.svg" alt="">
                    </div>
                    <p class="text-gray-300">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam
                        excepturi quasi, ipsam
                        voluptatem.</p>
                </div>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="mx-3 mb-8">
                    <h3 class="font-bold text-xl text-white mb-5">Company</h3>
                    <ul>
                        <li><a href="#" class="footer-links">Press Releases</a></li>
                        <li><a href="#" class="footer-links">Mission</a></li>
                        <li><a href="#" class="footer-links">Strategy</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="mx-3 mb-8">
                    <h3 class="font-bold text-xl text-white mb-5">About</h3>
                    <ul>
                        <li><a href="#" class="footer-links">Career</a></li>
                        <li><a href="#" class="footer-links">Team</a></li>
                        <li><a href="#" class="footer-links">Clients</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 wow fadeInUp" data-wow-delay="0.8s">
                <div class="mx-3 mb-8">
                    <h3 class="font-bold text-xl text-white mb-5">Find us on</h3>

                    <ul class="social-icons flex justify-start">
                        <li class="mx-2">
                            <a href="#"
                               class="footer-icon hover:bg-indigo-500">
                                <i class="lni lni-facebook-original" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#"
                               class="footer-icon hover:bg-blue-400">
                                <i class="lni lni-twitter-original" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#"
                               class="footer-icon hover:bg-red-500">
                                <i class="lni lni-instagram-original" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#"
                               class="footer-icon hover:bg-indigo-600">
                                <i class="lni lni-linkedin-original" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<section class="bg-gray-800 py-6 border-t-2 border-gray-700 border-dotted">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="w-full text-center">
                <p class="text-white">We love technology, so our work is nothing but
                    <span style="color: crimson">our love.</span>
                    ... Team GL ...
                    <span style="color: crimson">#lovefortechnology</span>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Go to Top Link -->
<a href="#"
   class="back-to-top w-10 h-10 fixed bottom-0 right-0 mb-5 mr-5 flex items-center justify-center rounded-full bg-blue-600 text-white text-lg z-20 duration-300 hover:bg-blue-400">
    <i class="lni lni-arrow-up"></i>
</a>

<!-- Preloader -->
     <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
<!-- End Preloader -->

<!-- All js Here -->
<script src="assets/js/wow.js"></script>
<script src="assets/js/tiny-slider.js"></script>
<script src="assets/js/contact-form.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
