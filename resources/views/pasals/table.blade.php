<table class="table table-responsive" id="pasals-table">
    <thead>
        <tr>
        <th>No Pasal</th>
        <th>Ayat Pasal</th>
        <th>Bunyi Pasal</th>
        
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pasals as $pasal)
        <tr>
            <td>{!! $pasal->no !!}</td>>
            <td>{!! $pasal->ayat !!}</td>
            <td>{!! $pasal->bunyi_pasal !!}</td>
            
            <td>
                {!! Form::open(['route' => ['pasals.destroy', $pasal->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pasals.show', [$pasal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pasals.edit', [$pasal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>