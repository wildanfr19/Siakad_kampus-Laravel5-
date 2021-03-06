@extends('layouts.app')
@section('title','Input Data Jadwal Kuliah')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input Data Jadwal Kuliah</div>



                <div class="card-body">
                    @include('validation_error')

                    <form method="POST" action="/jadwalkuliah">
                        @csrf
                        

                        @include('jadwalkuliah.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Simpan Data',['class' => 'btn btn-primary']) }}

                                <a href="/kurikulum" class="btn btn-primary" title="">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
