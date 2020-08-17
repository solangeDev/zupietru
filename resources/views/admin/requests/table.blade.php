<table class="table table-responsive" id="requests-table">
    <thead>
        <tr>
        <th>Checkin Date</th>
        <th>Checkout Date</th>
        <th>Persons Amount</th>
        <th>User Id</th>
        <th>No Register User Name</th>
        <th>No Register User Email</th>
        <th>No Register User Phone</th>
        <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($requests as $request)
        <tr>
            <td>{!! $request->checkin_date !!}</td>
            <td>{!! $request->checkout_date !!}</td>
            <td>{!! $request->persons_amount !!}</td>
            <td>{!! $request->user_id !!}</td>
            <td>{!! $request->no_register_user_name !!}</td>
            <td>{!! $request->no_register_user_email !!}</td>
            <td>{!! $request->no_register_user_phone !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.requests.destroy', $request->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.requests.show', [$request->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.requests.edit', [$request->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>