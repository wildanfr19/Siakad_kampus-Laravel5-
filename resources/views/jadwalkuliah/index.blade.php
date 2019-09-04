@extends('layouts.app')
@section('title','Info Jadwal Kuliah')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Info Jadwal Kuliah</div>



                <div class="card-body">
                    @include('validation_error')

                   

                        <div class="row">
                              <div class="col-md-4"> 
                                 <form method="GET" action="/jadwalkuliah">
                                @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Jurusan</td><td>{{ Form::select('jurusan', $jurusan, $jurusan_terpilih, ['class' => 'form-control']) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Semester</td>
                                        <td>
                                            {{ Form::select('semester',['1' => 'Semester 1','2' => 'Semester 2','3' => 'Semester 3','4' => 'Semester 4','5' => 'Semester 5','6' => 'Semester 6','7' => 'Semester 7','8' => 'Semester 8'], $semester_terpilih,['class' => 'form-control']) }}  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button type="submit" class="btn btn-danger">Refresh Data</button>
                                            <a href="/jadwalkuliah/create" class="btn btn-danger" title="">Input Jadwal</a>
                                              
                                        </td>
                                    </tr>
                                </table>
                                </form>
                              </div>

                              <div class="col-md-8"> 
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Hari</th>
                                        <th>JAM</th>
                                        <th>MATAKULIAH</th>
                                        <th>DOSEN</th>
                                        <th>RUANGAN</th>
                                    </tr>
                                    @foreach($jadwal as $row)
                                    <tr>
                                        <td>{{ $row->hari }}</td>
                                        <td>{{ $row->jam }}</td>
                                        <td>{{ $row->nama_mk }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->nama_ruangan }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                              </div>
                        </div>


                      

                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
