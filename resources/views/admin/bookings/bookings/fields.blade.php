<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', $tags['back_general_subtotal']) !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax', $tags['back_general_tax']) !!}
    {!! Form::number('tax', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::select('status_id',$statuses, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.bookings.index') !!}" class="btn btn-default">Cancel</a>
</div>
