<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="roomTranslations-table">
    <thead>
        <tr>
            <th>Room Id</th>
        <th>Language Id</th>
        <th>{{ $tags['back_general_name'] }}</th>
        <th>{{ $tags['back_general_description'] }}</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($roomTranslations as $roomTranslation)
        <tr>
            <td>{!! $roomTranslation->room_id !!}</td>
            <td>{!! $roomTranslation->language_id !!}</td>
            <td>{!! $roomTranslation->name !!}</td>
            <td>{!! $roomTranslation->description !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.roomTranslations.destroy', $roomTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.roomTranslations.show', [$roomTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.roomTranslations.edit', [$roomTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>