<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $recette->name }}</p>
</div>

<!-- Dificulte Field -->
<div class="form-group">
    {!! Form::label('dificulte', 'Dificulte:') !!}
    <p>{{ $recette->dificulte }}</p>
</div>

<!-- Recette Field -->
<div class="form-group">
    {!! Form::label('recette', 'Recette:') !!}
    <p>{{ $recette->recette }}</p>
</div>

