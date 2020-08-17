<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="multimedia-table">
    <thead>
        <tr>
            <th>{{ $tags['back_general_name'] }}</th>
        <th>Slug</th>
        <th>{{ $tags['back_general_description'] }}</th>
        <th>Size</th>
        <th>Path</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($multimedia as $multimedia)
        <tr>
            <td>{!! $multimedia->name !!}</td>
            <td>{!! $multimedia->slug !!}</td>
            <td>{!! $multimedia->description !!}</td>
            <td>{!! $multimedia->size !!}</td>
            <td>{!! $multimedia->path !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.multimedia.destroy', $multimedia->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.multimedia.show', [$multimedia->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.multimedia.edit', [$multimedia->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>