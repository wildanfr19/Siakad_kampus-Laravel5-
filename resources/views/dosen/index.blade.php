@extends('layouts.app')
@section('title','Dosen')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modul Dosen</div>

                <div class="card-body">
                  
                    
                    <a href="/dosen/create" class="btn btn-danger" title="">Input Data Baru</a>
                    <hr>

                     @include('alert_success')

                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th width="70">NIDN</th>
                                <th>Nama Dosen</th>
                                <th width="40">No Telepon</th>
                                <th width="40">Email</th>
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
            ajax: '/dosen/json',
            columns: [
                { data: 'nidn', name: 'nidn'},
                { data: 'nama', name: 'nama'},
                { data: 'no_hp', name: 'no_hp'},
                { data: 'email', name: 'email'},
                { data: 'action' , name: 'action'}
               
            ]
        });
    });
</script>
@endpush