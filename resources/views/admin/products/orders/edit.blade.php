@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   $tags['back_orders_title'],
       'subtitle'      =>   $tags['back_general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => $tags['back_general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => $tags['back_orders_title'],
                                   'route' => 'admin.orders.index'
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
                   {!! Form::model($order, ['route' => ['admin.orders.update', $order->id], 'method' => 'patch']) !!}

                        @include('admin.products.orders.fields')

                   {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
