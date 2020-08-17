@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Seo Translation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($seoTranslation, ['route' => ['admin.seoTranslations.update', $seoTranslation->id], 'method' => 'patch']) !!}

                        @include('admin.utils.seo_translations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection