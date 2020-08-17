@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   $tags['back_product_presentations_title'],
       'subtitle'      =>   $tags['back_general_edit'],
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
                                   'title' => $tags['back_general_edit'] . ' ' . $tags['back_product_presentations_title'],
                               ),
                            )
   ])

   <div class="block full">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productPresentationProduct, ['route' => ['admin.productPresentationProducts.update', $productPresentationProduct->id], 'method' => 'patch']) !!}

                        @include('admin.products.product_presentation_products.fields')

                   {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection

