<!-- Checkin Date Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('checkin_date', 'Checkin Date:') !!}
    {!! Form::date('checkin_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Checkout Date Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('checkout_date', 'Checkout Date:') !!}
    {!! Form::date('checkout_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Persons Amount Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('persons_amount', 'Persons Amount:') !!}
    {!! Form::number('persons_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Booking Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('booking_id', 'Booking Id:') !!}
    {!! Form::number('booking_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Row Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('row_id', 'Row Id:') !!}
    {!! Form::number('row_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Method Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('payment_method_id', 'Payment Method Id:') !!}
    {!! Form::number('payment_method_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.bookingDetails.index') !!}" class="btn btn-default">Cancel</a>
</div>
