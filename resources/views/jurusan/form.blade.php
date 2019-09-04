     <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Nama Jurusan</label>

        <div class="col-md-6">
            {{ Form::text('nama_jurusan', null, ['class' =>'form-control', 'placeholder' => 'Nama Jurusan']) }}
            
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Fakultas</label>

        <div class="col-md-6">
             {{ Form::select('kode_fakultas',$fakultas, null,['class' => 'form-control']) }}
            
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Jenjang</label>

        <div class="col-md-6">
            {{ Form::select('jenjang',['d3' => 'd3','d4' => 'd4'], null,['class' => 'form-control']) }}
            
        </div>
    </div>