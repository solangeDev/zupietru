<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="productSubcategoryTranslations-table">
    <thead>
        <tr>
            <th>{{ $tags['back_general_id'] }}</th>
            <th>{{ $tags['back_general_name'] }}</th>
            <th>{{ $tags['back_general_description'] }}</th>
            <th>{{ $tags['back_product_categories_title'] }}</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($productSubcategoryTranslations as $productSubcategoryTranslation)
        <tr>
            <td>{!! $productSubcategoryTranslation->productSubcategory->id !!}</td>
            <td>{!! $productSubcategoryTranslation->name !!}</td>
            <td>{!! $productSubcategoryTranslation->description !!}</td>
            <td>{{  $productSubcategoryTranslation->productSubcategory->productCategory->itemByLanguage(\App::getLocale())->name  }}</td>
            <td>
                {!! Form::open(['route' => ['admin.productSubcategories.destroy', $productSubcategoryTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.productSubcategories.show', [$productSubcategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.productSubcategories.edit', [$productSubcategoryTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>