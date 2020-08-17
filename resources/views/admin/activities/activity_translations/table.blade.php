<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="activityTranslations-table">
    <thead>
        <tr>
            <th>Activity Id</th>
            <th>Language Id</th>
            <th>{{ $tags['back_general_title'] }}</th>
            <th>{{ $tags['back_general_subtitle'] }}</th>
            <th>{{ $tags['back_general_description'] }}</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($activityTranslations as $activityTranslation)
        <tr>
            <td>{!! $activityTranslation->activity_id !!}</td>
            <td>{!! $activityTranslation->language_id !!}</td>
            <td>{!! $activityTranslation->title !!}</td>
            <td>{!! $activityTranslation->subtitle !!}</td>
            <td>{!! $activityTranslation->description !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.activityTranslations.destroy', $activityTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.activityTranslations.show', [$activityTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.activityTranslations.edit', [$activityTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>