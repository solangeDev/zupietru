<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="eventTranslations-table">
    <thead>
        <tr>
            <th>Event Id</th>
            <th>{{ $tags['back_general_title'] }}</th>
            <th>{{ $tags['back_general_subtitle'] }}</th>
            <th>{{ $tags['back_general_description'] }}</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($eventTranslations as $eventTranslation)
        <tr>
            <td>{!! $eventTranslation->event_id !!}</td>
            <td>{!! $eventTranslation->title !!}</td>
            <td>{!! $eventTranslation->subtitle !!}</td>
            <td>{!! $eventTranslation->description !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.events.destroy', $eventTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.events.show', [$eventTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.events.edit', [$eventTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>