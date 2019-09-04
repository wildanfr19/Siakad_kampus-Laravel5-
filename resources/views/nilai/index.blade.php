@extends('layouts.dosen')
@section('title','Input Nilai Mahasiswa')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Nilai Mahasiswa</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Kehadiran</th>
                                <th>Tugas</th>
                                <th>UTS</th>
                                <th>UAS</th>
                            </tr>
                            <tbody>
                                @foreach($mahasiswa as $row)
                                <tr>
                                    <td>{{ $row->nim }}</td>
                                    <td>{{ $row->nama_mahasiswa }}</td>
                                    <td>{{ $row->nilai_kehadiran }}</td>
                                    <td>{{ $row->nilai_tugas }}</td>
                                    <td>{{ $row->nilai_uts }}</td>
                                    <td>{{ $row->nilai_uas }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
