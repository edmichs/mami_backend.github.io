<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Dificulte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dificulte', 'Dificulte:') !!}
    {!! Form::number('dificulte', null, ['class' => 'form-control']) !!}
</div>

<!-- Recette Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('recette', 'Recette:') !!}
    {!! Form::textarea('recette', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('recettes.index') }}" class="btn btn-default">Cancel</a>
</div>
