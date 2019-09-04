@extends('layouts.app')
@section('title','Edit Data Matakuliah')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Matakuliah</div>

                <div class="card-body">
                 @include('validation_error')


                    {{ Form::model($fakultas, ['url' => 'fakultas/'. $fakultas->kode_fakultas, 'method' => 'PUT']) }}
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Kode Matakuliah</label>

                            <div class="col-md-6">
                                {{ Form::text('kode_fakultas', null, ['class' =>'form-control', 'placeholder' => 'Kode Fakultas', 'readonly']) }}
                                
                            </div>
                        </div>

                    
                         @include('fakultas.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Simpan Data',['class' => 'btn btn-primary']) }}

                                <a href="/fakultas " class="btn btn-primary" title="">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
