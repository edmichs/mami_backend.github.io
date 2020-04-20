@extends('layouts.app')
@section('css')
    <script type='text/javascript'>
        function preview_image(event)
        {
            var reader = new FileReader();
            reader.onload = function()
                {
                var output = document.getElementById('output_image');
                output.src = reader.result;
                }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <style>

        #output_image
        {
         max-width:300px;
        }
    </style>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Product
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'products.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('products.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
