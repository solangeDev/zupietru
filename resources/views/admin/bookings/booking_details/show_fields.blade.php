<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $bookingDetail->id !!}</p>
</div>

<!-- Checkin Date Field -->
<div class="form-group">
    {!! Form::label('checkin_date', 'Checkin Date:') !!}
    <p>{!! $bookingDetail->checkin_date !!}</p>
</div>

<!-- Checkout Date Field -->
<div class="form-group">
    {!! Form::label('checkout_date', 'Checkout Date:') !!}
    <p>{!! $bookingDetail->checkout_date !!}</p>
</div>

<!-- Persons Amount Field -->
<div class="form-group">
    {!! Form::label('persons_amount', 'Persons Amount:') !!}
    <p>{!! $bookingDetail->persons_amount !!}</p>
</div>

<!-- Booking Id Field -->
<div class="form-group">
    {!! Form::label('booking_id', 'Booking Id:') !!}
    <p>{!! $bookingDetail->booking_id !!}</p>
</div>

<!-- Row Id Field -->
<div class="form-group">
    {!! Form::label('row_id', 'Row Id:') !!}
    <p>{!! $bookingDetail->row_id !!}</p>
</div>

<!-- Payment Method Id Field -->
<div class="form-group">
    {!! Form::label('payment_method_id', 'Payment Method Id:') !!}
    <p>{!! $bookingDetail->payment_method_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $bookingDetail->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $bookingDetail->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $bookingDetail->deleted_at !!}</p>
</div>

