@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   $tags['back_orders_title'],
       'subtitle'      =>   $tags['back_general_create'],
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
                                   'title' => $tags['back_general_create'],
                               ),
                            )
   ])

   {{ $errors }}

   <div class="block full">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    {!! Form::open(['route' => 'admin.orders.store', 'name' => 'form-orders', 'id' => 'form-orders']) !!}

                        @include('admin.products.orders.fields')

                    {!! Form::close() !!}

                    @include('admin.products.order_details.fields')

                    @include('admin.products.orders.user_address')
              </div>
          </div>
      </div>
  </div>
@endsection
