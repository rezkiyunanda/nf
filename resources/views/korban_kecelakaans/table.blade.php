<table class="table table-responsive" id="korbanKecelakaans-table">
    <thead>
        <tr>
        <th>No KTP</th>   
        <th>No Laporan Kecelakaan</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Umur</th>
        <th>Kondisi</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($korbanKecelakaans as $korbanKecelakaan)
        <tr>
            <td>{!! $korbanKecelakaan->kecelakaan_id !!}</td>
            <td>{!! $korbanKecelakaan->nama !!}</td>
            <td>{!! $korbanKecelakaan->jenis_kelamin !!}</td>
            <td>{!! $korbanKecelakaan->umur !!}</td>
            <td>{!! $korbanKecelakaan->kondisi !!}</td>
            <td>
                {!! Form::open(['route' => ['korbanKecelakaans.destroy', $korbanKecelakaan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('korbanKecelakaans.show', [$korbanKecelakaan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('korbanKecelakaans.edit', [$korbanKecelakaan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>