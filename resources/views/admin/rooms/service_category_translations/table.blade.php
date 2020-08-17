<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="serviceCategoryTranslations-table">
    <thead>
        <tr>
            <th>Service Category Id</th>
        <th>Language Id</th>
        <th>{{ $tags['back_general_name'] }}</th>
        <th>{{ $tags['back_general_description'] }}</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($serviceCategoryTranslations as $serviceCategoryTranslation)
        <tr>
            <td>{!! $serviceCategoryTranslation->service_category_id !!}</td>
            <td>{!! $serviceCategoryTranslation->language_id !!}</td>
            <td>{!! $serviceCategoryTranslation->name !!}</td>
            <td>{!! $serviceCategoryTranslation->description !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.serviceCategoryTranslations.destroy', $serviceCategoryTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.serviceCategoryTranslations.show', [$serviceCategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.serviceCategoryTranslations.edit', [$serviceCategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>