@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Activity Translation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($activityTranslation, ['route' => ['admin.activityTranslations.update', $activityTranslation->id], 'method' => 'patch']) !!}

                        @include('admin.activities.activity_translations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection