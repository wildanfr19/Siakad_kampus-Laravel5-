@extends('layouts.app')
@section('title','Kurikulum')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modul Kurikulum</div>

                <div class="card-body">
                  {{ Form::open(['url' =>'kurikulum','method' => 'get']) }}
                    <table class="table table-bordered">
                        <tr>
                            <td>Jurusan</td>
                            <td>{{ Form::select('jurusan',$jurusan_terpilih, null,['class' => 'form-control']) }}</td>
                            <tr>
                        <tr>
                            <td></td>
                            <td>
                             <button type="submit" class="btn btn-danger"><i class="fas fa-sync-alt"></i> Refresh Data</button>
                             <a href="/kurikulum/create" class="btn btn-danger" title="">Input Data Baru</a>
                          </td>
                      </tr>
                    </table>
                    {{ Form::close() }}
                    
                   <hr>

                     @include('alert_success')

                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th width="120">Kode Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th width="53">ACTION</th>
                            </tr>

                        </thead>
                        @foreach($kurikulum as $row)
                        <tbody>
                            <tr>
                                <td>{{ $row->kode_mk }}</td>
                                <td>{{ $row->nama_mk }}</td>
                                <td>{{ $row->jml_sks }}</td>
                                <td>{{ $row->semester}}</td>
                                <td>
                                    {{ Form::open(['url' => 'kurikulum/'. $row->id, 'method' => 'delete']) }}
                                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
