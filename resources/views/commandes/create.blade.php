@extends('layouts.app')

@section('css')
    <style>
        .container1 input[type=text] {
        padding:5px 0px;
        margin:5px 5px 5px 0px;
        }


        .add_form_field
        {
            background-color: #1c97f3;
            border: none;
            color: white;
            padding: 8px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border:1px solid #186dad;

        }

        input{
            border: 1px solid #1c97f3;
            width: 260px;
            height: 40px;
            margin-bottom:14px;
        }

        .delete{
            background-color: #fd1200;
            border: none;
            color: white;
            padding: 5px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;

        }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
    // add row
        $(document).on('click','#addRow',function () {
            console.log(123);
                var html = '';
                html += '<div id="inputFormRow">';
                html += '<div class="form-group col-md-4 col-sm-4">';
                html += '{!! Form::label('product_id', 'Produit :') !!}';
                html += '<select name="products[]" class="form-control">@foreach ($products as $product)<option value="{{$product->id}}">{{$product->name}}</option>@endforeach</select>';
                html += '</div>';
                html += '<div class="form-group col-md-4 col-sm-4">';
                html += '{!! Form::label('prix_unit', 'Prix Unitaire:') !!}';
                html += '{!! Form::number('prix_unit[]', null, ['class' => 'form-control']) !!}';
                html += '</div>';
                html += '<div class="form-group col-md-4 col-sm-4">';
                html += '{!! Form::label('quantity', 'Quantité:') !!}';
                html += '{!! Form::number('quantity[]', null, ['class' => 'form-control']) !!}';
                html += '</div>';
                html += '</div>';



                $('#products').append(html);
            });

            // remove row
            $(document).on('click', '#removeRow', function () {
                $(this).closest('#inputFormRow').remove();
            });
</script>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Commande
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
         {!! Form::open(['route' => 'commandes.store']) !!}
                @include('commandes.fields')
         {!! Form::close() !!}
    </div>
@endsection

