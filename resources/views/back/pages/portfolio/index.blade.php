@extends('back.layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('back/assets/css/select2.css') }}" />

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="iq-edit-list usr-edit">
                    <ul class="iq-edit-profile d-flex nav nav-pills">
                        <li class="col-md-6 p-0">
                            <a class="nav-link active" data-toggle="pill" href="#portfolio">
                                Portfolio
                            </a>
                        </li>
                        <li class="col-md-6 p-0">
                            <a class="nav-link" data-toggle="pill" href="#category">
                                Category
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
                <div class="tab-pane fade active show" id="portfolio" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Portfolio</h4>
                            </div>
                            <span class="table-add float-right mb-3 mr-2">
                                <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target=".add_portfolio"
                                    id="btnAddPortfolio">
                                    <i class="ri-add-fill"></i>
                                    <span class="pl-1">Add New</span>
                                </button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablePortfolio" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Photo</th>
                                            <th>Link</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="category" role="tabpanel">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Category Portfolio</h4>
                            </div>
                            <span class="table-add float-right mb-3 mr-2">
                                <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target=".add_category"
                                    id="btnAddCategory">
                                    <i class="ri-add-fill"></i>
                                    <span class="pl-1">Add New</span>
                                </button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableCategory" class="table data-table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category</th>
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

    <div class="modal fade add_portfolio" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('save-portfolio') }}" method="POST" id="formPortfolio" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Portfolio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="category">Category<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="id_category" id="id_category" data-allow-clear="true" required></select>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="title">title<span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" id="title" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="link">Link</label>
                                <input type="text" name="link" class="form-control" id="link">
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

    <div class="modal fade add_category" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('save-category') }}" method="POST" id="formCategory" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Category Portfolio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="category">Category<span class="text-danger">*</span></label>
                                <input type="text" name="category" class="form-control" id="category_porto" required>
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
        var table_portfolio;

        let column_datatables_portfolio = [{
                data: 'DT_RowIndex',
                name: 'id',
                orderable: false,
                searchable: false
            },
            {
                data: 'id_category',
                name: 'id_category'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'photo',
                name: 'photo'
            },
            {
                data: 'link',
                name: 'link'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ];

        table_portfolio = $('#tablePortfolio').DataTable({
            stateSave: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('list-portfolio') }}",
                method: "post",
                data: function(d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                }
            },
            columns: column_datatables_portfolio,
            'columnDefs': [{
                'target': column_datatables_portfolio.length - 1,
                'createdCell': function(td, cellData, rowData, row, col) {
                    $(td).attr('nowrap', true);
                }
            }]
        });

        $('#btnAddPortfolio').click(function() {
            $("#formPortfolio")[0].reset();
            $("#formPortfolio").attr("action", "{{ route('save-portfolio') }}");
            $('#photoOld').addClass('d-none');
            $('#id_category').find('option').remove();
        });

        $('#id_category').select2({
            placeholder: "Search Category",
            ajax: {
                url: function() {
                    var category = $('#id_category').val();
                    return '{{ route('search-category', ':param') }}'.replace(':param', category);
                },
                dataType: 'json',
                processResults: function(data) {
                    return {
                        results: $.map(data.results, function(item) {
                            return {
                                id: item.id,
                                text: item.category
                            };
                        })
                    };
                },
                minimumInputLength: 1,
            }
        });

        $('#formPortfolio').submit(function(e) {
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

                        $('.add_portfolio').modal('hide');
                        $('#formPortfolio')[0].reset();
                    } else {
                        title = "Error !";
                        icon = "error";
                    }

                    getresponse(icon, response.message, title);
                    table_portfolio.ajax.reload(null, false);
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        });

        function editPortfolio(url) {
            $.ajax({
                type: "get",
                url: url,
                dataType: "JSON",
                success: function(response) {
                    if (response.alert == '1') {
                        $('.add_portfolio').modal('toggle');

                        const data = response.data;
                        $('#formPortfolio')[0].reset();
                        $('#formPortfolio').attr("action", "{{ route('save-portfolio') }}" + "/" + data.id);

                        $('#id_category').val(data.id_category);
                        $('#title').val(data.title);
                        $('#link').val(data.link);
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

        function deletePortfolio(url) {
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
                        table_portfolio.ajax.reload(null, false);
                    });
                }
            })
        }

        // CATEGORY
        var table_category;

        let column_datatables_category= [{
                data: 'DT_RowIndex',
                name: 'id',
                orderable: false,
                searchable: false
            },
            {
                data: 'category',
                name: 'category'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ];

        table_category = $('#tableCategory').DataTable({
            stateSave: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('list-category') }}",
                method: "post",
                data: function(d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                }
            },
            columns: column_datatables_category,
            'columnDefs': [{
                'target': column_datatables_category.length - 1,
                'createdCell': function(td, cellData, rowData, row, col) {
                    $(td).attr('nowrap', true);
                }
            }]
        });

        $('#btnAddCategory').click(function() {
            $("#formCategory")[0].reset();
            $("#formCategory").attr("action", "{{ route('save-category') }}");
        });

        $('#formCategory').submit(function(e) {
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

                        $('.add_category').modal('hide');
                        $('#formCategory')[0].reset();
                    } else {
                        title = "Error !";
                        icon = "error";
                    }

                    getresponse(icon, response.message, title);
                    table_category.ajax.reload(null, false);
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        });

        function editCategory(url) {
            $.ajax({
                type: "get",
                url: url,
                dataType: "JSON",
                success: function(response) {
                    if (response.alert == '1') {
                        $('.add_category').modal('toggle');

                        const data = response.data;
                        $('#formCategory')[0].reset();
                        $('#formCategory').attr("action", "{{ route('save-category') }}" + "/" + data.id);
                        console.log(data.category);
                        $('#category_porto').val(data.category);
                    } else {
                        getresponse("error", response.message, "Error !");
                    }
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        }

        function deleteCategory(url) {
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
                        table_category.ajax.reload(null, false);
                    });
                }
            })
        }
    </script>
@endsection
