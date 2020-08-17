<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="blogComments-table">
    <thead>
        <tr>
            <th>Comment</th>
            <th>Blog Id</th>
            <th>User Id</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($blogComments as $blogComment)
        <tr>
            <td>{!! $blogComment->comment !!}</td>
            <td>{!! $blogComment->blog_id !!}</td>
            <td>{!! $blogComment->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.blogComments.destroy', $blogComment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.blogComments.show', [$blogComment->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.blogComments.edit', [$blogComment->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>