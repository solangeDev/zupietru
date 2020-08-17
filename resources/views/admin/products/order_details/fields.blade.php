<div class="row hidden real-product_presentations">
    <!-- Subcategory Field -->
    <div class="form-group class-p {{$errors->has('product_presentation_id') ? 'has-error' : ''}} div-product col-sm-3">
        {!! Form::label('product_presentation_id', $tags['back_products_title']) !!}
        {!! Form::select('product_presentation_id[]', $selectProducts,  null, ['class' => 'chosen select-product form-control', 'data-placeholder' => $tags['back_general_select'], 'placeholder' => $tags['back_general_select']]) !!}
        @if ($errors->has('product_presentation_id'))
            <span class="help-block">{{ $errors->first('product_presentation_id') }}</span>
        @endif
    </div>

    <!-- Product Field -->
    <div class="form-group class-p {{$errors->has('product_presentation_id') ? 'has-error' : ''}} div-product col-sm-4">
        {!! Form::label('product_presentation_id', $tags['back_products_title']) !!}
        {!! Form::select('product_presentation_id[]', $selectProducts,  null, ['class' => 'chosen select-product form-control', 'data-placeholder' => $tags['back_general_select'], 'placeholder' => $tags['back_general_select']]) !!}
        @if ($errors->has('product_presentation_id'))
            <span class="help-block">{{ $errors->first('product_presentation_id') }}</span>
        @endif
    </div>

    <!-- Products Amount Field -->
    <div class="form-group div-product_count col-sm-2">
        {!! Form::label('products_amount', 'Amount:') !!}
        {!! Form::number('products_amount[]', null, ['class' => 'form-control input-product_count']) !!}
    </div>

    <!-- Products Price Field -->
    <div class="form-group div-product_count col-sm-2">
        {!! Form::label('products_amount', 'Price:') !!}
        <p style="margin-bottom: 10px; margin-top: 10px;">€500.00</p>
    </div>

    <!-- Products Price Field -->
    {!! Form::select('product_price[]', $hiddenProductsPrices,  null, ['class' => 'hidden select-product_price', 'placeholder' => 'NA']) !!}

    <!-- Products IVA Field -->
    {!! Form::select('product_iva[]', $hiddenProductsIvas,  null, ['class' => 'hidden select-product_iva', 'placeholder' => 'NA']) !!}

    <!-- Delete button -->
    <div class="form-group col-sm-1 div-remove-product_presentations">
        {!! Form::label('', '&nbsp;') !!}
        <a href="javascript:void(0)" class="btn btn-danger remove-product_presentations"><i class="fa fa-trash"></i></a>
    </div>

    {{-- <!-- Belongs To Order Detail Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('belongs_to_order_detail_id', 'Belongs To') !!}
        {!! Form::number('belongs_to_order_detail_id', null, ['class' => 'form-control']) !!}
    </div> --}}
</div>

{{-- <!-- Order Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::number('order_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Presentation Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('product_presentation_id', 'Product Presentation Id:') !!}
    {!! Form::number('product_presentation_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Products Amount Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('products_amount', 'Products Amount:') !!}
    {!! Form::number('products_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Belongs To Order Detail Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('belongs_to_order_detail_id', 'Belongs To Order Detail Id:') !!}
    {!! Form::number('belongs_to_order_detail_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.orderDetails.index') !!}" class="btn btn-default">Cancel</a>
</div> --}}
