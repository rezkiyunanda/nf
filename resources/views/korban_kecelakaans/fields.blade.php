<!-- Id Kecelakaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_ktp', 'no_ktp:') !!}
    {!! Form::text('no_ktp', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('kecelakaan_id', 'Nomor lapangan:') !!}
    {!! Form::select('kecelakaan_id',$kecelakaan, null, ['class' => 'form-control']) !!}
</div>
<!-- no_ktp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    {!! Form::text('jenis_kelamin', null, ['class' => 'form-control']) !!}
</div>

<!-- Umur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('umur', 'Umur:') !!}
    {!! Form::text('umur', null, ['class' => 'form-control']) !!}
</div>

<!-- Kondisi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kondisi', 'Kondisi:') !!}
    {!! Form::text('kondisi', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('korbanKecelakaans.index') !!}" class="btn btn-default">Cancel</a>
</div>
