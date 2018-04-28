@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tilang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tilang, ['route' => ['tilangs.update', $tilang->id], 'method' => 'patch']) !!}

                        @include('tilangs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection