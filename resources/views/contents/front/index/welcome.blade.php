@extends('layouts.front.theme')


@section("content")
@php($path = 8)
@svg($path)
<div class="container-xxl bg-primary hero-header">
    <div class="container px-lg-5">
        <div class="row">
            <div class="col-12 text-center">
                <span class="blink-image text-warning text-bold" >
                    उत्तर प्रदेश सरकार द्वारा <strong>ओ.वि.सी. वर्ग</strong> के छात्र - छात्राओं  के लिए सुनहरा अवसर(2023-24) <u>नि:शुल्क</u> ओ लेवल कंप्यूटर प्रशिक्षण कार्यक्रम
                    <a class="btn btn-warning" href="{{route('landingPage','free-o-level-2023-24#contact')}}">
                        <i class="fa fa-arrow-right"></i> {{ __('Click Here') }}
                    </a>
                </span>
            </div>
        </div>
        <div class="row g-5 align-items-end">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="text-white mb-4 animated slideInDown">Lead to Success with ICET Agra</h1>
                <p class="text-white pb-3 animated slideInDown">Institute of Computing With Enhanced Technology, Accredited By National Institute of Electronics &amp; Information Technology (NIELT) Govt. of India and UPDESCO (U.P. Govt) Authorized Training Center.</p>
                <a href="" class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Read More</a>
<!--                <a href="{{ route('front.courses') }}" class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Courses</a>-->
            </div>
            <div class="col-lg-6 text-center text-lg-start">
                <img class="img-fluid animated zoomIn" src="front/img/hero.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Department Start -->
@if(count($departments) > 1)
<div class="container-xxl py-5 d-none">
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
                <p class="section-title text-secondary">ICET Agra<span></span></p>
                <h1 class="mb-5">We train you with perfection</h1>

                <div class="skill mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Thousands of video examples</p>
                        <p class="mb-2">85%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="skill mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Immersive learning that makes you feel like you're right there</p>
                        <p class="mb-2">90%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="skill mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Pratical along with training</p>
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
                <h1 class="text-white mb-2" data-toggle="counter-up">16</h1>
                <p class="text-white mb-0">Years Experience</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-users-cog fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">10</h1>
                <p class="text-white mb-0">Team Members</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-users fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">100</h1>
                <p class="text-white mb-0">100% Satisfied Students</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <i class="fa fa-check fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">750</h1>
                <p class="text-white mb-0">Placed Students</p>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Why ICET<span></span></p>
            <h1 class="text-center mb-5">Why you’ll love learning with ICET Agra</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-book fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Curriculum</h5>
                    <p class="m-0">A world class curriculum developed by ICET in close partnership with NIELT offers course like CCC, BCC, OLEVEL. The programmes we offer are desgined by our team of experts, based on govt institutes</p>
                    <a class="btn btn-square" href=""><i class="fa fa-arrow-down"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-rupee-sign fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Cost Effectiveness</h5>
                    <p class="m-0">Our primary objective is to provide you with unparalleled access to global expertise and cutting-edge knowledge while ensuring maximum cost efficiency. We constantly strive to reduce the cost of training without compromising on the quality of our offerings.</p>
                    <a class="btn btn-square" href=""><i class="fa fa-arrow-down"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-bullseye fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Objective</h5>
                    <p class="m-0">For an elite major likes computer science, to attract people joining course, a creation and innovation is needed. ICET give you visual tools to help students approach this field most effectively.</p>
                    <a class="btn btn-square" href=""><i class="fa fa-arrow-down"></i></a>
                </div>
            </div>
            <!--            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="service-item d-flex flex-column text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fab fa- fa-2x"></i>
                                </div>
                                <h5 class="mb-3">Stay motivated</h5>
                                <p class="m-0">We make it easy to form a habit of language learning, with game-like features, fun challenges, and reminders from our friendly mascot, Duo the owl.</p>
                                <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>-->
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-smile-beam fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Have fun with it!</h5>
                    <p class="m-0">At ICET, We regularly practice it simple to type of language learning, with game-like elements, fun difficulties, and updates every day with drawing in practices and fun loving characters.</p>
                    <a class="btn btn-square" href=""><i class="fa fa-arrow-down"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Service End -->



<!-- Projects Start -->
<div class="container-xxl py-5 d-none">
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
        <h1 class="text-center mb-5">What Our Students Say!</h1>
        <div class="owl-carousel testimonial-carousel">
            
            
            <div class="testimonial-item bg-light rounded my-4">
                <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>My sister recommended that i take O level course at the ICET computer education. With the fact that I have no prior experience with computer languages, each and every trainer presents the topic to me in a way that makes it simple for me to comprehend. Everyday tasks are given to us to assist us with finding out more and they are an extraordinary guide. It's a positive experience all around.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="front/img/anushka-parmar.jpeg" style="width: 65px; height: 65px;">
                    <div class="ps-4">
                        <h5 class="mb-1">Anushka Parmar</h5>
                        <span>O Level Course</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded my-4">
                <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Best O-LEVEL coaching in Agra Monika ma'am and Arvind sir is very supportive and cooperative, must visit ICET COMPUTER CENTRE</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="front/img/khushbu-verma.jpeg" style="width: 65px; height: 65px;">
                    <div class="ps-4">
                        <h5 class="mb-1">Khushbu Verma</h5>
                        <span>O Level Course</span>
                    </div>
                </div>
            </div>
            
                        <div class="testimonial-item bg-light rounded my-4">
                <p class="fs-5 small"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>मेरा नाम बाबर खान है ! में आगरा से हूं...
👉 ICET Computer Education 🖥️ से कोर्स करने के एडवांटेज 👇<br/>
1) Best Knowledge about your content.<br/>
2) Good Excellence.<br/>
3) Friendly Environment with Teachers.<br/>
4) Advance practice before your exams.<br/>
5) Boost your knowledge and update to your knowledge.<br/>
6) perfect Practical Classes and Theory Classes.<br/>
7) Weekly doubt solution session. !  </p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="front/img/Babar.jpeg" style="width: 65px; height: 65px;">
                    <div class="ps-4">
                        <h5 class="mb-1">Babar</h5>
                        <span>O Level foundation Course</span>
                    </div>
                </div>
            </div>
            
            
            
              <div class="testimonial-item bg-light rounded my-4">
                <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Hi, I am Ashish Kushwah I recently applied for an O-LEVEL course at ICET CENTRE Great experience. Amazing learning curve. Educators deal with the understudies and help them every way possible.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="front/img/Ashish-kushwah.jpg" style="width: 65px; height: 65px;">
                    <div class="ps-4">
                        <h5 class="mb-1">Ashish Kushwah</h5>
                        <span>O Level foundation Course</span>
                    </div>
                </div>
            </div>
            
              <div class="testimonial-item bg-light rounded my-4">
                <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Best coaching institute, where students get to explore more about the topics. Each and every doubt of the student is cleared with huge patience.
Thank you!</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="front/img/Bhoomika-nigota.jpeg" style="width: 65px; height: 65px;">
                    <div class="ps-4">
                        <h5 class="mb-1">Bhoomika Nigota</h5>
                        <span>O Level foundation Course</span>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-item bg-light rounded my-4">
                <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>ICET up until this point has been the best thing that has happened to me… Its hard to track down such where individuals are so unique, so serious but so near one another… and with regards to the Establishment… its a paradise on the planet… " ICET has given me the stage to achieve everything I could ever hope for. It has offered me a chance to release my maximum capacity and to emerge my vocation objectives.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/undraw_profile_2.svg" style="width: 65px; height: 65px;">
                    <div class="ps-4">
                        <h5 class="mb-1">Dharmendar</h5>
                        <!--<span>Web designing</span>-->
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded my-4">
                <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>ICET has provided me the platform to accomplish all my dreams. It has given me an opportunity to unleash my full potential and to materialize my career goals. ICET has prepared me to face every battle in corporate world.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/undraw_profile_1.svg" style="width: 65px; height: 65px;">
                    <div class="ps-4">
                        <h5 class="mb-1">Neha Thakur</h5>
                        <!--<span>O Level</span>-->
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded my-4">
                <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>I generally get a high from the sort of energy that persuades grounds. There is such a huge amount to do in any event, when essentially nothing remains to be finished, from battling to complete tasks to scrambling for magie at 4am in the morning.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/undraw_profile_2.svg" style="width: 65px; height: 65px;">
                    <div class="ps-4">
                        <h5 class="mb-1">Akash Jaishwal</h5>
                        <!--<span>CCC</span>-->
                    </div>
                </div>
            </div>
            
            <div class="testimonial-item bg-light rounded my-4">
                <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Life at ICET is full of energy. The wide array of exercises going from vested parties to web based gaming occasions furnish everybody with sufficient chances to go past scholastics.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/undraw_profile_1.svg" style="width: 65px; height: 65px;">
                    <div class="ps-4">
                        <h5 class="mb-1">Jyoti Sharma</h5>
                        <!--<span>CCC</span>-->
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
<!-- Testimonial End -->


<!--Work experience-->

<div class="container-xxl bg-light fact- py-5 wow fadeInUp d-none" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Work Experience<span></span></p>
            <h1 class="text-center text-primary-emphasis mb-5">Proudly carried out projects</h1>
        </div>

        <div class="row g-4">

            <div class="col-6">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar">
                        </div>
                        <div class="flip-card-back">
                            <h1>Voter ID Card</h1> 
                            <p>Election Office</p> 
                            <p>Agra, U.P. Govt.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="flip-card" tabIndex="0">
                    <div class="flip-card-inner">
                        <div class="flip-card-front bg-dark rounded">
                            <h3>IMG Voter ID Card (Election Office Agra, U.P. Govt.)</h3>
                        </div>
                        <div class="flip-card-back  bg-light rounded ">
                            <h3>Voter ID Card (Election Office Agra, U.P. Govt.)</h3>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="col-md-12 text-light text-left wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                
            </div>
            <div class="col-md-12 text-light text-left wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">



                <ul class="list-inline mb-5" id="work-flters">
                    <li class="mx-2"><i class="bi bi-check"></i>1. Voter ID Card (Election Office Agra, U.P. Govt.)</li>
                    <li class="mx-2"><i class="bi bi-check"></i>2. Berojgaari Bhatta (Reginal Employment Office, Agra, U.P. Govt.)</li>
                    <li class="mx-2"><i class="bi bi-check"></i>3. Kanya Vidhya Dhan (Madhymik Shiksha Parishad, Agra, U.P. Govt.)</li>
                    <li class="mx-2"><i class="bi bi-check"></i>4. Scholarship Data Entry (Madhymik Shiksha Parishad, Agra, U.P. Govt.)   </li>
                    <li class="mx-2"><i class="bi bi-check"></i>5. Criminal Crime Tracking Networking System CCTNS (Police Dept, Agra  U.P. Govt.)</li>
                    <li class="mx-2"><i class="bi bi-check"></i>6. Lokwani Kendra , Agra (U.P. Govt)</li>
                    <li class="mx-2"><i class="bi bi-check"></i>7. Course on Computer Concepts CCC (Online Exam Center, NIELIT Govt of India)</li>
                    <li class="mx-2"><i class="bi bi-check"></i>8. E- Commerce Training (Handicraft Department, Govt of India)</li>
                    <li class="mx-2"><i class="bi bi-check"></i>9. Authorized Computer Training Institute by UPDESCO (U.P. Govt)</li>
                    <li class="mx-2"><i class="bi bi-check"></i>10. Authorized Computer Training Institute for O Level by NIELIT (Govt. of India)</li>
                </ul>
            </div>

        </div>
    </div>
</div>

<!--Work experience ends here-->

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Our Team<span></span></p>
            <h1 class="text-center mb-5">Our Team Members</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light rounded" itemscope itemtype="https://schema.org/Person">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="front/img/monika.jpeg" alt="monika">
                        <h5>Monika Maam</h5>
                        <span>Sr. Counselor cum Admission Head</span>
                    </div>
                    <div class="d-flex justify-content-center p-4">
                        <a class="btn btn-square mx-1" target="_blank" href="https://www.facebook.com/moni.tarun?mibextid=ZbWKwL" itemprop="https://www.facebook.com/moni.tarun?mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a>
                        <!--<a class="btn btn-square mx-1" target="_blank" href=""><i class="fab fa-twitter"></i></a>-->
                        <a class="btn btn-square mx-1" target="_blank" href="https://instagram.com/monitiwari24?igshid=MzNlNGNkZWQ4Mg==" itemprop="https://instagram.com/monitiwari24?igshid=MzNlNGNkZWQ4Mg=="><i class="fab fa-instagram"></i></a>
                        <!--<a class="btn btn-square mx-1" target="_blank" href=""><i class="fab fa-linkedin-in"></i></a>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light rounded" itemscope itemtype="https://schema.org/Person">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="front/img/arvind-sutail.jpg" alt="arvind">
                        <h5>Arvind Sutail</h5>
                        <span>Managing Director</span>
                    </div>
                    <div class="d-flex justify-content-center p-4">
                        <a class="btn btn-square mx-1" target="_blank" itemprop="https://www.facebook.com/arvind.sutail.7" href="https://www.facebook.com/arvind.sutail.7"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" target="_blank" itemprop="https://twitter.com/SutailArvind" href="https://twitter.com/SutailArvind"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" target="_blank" itemprop="https://www.instagram.com/arvindsutail/" href="https://www.instagram.com/arvindsutail/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square mx-1" target="_blank" itemprop="https://www.linkedin.com/in/arvind-sutail-30964627b/" href="https://www.linkedin.com/in/arvind-sutail-30964627b/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light rounded" itemscope itemtype="https://schema.org/Person">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="front/img/Lavi-lalwani.jpeg" alt="monika">
                        <h5>Lavi Lalwani</h5>
                        <span>Role Sr programing faculty</span>
                    </div>
                    <div class="d-flex justify-content-center p-4">
                        <a class="btn btn-square mx-1" target="_blank" href="https://www.facebook.com/profile.php?id=100093926079059" itemprop="https://www.facebook.com/profile.php?id=100093926079059"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" target="_blank" href="https://twitter.com/LaviLalwani21?s=20" itemprop="https://twitter.com/LaviLalwani21?s=20"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" target="_blank" href="https://www.instagram.com/lavi._21?r=nametag" itemprop="https://www.instagram.com/lavi._21?r=nametag"><i class="fab fa-instagram"></i></a>
                        <!--<a class="btn btn-square mx-1" target="_blank" href=""><i class="fab fa-linkedin-in"></i></a>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4 mt-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item bg-light rounded" itemscope itemtype="https://schema.org/Person">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="front/img/amaan-ahmed.jpg" alt="amaanahmed">
                        <h5>Amaan Ahmed</h5>
                        <span>Sr Programing Faculty</span>
                    </div>
                    <div class="d-flex justify-content-center p-4">
                        <a class="btn btn-square mx-1" target="_blank" itemprop="https://www.facebook.com/ahaan.khan.1293?mibextid=ZbWKwL" href="https://www.facebook.com/ahaan.khan.1293?mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a>
                        <!--<a class="btn btn-square mx-1" target="_blank" href=""><i class="fab fa-twitter"></i></a>-->
                        <a class="btn btn-square mx-1" target="_blank" itemprop="https://instagram.com/ahaan.khan.1293?igshid=MzNlNGNkZWQ4Mg==" href="https://instagram.com/ahaan.khan.1293?igshid=MzNlNGNkZWQ4Mg=="><i class="fab fa-instagram"></i></a>
                        <!--<a class="btn btn-square mx-1" target="_blank" href=""><i class="fab fa-linkedin-in"></i></a>-->
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item bg-light rounded" itemscope itemtype="https://schema.org/Person">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="front/img/CTO-Brij-Raj-Singh.jpg" alt="brijraj">
                        <h5>Brij Raj Singh</h5>
                        <span>IT Consultant</span>
                    </div>
                    <div class="d-flex justify-content-center p-4">
                        <a class="btn btn-square mx-1" target="_blank" itemprop="https://facebook.com/brijrajsingh27" href="https://facebook.com/brijrajsingh27"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" target="_blank" itemprop="https://twitter.com/BrijRajSingh27" href="https://twitter.com/BrijRajSingh27"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" target="_blank" itemprop="https://www.instagram.com/brijrajsingh27/" href="https://www.instagram.com/brijrajsingh27/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square mx-1" target="_blank" itemprop="https://www.linkedin.com/in/brijrajsingh27/" href="https://www.linkedin.com/in/brijrajsingh27/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

@endsection