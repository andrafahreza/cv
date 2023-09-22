@extends('back.layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Education</h4>
                </div>
                <span class="table-add float-right mb-3 mr-2">
                    <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target=".add" id="btnAdd">
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

    <div class="modal fade add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('save-education') }}" method="POST" id="formAdd">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Education</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="year">Year <span class="text-danger">*</span></label>
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
                                <label class="col-form-label" for="study">Study <span class="text-danger">*</span></label>
                                <input type="text" name="study" class="form-control" id="study" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="major">Major <span class="text-danger">*</span></label>
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

        table = $('#table').DataTable({
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
            columns: column_datatables,
            'columnDefs': [{
                'target': column_datatables.length - 1,
                'createdCell': function(td, cellData, rowData, row, col) {
                    $(td).attr('nowrap', true);
                }
            }]
        });

        $('#btnAdd').click(function() {
            $("#formAdd")[0].reset();
            $("#formAdd").attr("action", "{{ route('save-education') }}");
        });

        $('#formAdd').submit(function(e) {
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
                        $('#formAdd')[0].reset();
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

        function editData(url) {
            $.ajax({
                type: "get",
                url: url,
                dataType: "JSON",
                success: function(response) {
                    if (response.alert == '1') {
                        $('.add').modal('toggle');

                        const data = response.data;
                        $('#formAdd')[0].reset();
                        $('#formAdd').attr("action", "{{ route('save-education') }}" + "/" + data.id);
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
                        onBeforeOpen: () => {
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
