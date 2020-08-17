<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="blogCategoryTranslations-table">
    <thead>
        <tr>
            <th>Blog Category Id</th>
            <th>Language Id</th>
            <th>{{ $tags['back_general_name'] }}</th>
            <th>{{ $tags['back_general_description'] }}</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($blogCategoryTranslations as $blogCategoryTranslation)
        <tr>
            <td>{!! $blogCategoryTranslation->blog_category_id !!}</td>
            <td>{!! $blogCategoryTranslation->language_id !!}</td>
            <td>{!! $blogCategoryTranslation->name !!}</td>
            <td>{!! $blogCategoryTranslation->description !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.blogCategoryTranslations.destroy', $blogCategoryTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.blogCategoryTranslations.show', [$blogCategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.blogCategoryTranslations.edit', [$blogCategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>