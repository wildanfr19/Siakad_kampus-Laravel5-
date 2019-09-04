     <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Tahun Akademik</label>

        <div class="col-md-6">
            {{ Form::text('tahun_akademik', null, ['class' =>'form-control', 'placeholder' => 'Tahun Akademik']) }}
            
    </div>
    </div>

     <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Status</label>

        <div class="col-md-6">
            {{ Form::select('status',['Y' => 'Aktif', 'N' => 'Tidak Aktif'], null, ['class' =>'form-control']) }}
            
        </div>
    </div>