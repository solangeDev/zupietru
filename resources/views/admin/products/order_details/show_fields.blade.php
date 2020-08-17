<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $orderDetail->id !!}</p>
</div>

<!-- Order Id Field -->
<div class="form-group">
    {!! Form::label('order_id', 'Order Id:') !!}
    <p>{!! $orderDetail->order_id !!}</p>
</div>

<!-- Product Presentation Id Field -->
<div class="form-group">
    {!! Form::label('product_presentation_id', 'Product Presentation Id:') !!}
    <p>{!! $orderDetail->product_presentation_id !!}</p>
</div>

<!-- Products Amount Field -->
<div class="form-group">
    {!! Form::label('products_amount', 'Products Amount:') !!}
    <p>{!! $orderDetail->products_amount !!}</p>
</div>

<!-- Belongs To Order Detail Id Field -->
<div class="form-group">
    {!! Form::label('belongs_to_order_detail_id', 'Belongs To Order Detail Id:') !!}
    <p>{!! $orderDetail->belongs_to_order_detail_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $orderDetail->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $orderDetail->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $orderDetail->deleted_at !!}</p>
</div>

