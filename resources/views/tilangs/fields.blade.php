<!-- Petugas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('petugas_id', 'Petugas Id:') !!}
    {!! Form::number('petugas_id', null, ['class' => 'form-control']) !!}
</div>

<!-- No Sim Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_sim', 'No Sim:') !!}
    {!! Form::number('no_sim', null, ['class' => 'form-control']) !!}
</div>

<!-- No Stnk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_stnk', 'No Stnk:') !!}
    {!! Form::number('no_stnk', null, ['class' => 'form-control']) !!}
</div>

<!-- Merek Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merek', 'Merek:') !!}
    {!! Form::number('merek', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kendaraan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kendaraan_id', 'Jenis Kendaraan Id:') !!}
    {!! Form::number('jenis_kendaraan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Pelanggar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_pelanggar', 'Nama Pelanggar:') !!}
    {!! Form::text('nama_pelanggar', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- No Plat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_plat', 'No Plat:') !!}
    {!! Form::number('no_plat', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tilangs.index') !!}" class="btn btn-default">Cancel</a>
</div>
