<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $blogComment->id !!}</p>
</div>

<!-- Comment Field -->
<div class="form-group">
    {!! Form::label('comment', 'Comment:') !!}
    <p>{!! $blogComment->comment !!}</p>
</div>

<!-- Blog Id Field -->
<div class="form-group">
    {!! Form::label('blog_id', 'Blog Id:') !!}
    <p>{!! $blogComment->blog_id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $blogComment->user_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $blogComment->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $blogComment->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $blogComment->deleted_at !!}</p>
</div>

