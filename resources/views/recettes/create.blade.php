@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Recette
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'recettes.store']) !!}

                        @include('recettes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
       <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>  
       <script>
            CKEDITOR.replace('recette', {customConfig: '/js/ckeditor.js'});  
        </script>
@endsection
