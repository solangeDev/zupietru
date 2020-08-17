@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'=>'Activity Category Translation',
       'subtitle'=>'Edit',
       'icon'=>'fa fa-cogs',
       'breadcrumb'=>array (
           array (
               'title' => 'Home',
               'route' => 'home'
           ),
           array (
               'title' => 'Activity Categories',
               'route' => 'admin.activityCategoryTranslations.index'
           ),
           array (
               'title' => 'Edit',
           ),
       ),
   ])
   <div class="block full">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($activityCategoryTranslation, ['route' => ['admin.activityCategoryTranslations.update', $activityCategoryTranslation->id], 'method' => 'patch']) !!}

                        @include('admin.activities.activity_category_translations.fields')

                   {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
