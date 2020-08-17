<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="serviceTranslations-table">
    <thead>
        <tr>
            <th>Service Id</th>
        <th>Language Id</th>
        <th>{{ $tags['back_general_name'] }}</th>
        <th>{{ $tags['back_general_description'] }}</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($serviceTranslations as $serviceTranslation)
        <tr>
            <td>{!! $serviceTranslation->service_id !!}</td>
            <td>{!! $serviceTranslation->language_id !!}</td>
            <td>{!! $serviceTranslation->name !!}</td>
            <td>{!! $serviceTranslation->description !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.serviceTranslations.destroy', $serviceTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.serviceTranslations.show', [$serviceTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.serviceTranslations.edit', [$serviceTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>