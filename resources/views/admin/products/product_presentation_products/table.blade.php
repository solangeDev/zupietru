<div class="table-responsive">
<table class="table table-responsive" id="productPresentationProducts-table">
    <thead>
        <tr>
            <th>{{ $tags['back_general_name'] }}</th>
            <th>Price</th>
            <th>Tax</th>
            {{-- <th>Quantity</th> --}}
            <th>For Delivery</th>
            {{-- <th>Max Quantity Of Sale</th> --}}
            {{-- <th>Min Quantity Of Sale</th> --}}
            <th colspan="3">{{ $tags['back_general_action'] }}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productPresentationProducts as $productPresentationProduct)
        <tr>
            <td>{!! $productPresentationProduct->productPresentation->itemByLanguage(\App::getLocale())->name !!}</td>
            <td>{!! $productPresentationProduct->price !!}</td>
            <td>{!! $productPresentationProduct->tax !!}</td>
            {{-- <td>{!! $productPresentationProduct->product_quantity !!}</td> --}}
            <td>{!! $productPresentationProduct->for_delivery !!}</td>
            {{-- <td>{!! $productPresentationProduct->max_quantity_of_sale !!}</td> --}}
            {{-- <td>{!! $productPresentationProduct->min_quantity_of_sale !!}</td> --}}
            <td>
                {{-- {!! Form::open(['route' => ['admin.productPresentationProducts.destroy', $productPresentationProduct->id], 'method' => 'delete']) !!} --}}
                <div class='btn-group'>
                    {{-- <a href="#modal-show-product_presentations_products" class="btn btn-success" data-toggle="modal" title=""><i class="fa fa-file-image-o"></i></a> --}}
                    {{-- <a href="{!! route('admin.productPresentationProducts.show', [$productPresentationProduct->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a> --}}
                    <a href="{!! route('admin.productPresentationProducts.edit', [$productTranslation->product->id, $productPresentationProduct->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    <a href="{!! route('admin.productPresentationProducts.destroy', [$productPresentationProduct->id]) !!}" class='btn btn-danger btn-xs' onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                    {{-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                </div>
                {{-- {!! Form::close() !!} --}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>


<!-- begin::modal-show-product_presentations_products -->
{{-- @foreach($productPresentationProducts as $productPresentationProduct)
    <div id="modal-show-product_presentations_products" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">{{ $tags['back_product_presentations_title'] }}</h3>
                </div>
                <div class="modal-body">

                    <div class="row">

                        @include('admin.products.product_presentation_products.show_fields')

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">{{ $tags['back_general_cancel'] }}</button>
                </div>
            </div>
        </div>
    </div>
@endforeach --}}
<!-- begin::modal-show-product_presentations_products -->