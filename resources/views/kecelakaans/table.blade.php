<table class="table table-responsive" id="kecelakaans-table">
    <thead>
        <tr>
            <th>No Lapangan</th>
        <th>Keterangan Lokasi</th>
        <th>Total Kerugian</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kecelakaans as $kecelakaan)
        <tr>
            <td>{!! $kecelakaan->no_lapangan !!}</td>
            <td>{!! $kecelakaan->keterangan_lokasi !!}</td>
            <td>{!! $kecelakaan->total_kerugian !!}</td>
            <td>
                {!! Form::open(['route' => ['kecelakaans.destroy', $kecelakaan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kecelakaans.show', [$kecelakaan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kecelakaans.edit', [$kecelakaan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>