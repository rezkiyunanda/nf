@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kecelakaan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kecelakaan, ['route' => ['kecelakaans.update', $kecelakaan->id], 'method' => 'patch']) !!}

                        @include('kecelakaans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection