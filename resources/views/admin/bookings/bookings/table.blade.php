<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="bookings-table">
    <thead>
        <tr>
            <th>Subtotal</th>
            <th>Tax</th>
            <th>Total</th>
            <th>User Id</th>
            <th>Status Id</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($bookings as $booking)
        <tr>
            <td>{!! $booking->subtotal !!}</td>
            <td>{!! $booking->tax !!}</td>
            <td>{!! $booking->total !!}</td>
            <td>{!! $booking->user_id !!}</td>
            <td>{!! $booking->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.bookings.destroy', $booking->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.bookings.show', [$booking->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.bookings.edit', [$booking->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>