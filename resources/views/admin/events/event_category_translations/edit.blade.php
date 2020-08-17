@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   $tags['back_event_categories_title'],
       'subtitle'      =>   $tags['back_general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => $tags['back_general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => $tags['back_event_categories_title'],
                                   'route' => 'admin.eventCategories.index'
                               ),
                               array (
                                   'title' => $tags['back_general_edit'],
                               ),
                            )
   ])

   <div class="block full">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    {!! Form::model($eventCategoryTranslation, ['route' => ['admin.eventCategories.update', $eventCategoryTranslation->id], 'method' => 'patch']) !!}

                        @include('admin.events.event_category_translations.fields')

                   {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
