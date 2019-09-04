@extends('layouts.app')
@section('title','Setting Aplikasi')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Setting Aplikasi</div>



                <div class="card-body">
                    @include('validation_error')

                    {{ Form::model($setting, ['url' => 'setting','method' => 'PUT']) }}
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Nama Universitas</label>

                            <div class="col-md-6">
                                {{ Form::text('nama_universitas', null, ['class' =>'form-control', 'placeholder' => 'Nama Universitas']) }}
                                
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Email & Alamat Web</label>

                            <div class="col-md-3">
                                {{ Form::text('email', null, ['class' =>'form-control', 'placeholder' => 'Email']) }}
                             
                                
                            </div>


                            <div class="col-md-3">
                                {{ Form::text('web', null, ['class' =>'form-control', 'placeholder' => 'Web']) }}
                             
                                
                            </div>

                        </div>
                         <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">No Telepon & Fax</label>

                            <div class="col-md-3">
                                {{ Form::text('no_telepon', null, ['class' =>'form-control', 'placeholder' => 'No Telepon']) }}
                                
                            </div>

                             <div class="col-md-3">
                                {{ Form::text('fax', null, ['class' =>'form-control', 'placeholder' => 'FAX']) }}
                                
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Alamat</label>

                            <div class="col-md-6">
                                {{ Form::text('alamat', null, ['class' =>'form-control', 'placeholder' => 'Alamat']) }}
                                
                            </div>
                        </div>

                   

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Update Data',['class' => 'btn btn-primary']) }}

                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
