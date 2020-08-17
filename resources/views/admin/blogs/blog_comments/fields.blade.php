<!-- Comment Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('comment', 'Comment:') !!}
    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Blog Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('blog_id', 'Blog Id:') !!}
    {!! Form::number('blog_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.blogComments.index') !!}" class="btn btn-default">Cancel</a>
</div>
