@extends('layouts.app')
@section('title','Data Kopi')
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
            <button id="createNewData" class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Tambah Data</span>
            </button>
        </div>
        <div class="card-body">
           
            <table class="data-table table" id="data-table">    
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pekerja</th>
                        <th>Berat</th>
                        <th>Tanggal</th>
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
                {{-- <h4 class="modal-title" id="modalHeading" >Tambah Data @yield('title')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">    
              
                <form id="dataForm" name="dataForm" class="form-horizontal">
                    <!-- validator -->
                    <ul class="list-group" id="errors-validate"></ul>
                    <!-- end -->       
                    {{-- nama --}}
                    <input type="hidden" name="data_id" id="data_id">
                    <div class="form-group">
                        {{-- select option pekerja --}}
                        <label for="pekerja_id" class="col-sm-4 control-label">Nama Pekerja</label>
                        <div class="col-sm-12">
                        <select name="pekerja_id" id="pekerja_id" class="form-control">
                            <option value="">Pilih Pekerja</option>
                            @foreach ($pekerja as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Berat</label>
                        <div class="col-sm-12">
                            <input type="text" id="berat" class="form-control dt-post required" name="berat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal</label>
                        <div class="col-sm-12">

                            <input type="text" id="tgl_menimbang" class="form-control dt-post required" name="tgl_menimbang" value="{{date('Y-m-d H:i:s')}}" readonly>
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
                ajax: "{{ route('kopi.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama', name: 'nama'},
                    {data: 'berat', name: 'berat',
                        render: function(data, type, row){
                            return data + ' Kg';
                        }
                    },
                    {data: 'tgl_menimbang', name: 'tgl_menimbang'},
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
                    url: "{{route('kopi.store')}}",
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
            // $('body').on('click', '.editData', function () {
            //     var data_id = $(this).data('id');
            //     $.get("{{ route('kopi.index') }}" +'/' + data_id +'/edit', function (data) {
            //         $('#saveBtn').html("Update");  
            //         $('#modalHeading').html("Edit Data");
            //         $('#modalBox').modal('show');
            //         $("#errors-validate").hide();
            //          $('#saveBtn').prop('disabled', false);
            //         // get data respone
            //         $('#data_id').val(data.id);
            //         $('#pekerja_id').val(data.pekerja_id);
            //         $('#berat').val(data.berat);
            //         $('#tgl_menimbang').val(data.tgl_menimbang);
            //     })  
            // });
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
                            url: "{{ route('kopi.store') }}"+'/'+data_id,
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