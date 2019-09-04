 <div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Kode Dosen</label>
    <div class="col-md-6">
        {{ Form::text('kode_dosen',null,['class'=>'form-control','placeholder'=>'Kode Dosen'])}}
    </div>
</div>

     <div class="form-group row">
        <label for="nama_dosen" class="col-md-4 col-form-label text-md-right">Nama Dosen</label>

        <div class="col-md-6">
            {{ Form::text('nama', null, ['class' =>'form-control', 'placeholder' => 'Nama Dosen']) }}
            
        </div>
    </div>



       <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">email</label>

        <div class="col-md-6">
            {{ Form::email('email', null, ['class' =>'form-control', 'placeholder' => 'Email']) }}
            
        </div>
    </div>  

        <div class="form-group row">
        <label  class="col-md-4 col-form-label text-md-right">Password</label>

        <div class="col-md-6">
            {{ Form::password('password', ['class' =>'form-control', 'placeholder' => 'Password']) }}
            
        </div>
    </div> 

        <div class="form-group row">
        <label for="no_telepon" class="col-md-4 col-form-label text-md-right">No HP</label>

        <div class="col-md-6">
            {{ Form::text('no_hp', null, ['class' =>'form-control', 'placeholder' => 'No HP']) }}
            
        </div>
    </div>