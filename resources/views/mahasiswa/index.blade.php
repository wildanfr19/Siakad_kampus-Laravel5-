@extends('layouts.app')
@section('title','Mahasiswa')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Mahasiswa</div>

                <div class="card-body">
                  
                    
                    <a href="/mahasiswa/create" class="btn btn-danger" title="">Input Data Baru</a>
                    <hr>

                     @include('alert_success')

                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th width="70">NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Fakultas</th>
                                <th>Jurusan</th>
                                <th width="53">ACTION</th>
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
            ajax: '/mahasiswa/json',
            columns: [
                { data: 'nim', name: 'nim'},
                  { data: 'nama_mahasiswa', name: 'nama_mahasiswa'},
                { data: 'nama_jurusan', name: 'nama_jurusan'},
                { data: 'nama_fakultas', name: 'nama_fakultas'},
                { data: 'action' , name: 'action'}
               
            ]
        });
    });
</script>
@endpush