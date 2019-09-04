@extends('layouts.app')
@section('title','Input Data Jurusan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input Data Mahasiswa</div>



                <div class="card-body">
                    @include('validation_error')

                    <form method="POST" action="/mahasiswa">
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">NIM </label>

                            <div class="col-md-6">
                                {{ Form::text('nim', null, ['class' =>'form-control', 'placeholder' => 'No Induk Mahasiswa']) }}
                                
                            </div>
                        </div>

                        @include('mahasiswa.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Simpan Data',['class' => 'btn btn-primary']) }}

                                <a href="/mahasiswa" class="btn btn-primary" title="">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
