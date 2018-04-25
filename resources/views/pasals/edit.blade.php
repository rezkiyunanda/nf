@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pasal
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pasal, ['route' => ['pasals.update', $pasal->id], 'method' => 'patch']) !!}

                        @include('pasals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection