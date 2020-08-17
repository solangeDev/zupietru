<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $request->id !!}</p>
</div>

<!-- Checkin Date Field -->
<div class="form-group">
    {!! Form::label('checkin_date', 'Checkin Date:') !!}
    <p>{!! $request->checkin_date !!}</p>
</div>

<!-- Checkout Date Field -->
<div class="form-group">
    {!! Form::label('checkout_date', 'Checkout Date:') !!}
    <p>{!! $request->checkout_date !!}</p>
</div>

<!-- Persons Amount Field -->
<div class="form-group">
    {!! Form::label('persons_amount', 'Persons Amount:') !!}
    <p>{!! $request->persons_amount !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $request->user_id !!}</p>
</div>

<!-- No Register User Name Field -->
<div class="form-group">
    {!! Form::label('no_register_user_name', 'No Register User Name:') !!}
    <p>{!! $request->no_register_user_name !!}</p>
</div>

<!-- No Register User Email Field -->
<div class="form-group">
    {!! Form::label('no_register_user_email', 'No Register User Email:') !!}
    <p>{!! $request->no_register_user_email !!}</p>
</div>

<!-- No Register User Phone Field -->
<div class="form-group">
    {!! Form::label('no_register_user_phone', 'No Register User Phone:') !!}
    <p>{!! $request->no_register_user_phone !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $request->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $request->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $request->deleted_at !!}</p>
</div>

