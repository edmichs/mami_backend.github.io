<div class="table-responsive">
    <table class="table" id="example">
        <thead>
            <tr>
                <th>Numero Commande</th>
                <th>Nom & Prenom </th>
                <th>Email </th>
                <th>Téléphone </th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($commandes as $commande)
            <tr>
                <td>{{ $commande->numero_commande }}</td>
                <td>{{ $commande->client->lastname}} {{$commande->client->firstname }}</td>
                <td>{{ $commande->client->email}}</td>
                <td>{{ $commande->client->telephone }}</td>
             
                    <td>
                        {!! Form::open(['route' => ['commandes.destroy', $commande->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('commandes.show', [$commande->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{{ route('commandes.edit', [$commande->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
