@extends('back.layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Certificate</h4>
                </div>
                <span class="table-add float-right mb-3 mr-2">
                    <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target=".add"
                        id="btnAdd">
                        <i class="ri-add-fill"></i>
                        <span class="pl-1">Add New</span>
                    </button>
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table data-table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('save-certificate') }}" method="POST" id="formCertificate" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Certificate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-2">
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="logo">Thumbnail</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="logo" name="logo">
                                    <label class="custom-file-label" for="logo">Choose Thumbnail</label>
                                 </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="file">File</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file">
                                    <label class="custom-file-label" for="file">Choose FIle</label>
                                </div>
                                <small>*PDF Only</small>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="col-form-label" for="title">Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="date">Certificate Date <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="date" id="date" required>
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
        var table;

        let column_datatables = [{
                data: 'DT_RowIndex',
                name: 'id',
                orderable: false,
                searchable: false
            },
            {
                data: 'logo',
                name: 'logo'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'date',
                name: 'date'
            },
            {
                data: 'file',
                name: 'file'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ];

        table = $('#table').DataTable({
            stateSave: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('list-certificate') }}",
                method: "post",
                data: function(d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                }
            },
            columns: column_datatables,
            'columnDefs': [{
                'target': column_datatables.length - 1,
                'createdCell': function(td, cellData, rowData, row, col) {
                    $(td).attr('nowrap', true);
                }
            }]
        });

        $('#btnAdd').click(function() {
            $("#formCertificate")[0].reset();
            $("#formCertificate").attr("action", "{{ route('save-certificate') }}");
        });

        $('#formCertificate').submit(function(e) {
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

                        $('.add').modal('hide');
                        $('#formCertificate')[0].reset();
                    } else {
                        title = "Error !";
                        icon = "error";
                    }

                    getresponse(icon, response.message, title);
                    table.ajax.reload(null, false);
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        });

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
                        table.ajax.reload(null, false);
                    });
                }
            })
        }
    </script>
@endsection
