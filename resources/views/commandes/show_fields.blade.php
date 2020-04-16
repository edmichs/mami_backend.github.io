<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', 'Client Id:') !!}
    <p>{{ $commande->client_id }}</p>
</div>

<!-- Product Id Field -->
<div class="form-group">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{{ $commande->product_id }}</p>
</div>

<!-- Prix Unit Field -->
<div class="form-group">
    {!! Form::label('prix_unit', 'Prix Unit:') !!}
    <p>{{ $commande->prix_unit }}</p>
</div>

<!-- Nombre Total Field -->
<div class="form-group">
    {!! Form::label('nombre_total', 'Nombre Total:') !!}
    <p>{{ $commande->nombre_total }}</p>
</div>

<!-- Numerp Commande Field -->
<div class="form-group">
    {!! Form::label('numerp_commande', 'Numerp Commande:') !!}
    <p>{{ $commande->numerp_commande }}</p>
</div>

