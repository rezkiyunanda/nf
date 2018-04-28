<table class="table table-responsive" id="kendaraans-table">
    <thead>
        <tr>
        <th>No Plat</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Umur</th>
        <th>Sim</th>
        <th>Status Disita</th>
        <th>Merek</th>
       
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kendaraans as $kendaraan)
        <tr>
            <td>{!! $kendaraan->no_plat !!}</td>
            <td>{!! $kendaraan->nama !!}</td>
            <td>{!! $kendaraan->alamat !!}</td>
            <td>{!! $kendaraan->umur !!}</td>
            <td>{!! $kendaraan->sim !!}</td>
            <td>{!! $kendaraan->status_disita !!}</td>
           
            <td>
                {!! Form::open(['route' => ['kendaraans.destroy', $kendaraan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kendaraans.show', [$kendaraan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kendaraans.edit', [$kendaraan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>