@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Blog Category Translation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($blogCategoryTranslation, ['route' => ['admin.blogCategoryTranslations.update', $blogCategoryTranslation->id], 'method' => 'patch']) !!}

                        @include('admin.blogs.blog_category_translations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection