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
                                                    <img src="{{ asset($client->photo) }}" alt="{{ $client->company }}" width="240" height="200">
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
                                        <div class="timeline-item clearfix">
                                            <div class="left-part">
                                                <h5 class="item-period">2016 - Current</h5>
                                                <span class="item-company">Google</span>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="right-part">
                                                <h4 class="item-title">Lead Ui/Ux Designer</h4>
                                                <p>Praesent dignissim sollicitudin justo, sed elementum quam lacinia
                                                    quis. Phasellus eleifend tristique posuere. Sed vitae dui nec magna.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="timeline-item clearfix">
                                            <div class="left-part">
                                                <h5 class="item-period">2013 - 2016</h5>
                                                <span class="item-company">Adobe</span>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="right-part">
                                                <h4 class="item-title">Senior Ui/Ux Designer</h4>
                                                <p>Maecenas tempus faucibus rutrum. Duis eu aliquam urna. Proin vitae
                                                    nulla tristique, ornare felis id, congue libero. Nam volutpat
                                                    euismod quam.</p>
                                            </div>
                                        </div>

                                        <div class="timeline-item clearfix">
                                            <div class="left-part">
                                                <h5 class="item-period">2011 - 2013</h5>
                                                <span class="item-company">Google</span>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="right-part">
                                                <h4 class="item-title">Junior Ui/Ux Designer</h4>
                                                <p>Duis mollis nunc quis quam viverra venenatis. Nulla nulla arcu,
                                                    congue vitae nunc ac, sodales ultricies diam. Nullam justo leo,
                                                    tincidunt sit amet.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Skills & Certificates -->
                                <div class="col-xs-12 col-sm-5">
                                    <!-- Design Skills -->
                                    <div class="block-title">
                                        <h3>Design <span>Skills</span></h3>
                                    </div>

                                    <div class="skills-info skills-second-style">
                                        <!-- Skill 1 -->
                                        <div class="skill clearfix">
                                            <h4>Web Design</h4>
                                            <div class="skill-value">95%</div>
                                        </div>
                                        <div class="skill-container skill-1">
                                            <div class="skill-percentage"></div>
                                        </div>
                                        <!-- End of Skill 1 -->

                                        <!-- Skill 2 -->
                                        <div class="skill clearfix">
                                            <h4>Print Design</h4>
                                            <div class="skill-value">65%</div>
                                        </div>
                                        <div class="skill-container skill-2">
                                            <div class="skill-percentage"></div>
                                        </div>
                                        <!-- End of Skill 2 -->

                                        <!-- Skill 3 -->
                                        <div class="skill clearfix">
                                            <h4>Logo Design</h4>
                                            <div class="skill-value">80%</div>
                                        </div>
                                        <div class="skill-container skill-3">
                                            <div class="skill-percentage"></div>
                                        </div>
                                        <!-- End of Skill 3 -->

                                        <!-- Skill 4 -->
                                        <div class="skill clearfix">
                                            <h4>Graphic Design</h4>
                                            <div class="skill-value">90%</div>
                                        </div>
                                        <div class="skill-container skill-4">
                                            <div class="skill-percentage"></div>
                                        </div>
                                        <!-- End of Skill 4 -->

                                    </div>
                                    <!-- End of Design Skills -->

                                    <div class="white-space-10"></div>

                                    <!-- Coding Skills -->
                                    <div class="block-title">
                                        <h3>Coding <span>Skills</span></h3>
                                    </div>

                                    <div class="skills-info skills-second-style">
                                        <!-- Skill 5 -->
                                        <div class="skill clearfix">
                                            <h4>JavaScript</h4>
                                            <div class="skill-value">95%</div>
                                        </div>
                                        <div class="skill-container skill-5">
                                            <div class="skill-percentage"></div>
                                        </div>
                                        <!-- End of Skill 5 -->

                                        <!-- Skill 6 -->
                                        <div class="skill clearfix">
                                            <h4>PHP</h4>
                                            <div class="skill-value">85%</div>
                                        </div>
                                        <div class="skill-container skill-6">
                                            <div class="skill-percentage"></div>
                                        </div>
                                        <!-- End of Skill 6 -->

                                        <!-- Skill 7 -->
                                        <div class="skill clearfix">
                                            <h4>HTML/CSS</h4>
                                            <div class="skill-value">100%</div>
                                        </div>
                                        <div class="skill-container skill-7">
                                            <div class="skill-percentage"></div>
                                        </div>
                                        <!-- End of Skill 7 -->

                                        <!-- Skill 8 -->
                                        <div class="skill clearfix">
                                            <h4>Smarty/Twig</h4>
                                            <div class="skill-value">75%</div>
                                        </div>
                                        <div class="skill-container skill-8">
                                            <div class="skill-percentage"></div>
                                        </div>
                                        <!-- End of Skill 8 -->

                                        <!-- Skill 9 -->
                                        <div class="skill clearfix">
                                            <h4>Perl</h4>
                                            <div class="skill-value">90%</div>
                                        </div>
                                        <div class="skill-container skill-9">
                                            <div class="skill-percentage"></div>
                                        </div>
                                        <!-- End of Skill 9 -->
                                    </div>
                                    <!-- End of Coding Skills -->

                                    <div class="white-space-10"></div>

                                    <!-- Knowledges -->
                                    <div class="block-title">
                                        <h3>Knowledges</h3>
                                    </div>

                                    <ul class="knowledges">
                                        <li>Marketing</li>
                                        <li>Print</li>
                                        <li>Digital Design</li>
                                        <li>Social Media</li>
                                        <li>Time Management</li>
                                        <li>Communication</li>
                                        <li>Problem-Solving</li>
                                        <li>Social Networking</li>
                                        <li>Flexibility</li>
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
                                <!-- Certificate 1 -->
                                <div class="col-xs-12 col-sm-6">
                                    <div class="certificate-item clearfix">
                                        <div class="certi-logo">
                                            <img src="img/clients/client-1.png" alt="logo">
                                        </div>

                                        <div class="certi-content">
                                            <div class="certi-title">
                                                <h4>Psyhology of Intertnation Design</h4>
                                            </div>
                                            <div class="certi-id">
                                                <span>Membership ID: XXXX</span>
                                            </div>
                                            <div class="certi-date">
                                                <span>19 April 2018</span>
                                            </div>
                                            <div class="certi-company">
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Certificate 1 -->

                                <!-- Certificate 2 -->
                                <div class="col-xs-12 col-sm-6">
                                    <div class="certificate-item clearfix">
                                        <div class="certi-logo">
                                            <img src="img/clients/client-1.png" alt="logo">
                                        </div>

                                        <div class="certi-content">
                                            <div class="certi-title">
                                                <h4>Psyhology of Intertnation Design</h4>
                                            </div>
                                            <div class="certi-id">
                                                <span>Membership ID: XXXX</span>
                                            </div>
                                            <div class="certi-date">
                                                <span>19 April 2018</span>
                                            </div>
                                            <div class="certi-company">
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Certificate 2 -->

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
                                            <li>
                                                <a class="filter btn btn-sm btn-link"
                                                    data-group="category_detailed">Detailed</a>
                                            </li>
                                            <li>
                                                <a class="filter btn btn-sm btn-link"
                                                    data-group="category_mockups">Mockups</a>
                                            </li>
                                            <li>
                                                <a class="filter btn btn-sm btn-link"
                                                    data-group="category_soundcloud">SoundCloud</a>
                                            </li>
                                            <li>
                                                <a class="filter btn btn-sm btn-link"
                                                    data-group="category_vimeo-videos">Vimeo Videos</a>
                                            </li>
                                            <li>
                                                <a class="filter btn btn-sm btn-link"
                                                    data-group="category_youtube-videos">YouTube Videos</a>
                                            </li>
                                        </ul>

                                        <!-- Portfolio Grid -->
                                        <div class="portfolio-grid three-columns">

                                            <figure class="item lbaudio"
                                                data-groups='["category_all", "category_soundcloud"]'>
                                                <div class="portfolio-item-img">
                                                    <img src="{{ asset('front/img/portfolio/1.jpg') }}"
                                                        alt="SoundCloud Audio" title="" />
                                                    <a href="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/221650664&#038;color=%23ff5500&#038;auto_play=false&#038;hide_related=false&#038;show_comments=true&#038;show_user=true&#038;show_reposts=false&#038;show_teaser=true&#038;visual=true"
                                                        class="lightbox mfp-iframe" title="SoundCloud Audio"></a>
                                                </div>

                                                <i class="fa fa-volume-up"></i>
                                                <h4 class="name">SoundCloud Audio</h4>
                                                <span class="category">SoundCloud</span>
                                            </figure>

                                            <figure class="item standard"
                                                data-groups='["category_all", "category_detailed"]'>
                                                <div class="portfolio-item-img">
                                                    <img src="{{ asset('front/img/portfolio/2.jpg') }}"
                                                        alt="Media Project 2" title="" />
                                                    <a href="portfolio-1.html" class="ajax-page-load"></a>
                                                </div>

                                                <i class="far fa-file-alt"></i>
                                                <h4 class="name">Detailed Project 2</h4>
                                                <span class="category">Detailed</span>
                                            </figure>

                                            <figure class="item lbvideo"
                                                data-groups='["category_all", "category_vimeo-videos"]'>
                                                <div class="portfolio-item-img">
                                                    <img src="{{ asset('front/img/portfolio/3.jpg') }}"
                                                        alt="Vimeo Video 1" title="" />
                                                    <a href="https://player.vimeo.com/video/158284739"
                                                        class="lightbox mfp-iframe" title="Vimeo Video 1"></a>
                                                </div>

                                                <i class="fas fa-video"></i>
                                                <h4 class="name">Vimeo Video 1</h4>
                                                <span class="category">Vimeo Videos</span>
                                            </figure>

                                            <figure class="item standard"
                                                data-groups='["category_all", "category_detailed"]'>
                                                <div class="portfolio-item-img">
                                                    <img src="{{ asset('front/img/portfolio/4.jpg') }}"
                                                        alt="Media Project 1" title="" />
                                                    <a href="portfolio-1.html" class="ajax-page-load"></a>
                                                </div>

                                                <i class="far fa-file-alt"></i>
                                                <h4 class="name">Detailed Project 1</h4>
                                                <span class="category">Detailed</span>
                                            </figure>

                                            <figure class="item lbimage"
                                                data-groups='["category_all", "category_mockups"]'>
                                                <div class="portfolio-item-img">
                                                    <img src="{{ asset('front/img/portfolio/5.jpg') }}"
                                                        alt="Mockup Design 1" title="" />
                                                    <a class="lightbox" title="Mockup Design 1"
                                                        href="img/portfolio/full/5.jpg"></a>
                                                </div>

                                                <i class="far fa-image"></i>
                                                <h4 class="name">Mockup Design 1</h4>
                                                <span class="category">Mockups</span>
                                            </figure>

                                            <figure class="item lbvideo"
                                                data-groups='["category_all", "category_youtube-videos"]'>
                                                <div class="portfolio-item-img">
                                                    <img src="{{ asset('front/img/portfolio/6.jpg') }}"
                                                        alt="YouTube Video 1" title="" />
                                                    <a href="https://www.youtube.com/embed/bg0gv2YpIok"
                                                        class="lightbox mfp-iframe" title="YouTube Video 1"></a>
                                                </div>

                                                <i class="fas fa-video"></i>
                                                <h4 class="name">YouTube Video 1</h4>
                                                <span class="category">YouTube Videos</span>
                                            </figure>
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
                                        <h3>How Can I <span>Help You?</span></h3>
                                    </div>

                                    <form id="contact_form" class="contact-form"
                                        action="contact_form/contact_form.php" method="post">

                                        <div class="messages"></div>

                                        <div class="controls two-columns">
                                            <div class="fields clearfix">
                                                <div class="left-column">
                                                    <div class="form-group form-group-with-icon">
                                                        <input id="form_name" type="text" name="name"
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

                                            <div class="g-recaptcha"
                                                data-sitekey="6LdqmCAUAAAAAMMNEZvn6g4W5e0or2sZmAVpxVqI"
                                                data-theme="dark"></div>

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
    </script>
</body>

</html>