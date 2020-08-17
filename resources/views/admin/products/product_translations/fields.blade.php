@include('admin.utils.modal.modal', [
    'template' => 'admin.utils.seo_translations.fields',
    'prefix' => 'event_',
    'utils_modal_title' => $tags['back_seos_modal_title']
])

@if(isset($productTranslation))
    {!! Form::hidden('seos_id', @$productTranslation->product->row->seo->id) !!}
@endif
<!-- Language Id Field -->
<div class="form-group {{$errors->has('language_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('language_id', $tags['back_general_language']) !!}
    {!! Form::select('language_id', $languages, null, ['class' => 'form-control']) !!}
    @if ($errors->has('language_id'))
        <span class="help-block">{{ $errors->first('language_id') }}</span>
    @endif
</div>

<!-- Name Field -->
<div class="form-group {{$errors->has('name') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('name', $tags['back_general_name']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <span class="help-block">{{ $errors->first('name') }}</span>
    @endif
</div>

<!-- Description Field -->
<div class="form-group {{$errors->has('description') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('description', $tags['back_general_description']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    @if ($errors->has('description'))
        <span class="help-block">{{ $errors->first('description') }}</span>
    @endif
</div>

<!-- Price Field -->
<div class="form-group {{$errors->has('price') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', @$productTranslation->product->price, ['class' => 'form-control']) !!}
    @if ($errors->has('price'))
        <span class="help-block">{{ $errors->first('price') }}</span>
    @endif
</div>

<!-- Tax Field -->
<div class="form-group {{$errors->has('tax') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('tax', 'Tax:') !!}
    {!! Form::number('tax', @$productTranslation->product->tax, ['class' => 'form-control']) !!}
    @if ($errors->has('tax'))
        <span class="help-block">{{ $errors->first('tax') }}</span>
    @endif
</div>

<!-- For Delivery Field -->
<div class="form-group {{$errors->has('for_delivery') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('for_delivery', 'For Delivery:') !!}
    {!! Form::select('for_delivery', [1 => 'delivery',2=>'store'], @$productTranslation->product->for_delivery, ['class' => 'form-control', 'placeholder' => $tags['back_general_select']]) !!}
    @if ($errors->has('for_delivery'))
        <span class="help-block">{{ $errors->first('for_delivery') }}</span>
    @endif
</div>

<!-- Brand Id Field -->
<div class="form-group {{$errors->has('brand_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('brand_id', $tags['back_brand_title']) !!}
    {!! Form::select('brand_id', $brands, @$productTranslation->product->brand_id, ['class' => 'form-control', 'placeholder' => $tags['back_general_select']]) !!}
    @if ($errors->has('brand_id'))
        <span class="help-block">{{ $errors->first('brand_id') }}</span>
    @endif
</div>

<!-- Category Field -->
<div class="form-group {{$errors->has('product_category_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('product_category_id', $tags['back_product_categories_title']) !!}
    {!! Form::select('product_category_id', $product_categories,  @$productTranslation->product->productSubcategory->productCategory->id, ['class' => 'form-control', 'placeholder' => $tags['back_general_select']]) !!}
    @if ($errors->has('product_category_id'))
        <span class="help-block">{{ $errors->first('product_category_id') }}</span>
    @endif
</div>

<!-- Subategory Field -->
<div class="form-group {{$errors->has('subcategory_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('subcategory_id', $tags['back_product_subcategories_title']) !!}
    {!! Form::select('subcategory_id', $product_subcategories,  @$productTranslation->product->subcategory_id, ['class' => 'form-control', 'placeholder' => $tags['back_general_select']]) !!}
    @if ($errors->has('subcategory_id'))
        <span class="help-block">{{ $errors->first('subcategory_id') }}</span>
    @endif
</div>

<!-- Status Field -->
<div class="form-group {{$errors->has('status_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('status_id', $tags['back_general_status']) !!}
    {!! Form::select('status_id', $statuses, @$productTranslation->product->status_id, ['class' => 'form-control', 'placeholder' => $tags['back_general_select']]) !!}
    @if ($errors->has('status_id'))
        <span class="help-block">{{ $errors->first('status_id') }}</span>
    @endif
</div>


{{--@isset($productTranslation)
    <div class="col-sm-6 col-sm-offset-3">
        <div class="text-center"><h2>{{ $tags['back_product_presentations_title'] }}</h2></div>
        <a href="#modal-index-product_presentations_products" class="btn btn-success" data-toggle="modal" title="">
            <i class="fa fa-file-image-o"></i>
        </a>
    </div>

    <!-- begin::modal-index-product_presentations_products -->
    <div id="modal-index-product_presentations_products" style="overflow-y: scroll;" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">{{ $tags['back_product_presentations_title'] }}</h3>
                </div>
                <div class="modal-body">

                    @include('admin.products.product_presentation_products.table', ['productPresentationProducts' => $productPresentationProducts])

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">{{ $tags['back_general_cancel'] }}</button>
                    <a href="{{ route('admin.productPresentationProducts.create', ['product' => $productTranslation->product->id]) }}" class="btn btn-sm btn-primary pull-right" style="margin-bottom: 5px" id="">{{ $tags['back_general_addnew'] }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end::modal-index-product_presentations_products -->
@endisset--}}


<!-- Submit Field -->
<div class="col-sm-6 col-sm-offset-3">
    {!! Form::submit($tags['back_general_save'], ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.products.index') !!}" class="btn btn-default">{{ $tags['back_general_back'] }}</a>
</div>


<input type="hidden" id="modal_presentation" value="{{ $modal_presentation }}">
