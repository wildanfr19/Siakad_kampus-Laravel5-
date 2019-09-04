@extends('layouts.app')
@section('title','Input Data Jurusan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input Data Jurusan</div>



                <div class="card-body">
                    @include('validation_error')

                    <form method="POST" action="/jurusan">
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Kode Jurusan</label>

                            <div class="col-md-6">
                                {{ Form::text('kode_jurusan', null, ['class' =>'form-control', 'placeholder' => 'Kode Jurusan']) }}
                                
                            </div>
                        </div>

                        @include('jurusan.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Simpan Data',['class' => 'btn btn-primary']) }}

                                <a href="/jurusan" class="btn btn-primary" title="">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
