<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $order->id !!}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{!! $order->code !!}</p>
</div>

<!-- Subtotal Field -->
<div class="form-group">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{!! $order->subtotal !!}</p>
</div>

<!-- Tax Field -->
<div class="form-group">
    {!! Form::label('tax', 'Tax:') !!}
    <p>{!! $order->tax !!}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <p>{!! $order->total !!}</p>
</div>

<!-- Delivery Address Field -->
<div class="form-group">
    {!! Form::label('delivery_address', 'Delivery Address:') !!}
    <p>{!! $order->delivery_address !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $order->user_id !!}</p>
</div>

<!-- Status Id Field -->
<div class="form-group">
    {!! Form::label('status_id', 'Status Id:') !!}
    <p>{!! $order->status_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $order->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $order->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $order->deleted_at !!}</p>
</div>

