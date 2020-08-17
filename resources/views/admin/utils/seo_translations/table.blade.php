<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="seoTranslations-table">
    <thead>
        <tr>
            <th>{{ $tags['back_general_title'] }}</th>
        <th>{{ $tags['back_general_description'] }}</th>
        <th>Author</th>
        <th>Robots</th>
        <th>Subject</th>
        <th>Language</th>
        <th>Keywords</th>
        <th>Seo Id</th>
        <th>Language Id</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($seoTranslations as $seoTranslation)
        <tr>
            <td>{!! $seoTranslation->title !!}</td>
            <td>{!! $seoTranslation->description !!}</td>
            <td>{!! $seoTranslation->author !!}</td>
            <td>{!! $seoTranslation->robots !!}</td>
            <td>{!! $seoTranslation->subject !!}</td>
            <td>{!! $seoTranslation->language !!}</td>
            <td>{!! $seoTranslation->keywords !!}</td>
            <td>{!! $seoTranslation->seo_id !!}</td>
            <td>{!! $seoTranslation->language_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.seoTranslations.destroy', $seoTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.seoTranslations.show', [$seoTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.seoTranslations.edit', [$seoTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>