<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::number('product_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_unit', 'Prix Unit:') !!}
    {!! Form::number('prix_unit', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_total', 'Nombre Total:') !!}
    {!! Form::number('nombre_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Numerp Commande Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numerp_commande', 'Numerp Commande:') !!}
    {!! Form::text('numerp_commande', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('commandes.index') }}" class="btn btn-default">Cancel</a>
</div>
