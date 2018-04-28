<div class="form-group col-sm-6">
    {!! Form::label('no', 'Nomor Pasal:') !!}
    {!! Form::text('no', null, ['class' => 'form-control']) !!}
</div>
<!-- Nama Pasal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ayat', 'Ayat :') !!}
    {!! Form::text('ayat', null, ['class' => 'form-control']) !!}
</div>

<!-- Bunyi Pasal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bunyi_pasal', 'Bunyi Pasal:') !!}
    {!! Form::text('bunyi_pasal', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pasals.index') !!}" class="btn btn-default">Cancel</a>
</div>
