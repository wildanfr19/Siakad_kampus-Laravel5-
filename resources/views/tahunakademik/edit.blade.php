@extends('layouts.app')
@section('title','Edit Data Tahun Akademik')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Tahun Akademik</div>

                <div class="card-body">
                 @include('validation_error')


                    {{ Form::model($tahunakademik, ['url' => 'tahunakademik/'. $tahunakademik->kode_tahun_akademik, 'method' => 'PUT']) }}
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Kode Tahun Akademik</label>

                            <div class="col-md-6">
                                {{ Form::text('kode_tahun_akademik', null, ['class' =>'form-control', 'placeholder' => 'Kode Fakultas', 'readonly']) }}
                                
                            </div>
                        </div>

                    
                         @include('tahunakademik.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Simpan Data',['class' => 'btn btn-primary']) }}

                                <a href="/tahunakademik " class="btn btn-primary" title="">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
