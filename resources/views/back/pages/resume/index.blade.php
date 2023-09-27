@extends('back.layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="iq-edit-list usr-edit">
                    <ul class="iq-edit-profile d-flex nav nav-pills">
                        <li class="col-md-3 p-0">
                            <a class="nav-link active" data-toggle="pill" href="#education">
                                Education
                            </a>
                        </li>
                        <li class="col-md-3 p-0">
                            <a class="nav-link" data-toggle="pill" href="#experience">
                                Experience
                            </a>
                        </li>
                        <li class="col-md-3 p-0">
                            <a class="nav-link" data-toggle="pill" href="#skills">
                                Skills
                            </a>
                        </li>
                        <li class="col-md-3 p-0">
                            <a class="nav-link" data-toggle="pill" href="#interest">
                                Interest
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="iq-edit-list-data">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="education" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Education</h4>
                            </div>
                            <span class="table-add float-right mb-3 mr-2">
                                <button type="button" class="btn btn-sm bg-primary" data-toggle="modal"
                                    data-target=".add-education" id="btnAddEducation">
                                    <i class="ri-add-fill"></i>
                                    <span class="pl-1">Add New</span>
                                </button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-education" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Year</th>
                                            <th>Study</th>
                                            <th>Major</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="experience" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Experience</h4>
                            </div>
                            <span class="table-add float-right mb-3 mr-2">
                                <button type="button" class="btn btn-sm bg-primary" data-toggle="modal"
                                    data-target=".add-experience" id="btnAddExperience">
                                    <i class="ri-add-fill"></i>
                                    <span class="pl-1">Add New</span>
                                </button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-experience" class="table data-table table-striped table-bordered"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Start</th>
                                            <th>Until</th>
                                            <th>Company</th>
                                            <th>Job</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="skills" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Skills</h4>
                            </div>
                            <span class="table-add float-right mb-3 mr-2">
                                <button type="button" class="btn btn-sm bg-primary" data-toggle="modal"
                                    data-target=".add-skills" id="btnAddSkills">
                                    <i class="ri-add-fill"></i>
                                    <span class="pl-1">Add New</span>
                                </button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-skills" class="table data-table table-striped table-bordered"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Skill</th>
                                            <th>Percantage</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="interest" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Interest</h4>
                            </div>
                            <span class="table-add float-right mb-3 mr-2">
                                <button type="button" class="btn btn-sm bg-primary" data-toggle="modal"
                                    data-target=".add-interest" id="btnAddInterest">
                                    <i class="ri-add-fill"></i>
                                    <span class="pl-1">Add New</span>
                                </button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-interest" class="table data-table table-striped table-bordered"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>interest</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade add-education" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('save-education') }}" method="POST" id="formEducation">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Education</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="year">Year <span
                                        class="text-danger">*</span></label>
                                <select class="form-control" name="year" id="year" required>
                                    <option value="">Select Year</option>
                                    @for ($i = date('Y', strtotime(Auth::user()->birthday)); $i <= date('Y'); $i++)
                                        <option value={{ $i }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="col-form-label" for="study">Study <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="study" class="form-control" id="study" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="major">Major <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="major" class="form-control" id="major" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="note">Note</label>
                                <textarea class="form-control" name="note" id="note"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade add-experience" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('save-experience') }}" method="POST" id="formExperience">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Experience</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="start">Start Year<span
                                        class="text-danger">*</span></label>
                                <select class="form-control" name="start" id="start" required>
                                    <option value="">Select Year</option>
                                    @for ($i = date('Y', strtotime(Auth::user()->birthday)); $i <= date('Y'); $i++)
                                        <option value={{ $i }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="until">Until Year<span
                                        class="text-danger">*</span></label>
                                <select class="form-control" name="until" id="until" required>
                                    <option value="">Select Year</option>
                                    @for ($i = date('Y', strtotime(Auth::user()->birthday)); $i <= date('Y'); $i++)
                                        <option value={{ $i }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="col-form-label" for="company">Company <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="company" class="form-control" id="company" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="job">Job <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="job" class="form-control" id="job" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="note">Note </label>
                                <textarea class="form-control" name="note" id="note_experience"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade add-skills" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('save-skills') }}" method="POST" id="formSkills">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Skills</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="col-form-label" for="skill">Skill <span class="text-danger">*</span></label>
                                <input type="text" name="skill" class="form-control" id="skill" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="percentage">Percentage <span class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <input type="number" class="form-control" name="percentage" id="percentage">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade add-interest" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('save-interest') }}" method="POST" id="formInterest">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Interest</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="col-form-label" for="interest">Interest <span class="text-danger">*</span></label>
                                <input type="text" name="interest" class="form-control" id="interest_i" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('back/assets/js/response.js') }}"></script>

    <script>
        var table_education;

        let column_datatables_education = [{
                data: 'DT_RowIndex',
                name: 'id',
                orderable: false,
                searchable: false
            },
            {
                data: 'year',
                name: 'year'
            },
            {
                data: 'study',
                name: 'study'
            },
            {
                data: 'major',
                name: 'major'
            },
            {
                data: 'note',
                name: 'note'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ];

        table_education = $('#table-education').DataTable({
            stateSave: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('list-education') }}",
                method: "post",
                data: function(d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                }
            },
            columns: column_datatables_education,
            'columnDefs': [{
                'target': column_datatables_education.length - 1,
                'createdCell': function(td, cellData, rowData, row, col) {
                    $(td).attr('nowrap', true);
                }
            }]
        });

        $('#btnAddEducation').click(function() {
            $("#formEducation")[0].reset();
            $("#formEducation").attr("action", "{{ route('save-education') }}");
        });

        $('#formEducation').submit(function(e) {
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

                        $('.add-education').modal('hide');
                        $('#formEducation')[0].reset();
                    } else {
                        title = "Error !";
                        icon = "error";
                    }

                    getresponse(icon, response.message, title);
                    table_education.ajax.reload(null, false);
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        });

        function editData(url) {
            $.ajax({
                type: "get",
                url: url,
                dataType: "JSON",
                success: function(response) {
                    if (response.alert == '1') {
                        $('.add-education').modal('toggle');

                        const data = response.data;
                        $('#formEducation')[0].reset();
                        $('#formEducation').attr("action", "{{ route('save-education') }}" + "/" + data.id);
                        $('#year').val(data.year);
                        $('#study').val(data.study);
                        $('#major').val(data.major);
                        $('#note').val(data.note);
                    } else {
                        getresponse("error", response.message, "Error !");
                    }
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        }

        function deleteData(url) {
            Swal.fire({
                title: "Warning!",
                html: "Are you sure to delete this data?",
                icon: "warning",
                showCancelButton: true,
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText);
                            }
                            return response.json()
                        })
                        .then(data => {
                            if (data.result == "error") {
                                Swal.showValidationMessage(data.title);
                            }
                        })
                        .catch(error => {
                            console.error(error);
                            Swal.showValidationMessage("An error occurred in delete data");
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "Success!",
                        text: "Delete data successfully",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false,
                        showCancelButton: false,
                        willOpen: () => {
                            Swal.showLoading()
                        }
                    }).then((result) => {
                        table_education.ajax.reload(null, false);
                    });
                }
            })
        }

        // EXPERIENCE
        var table_experience;

        let column_datatables_experience = [{
                data: 'DT_RowIndex',
                name: 'id',
                orderable: false,
                searchable: false
            },
            {
                data: 'start',
                name: 'start'
            },
            {
                data: 'until',
                name: 'until'
            },
            {
                data: 'company',
                name: 'company'
            },
            {
                data: 'job',
                name: 'job'
            },
            {
                data: 'note',
                name: 'note'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ];

        table_experience = $('#table-experience').DataTable({
            stateSave: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('list-experience') }}",
                method: "post",
                data: function(d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                }
            },
            columns: column_datatables_experience,
            'columnDefs': [{
                'target': column_datatables_experience.length - 1,
                'createdCell': function(td, cellData, rowData, row, col) {
                    $(td).attr('nowrap', true);
                }
            }]
        });

        $('#btnAddExperience').click(function() {
            $("#formExperience")[0].reset();
            $("#formExperience").attr("action", "{{ route('save-experience') }}");
        });

        $('#formExperience').submit(function(e) {
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

                        $('.add-experience').modal('hide');
                        $('#formExperience')[0].reset();
                    } else {
                        title = "Error !";
                        icon = "error";
                    }

                    getresponse(icon, response.message, title);
                    table_experience.ajax.reload(null, false);
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        });

        function editDataExperience(url) {
            $.ajax({
                type: "get",
                url: url,
                dataType: "JSON",
                success: function(response) {
                    if (response.alert == '1') {
                        $('.add-experience').modal('toggle');

                        const data = response.data;
                        $('#formExperience')[0].reset();
                        $('#formExperience').attr("action", "{{ route('save-experience') }}" + "/" + data.id);
                        $('#start').val(data.start);
                        $('#until').val(data.until);
                        $('#company').val(data.company);
                        $('#job').val(data.job);
                        $('#note_experience').val(data.note);
                    } else {
                        getresponse("error", response.message, "Error !");
                    }
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        }

        function deleteDataExperience(url) {
            Swal.fire({
                title: "Warning!",
                html: "Are you sure to delete this data?",
                icon: "warning",
                showCancelButton: true,
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText);
                            }
                            return response.json()
                        })
                        .then(data => {
                            if (data.result == "error") {
                                Swal.showValidationMessage(data.title);
                            }
                        })
                        .catch(error => {
                            console.error(error);
                            Swal.showValidationMessage("An error occurred in delete data");
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "Success!",
                        text: "Delete data successfully",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false,
                        showCancelButton: false,
                        willOpen: () => {
                            Swal.showLoading()
                        }
                    }).then((result) => {
                        table_experience.ajax.reload(null, false);
                    });
                }
            })
        }

        // SKILLS
        var table_skills;

        let column_datatables_skills = [{
                data: 'DT_RowIndex',
                name: 'id',
                orderable: false,
                searchable: false
            },
            {
                data: 'skill',
                name: 'skill'
            },
            {
                data: 'percentage',
                name: 'percentage'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ];

        table_skills = $('#table-skills').DataTable({
            stateSave: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('list-skills') }}",
                method: "post",
                data: function(d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                }
            },
            columns: column_datatables_skills,
            'columnDefs': [{
                'target': column_datatables_skills.length - 1,
                'createdCell': function(td, cellData, rowData, row, col) {
                    $(td).attr('nowrap', true);
                }
            }]
        });

        $('#btnAddSkills').click(function() {
            $("#formSkills")[0].reset();
            $("#formSkills").attr("action", "{{ route('save-skills') }}");
        });

        $('#formSkills').submit(function(e) {
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

                        $('.add-skills').modal('hide');
                        $('#formSkills')[0].reset();
                    } else {
                        title = "Error !";
                        icon = "error";
                    }

                    getresponse(icon, response.message, title);
                    table_skills.ajax.reload(null, false);
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        });

        function editDataSkills(url) {
            $.ajax({
                type: "get",
                url: url,
                dataType: "JSON",
                success: function(response) {
                    if (response.alert == '1') {
                        $('.add-skills').modal('toggle');

                        const data = response.data;
                        $('#formSkills')[0].reset();
                        $('#formSkills').attr("action", "{{ route('save-skills') }}" + "/" + data.id);
                        $('#skill').val(data.skill);
                        $('#percentage').val(data.percentage);
                    } else {
                        getresponse("error", response.message, "Error !");
                    }
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        }

        function deleteDataSkills(url) {
            Swal.fire({
                title: "Warning!",
                html: "Are you sure to delete this data?",
                icon: "warning",
                showCancelButton: true,
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText);
                            }
                            return response.json()
                        })
                        .then(data => {
                            if (data.result == "error") {
                                Swal.showValidationMessage(data.title);
                            }
                        })
                        .catch(error => {
                            console.error(error);
                            Swal.showValidationMessage("An error occurred in delete data");
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "Success!",
                        text: "Delete data successfully",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false,
                        showCancelButton: false,
                        willOpen: () => {
                            Swal.showLoading()
                        }
                    }).then((result) => {
                        table_skills.ajax.reload(null, false);
                    });
                }
            })
        }

        // INTEREST
        var table_interest;

        let column_datatables_interest = [{
                data: 'DT_RowIndex',
                name: 'id',
                orderable: false,
                searchable: false
            },
            {
                data: 'interest',
                name: 'interest'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ];

        table_interest = $('#table-interest').DataTable({
            stateSave: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('list-interest') }}",
                method: "post",
                data: function(d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                }
            },
            columns: column_datatables_interest,
            'columnDefs': [{
                'target': column_datatables_interest.length - 1,
                'createdCell': function(td, cellData, rowData, row, col) {
                    $(td).attr('nowrap', true);
                }
            }]
        });

        $('#btnAddInterest').click(function() {
            $("#formInterest")[0].reset();
            $("#formInterest").attr("action", "{{ route('save-interest') }}");
        });

        $('#formInterest').submit(function(e) {
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

                        $('.add-interest').modal('hide');
                        $('#formInterest')[0].reset();
                    } else {
                        title = "Error !";
                        icon = "error";
                    }

                    getresponse(icon, response.message, title);
                    table_interest.ajax.reload(null, false);
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        });

        function editDataInterest(url) {
            $.ajax({
                type: "get",
                url: url,
                dataType: "JSON",
                success: function(response) {
                    if (response.alert == '1') {
                        $('.add-interest').modal('toggle');

                        const data = response.data;
                        console.log(data.interest);
                        $('#formInterest')[0].reset();
                        $('#formInterest').attr("action", "{{ route('save-interest') }}" + "/" + data.id);
                        $('#interest_i').val(data.interest);
                    } else {
                        getresponse("error", response.message, "Error !");
                    }
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        }

        function deleteDataInterest(url) {
            Swal.fire({
                title: "Warning!",
                html: "Are you sure to delete this data?",
                icon: "warning",
                showCancelButton: true,
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText);
                            }
                            return response.json()
                        })
                        .then(data => {
                            if (data.result == "error") {
                                Swal.showValidationMessage(data.title);
                            }
                        })
                        .catch(error => {
                            console.error(error);
                            Swal.showValidationMessage("An error occurred in delete data");
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "Success!",
                        text: "Delete data successfully",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false,
                        showCancelButton: false,
                        willOpen: () => {
                            Swal.showLoading()
                        }
                    }).then((result) => {
                        table_interest.ajax.reload(null, false);
                    });
                }
            })
        }
    </script>
@endsection
