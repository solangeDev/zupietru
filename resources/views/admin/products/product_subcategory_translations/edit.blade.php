@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   $tags['back_product_subcategories_title'],
       'subtitle'      =>   $tags['back_general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => $tags['back_general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => $tags['back_product_subcategories_title'],
                                   'route' => 'admin.productSubcategories.index'
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
                   {!! Form::model($productSubcategoryTranslation, ['route' => ['admin.productSubcategories.update', $productSubcategoryTranslation->id], 'method' => 'patch']) !!}

                        @include('admin.products.product_subcategory_translations.fields')

                   {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
