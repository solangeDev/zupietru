@extends('layouts.admin.app')
@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [

       'title'         =>   $tags['back_event_title'],
       'subtitle'      =>   $tags[$subtitle],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => $tags['back_general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => $tags['back_event_title'],
                                   'route' => 'admin.events.index'
                               ),
                               array (
                                   'title' => $tags[$subtitle],
                               ),
                            )
   ])
   <div class="block full">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    {!! Form::model(isset($eventTranslation) ? $eventTranslation : '', ['route' => ['admin.events.update', isset($eventTranslation) ? $eventTranslation->id : ''], 'method' => 'post']) !!}

                        @include('admin.events.event_translations.fields')

                    {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
