<!-- No Lapangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_lapangan', 'No Lapangan:') !!}
    {!! Form::number('no_lapangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan_lokasi', 'Keterangan Lokasi:') !!}
    {!! Form::text('keterangan_lokasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Kerugian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_kerugian', 'Total Kerugian:') !!}
    {!! Form::number('total_kerugian', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kecelakaans.index') !!}" class="btn btn-default">Cancel</a>
</div>
