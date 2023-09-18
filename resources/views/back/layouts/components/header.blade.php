<div class="iq-sidebar sidebar-double-icon">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="header-logo mx-auto">
            ADMINISTRATOR
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div id="sidebar-scrollbar" class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('home') }}" class="collapsed @if ($page == 'dashboard') active @endif" data-toggle="collapse" aria-expanded="false">
                            <i class="las la-home iq-arrow-left"></i><span>Dashboard</span>
                        </a>
                        <a href="#" class="collapsed" data-toggle="collapse" aria-expanded="true">
                            <i class="las la-graduation-cap"></i><span>Pendidikan</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="d-flex align-items-center">
                        <a href="#" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <i class="las la-briefcase"></i><span>Portofolio</span>
                        </a>
                        <a href="#" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <i class="las la-envelope"></i><span>Pesan</span>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div class="iq-top-navbar">
    <div class="iq-navbar-custom d-flex align-items-center justify-content-between">
        <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
            <i class="ri-menu-line wrapper-menu"></i>
        </div>
        <div class="iq-menu-horizontal"></div>
        <nav class="navbar navbar-expand-lg school-navbar navbar-light p-0">
            <div class="change-mode">
                <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                    <div class="custom-switch-inner">
                        <p class="mb-0"> </p>
                        <input type="checkbox" class="custom-control-input" id="dark-mode"
                            data-active="true">
                        <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                            <span class="switch-icon-left"><i class="a-left"></i></span>
                            <span class="switch-icon-right"><i class="a-right"></i></span>
                        </label>
                    </div>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-label="Toggle navigation">
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list align-items-center">
                    <li class="nav-item nav-icon dropdown">
                        <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-notification-line"></i>
                            <span class="bg-primary dots"></span>
                        </a>
                        <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <div class="card shadow-none m-0">
                                <div class="card-body p-0 ">
                                    <div class="cust-title p-3">
                                        <h5 class="mb-0">All Notifications</h5>
                                    </div>
                                    <div class="p-3">
                                        <a href="#" class="iq-sub-card">
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded-small"
                                                        src="{{ asset('back/assets/images/user/01.jpg') }}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0">Emma Watson Barry <small
                                                            class="badge badge-success float-right">New</small>
                                                    </h6>
                                                    <p class="mb-0">95 MB</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded-small"
                                                        src="{{ asset('back/assets/images/user/02.jpg') }}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">New customer is join</h6>
                                                    <p class="mb-0">Cyst Barry</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded-small"
                                                        src="{{ asset('back/assets/images/user/03.jpg') }}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Two customer is left</h6>
                                                    <p class="mb-0">Cyst Barry</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                            <div class="media align-items-center">
                                                <div class="">
                                                    <img class="avatar-40 rounded-small"
                                                        src="{{ asset('back/assets/images/user/04.jpg') }}" alt="">
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">New Mail from Fenny <small
                                                            class="badge badge-success float-right">New</small>
                                                    </h6>
                                                    <p class="mb-0">Cyst Barry</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a class="right-ic btn btn-primary btn-block position-relative p-2"
                                        href="#" role="button">
                                        <div class="dd-icon"><i class="las la-arrow-right mr-0"></i></div>
                                        View All
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item iq-full-screen"><a href="#" class="" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a></li>
                    <li class="caption-content">
                        <a href="#" class="iq-user-toggle">
                            <img src="{{ asset('back/assets/images/user/1.jpg') }}" class="img-fluid rounded" alt="user">
                        </a>
                        <div class="iq-user-dropdown">
                            <div class="card">
                                <div
                                    class="card-header d-flex justify-content-between align-items-center mb-0">
                                    <div class="header-title">
                                        <h4 class="card-title mb-0">Profile</h4>
                                    </div>
                                    <div class="close-data text-right badge badge-primary cursor-pointer">
                                        <i class="ri-close-fill"></i>
                                    </div>
                                </div>
                                <div class="data-scrollbar" data-scroll="2">
                                    <div class="card-body">
                                        <div class="profile-header">
                                            <div class="cover-container text-center">
                                                <img src="{{ asset('back/assets/images/user/1.jpg') }}" alt="profile-bg"
                                                    class="rounded img-fluid avatar-80">
                                                <div class="profile-detail mt-3">
                                                    <h3>{{ $user->name }}</h3>
                                                    <p class="mb-1">Web designer</p>
                                                </div>
                                                <a href="{{ route('logout') }}" class="btn btn-primary">Sign Out</a>
                                            </div>
                                            <div class="profile-details my-4">
                                                <a href="../app/user-account-setting.html"
                                                    class="iq-sub-card bg-success-light rounded-small p-2">
                                                    <div class="media align-items-center">
                                                        <div class="rounded iq-card-icon-small">
                                                            <i class="ri-account-box-line"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="mb-0 ">Account settings</h6>
                                                            <p class="mb-0 font-size-12">Manage your account
                                                                parameters.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="personal-details">
                                                <h5 class="card-title mb-3 mt-3">Personal Details</h5>
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-sm-6">
                                                        <h6>Birthday</h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="mb-0">3rd March</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-sm-6">
                                                        <h6>Address</h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="mb-0">Landon</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-sm-6">
                                                        <h6>Phone</h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="mb-0">(010)987 543 201</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-sm-6">
                                                        <h6>Email</h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="mb-0">Barry@example.com</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-sm-6">
                                                        <h6>Twitter</h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="mb-0">@Barry</p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-sm-6">
                                                        <h6>Facebook</h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="mb-0">@Barry_Tech</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
