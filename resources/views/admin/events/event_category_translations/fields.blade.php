<!-- Language Id Field -->
<div class="form-group {{$errors->has('language_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('language_id', $tags['back_general_language']) !!}
    {!! Form::select('language_id', $languages, null, ['class' => 'form-control']) !!}
    @if ($errors->has('language_id'))
        <span class="help-block">{{ $errors->first('language_id') }}</span>
    @endif
</div>

<!-- Name Field -->
<div class="form-group {{$errors->has('name') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('name', $tags['back_general_name']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <span class="help-block">{{ $errors->first('name') }}</span>
    @endif
</div>

<!-- Code Field -->
<div class="form-group {{$errors->has('code') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('code', $tags['back_general_code']) !!}
    {!! Form::text('code', @$code,['class' => 'form-control']) !!}
    @if ($errors->has('code'))
        <span class="help-block">{{ $errors->first('code') }}</span>
    @endif
</div>

<!-- Description Field -->
<div class="form-group {{$errors->has('description') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('description', $tags['back_general_description']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    @if ($errors->has('description'))
        <span class="help-block">{{ $errors->first('description') }}</span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit($tags['back_general_save'], ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.eventCategories.index') !!}" class="btn btn-default">{{ $tags['back_general_back'] }}</a>
</div>
