@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   $tags['back_product_presentations_title'],
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
                                   'title' => $tags['back_general_edit'],
                                   'route' => 'admin.products.edit',
                                   'route_params' => $product->id
                               ),
                               array (
                                   'title' => $tags['back_general_create'] . ' ' . $tags['back_product_presentations_title'],
                               ),
                            )
   ])

   <div class="block full">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    {!! Form::open([ 'route' => ['admin.productPresentationProducts.store', $product->id] ]) !!}

                        @include('admin.products.product_presentation_products.fields')

                    {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
