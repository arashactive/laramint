<?php
$caste_categories_array = array_flip($caste_categories);
$photograph_path = $last_user_id . "/photograph";
$father_income_certificate_path = $last_user_id . "/father_income_certificate";
$signature_path = $last_user_id . "/signature";
$thumb_impression_path = $last_user_id . "/thumb_impression";
$aadhar_front_path = $last_user_id . "/aadhar_front";
$aadhar_back_path = $last_user_id . "/aadhar_back";
$high_school_marksheet_path = $last_user_id . "/high_school_marksheet"; 
$intermediate_marksheet_path = $last_user_id . "/intermediate_marksheet";
$referrer_url = $_SERVER['HTTP_REFERER'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Landing Page || {{$page_title}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ URL::to('landing_page/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ URL::to('landing_page/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ URL::to('landing_page/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ URL::to('landing_page/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('landing_page/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ URL::to('landing_page/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('landing_page/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ URL::to('landing_page/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ URL::to('landing_page/assets/css/style.css') }}" rel="stylesheet">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
          <a href="{{route('home')}}" onclick="return checkHomePage();">
              <img src="{{ URL::to('img/logo.png') }}" alt="Logo" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('home')}}" onclick="return checkHomePage();">Home</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#contact">Enroll Now</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session()->has('errors'))
            <div class="alert alert-errors alert-dismissible fade show" role="alert">
                <strong> {{ session('errors') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
      <div class="row">
        <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
          <div>
            <h1>Scheme Signup page</h1>
            <h2>Welcome student, please fill your details & upload appropriate documents to enroll in the scheme. In case of any doubt please <a href="#contact">contact</a>
                <br/>
                <a target="_blank" href="{{ URL::asset('files/obc-free-o-level-course-june-2023.pdf') }}">Click Here To Go To PDF</a>
            </h2>
          </div>
        </div>
        <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
          <img src="{{ URL::to('landing_page/assets/img/hero-img.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= App Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title">
          <h2>Process to apply for the scheme</h2>
          <!--<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>-->
        </div>

        <div class="row no-gutters">
          <div class="col-xl-7 d-flex align-items-stretch order-2 order-lg-1">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up">
                  <i class="bx bx-receipt"></i>
                  <h4>Fill out the form</h4>
                  <p>fill the form with all your correct details such as name, email, contact</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Upload all documents</h4>
                  <p>upload all your documents that are mentioned in the form i.e., 10th marksheet, 12th marksheet, income certificate(OBC),</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-id-card"></i>
                  <h4>Authenticate yourself</h4>
                  <p>Validate your phone with the OTP using whatsapp & email</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-shield"></i>
                  <h4>Check your email for auto generated password</h4>
                  <p>An auto-generated email will be shared with you to access the portal for further process</p>
                </div>
<!--                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-atom"></i>
                  <h4>Molestiae dolor</h4>
                  <p>Et fuga et deserunt et enim. Dolorem architecto ratione tensa raptor marte</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                  <i class="bx bx-id-card"></i>
                  <h4>Explicabo consectetur</h4>
                  <p>Est autem dicta beatae suscipit. Sint veritatis et sit quasi ab aut inventore</p>
                </div>-->
              </div>
            </div>
          </div>
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{ URL::to('landing_page/assets/img/features.svg') }}" class="img-fluid" alt="">
          </div>
        </div>

      </div>
    </section><!-- End App Features Section -->

    <!-- ======= Details Section ======= -->
    <section id="details" class="details">
      <div class="container">

        <div class="row content d-none">
          <div class="col-md-4" data-aos="fade-right">
            <img src="{{ URL::to('landing_page/assets/img/details-1.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-4" data-aos="fade-up">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check"></i> Iure at voluptas aspernatur dignissimos doloribus repudiandae.</li>
              <li><i class="bi bi-check"></i> Est ipsa assumenda id facilis nesciunt placeat sed doloribus praesentium.</li>
            </ul>
            <p>
              Voluptas nisi in quia excepturi nihil voluptas nam et ut. Expedita omnis eum consequatur non. Sed in asperiores aut repellendus. Error quisquam ab maiores. Quibusdam sit in officia
            </p>
          </div>
        </div>

        <div class="row content d-none">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
            <img src="{{ URL::to('landing_page/assets/img/details-2.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>Corporis temporibus maiores provident</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
            <p>
              Inventore id enim dolor dicta qui et magni molestiae. Mollitia optio officia illum ut cupiditate eos autem. Soluta dolorum repellendus repellat amet autem rerum illum in. Quibusdam occaecati est nisi esse. Saepe aut dignissimos distinctio id enim.
            </p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4" data-aos="fade-right">
            <img src="{{ URL::to('landing_page/assets/img/details-3.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5" data-aos="fade-up">
            <h3>Sunt consequatur ad ut est nulla consectetur reiciendis animi voluptas</h3>
            <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.</p>
            <ul>
              <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
            </ul>
            <p>
              Qui consequatur temporibus. Enim et corporis sit sunt harum praesentium suscipit ut voluptatem. Et nihil magni debitis consequatur est.
            </p>
            <p>
              Suscipit enim et. Ut optio esse quidem quam reiciendis esse odit excepturi. Vel dolores rerum soluta explicabo vel fugiat eum non.
            </p>
          </div>
        </div>

        <div class="row content d-none">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
            <img src="{{ URL::to('landing_page/assets/img/details-4.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>Quas et necessitatibus eaque impedit ipsum animi consequatur incidunt in</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Et praesentium laboriosam architecto nam .</li>
              <li><i class="bi bi-check"></i> Eius et voluptate. Enim earum tempore aliquid. Nobis et sunt consequatur. Aut repellat in numquam velit quo dignissimos et.</li>
              <li><i class="bi bi-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End Details Section -->

    

    

    

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">

          <h2>Frequently Asked Questions</h2>
          <p>Please go through this section in case of any query or doubt related to enroll to this scheme</p>
        </div>

        <div class="accordion-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1">Is this scheme application to any specific course?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                <p>
                  Yes, this scheme is only applicable only for "O" level course
                </p>
              </div>
            </li>
            <li data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">Could you please provide information about the eligibility criteria for enrolling in this scheme? If there are any, kindly describe them <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                <p>
                  Yes, this scheme has an eligibility criteria that the candidate must have completed his/her 12th before enrolling to this & the yearly income of candidate's Father should be less than 1 lakh. Also, the candidate should belong to OBC category.
                </p>
              </div>
            </li>



            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed">Is there any last date for the same?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                <p>
                  Yes, 25th June 2023 is the last date for application.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed">Any document(s) required? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                <p>
                  Yes, below is the list of scanned documents that are mandatory for applying
                <table>
                    <tr>
                        <td>
                            1) High school marksheet
                        </td>
                    </tr>
                    <tr><td>
                            2) Intermediate marksheet
                        </td>
                    </tr>
                    <tr><td>
                            3) Caste Certificate
                        </td>
                    </tr>
                    <tr><td>
                            4) Father's Income certificate less than 1 lakh a year
                        </td>
                    </tr>
                    <tr><td>
                            5) Aadhar Card (Front/Back)
                        </td>
                    </tr>
                    <tr><td>
                            6) A latest passport size colored photograph
                        </td>
                    </tr>
                </table>
                </p>
              </div>
            </li>

            

          </ul>
        </div>
          <div class="row content table-responsive d-none">
              <div class="col-12" id="grade_chart">
                  
              <table style="width: 100%;" class="table table-bordered table-condensed">
<tbody>
<tr>
<td style="width: 40.6211%;"><strong>Marks Range</strong></td>
<td style="width: 21.6149%;"><strong>Grade</strong></td>
<td style="width: 37.6398%;"><strong>Grade Point</strong></td>
</tr>
<tr>
<td style="width: 40.6211%;">91-100</td>
<td style="width: 21.6149%;">A1</td>
<td style="width: 37.6398%;">10.0</td>
</tr>
<tr>
<td style="width: 40.6211%;">81-90</td>
<td style="width: 21.6149%;">A2</td>
<td style="width: 37.6398%;">9.0</td>
</tr>
<tr>
<td style="width: 40.6211%;">71-80</td>
<td style="width: 21.6149%;">B1</td>
<td style="width: 37.6398%;">8.0</td>
</tr>
<tr>
<td style="width: 40.6211%;">61-70</td>
<td style="width: 21.6149%;">B2</td>
<td style="width: 37.6398%;">7.0</td>
</tr>
<tr>
<td style="width: 40.6211%;">51-60</td>
<td style="width: 21.6149%;">C1</td>
<td style="width: 37.6398%;">6.0</td>
</tr>
<tr>
<td style="width: 40.6211%;">41-50</td>
<td style="width: 21.6149%;">C2</td>
<td style="width: 37.6398%;">5.0</td>
</tr>
<tr>
<td style="width: 40.6211%;">33-40</td>
<td style="width: 21.6149%;">D</td>
<td style="width: 37.6398%;">4.0</td>
</tr>
<tr>
<td style="width: 40.6211%;">21-32</td>
<td style="width: 21.6149%;">E1</td>
<td style="width: 37.6398%;">Fail</td>
</tr>
<tr>
<td style="width: 40.6211%;">00-20</td>
<td style="width: 21.6149%;">E2</td>
<td style="width: 37.6398%;">Fail</td>
</tr>
</tbody>
</table>
              
</div>
</div>
        </div>
          
      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Enroll for the program</h2>
          <p></p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-6 info">
                <i class="bx bx-map"></i>
                <h4>Address</h4>
                <p>ICET Computer Education<br/>
½ C, Panchkuiyan Road, Naalband Crossing,<br/>
Near Agra College Law Faculty, Agra- 282010</p>
              </div>
              <div class="col-lg-6 info">
                <i class="bx bx-phone"></i>
                <h4>Call Us</h4>
                <p>+91 971 952 2999<br>+91 928 610 5060</p>
              </div>
              <div class="col-lg-6 info">
                <i class="bx bx-envelope"></i>
                <h4>Email Us</h4>
                <p>icetagr@gmail.com<br>arvindsutail@gmail.com</p>
              </div>
              <div class="col-lg-6 info">
                <i class="bx bx-time-five"></i>
                <h4>Working Hours</h4>
                <p>Mon - Sat: 9AM to 6PM</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <form action="{{ route('student_enroll.store') }}" method="post" role="form" class="php-email-form" data-aos="fade-up">
                @csrf
              <div class="form-group">
                <input placeholder="Your Name" type="text" name="name" class="form-control" id="name" required>
              </div>
              <div class="form-group mt-3">
                <input placeholder="Your Mobile( for e.g., 1234567890)" type="text" class="form-control" name="mobile" id="mobile" required>
                <br/>
                <a onclick="" class="btn btn-success" id="validate_mobile" >Verify Mobile OTP</a>
                <br/><!-- comment -->
                <span class="success-mobile-update"></span>
                <span class="error-mobile-update"></span>
              </div>
              <div class="form-group mt-3">
                <input placeholder="Your Email" type="email" class="form-control" name="email" id="email" required>
                <br/>
                <a onclick="" class="btn btn-success" id="validate_email" >Verify Email OTP</a>
                <input placeholder="Enter Email OTP" type="text" class="form-control" name="mail_otp" id="mail_otp">
                <a onclick="" class="btn btn-success" id="validate_mail_otp" >Validate Email OTP</a>
                <br/><!-- comment -->
                <span class="success-email-update"></span>
                <span class="error-email-update"></span>
              </div>
              <div class="form-group mt-3">
                <input placeholder="Father Name" type="text" class="form-control" name="father_name" id="father_name" required>
              </div>
              <div class="form-group mt-3">
                <textarea placeholder="Address" class="form-control" name="address" rows="3" required></textarea>
              </div>
              <div class="form-group mt-3">
                  <input placeholder="DOB" type="date" class="form-control" name="dob" id="dob" required max="2010-06-01" min="1980-06-01">
              </div>
              <div class="form-group mt-3">
                  <input placeholder="Marks 10th" type="number" class="form-control" name="high_school_marks" id="high_school_marks" required max="100" min="0" max-length="3">
              </div>
              <div class="form-group mt-3">
                  <a class="high_school_grades_link" href="#grade_chart"><i class="bi bi-question-circle-fill">Not sure? refer to the grades chart</i></a>
                  <select class="form-control" name="high_school_grades" id="high_school_grades">
                      <option value="">Select 10th Grades</option>
                      @if($grades)
                      @foreach($grades as $value => $grade)
                      <option value="{{$value}}">{{$grade}}</option>
                      @endforeach
                      @endif
                  </select>
              </div>
              <div class="form-group mt-3">
                  <input placeholder="Marks 12th" type="number" class="form-control" name="intermediate_marks" id="intermediate_marks" required max="100" min="0">
              </div>
              <div class="form-group mt-3">
                  <a href="#grade_chart"><i class="bi bi-question-circle-fill">Not sure? refer to the grades chart</i></a>
                  <select class="form-control" name="intermediate_grades" id="intermediate_grades">
                      <option value="">Select 12th Grades</option>
                      @if($grades)
                      @foreach($grades as $value => $grade)
                      <option value="{{$value}}">{{$grade}}</option>
                      @endforeach
                      @endif
                  </select>
              </div>
              <div class="form-group mt-3">
                  <select class="form-control" name="caste_category" id="caste_category" required="">
                      <option value="">Select Category</option>
                      @if($caste_categories)
                      @foreach($caste_categories as $caste => $caste_category)
                      <option value="{{$caste}}">{{$caste_category}}</option>
                      @endforeach
                      @endif
                  </select>
              </div>
                <div class="docs_forms">
                    
                    <!-- Documents form-->
                    
                    <div class="form-group mt-3">
                        <input placeholder="Income Rs. 99999" type="number" class="form-control" name="father_income" id="father_income" max="99999" min="1">
                    </div>
                    
                    <div class="form-group mt-3">
                        Father Income:
                            @if(!empty($b64FatherIncomeImage) && isset($b64FatherIncomeImage))
                            <img src="{{ $b64FatherIncomeImage }}" height="25%" width="25%" class="img-thumbnail" alt="Income Certificate" />
                            @else
                            @livewire('services.media.uploadable',[
                            'file_name' => 'father_income_certificate',
                            'file' => 'father_income_certificate',
                            'path' => "$father_income_certificate_path",
                            'target' => 'father_income_certificate'
                            ])
                            @endif
                    </div>
                    <div class="form-group mt-3">
                        Photograph:
                            @if(!empty($b64PhotographImage) && isset($b64PhotographImage))
                            <img src="{{ $b64PhotographImage }}" height="25%" width="25%" class="img-thumbnail" alt="Photograph" />
                            @else
                            @livewire('services.media.uploadable',[
                            'file_name' => 'photograph',
                            'file' => 'photograph',
                            'path' => "$photograph_path",
                            'target' => 'photograph'
                            ])
                            @endif
                    </div>
                    <div class="form-group mt-3">

                            Signature:
                            @if(!empty($b64SignatureImage) && isset($b64SignatureImage))
                            <img src="{{ $b64SignatureImage }}" height="25%" width="25%" class="img-thumbnail" alt="Signature" />
                            @else
                            @livewire('services.media.uploadable',[
                            'file_name' => 'signature',
                            'file' => 'signature',
                            'path' => "$signature_path",
                            'target' => 'signature'
                            ])
                            @endif
                        
                    </div>

                    <div class="form-group mt-3">
                        Thumb Impression:
                            @if(!empty($b64ThumbImpressionImage) && isset($b64ThumbImpressionImage))
                            <img src="{{ $b64ThumbImpressionImage }}" height="25%" width="25%" class="img-thumbnail" alt="Thumb Impression" />
                            @else

                            @livewire('services.media.uploadable',[
                            'file_name' => 'thumb_impression',
                            'file' => 'thumb_impression',
                            'path' => "$thumb_impression_path",
                            'target' => 'thumb_impression'
                            ])  
                            @endif
                    </div>

                    <div class="form-group mt-3">
                            Aadhar Number:
                            <input id="aadhar_number" type="text" min="12" max="12" title="Enter Aadhar Number" placeholder="Enter Aadhar Number" name="aadhar_number" class="form-control">
                            <span id="lblError" style="display: none;" class="error">Invalid Aadhaar Number</span>

                            @error('aadhar_number')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror    
                        </div>


                    <div class="form-group mt-3">

                            Aadhar Front:

                            @if(!empty($b64AadharFrontImage) && isset($b64AadharFrontImage))
                            <img src="{{ $b64AadharFrontImage }}" height="25%" width="25%" class="img-thumbnail" alt="Aadhar Front Image" />
                            @else

                            @livewire('services.media.uploadable',[
                            'file_name' => 'aadhar_front',                            
                            'file' => 'aadhar_front',
                            'path' => "$aadhar_front_path",
                            'target' => 'aadhar_front'
                            ])  
                            @endif
                    </div>

                    <div class="form-group mt-3">

                            Aadhar Back:

                            @if(!empty($b64AadharBackImage) && isset($b64AadharBackImage))
                            <img src="{{ $b64AadharBackImage }}" height="25%" width="25%" class="img-thumbnail" alt="Aadhar Back Image" />
                            @else
                            @livewire('services.media.uploadable',[
                            'file_name' => 'aadhar_back',                            
                            'file' => 'aadhar_back',
                            'path' => "$aadhar_back_path",
                            'target' => 'aadhar_back'
                            ])  
                            @endif
                    </div>

                    <div class="form-group mt-3">
                            High School Marksheet:

                            @if(!empty($b64HighSchoolMrkshtImage) && isset($b64HighSchoolMrkshtImage))
                            <img src="{{ $b64HighSchoolMrkshtImage }}" height="25%" width="25%" class="img-thumbnail" alt="High School Marksheet" />
                            @else
                            @livewire('services.media.uploadable',[
                            'file_name' => 'high_school_marksheet',                            
                            'file' => 'high_school_marksheet',
                            'path' => "$high_school_marksheet_path",
                            'target' => 'high_school_marksheet'
                            ])  
                            @endif
                    </div>

                    <div class="form-group mt-3">

                            Intermediate Marksheet:

                            @if(!empty($b64IntermediateMrksheetImage) && isset($b64IntermediateMrksheetImage))
                            <img src="{{ $b64IntermediateMrksheetImage }}" height="25%" width="25%" class="img-thumbnail" alt="Intermediate Marksheet" />
                            @else

                            @livewire('services.media.uploadable',[
                            'file_name' => 'intermediate_marksheet',                            
                            'file' => 'intermediate_marksheet',
                            'path' => "$intermediate_marksheet_path",
                            'target' => 'intermediate_marksheet'
                            ])  
                            @endif

                    </div>
                    <div class="">
                        <input name="referrer_url" type="text" value="<?php echo $referrer_url ?>" />
                        <input name="last_user_id" type="text" value="<?php echo base64_encode($last_user_id) ?>" />
                        <input name="is_email_verified" id="is_email_verified" type="text" value="0" />
                        <input name="is_mobile_verified" id="is_mobile_verified" type="text" value="1" />
                    </div>
                    <!-- Documents form end here-->
                </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Enroll</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-contact">
            <h3>ICET Computer Education</h3>
            <p>
              ½ C, Panchkuiyan Road, Naalband Crossing,<br>
              Near Agra College Law Faculty<br>
              Agra - 282010, India <br><br>
              <strong>Phone:</strong> <a href="tel:+91-9719522999">+91 971 952 2999</a><br>
              <strong>Email:</strong> <a href="mailto:arvindsutail@gmail.com">arvindsutail@gmail.com</a><br>
            </p>
          </div>

          <div class="col-lg-6 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Follow us on our social media platforms for more updates</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/groups/617435264962620" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>ICET, Agra</span></strong>. All Rights Reserved
      </div>
        <div class="credits" style="display: none;">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @livewireScripts
  
  <!-- Vendor JS Files -->
  <script src="{{ URL::to('landing_page/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ URL::to('landing_page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::to('landing_page/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ URL::to('landing_page/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <!--<script src="{{ URL::to('landing_page/assets/vendor/php-email-form/validate.js') }}"></script>-->

  <!-- Template Main JS File -->
  <script src="{{ URL::to('landing_page/assets/js/main.js') }}"></script>

  <script type="text/javascript">
      function checkHomePage(){
          if(confirm('The Filled details might get wiped out. Are you sure want to go to homepage?')){
              return true;
          }else{
              return false;
          }
      }
      
      $(document).ready(function(){
          
        $(".docs_forms").hide();
        $("#mail_otp").hide();$("#validate_mail_otp").hide();
          
         $("#high_school_marks").on('keyup',function(){
             console.log($(this).length);
             if($(this).length>=1 || $(this).val>1){
                $("#high_school_grades").hide();
                $("a.high_school_grades_link").hide();
            }
            if($(this).length==0 && ($(this).val==0 || $(this).val!="")){
                $("#high_school_grades").show();
                $("a.high_school_grades_link").show();
            }
         });
         
         // show more fields if caste is OBC..
         $("#caste_category").on("change",function(){

                if($(this).val()=='<?php echo $caste_categories_array['OBC'] ?>'){
                    $(".docs_forms").show();
                }else{
                    $(".docs_forms").hide();
                }
         });
      });
  </script>
  <script type="text/javascript">
//    $.ajaxSetup({
//        headers: {
//            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//        }
//    });
$('body').on('click', '#validate_mobile', function (e) {
    var student_mobile = $("#mobile").val();
    if(student_mobile==''){
        alert('Kindly enter mobile number first');
        $("#mobile").focus();
        return false;
    }else{
        //send OTP
        $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        url: "{{url('/')}}/sendSMS",
        data: {"student_mobile":student_mobile},
        }).done(function( msg ) {
            console.log(msg);
        if(msg.error == 0){
            $('.success-mobile-update').html(msg.status_code+ ' ' + msg.message);
            
            alert(msg.message);
        }else{
            
            alert(msg.status_code);
            alert(msg.message);
            $('.error-mobile-update').html(msg.status_code+ ' ' + msg.message);
        }
    });
    }
});

$('body').on('click', '#validate_email', function (e) {
    
    var student_mobile = $("#mobile").val();
    var student_email = $("#email").val();
    if(student_email==''){
        alert('Kindly enter your email first!');
        $("#email").focus();
        return false;
    }else{
        //send OTP
        $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        url: "{{url('/')}}/sendMailOTP",
        data: {"student_email":student_email,"student_mobile":student_mobile},
        }).done(function( json ) {
            var msg = jQuery.parseJSON(json);  
            console.log(msg);
            console.log(msg.status_code);
            console.log(msg.message);
        if(msg.status_code == 'success'){
            $('.success-email-update').addClass('text-'+msg.status_code).html( msg.message);
            alert(msg.message);
            // now open textbox to validate..
            $("#validate_email").addClass('disabled');
            $("#mail_otp").show();$("#validate_mail_otp").show();
            $("#validate_mail_otp").on('click',function(){
                var email_otp = $("#mail_otp").val();
                if(email_otp==""){
                    $("#mail_otp").focus();
                    return false;
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: "{{url('/')}}/validateMailOTP",
                    data: {"student_email":student_email,"email_otp":email_otp},
                    }).done(function( json ) {
                        var msg = jQuery.parseJSON(json);  
                        console.log(msg);
                    if(msg.status_code == 'success'){
                        $('.success-email-update').addClass('text-'+msg.status_code).html( msg.message);
                        alert(msg.message);
                        // now open textbox to validate..
                        $("#mail_otp").hide();
                        $("#validate_email").addClass('disabled');
                        $("#validate_mail_otp").hide();

                    }else{
                        alert(msg.message);
                        $('.error-email-update').addClass('text-'+msg.status_code).html( msg.message);
                    }
                });
            });
            
            
        }else{
            
            alert(msg.status_code);
            alert(msg.message);
            
            $('.error-email-update').addClass('text-'+msg.status_code).html( msg.message);
        }
    });
    }
});
</script>
</body>

</html>