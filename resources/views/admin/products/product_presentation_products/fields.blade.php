<!-- Product Presentation Id Field -->
<div class="form-group {{$errors->has('product_presentation_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('product_presentation_id', $tags['back_product_presentations_title']) !!}
    {!! Form::select('product_presentation_id', $product_presentations, null, ['class' => 'form-control', 'placeholder' => $tags['back_general_select']]) !!}
    @if ($errors->has('product_presentation_id'))
        <span class="help-block">{{ $errors->first('product_presentation_id') }}</span>
    @endif
</div>

<!-- Product Presentation Id Field -->
<input type="hidden" name="product_id" value="{{ $product->id }}">

<!-- Price Field -->
<div class="form-group {{$errors->has('price') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
    @if ($errors->has('price'))
        <span class="help-block">{{ $errors->first('price') }}</span>
    @endif
</div>

<!-- Tax Field -->
<div class="form-group {{$errors->has('tax') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('tax', 'Tax:') !!}
    {!! Form::number('tax', null, ['class' => 'form-control']) !!}
    @if ($errors->has('tax'))
        <span class="help-block">{{ $errors->first('tax') }}</span>
    @endif
</div>

<!-- Product Quantity Field -->
<div class="form-group {{$errors->has('product_quantity') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('product_quantity', 'Product Quantity:') !!}
    {!! Form::number('product_quantity', null, ['class' => 'form-control']) !!}
    @if ($errors->has('product_quantity'))
        <span class="help-block">{{ $errors->first('product_quantity') }}</span>
    @endif
</div>

<!-- For Delivery Field -->
<div class="form-group {{$errors->has('for_delivery') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('for_delivery', 'For Delivery:') !!}
    {!! Form::checkbox('for_delivery', 1) !!}
    @if ($errors->has('for_delivery'))
        <span class="help-block">{{ $errors->first('for_delivery') }}</span>
    @endif
</div>

<!-- Max Quantity Of Sale Field -->
<div class="form-group {{$errors->has('max_quantity_of_sale') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('max_quantity_of_sale', 'Max Quantity Of Sale:') !!}
    {!! Form::number('max_quantity_of_sale', null, ['class' => 'form-control']) !!}
    @if ($errors->has('max_quantity_of_sale'))
        <span class="help-block">{{ $errors->first('max_quantity_of_sale') }}</span>
    @endif
</div>

<!-- Min Quantity Of Sale Field -->
<div class="form-group {{$errors->has('min_quantity_of_sale') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('min_quantity_of_sale', 'Min Quantity Of Sale:') !!}
    {!! Form::number('min_quantity_of_sale', null, ['class' => 'form-control']) !!}
    @if ($errors->has('min_quantity_of_sale'))
        <span class="help-block">{{ $errors->first('min_quantity_of_sale') }}</span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <input type="submit" class="btn btn-primary" value="Save">
    <a href="{!! route('admin.products.edit', ['product' => $product->id, 'modal_presentation' => 'show']) !!}" class="btn btn-default">{{ $tags['back_general_back'] }}</a>
</div>