@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   $tags['back_product_categories_title'],
       'subtitle'      =>   $tags['back_general_show'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => $tags['back_general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => $tags['back_product_categories_title'],
                                   'route' => 'admin.productCategories.index'
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
                    @include('admin.products.product_category_translations.show_fields')
                    <a href="{!! route('admin.productCategories.index') !!}" class="btn btn-default">{{ $tags['back_general_back'] }}</a>
              </div>
          </div>
      </div>
  </div>
@endsection
