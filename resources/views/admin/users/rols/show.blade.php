@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   $tags['back_role_title'],
       'subtitle'      =>   $tags['back_general_create'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => $tags['back_general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => $tags['back_role_title'],
                                   'route' => 'admin.rols.index'
                               ),
                               array (
                                   'title' => $tags['back_general_create'],
                               ),
                            )
   ])
    <div class="block full">
        <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    @include('admin.users.rols.show_fields')
                    <a href="{!! route('admin.rols.index') !!}" class="btn btn-default">{!! $tags['back_general_back'] !!}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
