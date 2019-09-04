@extends('layouts.app')
@section('title','Edit Data Ruangan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Ruangan</div>

                <div class="card-body">
                 @include('validation_error')


                    {{ Form::model($ruangan, ['url' => 'ruangan/'. $ruangan->kode_ruangan, 'method' => 'PUT']) }}
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Kode Matakuliah</label>

                            <div class="col-md-6">
                                {{ Form::text('kode_ruangan', null, ['class' =>'form-control', 'placeholder' => 'Kode Ruangan', 'readonly']) }}
                                
                            </div>
                        </div>

                    
                         @include('ruangan.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Simpan Data',['class' => 'btn btn-primary']) }}

                                <a href="/ruangan " class="btn btn-primary" title="">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
