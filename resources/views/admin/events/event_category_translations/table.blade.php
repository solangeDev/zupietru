<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="eventCategoryTranslations-table">
    <thead>
        <tr>
            <th>Event Category Id</th>
            <th>{{ $tags['back_general_name'] }}</th>
            <th>{{ $tags['back_general_description'] }}</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($eventCategoryTranslations as $eventCategoryTranslation)
        <tr>
            <td>{!! $eventCategoryTranslation->event_category_id !!}</td>
            <td>{!! $eventCategoryTranslation->name !!}</td>
            <td>{!! $eventCategoryTranslation->description !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.eventCategories.destroy', $eventCategoryTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.eventCategories.show', [$eventCategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.eventCategories.edit', [$eventCategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>