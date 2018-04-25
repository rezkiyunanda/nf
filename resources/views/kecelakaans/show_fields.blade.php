<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $kecelakaan->id !!}</p>
</div>

<!-- No Lapangan Field -->
<div class="form-group">
    {!! Form::label('no_lapangan', 'No Lapangan:') !!}
    <p>{!! $kecelakaan->no_lapangan !!}</p>
</div>

<!-- Keterangan Lokasi Field -->
<div class="form-group">
    {!! Form::label('keterangan_lokasi', 'Keterangan Lokasi:') !!}
    <p>{!! $kecelakaan->keterangan_lokasi !!}</p>
</div>

<!-- Total Kerugian Field -->
<div class="form-group">
    {!! Form::label('total_kerugian', 'Total Kerugian:') !!}
    <p>{!! $kecelakaan->total_kerugian !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $kecelakaan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $kecelakaan->updated_at !!}</p>
</div>

