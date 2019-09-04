@extends('layouts.app')
@section('title','Tahun Akademik')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modul Tahun Akademik</div>

                <div class="card-body">
                  
                    
                    <a href="/tahunakademik/create" class="btn btn-danger" title="">Input Data Baru</a>
                    <hr>

                     @include('alert_success')

                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th width="70">Kode Tahun Akademik</th>
                                <th>Tahun Akademik</th>
                                <th>Status</th>
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
            ajax: '/tahunakademik/json',
            columns: [
                { data: 'kode_tahun_akademik', name: 'kode_tahun_akademik'},
                { data: 'tahun_akademik', name: 'tahun_akademik'},
                { data: 'status', name: 'status'},
                { data: 'action' , name: 'action'}
               
            ]
        });
    });
</script>
@endpush