@extends('layouts.dosen')
@section('title','Jadwal Mengajar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Jadwal Mengajar</div>

                <div class="card-body">
                  
                    
            
                     @include('alert_success')

                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>Matakuliah</th>
                                <th width="70">Hari</th>
                                <th width="90">Jam</th>
                                <th width="100">Jurusan</th>
                                <th width="100">Ruang</th>
                                <th width="70">ACTION</th>

                              
                            </tr>
                        </thead>
                    </table>
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
            ajax: '/jadwal_mengajar/json',
            columns: [
                { data: 'nama_mk', name: 'nama_mk'},
                { data: 'hari', name: 'hari'},
                { data: 'jam', name: 'jam'},
                { data: 'nama_jurusan', name: 'nama_jurusan'},
                { data: 'nama_ruangan', name: 'nama_ruangan'},
                 { data: 'action', name: 'action'}
               
               
            ]
        });
    });
</script>
@endpush