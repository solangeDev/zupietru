<div class="inputs-register_user real-delivery_address hidden form-group {{$errors->has('back_order_address') ? 'has-error' : ''}} col-sm-8  col-sm-offset-2">
    {!! Form::label('delivery_address-user', $tags['back_order_address']) !!}
    {!! Form::select('delivery_address-user', [],  null, ['class' => 'form-control', 'data-placeholder' => $tags['back_general_select'], 'placeholder' => $tags['back_general_select']]) !!}
    @if ($errors->has('delivery_address'))
        <span class="help-block">{{ $errors->first('delivery_address') }}</span>
    @endif
</div>
