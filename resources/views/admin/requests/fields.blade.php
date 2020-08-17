<!-- Checkin Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('checkin_date', 'Checkin Date:') !!}
    {!! Form::date('checkin_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Checkout Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('checkout_date', 'Checkout Date:') !!}
    {!! Form::date('checkout_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Persons Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('persons_amount', 'Persons Amount:') !!}
    {!! Form::number('persons_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- No Register User Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_register_user_name', 'No Register User Name:') !!}
    {!! Form::text('no_register_user_name', null, ['class' => 'form-control']) !!}
</div>

<!-- No Register User Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_register_user_email', 'No Register User Email:') !!}
    {!! Form::text('no_register_user_email', null, ['class' => 'form-control']) !!}
</div>

<!-- No Register User Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_register_user_phone', 'No Register User Phone:') !!}
    {!! Form::text('no_register_user_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit($tags['back_general_save'], ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.requests.index') !!}" class="btn btn-default">{{ $tags['back_general_back'] }}</a>
</div>
