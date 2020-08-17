<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="activityCategoryTranslations-table">
    <thead>
        <tr>
            <th>Activity Category Id</th>
            <th>Language Id</th>
            <th>{{ $tags['back_general_name'] }}</th>
            <th>{{ $tags['back_general_description'] }}</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($activityCategoryTranslations as $activityCategoryTranslation)
        <tr>
            <td>{!! $activityCategoryTranslation->activity_category_id !!}</td>
            <td>{!! $activityCategoryTranslation->language_id !!}</td>
            <td>{!! $activityCategoryTranslation->name !!}</td>
            <td>{!! $activityCategoryTranslation->description !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.activityCategoryTranslations.destroy', $activityCategoryTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.activityCategoryTranslations.show', [$activityCategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.activityCategoryTranslations.edit', [$activityCategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>