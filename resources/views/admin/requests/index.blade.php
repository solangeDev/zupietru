@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.partials.dashboard-header-top', [
    'title'         => $tags['back_requests_title'],
    'subtitle'      => $tags['back_general_index'],
    'button'        => $tags['back_general_addnew'],
    'route'         => 'admin.requests.create',
    'breadcrumb'    => array (
        array (
            'title' => $tags['back_general_home'],
            'route' => 'home'
        ),
        array (
            'title' => $tags['back_requests_title'],
        ),
    ),
    ])
    @include('admin.requests.table')
@endsection

