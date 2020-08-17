<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="roomCategoryTranslations-table">
    <thead>
        <tr>
            <th>Room Category Id</th>
        <th>Language Id</th>
        <th>{{ $tags['back_general_name'] }}</th>
        <th>{{ $tags['back_general_description'] }}</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($roomCategoryTranslations as $roomCategoryTranslation)
        <tr>
            <td>{!! $roomCategoryTranslation->room_category_id !!}</td>
            <td>{!! $roomCategoryTranslation->language_id !!}</td>
            <td>{!! $roomCategoryTranslation->name !!}</td>
            <td>{!! $roomCategoryTranslation->description !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.roomCategoryTranslations.destroy', $roomCategoryTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.roomCategoryTranslations.show', [$roomCategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.roomCategoryTranslations.edit', [$roomCategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>