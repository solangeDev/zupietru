@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.partials.dashboard-header-top', [
    'title'         => $tags['back_orders_title'],
    'subtitle'      => $tags['back_general_index'],
    'button'        => $tags['back_general_addnew'],
    'route'         => 'admin.orders.create',
    'breadcrumb'    => array (
        array (
            'title' => $tags['back_general_home'],
            'route' => 'home'
        ),
        array (
            'title' => $tags['back_orders_title'],
        ),
    ),
    ])
    @include('admin.products.orders.table')
@endsection