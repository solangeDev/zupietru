@extends('layouts.admin.app')

@section('content')
@include('layouts.admin.partials.dashboard-header-top', [
    'title'         => $tags['back_event_title'],
    'subtitle'      => $tags['back_general_index'],
    'button'        => $tags['back_general_addnew'],
    'route'         => 'admin.events.create',
    'breadcrumb'    => array (
        array (
            'title' => $tags['back_general_home'],
            'route' => 'home'
        ),
        array (
            'title' => $tags['back_event_title'],
        ),
    ),
    ])
   @include('admin.events.event_translations.table')
@endsection
