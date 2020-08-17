<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="tagTranslations-table">
    <thead>
        <tr>
            {{--<th>Tag</th>
            <th>Value</th>
            <th>Front Section Id</th>
            <th>Language Id</th>--}}
            <th>Schermo</th>
            {{--<th>Value</th>
            <th>Front Section Id</th>
            <th>Language Id</th>--}}
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($screens as $screen)
        <tr>
            <td>{!! $screen->name !!}</td>
            {{--<td>{!! $tagTranslation->value !!}</td>
            <td>{!! $tagTranslation->front_section_id !!}</td>
            <td>{!! $tagTranslation->language_id !!}</td>--}}
            <td>
                {!! Form::open(['route' => ['admin.tagTranslations.destroy', $screen->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{--<a href="{!! route('admin.tagTranslations.show', [$screen->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>--}}
                    {{--<a href="{!! route('admin.tagTranslations.edit', [$screen->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>--}}
                    <a href="{!! route('admin.tagTranslations.beforeEdit', [$screen->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {{--{!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>