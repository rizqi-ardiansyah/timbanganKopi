@extends('layouts.app')
@section('title','Data Pekerja Baru')
@section('content')
{{-- card --}}
<div class="col-lg-12">
    <div class="card shadow-sm mb-4">
        <br>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
        </div>
        <br>
        <div class="col-lg-12 col-md-6">
            {{-- <button id="createNewData" class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Tambah Data</span>
            </button> --}}
        </div>
        <div class="card-body">
           
            <table class="data-table table" id="data-table">    
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Id Pekerja</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade text-left" id="modalBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalHeading" >Tambah Data @yield('title')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">    
              
                <form id="dataForm" name="dataForm" class="form-horizontal">
                    <!-- validator -->
                    <ul class="list-group" id="errors-validate"></ul>
                    <!-- end -->       
                    {{-- nama --}}
                    <input type="hidden" name="data_id" id="data_id">

                    {{-- id_pekerja --}}
                    <div class="form-group">
                        <label for="id" class="col-md-4 control-label">Id Pekerja</label>
                        <div class="col-md-6">
                            <input type="text" name="id_pekerja" id="id" class="form-control" placeholder="Id Pekerja" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-sm-4 control-label">Nama</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Alamat</label>
                        <div class="col-sm-12">
                            <input type="text" id="alamat" class="form-control dt-post required" name="alamat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">No Handphone</label>
                        <div class="col-sm-12">
                            <input type="text" id="no_hp" class="form-control dt-post required" name="no_hp">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group" style="padding-left: 13px;"> 
                            <label for="contact-info">Jenis kelamin</label>
                            <div class="custom-control custom-radio ml-1 ">
                                <input type="radio" id="validationRadiojq1" name="jenis_kelamin" value="Laki-Laki" class="custom-control-input">
                                <label class="custom-control-label" for="validationRadiojq1">Laki-Laki</label>
                            </div>
                            <div class="custom-control custom-radio  ml-1">
                                <input type="radio" id="validationRadiojq2" name="jenis_kelamin" value="Perempuan"  class="custom-control-input">
                                <label class="custom-control-label" for="validationRadiojq2">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
                        <button type="submit"  id="saveBtn" class="btn btn-primary" >Save</button>
                    </div>
                </form>
             
            </div>
        </div>
    </div>
</div>
<!-- end modal --> 

@endsection
@push('scripts')
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assests/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script type="text/javascript">
        
        // start
        $(document).ready(function($){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('list-pekerja') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'id_pekerja', name: 'id_pekerja'},
                    // {data: 'nama', name: 'nama'},
                    // {data: 'alamat', name: 'alamat'},
                    // {data: 'no_hp', name: 'no_hp'},
                    // {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            // show modal
            $('#createNewData').click(function () { 
                $('#saveBtn').val("create-pekerja");
                $('#data_id').val('');
                $('#dataForm').trigger("reset");
                $('#modalHeading').html("Tambah Data");
                $('#modalBox').modal('show');
                $("#errors-validate").hide();
                $('#saveBtn').prop('disabled', false);
            });
            // end
            // store process
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Simpan');
                $.ajax({
                    data: $('#dataForm').serialize(),
                    url: "{{route('pekerja.store')}}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if(data.status == 'sukses'){
                            $('#modalBox').modal('hide');
                            Swal.fire("Selamat", data.message , "success");
                            $('#dataForm').trigger("reset");
                            table.draw();
                        }else{
                            $('#message-error').html(data.message).show()
                        } 
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save');
                    }
                });
            });
            // end store process
            // edit data
            $('body').on('click', '.editData', function () {
                var data_id = $(this).data('id');
                $.get("{{ route('pekerja.index') }}" +'/' + data_id +'/edit', function (data) {
                    $('#saveBtn').html("Update");  
                    $('#modalHeading').html("Edit Data");
                    $('#modalBox').modal('show');
                    $("#errors-validate").hide();
                     $('#saveBtn').prop('disabled', false);
                    // get data respone
                    $('#data_id').val(data.id);
                    $('#id').val(data.id_pekerja);
                    $('#nama').val(data.nama);
                    $('#alamat').val(data.alamat);
                    $('#no_hp').val(data.no_hp);
                    if(data.jenis_kelamin == 'Laki-Laki'){
                          $("#validationRadiojq1").prop("checked", true);
                    }else{
                          $("#validationRadiojq2").prop("checked", true);
                    }
                })  
            });
            // end
            // delete
            $('body').on('click', '.deleteData', function () {
                var data_id = $(this).data("id");
                Swal.fire({
                    title: "Apa kamu yakin?",
                    text: "Menghapus data ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!',
                    dangerMode: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                          'Terhapus!',
                          'Data berhasil dihapus.',
                          'success'
                        )
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('pekerja.store') }}"+'/'+data_id,
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            success: function (data) {
                                table.draw();
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                })
            });
            // end delete
        });
    </script>
@endpush