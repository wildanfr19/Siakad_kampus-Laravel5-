@extends('layouts.app')
@section('title','Matakuliah')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modul Matakuliah</div>

                <div class="card-body">
                  
                    
                    <a href="/matakuliah/create" class="btn btn-danger" title="">Input Data Baru</a>
                    <hr>

                     @include('alert_success')

                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th width="70">Kode MK</th>
                                <th>Nama Matakuliah</th>
                                <th width="70">SKS</th>
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
            ajax: '/matakuliah/json',
            columns: [
                { data: 'kode_mk', name: 'kode_mk'},
                { data: 'nama_mk', name: 'nama_mk'},
                { data: 'jml_sks', name: 'jml_sks'},
                { data: 'action' , name: 'action'}
               
            ]
        });
    });
</script>
@endpush