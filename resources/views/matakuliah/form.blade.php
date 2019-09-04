     <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Nama Matakuliah</label>

        <div class="col-md-6">
            {{ Form::text('nama_mk', null, ['class' =>'form-control', 'placeholder' => 'Nama MK']) }}
            
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Jumlah SKS</label>

        <div class="col-md-6">
            {{ Form::text('jml_sks', null, ['class' =>'form-control', 'placeholder' => 'Jumlah SKS']) }}
            
        </div>
    </div>