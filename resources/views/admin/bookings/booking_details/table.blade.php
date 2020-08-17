<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="bookingDetails-table">
    <thead>
        <tr>
            <th>Checkin Date</th>
            <th>Checkout Date</th>
            <th>Persons Amount</th>
            <th>Booking Id</th>
            <th>Row Id</th>
            <th>Payment Method Id</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($bookingDetails as $bookingDetail)
        <tr>
            <td>{!! $bookingDetail->checkin_date !!}</td>
            <td>{!! $bookingDetail->checkout_date !!}</td>
            <td>{!! $bookingDetail->persons_amount !!}</td>
            <td>{!! $bookingDetail->booking_id !!}</td>
            <td>{!! $bookingDetail->row_id !!}</td>
            <td>{!! $bookingDetail->payment_method_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.bookingDetails.destroy', $bookingDetail->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.bookingDetails.show', [$bookingDetail->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.bookingDetails.edit', [$bookingDetail->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>