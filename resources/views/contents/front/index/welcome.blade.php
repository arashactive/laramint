@extends('layouts.front.theme')


@section("content")

<div class="container-xxl bg-primary hero-header">
    <div class="container px-lg-5">
        <div class="row g-5 align-items-end">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="text-white mb-4 animated slideInDown">The free, fun, and effective way to learn English language!</h1>
                <p class="text-white pb-3 animated slideInDown">Learning with Laramint is fun, and research shows that it works! With quick, bite-sized lessons, you’ll earn points and unlock new levels while gaining real-world communication skills.</p>
                <a href="" class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Read More</a>
                <a href="{{ route('front.courses') }}" class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Courses</a>
            </div>
            <div class="col-lg-6 text-center text-lg-start">
                <img class="img-fluid animated zoomIn" src="front/img/hero.png" alt="">
            </div>
        </div>
    </div>
</div>

 <!-- Department Start -->
 @if(count($departments) > 1)
 <div class="container-xxl py-5">
     <div class="container py-5 px-lg-5">
         <div class="row g-4">
             @forelse ($departments as $department)
                 <x-front.department :department="$department"/>
             @empty
             @endforelse
         </div>
     </div>
 </div>
 @endif
 <!-- Department End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <p class="section-title text-secondary">laramint<span></span></p>
                <h1 class="mb-5">What's laramint</h1>
                
                <div class="skill mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Thousands of video examples of language used in real life</p>
                        <p class="mb-2">85%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="skill mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Immersive learning that makes you feel like you're right there with the locals</p>
                        <p class="mb-2">90%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="skill mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Gamified tests that train your language skills</p>
                        <p class="mb-2">95%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <a href="" class="btn btn-primary py-sm-3 px-sm-5 rounded-pill mt-3">Read More</a>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="front/img/about.png">
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Facts Start -->
<div class="container-xxl bg-primary fact py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-certificate fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">1234</h1>
                <p class="text-white mb-0">Years Experience</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-users-cog fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">1234</h1>
                <p class="text-white mb-0">Team Members</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-users fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">1234</h1>
                <p class="text-white mb-0">Satisfied Clients</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <i class="fa fa-check fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">1234</h1>
                <p class="text-white mb-0">Compleate Projects</p>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Why Laramint<span></span></p>
            <h1 class="text-center mb-5">Why you’ll love learning with Laramint</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-search fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Effective and efficient</h5>
                    <p class="m-0">Our courses effectively and efficiently teach reading, listening, and speaking skills. Check out our latest research!</p>
                    <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-laptop-code fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Personalized learning</h5>
                    <p class="m-0">Combining the best of AI and language science, lessons are tailored to help you learn at just the right level and pace.</p>
                    <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fab fa-facebook-f fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Stay motivated</h5>
                    <p class="m-0">We make it easy to form a habit of language learning, with game-like features, fun challenges, and reminders from our friendly mascot, Duo the owl.</p>
                    <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-mail-bulk fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Have fun with it!</h5>
                    <p class="m-0">Effective learning doesn’t have to be boring! Build your skills each day with engaging exercises and playful characters.</p>
                    <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Newsletter Start -->
<div class="container-xxl bg-primary newsletter py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <p class="section-title text-white justify-content-center"><span></span>Newsletter<span></span></p>
                <h1 class="text-center text-white mb-4">Stay Always In Touch</h1>
                <p class="text-white mb-4">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo</p>
                <div class="position-relative w-100 mt-3">
                    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Enter Your Email" style="height: 48px;">
                    <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter End -->


<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Explorer<span></span></p>
            <h1 class="text-center mb-5">Recently Completed Course</h1>
        </div>
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">All</li>
                    @forelse ($departments as $department)
                        <li class="mx-2" data-filter=".department-{{ $department->id }}">{{ $department->title }}</li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="row g-3 portfolio-container">
            <!-- course Start -->
                @if(count($courses) > 1)
                <div class="container-xxl py-5">
                    <div class="container py-5 px-lg-5">
                        <div class="row g-4">
                            @forelse ($courses as $course)
                                <x-front.course :course="$course"/>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                @endif
            <!-- course End -->
        </div>
    </div>
</div>
<!-- Projects End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <p class="section-title text-secondary justify-content-center"><span></span>Testimonial<span></span></p>
        <h1 class="text-center mb-5">What Say Our Clients!</h1>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item bg-light rounded my-4">
                <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="front/img/testimonial-1.jpg" style="width: 65px; height: 65px;">
                    <div class="ps-4">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded my-4">
                <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="front/img/testimonial-2.jpg" style="width: 65px; height: 65px;">
                    <div class="ps-4">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded my-4">
                <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="front/img/testimonial-3.jpg" style="width: 65px; height: 65px;">
                    <div class="ps-4">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Our Team<span></span></p>
            <h1 class="text-center mb-5">Our Team Members</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light rounded">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="front/img/team-1.jpg" alt="">
                        <h5>John Doe</h5>
                        <span>Adults Supervisor</span>
                    </div>
                    <div class="d-flex justify-content-center p-4">
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light rounded">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="front/img/team-2.jpg" alt="">
                        <h5>Jessica Brown</h5>
                        <span>Kids Supervisior</span>
                    </div>
                    <div class="d-flex justify-content-center p-4">
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item bg-light rounded">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="front/img/team-3.jpg" alt="">
                        <h5>Tony Johnson</h5>
                        <span>Ielts Trainer</span>
                    </div>
                    <div class="d-flex justify-content-center p-4">
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->
@endsection