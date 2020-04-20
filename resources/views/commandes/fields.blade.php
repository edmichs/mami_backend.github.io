<!-- Client Id Field -->
<div class="box box-solid box-primary">
    <div class="box-header with-border"> 
        <h3 class="box-title"> Informations du client</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('email', 'Email Client :') !!}
                {!! Form::email('email',  $commande ? $commande->client->email : old('email'), ['class' => 'form-control ']) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('lastname', 'Nom Client:') !!}
                {!! Form::text('lastname', $commande ? $commande->client->lastname :  old('lastname') , ['class' => 'form-control ']) !!}
                @if ($errors->has('lastname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lastname') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('firstname', 'Prenom Client:') !!}
                {!! Form::text('firstname', $commande ? $commande->client->firstname :  old('firstname') , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm-6">
                {!! Form::label('telephone', 'Numéro de Téléphone Number:') !!}
                {!! Form::tel('telephone', $commande ? $commande->client->telephone :  old('telephone') , ['class' => 'form-control']) !!}
                @if ($errors->has('telephone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('telephone') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="box box-solid box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"> Informations sur la commande</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class ="row">
        <!-- Product Id Field -->
            <div id="products">
                <div class="form-group col-sm-4">
                    {!! Form::label('product_id', 'Produit:') !!}
                    <select name="products[]"   data-live-search="true" class="form-control selectpicker">
                        @foreach ($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>            
                        @endforeach
                    </select>
                </div>
                <!-- Prix Unit Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('prix_unit', 'Prix Unitaire (en FCFA):') !!}
                    {!! Form::number('prix_unit[]', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('quantity', 'Quantité:') !!}
                    {!! Form::number('quantity[]', null, ['class' => 'form-control']) !!}
                </div>
                
            </div>
            <div class="form-group col-sm-12 col-md-12 text-center ">
                <button id="addRow" type="button" class="btn btn-success">Add other product</button>
            </div>
            
            <!-- Numerp Commande Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('numero_commande', 'Numero Commande:') !!}
                {!! Form::text('numero_commande', $commande ? $commande->numero_commande : ($numero_commande ?? null), ['class' => 'form-control', 'readonly'=>'true']) !!}
            </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('commandes.index') }}" class="btn btn-default">Cancel</a>
            </div>

        </div>
    </div>
</div>



