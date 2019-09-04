@extends('layouts.app')
@section('title','Matakuliah')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modul Jurusan</div>

                <div class="card-body">
                  
                    
                    <a href="/jurusan/create" class="btn btn-danger" title="">Input Data Baru</a>
                    <hr>

                     @include('alert_success')

                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th width="70">Kode Jurusan</th>
                                <th>Nama Jurusan</th>
                                <th>Nama Fakultas</th>
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
            ajax: '/jurusan/json',
            columns: [
                { data: 'kode_jurusan', name: 'kode_jurusan'},
                { data: 'nama_jurusan', name: 'nama_jurusan'},
                { data: 'nama_fakultas', name: 'nama_fakultas'},
                { data: 'action' , name: 'action'}
               
            ]
        });
    });
</script>
@endpush