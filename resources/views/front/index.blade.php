<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MHD ANDRA FAHREZA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Portofolio Mhd Andra Fahreza" />
    <meta name="keywords" content="vcard, resposnive, retina, resume, jquery, css3, bootstrap, Material CV, portfolio" />
    <meta name="author" content="andra" />
    <link rel="shortcut icon" href="{{ asset($user->photo) }}">

    <link rel="stylesheet" href="{{ asset('front/css/reset.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap-grid.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/animations.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/perfect-scrollbar.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}" type="text/css">
</head>

<body>
    <!-- Animated Background -->
    <div class="lm-animated-bg" style="background-image: url(front/img/main_bg.png);"></div>
    <!-- /Animated Background -->

    <!-- Loading animation -->
    <div class="preloader">
        <div class="preloader-animation">
            <div class="preloader-spinner">
            </div>
        </div>
    </div>
    <!-- /Loading animation -->

    <div class="page">
        <div class="page-content">

            <header id="site_header" class="header mobile-menu-hide">
                <div class="header-content">
                    <div class="header-photo">
                        <img src="{{ asset($user->photo) }}" alt="{{ $user->name }}">
                    </div>
                    <div class="header-titles">
                        <h2>{{ $user->name }}</h2>
                        <h4>{{ $user->job }}</h4>
                    </div>
                </div>

                <ul class="main-menu">
                    <li class="active">
                        <a href="#home" class="nav-anim">
                            <span class="menu-icon lnr lnr-home"></span>
                            <span class="link-text">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#about-me" class="nav-anim">
                            <span class="menu-icon lnr lnr-user"></span>
                            <span class="link-text">About Me</span>
                        </a>
                    </li>
                    <li>
                        <a href="#resume" class="nav-anim">
                            <span class="menu-icon lnr lnr-graduation-hat"></span>
                            <span class="link-text">Resume</span>
                        </a>
                    </li>
                    <li>
                        <a href="#portfolio" class="nav-anim">
                            <span class="menu-icon lnr lnr-briefcase"></span>
                            <span class="link-text">Portfolio</span>
                        </a>
                    </li>
                    <li>
                        <a href="#contact" class="nav-anim">
                            <span class="menu-icon lnr lnr-envelope"></span>
                            <span class="link-text">Contact</span>
                        </a>
                    </li>
                </ul>

                <div class="social-links">
                    <ul>
                        <li><a href="{{ $user->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="{{ $user->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    </ul>
                </div>

                <div class="header-buttons">
                    <a href="{{ asset($user->cv) }}" download class="btn btn-primary">Download CV</a>
                </div>

                <div class="copyrights">© {{ date('Y') }} Mhd Andra Fahreza.</div>
            </header>

            <!-- Mobile Navigation -->
            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- End Mobile Navigation -->

            <!-- Arrows Nav -->
            <div class="lmpixels-arrows-nav">
                <div class="lmpixels-arrow-right"><i class="lnr lnr-chevron-right"></i></div>
                <div class="lmpixels-arrow-left"><i class="lnr lnr-chevron-left"></i></div>
            </div>
            <!-- End Arrows Nav -->

            <div class="content-area">
                <div class="animated-sections">
                    <!-- Home Subpage -->
                    <section data-id="home" class="animated-section start-page">
                        <div class="section-content vcentered">

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="title-block">
                                        <h2>{{ $user->name }}</h2>
                                        <div class="owl-carousel text-rotation">
                                            <div class="item">
                                                <div class="sp-subtitle">{{ $user->job }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <!-- End of Home Subpage -->

                    <!-- About Me Subpage -->
                    <section data-id="about-me" class="animated-section">
                        <div class="section-content">
                            <div class="page-title">
                                <h2>About <span>Me</span></h2>
                            </div>

                            <!-- Personal Information -->
                            <div class="row">
                                <div class="col-xs-12 col-sm-7">
                                    <p>{!! $user->about !!}</p>
                                </div>

                                <div class="col-xs-12 col-sm-5">
                                    <div class="info-list">
                                        <ul>
                                            <li>
                                                <span class="title">Date Of Birth</span>
                                                <span class="value">{{ $user->birthday }}</span>
                                            </li>

                                            <li>
                                                <span class="title">Age</span>
                                                <span class="value">{{ $age }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Personal Information -->

                            <div class="white-space-50"></div>

                            <!-- Services -->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="block-title">
                                        <h3>What <span>I Do</span></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                @foreach ($ability as $ab)
                                    <div class="col-md-4">
                                        <div class="col-inner">
                                            <div class="info-list-w-icon">
                                                <div class="info-block-w-icon">
                                                    <div class="ci-icon">
                                                        <i class="lnr {{ $ab->icon }}"></i>
                                                    </div>
                                                    <div class="ci-text">
                                                        <h4>{{ $ab->title }}</h4>
                                                        <p>{!! $ab->note !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- End of Services -->

                            <div class="white-space-50"></div>

                            <!-- Clients -->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="block-title">
                                        <h3>Cilents</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="clients owl-carousel">
                                        @foreach ($clients as $client)
                                            <div class="client-block">
                                                <a href="#" title="{{ $client->company }}">
                                                    <img src="{{ asset($client->photo) }}"
                                                        alt="{{ $client->company }}" width="200" height="150">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- End of Clients -->
                        </div>
                    </section>
                    <!-- End of About Me Subpage -->

                    <!-- Resume Subpage -->
                    <section data-id="resume" class="animated-section">
                        <div class="section-content">
                            <div class="page-title">
                                <h2>Resume</h2>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-7">
                                    <div class="block-title">
                                        <h3>Education</h3>
                                    </div>
                                    <div class="timeline timeline-second-style clearfix">
                                        @foreach ($education as $edu)
                                            <div class="timeline-item clearfix">
                                                <div class="left-part">
                                                    <h5 class="item-period">{{ $edu->year }}</h5>
                                                    <span class="item-company">{{ $edu->study }}</span>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="right-part">
                                                    <h4 class="item-title">{{ $edu->major }}</h4>
                                                    <p>{!! $edu->note !!}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="white-space-50"></div>

                                    <div class="block-title">
                                        <h3>Experience</h3>
                                    </div>

                                    <div class="timeline timeline-second-style clearfix">
                                        @foreach ($experience as $exp)
                                            <div class="timeline-item clearfix">
                                                <div class="left-part">
                                                    <h5 class="item-period">{{ $exp->start }} - {{ $exp->until }}
                                                    </h5>
                                                    <span class="item-company">{{ $exp->company }}</span>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="right-part">
                                                    <h4 class="item-title">{{ $exp->job }}</h4>
                                                    <p style="text-align: justify">{!! json_decode(str_replace('\r\n', '<br>', $exp->note)) !!}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                                <!-- Skills & Certificates -->
                                <div class="col-xs-12 col-sm-5">
                                    <!-- Design Skills -->
                                    <div class="block-title">
                                        <h3>Coding <span>Skills</span></h3>
                                    </div>

                                    <div class="skills-info skills-second-style">
                                        @foreach ($skills as $skill)
                                            <div class="skill clearfix">
                                                <h4>{{ $skill->skill }}</h4>
                                                <div class="skill-value">{{ $skill->percentage }}%</div>
                                            </div>
                                            <div class="skill-container">
                                                <div class="skill-percentage"
                                                    style="width: {{ $skill->percentage }}%"></div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- End of Design Skills -->

                                    <div class="white-space-10"></div>

                                    <!-- Knowledges -->
                                    <div class="block-title">
                                        <h3>Interest</h3>
                                    </div>

                                    <ul class="knowledges">
                                        @foreach ($interest as $inter)
                                            <li>{{ $inter->interest }}</li>
                                        @endforeach
                                    </ul>
                                    <!-- End of Knowledges -->
                                </div>
                                <!-- End of Skills & Certificates -->
                            </div>

                            <div class="white-space-50"></div>

                            <!-- Certificates -->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="block-title">
                                        <h3>Certificates</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach ($certificates as $certificate)
                                    <div class="col-xs-12 col-sm-6">
                                        <a href="{{ asset($certificate->file) }}" target="_blank">
                                            <div class="certificate-item clearfix">
                                                <div class="certi-logo">
                                                    <img src="{{ asset($certificate->logo) }}" alt="logo">
                                                </div>

                                                <div class="certi-content">
                                                    <div class="certi-title">
                                                        <h4>{{ $certificate->title }}</h4>
                                                    </div>
                                                    <div class="certi-date">
                                                        <span>{{ date('d-m-Y', strtotime($certificate->date)) }}</span>
                                                    </div>
                                                    <div class="certi-company">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <!-- End of Certificates -->
                        </div>
                    </section>
                    <!-- End of Resume Subpage -->

                    <!-- Portfolio Subpage -->
                    <section data-id="portfolio" class="animated-section">
                        <div class="section-content">
                            <div class="page-title">
                                <h2>Portfolio</h2>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <!-- Portfolio Content -->
                                    <div class="portfolio-content">

                                        <ul class="portfolio-filters">
                                            <li class="active">
                                                <a class="filter btn btn-sm btn-link"
                                                    data-group="category_all">All</a>
                                            </li>
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a class="filter btn btn-sm btn-link"
                                                        data-group="{{ $category->category }}">{{ $category->category }}</a>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <!-- Portfolio Grid -->
                                        <div class="portfolio-grid three-columns">
                                            @foreach ($portfolio as $porto)
                                                <figure class="item lbimage"
                                                    data-groups='["category_all", "{{ $porto->category->category }}"]'>
                                                    <div class="portfolio-item-img">
                                                        <img src="{{ asset($porto->photo) }}"
                                                            alt="{{ $porto->title }}" title="{{ $porto->title }}" />
                                                        <a class="lightbox" title="{{ $porto->title }}"
                                                            href="{{ $porto->photo }}"></a>
                                                    </div>

                                                    <i class="far fa-image"></i>
                                                    <h4 class="name">{{ $porto->title }}</h4>
                                                    <span class="category">{{ $porto->category->category }}</span>
                                                </figure>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End of Portfolio Content -->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End of Portfolio Subpage -->

                    <!-- Contact Subpage -->
                    <section data-id="contact" class="animated-section">
                        <div class="section-content">
                            <div class="page-title">
                                <h2>Contact</h2>
                            </div>

                            <div class="row">
                                <!-- Contact Info -->
                                <div class="col-xs-12 col-sm-4">
                                    <div class="lm-info-block gray-default">
                                        <i class="lnr lnr-map-marker"></i>
                                        <h4>{{ $user->address }}</h4>
                                        <span class="lm-info-block-value"></span>
                                        <span class="lm-info-block-text"></span>
                                    </div>

                                    <div class="lm-info-block gray-default">
                                        <i class="lnr lnr-phone-handset"></i>
                                        <h4>{{ $user->phone }}</h4>
                                        <span class="lm-info-block-value"></span>
                                        <span class="lm-info-block-text"></span>
                                    </div>

                                    <div class="lm-info-block gray-default">
                                        <i class="lnr lnr-envelope"></i>
                                        <h4>{{ $user->email }}</h4>
                                        <span class="lm-info-block-value"></span>
                                        <span class="lm-info-block-text"></span>
                                    </div>

                                    <div class="lm-info-block gray-default">
                                        <i class="lnr lnr-checkmark-circle"></i>
                                        <h4>Freelance Available</h4>
                                        <span class="lm-info-block-value"></span>
                                        <span class="lm-info-block-text"></span>
                                    </div>


                                </div>
                                <!-- End of Contact Info -->

                                <!-- Contact Form -->
                                <div class="col-xs-12 col-sm-8">

                                    <div id="map" class="map"></div>

                                    <div class="block-title">
                                        <div id="InfoBanner" class="response d-none">
                                            <span class="reversed reversedRight" id="reverseSymbol">
                                                <span id="symbol">
                                                    &#9888;
                                                </span>
                                            </span>
                                            <span class="reversed reversedLeft" id="responseMessage">Failed to send Message</span>
                                        </div>

                                        <br>

                                        <h3>How Can I <span>Help You?</span></h3>
                                    </div>

                                    <form id="contact_form" class="contact-form"
                                        action="{{ route('send-message') }}" method="post">
                                        @csrf
                                        <div class="messages"></div>

                                        <div class="controls two-columns">
                                            <div class="fields clearfix">
                                                <div class="left-column">
                                                    <div class="form-group form-group-with-icon">
                                                        <input id="form_name" type="text" name="fullname"
                                                            class="form-control" placeholder="" required="required"
                                                            data-error="Name is required.">
                                                        <label>Full Name</label>
                                                        <div class="form-control-border"></div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>

                                                    <div class="form-group form-group-with-icon">
                                                        <input id="form_email" type="email" name="email"
                                                            class="form-control" placeholder="" required="required"
                                                            data-error="Valid email is required.">
                                                        <label>Email Address</label>
                                                        <div class="form-control-border"></div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>

                                                    <div class="form-group form-group-with-icon">
                                                        <input id="form_subject" type="text" name="subject"
                                                            class="form-control" placeholder="" required="required"
                                                            data-error="Subject is required.">
                                                        <label>Subject</label>
                                                        <div class="form-control-border"></div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="right-column">
                                                    <div class="form-group form-group-with-icon">
                                                        <textarea id="form_message" name="message" class="form-control" placeholder="" rows="7" required="required"
                                                            data-error="Please, leave me a message."></textarea>
                                                        <label>Message</label>
                                                        <div class="form-control-border"></div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="submit" class="button btn-send" value="Send message">
                                        </div>
                                    </form>
                                </div>
                                <!-- End of Contact Form -->
                            </div>

                        </div>
                    </section>
                    <!-- End of Contact Subpage -->
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('front/js/animating.js') }}"></script>

    <script src="{{ asset('front/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script src='{{ asset('front/js/perfect-scrollbar.min.js') }}'></script>
    <script src='{{ asset('front/js/jquery.shuffle.min.js') }}'></script>
    <script src='{{ asset('front/js/masonry.pkgd.min.js') }}'></script>
    <script src='{{ asset('front/js/owl.carousel.min.js') }}'></script>
    <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/js/validator.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAu1GRqaYw_NmXmAnPyDsEOs2fdh5zYiPw&libraries=drawing,places,geometry&callback=initMap"
        async></script>


    <script>
        var map;
        var marker;
        var center;

        function initMap() {
            var lat = "{{ $user->lat }}";
            var lng = "{{ $user->lng }}";
            if (lat != "" && lng != "") {
                center = {
                    lat: parseFloat(lat),
                    lng: parseFloat(lng)
                };
            } else {
                center = {
                    lat: 3.597031,
                    lng: 98.678513
                };
            }

            map = new google.maps.Map(document.getElementById("map"), {
                center: center,
                zoom: 17,
            });

            // marker saat load pertama kali
            if (lat != "" && lng != "") {
                marker = new google.maps.Marker({
                    position: center,
                    map: map,
                    title: "Location"
                });
            }
        }

        window.initMap = initMap;

        $('#contact_form').submit(function(e) {
            e.preventDefault();

            const url = $(this).attr("action");
            const formData = new FormData(this);

            $.ajax({
                type: "post",
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(response) {
                    var title = "";
                    var icon = "";

                    if (response.alert == '1') {
                        title = "Berhasil";
                        icon = "success";

                        $('.response').removeClass('d-none');
                        $('#reverseSymbol').removeClass('reversed reversedRight');
                        $('#reverseSymbol').addClass('reversedSuccess reversedSuccessRight');
                        $('#symbol').html("&#9745;");
                        $('#responseMessage').removeClass('reversed reversedLeft');
                        $('#responseMessage').addClass('reversedSuccess reversedSuccessLeft');

                        $('#contact_form')[0].reset();
                    } else {
                        $('.response').removeClass('d-none');
                        $('#reverseSymbol').removeClass('reversedSuccess reversedSuccessRight');
                        $('#reverseSymbol').addClass('reversed reversedRight');
                        $('#symbol').html("&#9888;");
                        $('#responseMessage').removeClass('reversedSuccess reversedSuccessLeft');
                        $('#responseMessage').addClass('reversed reversedLeft');

                        title = "Error !";
                        icon = "error";
                    }

                    $('#responseMessage').html(response.message);
                },
                error: function(response) {
                    $('.response').removeClass('d-none');
                    $('#reverseSymbol').removeClass('reversedSuccess reversedSuccessRight');
                    $('#reverseSymbol').addClass('reversed reversedRight');
                    $('#symbol').html("&#9888;");
                    $('#responseMessage').removeClass('reversedSuccess reversedSuccessLeft');
                    $('#responseMessage').addClass('reversed reversedLeft');

                    $('#responseMessage').html(response.message);
                }
            });
        });
    </script>
</body>

</html>
