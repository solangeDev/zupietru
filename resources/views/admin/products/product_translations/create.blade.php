@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   $tags['back_products_title'],
       'subtitle'      =>   $tags['back_general_create'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => $tags['back_general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => $tags['back_products_title'],
                                   'route' => 'admin.products.index'
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
                    {!! Form::open(['route' => 'admin.products.store']) !!}

                        @include('admin.products.product_translations.fields')

                    {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
