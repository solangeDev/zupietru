<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="newsletterUsers-table">
    <thead>
        <tr>
            <th>Email</th>
            <th>Status</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($newsletterUsers as $newsletterUser)
        <tr>
            <td>{!! $newsletterUser->email !!}</td>
            <td>{!! $newsletterUser->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.newsletterUsers.destroy', $newsletterUser->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.newsletterUsers.show', [$newsletterUser->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.newsletterUsers.edit', [$newsletterUser->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>