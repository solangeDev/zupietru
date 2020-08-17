<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="orders-table">
    <thead>
        <tr>
            <th>{{ $tags['back_general_id'] }}</th>
            <th>Code</th>
            <th>Subtotal</th>
            <th>Tax</th>
            <th>Total</th>
            <th>Delivery Address</th>
            <th>User Id</th>
            <th>Status Id</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($orders as $order)
        <tr>
            <td>{!! $order->id !!}</td>
            <td>{!! $order->code !!}</td>
            <td>{!! $order->subtotal !!}</td>
            <td>{!! $order->tax !!}</td>
            <td>{!! $order->total !!}</td>
            <td>{!! $order->delivery_address !!}</td>
            <td>{!! $order->user_id !!}</td>
            <td>{!! $order->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.orders.destroy', $order->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.orders.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.orders.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>