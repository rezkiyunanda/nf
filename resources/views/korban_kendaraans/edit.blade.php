@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Korban Kendaraan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($korbanKendaraan, ['route' => ['korbanKendaraans.update', $korbanKendaraan->id], 'method' => 'patch']) !!}

                        @include('korban_kendaraans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection