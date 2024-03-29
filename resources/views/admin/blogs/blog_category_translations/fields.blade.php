<!-- Blog Category Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('blog_category_id', 'Blog Category Id:') !!}
    {!! Form::number('blog_category_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Language Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('language_id', 'Language Id:') !!}
    {!! Form::number('language_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.blogCategoryTranslations.index') !!}" class="btn btn-default">Cancel</a>
</div>
