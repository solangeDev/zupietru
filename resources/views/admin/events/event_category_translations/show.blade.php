@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   $tags['back_event_categories_title'],
       'subtitle'      =>   $tags['back_general_show'],
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
                                   'title' => $tags['back_general_show'],
                               ),
                            )
   ])

   <div class="block full">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    @include('admin.events.event_category_translations.show_fields')
                    <a href="{!! route('admin.eventCategories.index') !!}" class="btn btn-default">{{ $tags['back_general_back'] }}</a>
              </div>
          </div>
      </div>
  </div>
@endsection
