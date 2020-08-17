@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.partials.dashboard-header-top', [
    'title'         => $tags['back_newslettes_title'],
    'subtitle'      => $tags['back_general_index'],
    'icon'          => 'fa fa-cogs',
    'breadcrumb'    => array (
        array (
            'title' => $tags['back_general_home'],
            'route' => 'home'
        ),
        array (
            'title' => $tags['back_newslettes_title'],
        ),
    ),
    ])
    @include('admin.newsletter_users.table')
@endsection
