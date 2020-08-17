@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   $tags['back_requests_title'],
       'subtitle'      =>   $tags['back_general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => $tags['back_general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => $tags['back_requests_title'],
                                   'route' => 'admin.requests.index'
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
                   {!! Form::model($request, ['route' => ['admin.requests.update', $request->id], 'method' => 'patch']) !!}

                        @include('admin.requests.fields')

                   {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
