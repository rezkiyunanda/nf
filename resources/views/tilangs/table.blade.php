<table class="table table-responsive" id="tilangs-table">
    <thead>
        <tr>
            <th>No Petugas</th>
        <th>No Sim</th>
        <th>No Stnk</th>
        <th>Merek</th>
        <th>Jenis Kendaraan</th>
        <th>Nama Pelanggar</th>
        <th>Keterangan</th>
        <th>No Plat</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tilangs as $tilang)
        <tr>
            <td>{!! $tilang->petugas_id !!}</td>
            <td>{!! $tilang->no_sim !!}</td>
            <td>{!! $tilang->no_stnk !!}</td>
            <td>{!! $tilang->merek !!}</td>
            <td>{!! $tilang->jenis_kendaraan_id !!}</td>
            <td>{!! $tilang->nama_pelanggar !!}</td>
            <td>{!! $tilang->keterangan !!}</td>
            <td>{!! $tilang->no_plat !!}</td>
            <td>
                {!! Form::open(['route' => ['tilangs.destroy', $tilang->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tilangs.show', [$tilang->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tilangs.edit', [$tilang->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>