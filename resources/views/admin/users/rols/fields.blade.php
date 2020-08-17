<!-- Name Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {!! Form::label('name', $tags['back_role_name'].':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6 col-sm-offset-3">
    {{--!! Form::label('slug', 'Slug:') !!--}}
    {!! Form::hidden('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', $tags['back_role_description'].':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit($tags['back_general_save'], ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.rols.index') !!}" class="btn btn-default">{{ $tags['back_general_cancel'] }}</a>
</div>
