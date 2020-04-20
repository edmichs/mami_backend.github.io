<div class="table-responsive">
    <table class="table display  nowrap " id="example">
        <thead>
            <tr>
                <th>Name</th>
        <th>Dificulte</th>
        <th>Recette</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($recettes as $recette)
            <tr>
                <td>{{ $recette->name }}</td>
            <td>{{ $recette->dificulte }}</td>
            <td>{{ $recette->recette }}</td>
                <td>
                    {!! Form::open(['route' => ['recettes.destroy', $recette->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('recettes.show', [$recette->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('recettes.edit', [$recette->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
