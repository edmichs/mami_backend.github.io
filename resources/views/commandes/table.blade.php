<div class="table-responsive">
    <table class="table" id="commandes-table">
        <thead>
            <tr>
                <th>Client Id</th>
        <th>Product Id</th>
        <th>Prix Unit</th>
        <th>Nombre Total</th>
        <th>Numerp Commande</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($commandes as $commande)
            <tr>
                <td>{{ $commande->client_id }}</td>
            <td>{{ $commande->product_id }}</td>
            <td>{{ $commande->prix_unit }}</td>
            <td>{{ $commande->nombre_total }}</td>
            <td>{{ $commande->numerp_commande }}</td>
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
