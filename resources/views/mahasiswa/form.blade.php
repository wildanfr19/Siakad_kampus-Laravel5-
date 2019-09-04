     <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Nama Mahasiswa</label>

        <div class="col-md-6">
            {{ Form::text('nama_mahasiswa', null, ['class' =>'form-control', 'placeholder' => 'Nama Jurusan']) }}
            
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Jurusan</label>

        <div class="col-md-6">
             {{ Form::select('kode_jurusan',$jurusan, null,['class' => 'form-control']) }}
            
        </div>
    </div>

       <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Alamat</label>

        <div class="col-md-6">
            {{ Form::text('alamat', null, ['class' =>'form-control', 'placeholder' => 'Alamat']) }}
            
        </div>
    </div>

        <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Email</label>

        <div class="col-md-6">
            {{ Form::email('email', null, ['class' =>'form-control', 'placeholder' => 'Email']) }}
            
        </div>
    </div>

        <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

        <div class="col-md-6">
            {{ Form::password('password', ['class' =>'form-control', 'placeholder' => 'Password']) }}
            
        </div>
    </div>