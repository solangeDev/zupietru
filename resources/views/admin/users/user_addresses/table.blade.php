<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="userAddresses-table">
    <thead>
        <tr>
            <th>Alias</th>
        <th>{{ $tags['back_general_description'] }}</th>
        <th>Status Id</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($userAddresses as $userAddress)
        <tr>
            <td>{!! $userAddress->alias !!}</td>
            <td>{!! $userAddress->description !!}</td>
            <td>{!! $userAddress->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.userAddresses.destroy', $userAddress->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.userAddresses.show', [$userAddress->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.userAddresses.edit', [$userAddress->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>