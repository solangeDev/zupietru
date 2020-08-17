<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="orderDetails-table">
    <thead>
        <tr>
            <th>Order Id</th>
        <th>Product Presentation Id</th>
        <th>Products Amount</th>
        <th>Belongs To Order Detail Id</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($orderDetails as $orderDetail)
        <tr>
            <td>{!! $orderDetail->order_id !!}</td>
            <td>{!! $orderDetail->product_presentation_id !!}</td>
            <td>{!! $orderDetail->products_amount !!}</td>
            <td>{!! $orderDetail->belongs_to_order_detail_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.orderDetails.destroy', $orderDetail->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.orderDetails.show', [$orderDetail->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.orderDetails.edit', [$orderDetail->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>