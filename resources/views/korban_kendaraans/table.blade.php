<table class="table table-responsive" id="korbanKendaraans-table">
    <thead>
        <tr>
            <th>No Plat</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Umur</th>
        <th>Kondisi</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($korbanKendaraans as $korbanKendaraan)
        <tr>
            <td>{!! $korbanKendaraan->no_plat !!}</td>
            <td>{!! $korbanKendaraan->nama !!}</td>
            <td>{!! $korbanKendaraan->jenis_kelamin !!}</td>
            <td>{!! $korbanKendaraan->umur !!}</td>
            <td>{!! $korbanKendaraan->kondisi !!}</td>
            <td>
                {!! Form::open(['route' => ['korbanKendaraans.destroy', $korbanKendaraan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('korbanKendaraans.show', [$korbanKendaraan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('korbanKendaraans.edit', [$korbanKendaraan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>