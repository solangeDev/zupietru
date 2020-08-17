<div class="table-responsive">
<table class="table table-responsive table-hover widget" id="productTranslations-table">
    <thead>
        <tr>
            <th>{{ $tags['back_general_id'] }}</th>
            <th>{{ $tags['back_general_name'] }}</th>
            <th>Price</th>
            <th>Tax</th>
            {{--<th>{{ $tags['back_general_description'] }}</th>--}}
            <th>{{ $tags['back_product_categories_title'] }}</th>
            <th>{{ $tags['back_product_subcategories_title'] }}</th>
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody class="widget-extra-full">
    @foreach($productTranslations as $productTranslation)
        <tr>
            <td>{!! $productTranslation->product->id !!}</td>
            <td>{!! $productTranslation->name !!}</td>
            <td>{!! $productTranslation->product->price !!}</td>
            <td>{!! $productTranslation->product->tax!!}</td>
            {{--<td>{!! $productTranslation->description !!}</td>--}}
            <td>{!! $productTranslation->product->productSubcategory->productCategory->itemByLanguage(\App::getLocale())->name !!}</td>
            <td>{!! $productTranslation->product->productSubcategory->itemByLanguage(\App::getLocale())->name !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.products.destroy', $productTranslation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.products.show', [$productTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('admin.products.edit', [$productTranslation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>