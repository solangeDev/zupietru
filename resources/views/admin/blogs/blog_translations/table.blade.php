<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="blogTranslations-table">
    <thead>
        <tr>
            <th>Blog Id</th>
            <th>Language Id</th>
            <th>{{ $tags['back_general_title'] }}</th>
            <th>{{ $tags['back_general_subtitle'] }}</th>
            <th>{{ $tags['back_general_description'] }}</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($blogTranslations as $blogTranslation)
        <tr>
            <td>{!! $blogTranslation->blog_id !!}</td>
            <td>{!! $blogTranslation->language_id !!}</td>
            <td>{!! $blogTranslation->title !!}</td>
            <td>{!! $blogTranslation->subtitle !!}</td>
            <td>{!! $blogTranslation->description !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.blogTranslations.destroy', $blogTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.blogTranslations.show', [$blogTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.blogTranslations.edit', [$blogTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>