<!-- Language Id Field -->
<div class="form-group {{$errors->has('language_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('language_id', $tags['back_general_language']) !!}
    {!! Form::select('language_id', $languages, null, ['class' => 'form-control']) !!}
    @if ($errors->has('language_id'))
        <span class="help-block">{{ $errors->first('language_id') }}</span>
    @endif
</div>

<!-- Category Field -->
<div class="form-group {{$errors->has('product_category_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('product_category_id', $tags['back_product_categories_title']) !!}
    {!! Form::select('product_category_id', $product_categories, @$productSubcategoryTranslation->productSubcategory->productCategory->id, ['class' => 'form-control', 'placeholder' => $tags['back_general_select']]) !!}
    @if ($errors->has('product_category_id'))
        <span class="help-block">{{ $errors->first('product_category_id') }}</span>
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



<!-- Description Field -->
<div class="form-group {{$errors->has('description') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('description', $tags['back_general_description']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    @if ($errors->has('description'))
        <span class="help-block">{{ $errors->first('description') }}</span>
    @endif
</div>

<!-- Status Field -->
<div class="form-group {{$errors->has('status_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('status_id', $tags['back_general_status']) !!}
    {!! Form::select('status_id', $statuses, @$productSubcategoryTranslation->productSubcategory->status_id, ['class' => 'form-control', 'placeholder' => $tags['back_general_select']]) !!}
    @if ($errors->has('status_id'))
        <span class="help-block">{{ $errors->first('status_id') }}</span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.productSubcategories.index') !!}" class="btn btn-default">{{ $tags['back_general_back'] }}</a>
</div>
