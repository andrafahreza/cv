@extends('back.layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="iq-edit-list usr-edit">
                    <ul class="iq-edit-profile d-flex nav nav-pills">
                        <li class="col-md-6 p-0">
                            <a class="nav-link active" data-toggle="pill" href="#ability">
                                Ability
                            </a>
                        </li>
                        <li class="col-md-6 p-0">
                            <a class="nav-link" data-toggle="pill" href="#clients">
                                Clients
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
                <div class="tab-pane fade active show" id="ability" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Ability</h4>
                            </div>
                            <span class="table-add float-right mb-3 mr-2">
                                <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target=".add_ability"
                                    id="btnAddAbility">
                                    <i class="ri-add-fill"></i>
                                    <span class="pl-1">Add New</span>
                                </button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableAbility" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Icon</th>
                                            <th>title</th>
                                            <th>note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="clients" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Clients</h4>
                            </div>
                            <span class="table-add float-right mb-3 mr-2">
                                <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target=".add_clients"
                                    id="btnAddClients">
                                    <i class="ri-add-fill"></i>
                                    <span class="pl-1">Add New</span>
                                </button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableClients" class="table data-table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Company</th>
                                            <th>Photo</th>
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

    <div class="modal fade add_ability" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('save-ability') }}" method="POST" id="formAbility">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Ability</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="col-form-label" for="icon">Icon Code<span class="text-danger">*</span></label>
                                <input type="text" name="icon" class="form-control" id="icon" required>
                                <span><a href="https://linearicons.com/free" target="_blank">Click to check icon code</a> <br> example : lnr-home</span>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="title">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" id="title" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="note">Note<span class="text-danger">*</span></label>
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

    <div class="modal fade add_clients" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('save-clients') }}" method="POST" id="formClients" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Clients</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="company">Company<span class="text-danger">*</span></label>
                                <input type="text" name="company" class="form-control" id="company" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="photo">Photo</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="photo">
                                    <label class="custom-file-label" for="customFile">Choose Photo</label>
                                 </div>
                            </div>
                            <div class="col-md-12 mt-2" id="photoOld">
                                <label class="col-form-label" for="photo_old">Photo Old</label> <br>
                                <img id="photo_old" width="200">
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
    <script src="{{ asset('back/assets/js/chart-custom.js') }}"></script>

    <script>
        var table_ability;

        let column_datatables_ability = [{
                data: 'DT_RowIndex',
                name: 'id',
                orderable: false,
                searchable: false
            },
            {
                data: 'icon',
                name: 'icon'
            },
            {
                data: 'title',
                name: 'title'
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

        table_ability = $('#tableAbility').DataTable({
            stateSave: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('list-ability') }}",
                method: "post",
                data: function(d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                }
            },
            columns: column_datatables_ability,
            'columnDefs': [{
                'target': column_datatables_ability.length - 1,
                'createdCell': function(td, cellData, rowData, row, col) {
                    $(td).attr('nowrap', true);
                }
            }]
        });

        $('#btnAddAbility').click(function() {
            $("#formAbility")[0].reset();
            $("#formAbility").attr("action", "{{ route('save-ability') }}");
        });

        $('#formAbility').submit(function(e) {
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

                        $('.add_ability').modal('hide');
                        $('#formAbility')[0].reset();
                    } else {
                        title = "Error !";
                        icon = "error";
                    }

                    getresponse(icon, response.message, title);
                    table_ability.ajax.reload(null, false);
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        });

        function editAbility(url) {
            $.ajax({
                type: "get",
                url: url,
                dataType: "JSON",
                success: function(response) {
                    if (response.alert == '1') {
                        $('.add_ability').modal('toggle');

                        const data = response.data;
                        $('#formAbility')[0].reset();
                        $('#formAbility').attr("action", "{{ route('save-ability') }}" + "/" + data.id);
                        $('#icon').val(data.icon);
                        $('#title').val(data.title);
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

        function deleteAbility(url) {
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
                        table_ability.ajax.reload(null, false);
                    });
                }
            })
        }

        // CLIENTS
        var table_clients;

        let column_datatables_clients = [{
                data: 'DT_RowIndex',
                name: 'id',
                orderable: false,
                searchable: false
            },
            {
                data: 'company',
                name: 'company'
            },
            {
                data: 'photo',
                name: 'photo'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ];

        table_clients = $('#tableClients').DataTable({
            stateSave: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('list-clients') }}",
                method: "post",
                data: function(d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                }
            },
            columns: column_datatables_clients,
            'columnDefs': [{
                'target': column_datatables_clients.length - 1,
                'createdCell': function(td, cellData, rowData, row, col) {
                    $(td).attr('nowrap', true);
                }
            }]
        });

        $('#btnAddClients').click(function() {
            $("#formClients")[0].reset();
            $("#formClients").attr("action", "{{ route('save-clients') }}");
            $('#photoOld').addClass('d-none');
        });

        $('#formClients').submit(function(e) {
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

                        $('.add_clients').modal('hide');
                        $('#formClients')[0].reset();
                    } else {
                        title = "Error !";
                        icon = "error";
                    }

                    getresponse(icon, response.message, title);
                    table_clients.ajax.reload(null, false);
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        });

        function editClients(url) {
            $.ajax({
                type: "get",
                url: url,
                dataType: "JSON",
                success: function(response) {
                    if (response.alert == '1') {
                        $('.add_clients').modal('toggle');

                        const data = response.data;
                        $('#formClients')[0].reset();
                        $('#formClients').attr("action", "{{ route('save-clients') }}" + "/" + data.id);
                        $('#company').val(data.company);
                        $('#photoOld').removeClass('d-none');
                        $('#photo_old').attr("src", data.photo);
                    } else {
                        getresponse("error", response.message, "Error !");
                    }
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        }

        function deleteClients(url) {
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
                        table_clients.ajax.reload(null, false);
                    });
                }
            })
        }
    </script>
@endsection
