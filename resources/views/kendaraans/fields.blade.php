<div class="form-group col-sm-6">
    {!! Form::label('no_plat', 'Nomor Plat:') !!}
    {!! Form::number('no_plat', null, ['class' => 'form-control']) !!}
</div>


<!-- Id Kecelakaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kecelakaan_id', 'Nomor lapangan:') !!}
    {!! Form::select('kecelakaan_id',$kecelakaan, null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Umur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('umur', 'Umur:') !!}
    {!! Form::text('umur', null, ['class' => 'form-control']) !!}
</div>

<!-- Sim Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sim', 'Sim:') !!}
    {!! Form::text('sim', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Disita Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_disita', 'Status Disita:') !!}
    {!! Form::text('status_disita', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Merk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merek', ' Merek:') !!}
    {!! Form::text('merek', null, ['class' => 'form-control']) !!}
</div>

<!-- Kondisi Kendaraan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kondisi_kendaraan', 'Kondisi Kendaraan:') !!}
    {!! Form::text('kondisi_kendaraan', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kendaraan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kendaraan', 'Jenis Kendaraan:') !!}
    {!! Form::text('jenis_kendaraan', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Kerugian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_kerugian', 'Status Kerugian:') !!}
    {!! Form::text('status_kerugian', null, ['class' => 'form-control']) !!}
</div>

<!-- No Reg Bb Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_reg_bb', 'No Reg Bb:') !!}
    {!! Form::number('no_reg_bb', null, ['class' => 'form-control']) !!}
</div>

<!-- Kerugian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kerugian', 'Kerugian:') !!}
    {!! Form::number('kerugian', null, ['class' => 'form-control']) !!}
</div>

<!-- Status 1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kendaraans.index') !!}" class="btn btn-default">Cancel</a>
</div>
