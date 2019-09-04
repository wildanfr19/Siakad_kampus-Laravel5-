@extends('layouts.app')
@section('title','Matakuliah')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modul Fakultas</div>

                <div class="card-body">
                  
                    
                    <a href="/fakultas/create" class="btn btn-danger" title="">Input Data Baru</a>
                    <hr>

                     @include('alert_success')

                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th width="70">Kode Fakultas</th>
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
            ajax: '/fakultas/json',
            columns: [
                { data: 'kode_fakultas', name: 'kode_fakultas'},
                { data: 'nama_fakultas', name: 'nama_fakultas'},
               
                { data: 'action' , name: 'action'}
               
            ]
        });
    });
</script>
@endpush