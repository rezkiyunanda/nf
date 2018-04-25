@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Korban Kecelakaan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($korbanKecelakaan, ['route' => ['korbanKecelakaans.update', $korbanKecelakaan->id], 'method' => 'patch']) !!}

                        @include('korban_kecelakaans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection