<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="productCategoryTranslations-table">
    <thead>
        <tr>
            <th>{{ $tags['back_general_id'] }}</th>
            <th>{{ $tags['back_general_name'] }}</th>
            <th>{{ $tags['back_general_description'] }}</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($productCategoryTranslations as $productCategoryTranslation)
        <tr>
            <td>{!! $productCategoryTranslation->productCategory->id !!}</td>
            <td>{!! $productCategoryTranslation->name !!}</td>
            <td>{!! $productCategoryTranslation->description !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.productCategories.destroy', $productCategoryTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.productCategories.show', [$productCategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.productCategories.edit', [$productCategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>