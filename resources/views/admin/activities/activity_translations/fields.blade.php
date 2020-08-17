<!-- Activity Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('activity_id', 'Activity Id:') !!}
    {!! Form::number('activity_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Language Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('language_id', 'Language Id:') !!}
    {!! Form::number('language_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtitle Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('subtitle', 'Subtitle:') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.activityTranslations.index') !!}" class="btn btn-default">Cancel</a>
</div>
