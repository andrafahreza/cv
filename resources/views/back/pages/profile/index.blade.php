@extends('back.layouts.app')

@section('content')
    <style>
        #map-container {
            position: relative;
            height: 400px;
        }

        #gmap_canvas {
            width: 100%;
            height: 100%;
        }

        #search-container {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1;
            background-color: white;
            padding: 5px;
            border-radius: 4px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #search-input {
            width: 250px;
            height: 30px;
            padding: 5px;
        }
    </style>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="iq-edit-list usr-edit">
                    <ul class="iq-edit-profile d-flex nav nav-pills">
                        <li class="col-md-4 p-0">
                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                Personal Information
                            </a>
                        </li>
                        <li class="col-md-4 p-0">
                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                Change Password
                            </a>
                        </li>
                        <li class="col-md-4 p-0">
                            <a class="nav-link" data-toggle="pill" href="#curriculum">
                                Curriculum Vitae
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="iq-edit-list-data">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Personal Information</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('save_profile') }}" method="POST" enctype="multipart/form-data"
                                id="formPersonal">
                                @csrf
                                <div class="form-group row align-items-center">
                                    <div class="col-md-12">
                                        <div class="profile-img-edit">
                                            <div class="crm-profile-img-edit">
                                                <img class="crm-profile-pic rounded-circle avatar-100"
                                                    src="{{ asset(Auth::user()->photo == null ? 'back/assets/images/user/07.jpg' : Auth::user()->photo) }}"
                                                    alt="profile-pic">
                                                <div class="crm-p-image bg-primary">
                                                    <i class="las la-pen upload-button"></i>
                                                    <input class="file-upload" name="photo" type="file"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row align-items-center">
                                    <div class="form-group col-sm-6">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ Auth::user()->name }}" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="job">Job</label>
                                        <input type="text" name="job" class="form-control" id="job"
                                            value="{{ Auth::user()->job }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username"
                                            value="{{ Auth::user()->username }}" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" name="facebook" class="form-control" id="facebook"
                                            value="{{ Auth::user()->facebook }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address"
                                            value="{{ Auth::user()->address }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="linkedin">Linkedin</label>
                                        <input type="text" name="linkedin" class="form-control" id="linkedin"
                                            value="{{ Auth::user()->linkedin }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="birthday">Date Of Birth</label>
                                        <input type="date" name="birthday" class="form-control" id="birthday"
                                            value="{{ Auth::user()->birthday }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            value="{{ Auth::user()->phone }}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="d-block">Gender:</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" value="male" id="customRadio6" name="gender"
                                                class="custom-control-input"
                                                @if (Auth::user()->gender == 'male') checked @endif>
                                            <label class="custom-control-label" for="customRadio6">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" value="female" id="customRadio7" name="gender"
                                                class="custom-control-input"
                                                @if (Auth::user()->gender == 'female') checked @endif>
                                            <label class="custom-control-label" for="customRadio7">Female</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>About</label>
                                        <textarea class="form-control" name="about" rows="5" style="line-height: 22px;">{{ Auth::user()->about }}</textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Location</label>
                                        <input type="hidden" name="lat" id="inputLat" value="{{ Auth::user()->lat }}">
                                        <input type="hidden" name="lng" id="inputLng" value="{{ Auth::user()->lng }}">
                                        <div id="map-container">
                                            <div class="gmap_canvas" id="gmap_canvas" style="height: 400px;"></div>
                                            <div id="search-container">
                                                <input type="text" class="form-control" id="search-input"
                                                    placeholder="Find Location">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('change-pass') }}" method="POST" id="formChangePass">
                                @csrf
                                <div class="form-group">
                                    <label for="cpass">Current Password:</label>
                                    <input type="Password" name="current_password" class="form-control" id="cpass" value="">
                                </div>
                                <div class="form-group">
                                    <label for="npass">New Password:</label>
                                    <input type="Password" name="new_password" class="form-control" id="npass" value="">
                                </div>
                                <div class="form-group">
                                    <label for="vpass">Verify Password:</label>
                                    <input type="Password" name="retype" class="form-control" id="vpass" value="">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="curriculum" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Curriculum Vitae</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('upload-cv') }}" method="POST" id="formCv">
                                @csrf
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="cv" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                 </div>

                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                    @if (Auth::user()->cv != null)
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">View CV</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <embed src="{{ asset(Auth::user()->cv) }}" width="100%" height="800px"></embed>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('back/assets/js/response.js') }}"></script>
    <script src="{{ asset('back/assets/js/chart-custom.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAu1GRqaYw_NmXmAnPyDsEOs2fdh5zYiPw&libraries=drawing,places,geometry&callback=initMap"
        async></script>

    <script>
        var map;
        var marker;
        var searchInput;
        var center;

        function initMap() {
            var lat = "{{ Auth::user()->lat }}";
            var lng = "{{ Auth::user()->lng }}";
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

            map = new google.maps.Map(document.getElementById("gmap_canvas"), {
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

            searchInput = document.getElementById('search-input');
            var searchBox = new google.maps.places.SearchBox(searchInput);

            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length === 0) {
                    return;
                }

                var place = places[0];

                // Center the map on the selected place
                map.setCenter(place.geometry.location);
            });

            const drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.MARKER,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: [
                        google.maps.drawing.OverlayType.MARKER,
                    ],
                }
            });

            drawingManager.setMap(map);

            google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
                if (marker) {
                    marker.setMap(null);
                }

                var position = event.overlay.getPosition();
                var title = event.overlay.getTitle();

                $('#inputLat').val(position.lat);
                $('#inputLng').val(position.lng);

                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: title
                });

                event.overlay.setMap(null);
            });
        }

        window.initMap = initMap;

        $('#formPersonal, #formChangePass, #formCv').submit(function(e) {
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

                        getresponseReload(icon, response.message, title);
                    } else {
                        title = "Error !";
                        icon = "error";

                        getresponse(icon, response.message, title);
                    }

                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        });
    </script>
@endsection
