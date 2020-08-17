@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.partials.dashboard-header-top', [
    'title'         => $tags['back_product_subcategories_title'],
    'subtitle'      => '',
    'button'        => $tags['back_general_addnew'],
    'route'         => 'admin.productSubcategories.create',
    'breadcrumb'    => array (
        array (
            'title' => $tags['back_general_home'],
            'route' => 'home'
        ),
        array (
            'title' => $tags['back_product_subcategories_title'],
        ),
    ),
    ])
    @include('admin.products.product_subcategory_translations.table')
@endsection