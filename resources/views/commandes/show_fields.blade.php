<!-- Client Id Field -->
<div class="form-group text-center">
    <p>Numero Commande : <strong>{{ $commande->numero_commande }}</strong></p>
</div>
<div class="form-group col-md-6">
    {!! Form::label('lastname', 'Nom :') !!}
    <p>{{ $commande->client->lastname }}</p>
</div>
<div class="form-group col-md-6">
    {!! Form::label('firstname', 'Prenom :') !!}
    <p>{{ $commande->client->firstname }}</p>
</div>
<div class="form-group col-md-6">
    {!! Form::label('email', 'Email :') !!}
    <p>{{ $commande->client->email }}</p>
</div>
<div class="form-group col-md-6">
    {!! Form::label('telephone', 'telephone :') !!}
    <p>{{ $commande->client->telephone }}</p>
</div>
<!-- Product Id Field -->
<h3 class="text-muted">Liste des produits de la commande</h3>
<table class="table table-hovered table-bordered">
    <thead>
        <th>Nom du produit</th>
        <th>Description</th>
        <th>Prix Unitaire</th>
        <th>Quantité</th>
    </thead>
    <tbody>
    @php
        $sum = 0;
    @endphp
        @foreach ($commande->products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->pivot->prix_unit}}</td>
                <td>{{$product->pivot->quantity}}</td>
            </tr>
            @php
                $sum += $product->pivot->prix_unit * $product->pivot->quantity;
            @endphp
        @endforeach
    </tbody>
</table>

<!-- Nombre Total Field -->
<div class="form-group">
    <p>Montant Total : <strong>{{$sum}} </strong> Fcfa</p>
</div>

<!-- Numerp Commande Field -->


