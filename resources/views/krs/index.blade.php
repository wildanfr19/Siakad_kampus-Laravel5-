@extends('layouts.mahasiswa')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Kartu Rencana Studi</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="row">
                        <div class="col-md-6">
                            <h6><b>Daftar Matakuliah Kontrak</b></h6>
                            <hr>
                               <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th width="70">Kode MK</th>
                                <th width="80">Nama Matakuliah</th>
                                <th width="10">SKS</th>
                                <th width="1">ACTION</th>
                            </tr>
                        </thead>
                    </table>
                        </div>


                        <div class="col-md-6">
                            <h6><b>Daftar Matakuliah Yang Anda Pilih</b></h6>
                            <hr>
                          <div id="list">
                              
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function(){
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/krs/daftarMataKuliahKontrak',
            columns: [
                { data: 'kode_mk', name: 'kode_mk'},
                { data: 'nama_mk', name: 'nama_mk'},
                { data: 'jml_sks', name: 'jml_sks'},
                { data: 'action' , name: 'action'}
               
            ]
        });
    });
</script>
<script type="text/javascript">
    
    function tambah_krs(kode_mk)
    {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post("/krs/tambahKrs",
        {
            kode_mk : kode_mk,
            _token: CSRF_TOKEN
        },
        function(data, status){
            alert('berhasil');
            tampil_krs();
        });
    }

    function tampil_krs()
    {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.get("/krs/tampilKrs",
        {
            _token: CSRF_TOKEN
        },
        function(data, status){
            $("#list").html(data);
        });
    }

     function hapus_krs(id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.post("/krs/hapusKrs",
        {
          id : id,
          _token: CSRF_TOKEN
        },
        function(data, status){
          tampil_krs();
      });
    }

</script>
@endpush
