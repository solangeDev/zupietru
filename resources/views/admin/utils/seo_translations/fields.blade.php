<div class="form-group">
	<button type="button" class="btn btn-success" id="add-input"><i class="fa fa-plus-circle"></i></button>
</div>

@if(isset($seos))
	@foreach($seos as $seo)
		<div class="input-seos">
		    {!! Form::hidden('seo_id[]', $seo->id, ['class' => 'form-control']) !!}

			<!-- Tag Field -->
			<div class="form-group col-sm-5 back_general_title">
			    {!! Form::label('tag', $tags['back_general_title']) !!}
			    {!! Form::text('seo_tag[]', $seo->tag, ['class' => 'form-control']) !!}
			</div>

			<!-- Value Field -->
			<div class="form-group col-sm-5 back_general_description">
			    {!! Form::label('value', $tags['back_general_description']) !!}
			    {!! Form::text('seo_value[]', $seo->value, ['class' => 'form-control as']) !!}
			</div>
			
			<div class="form-group col-sm-2">
			    {!! Form::label('', 'Eliminar') !!}
				{!! Form::button('X', ['class' => 'btn btn-danger seo_delete', 'value' => $seo->id]) !!}
			</div>
		</div>
	@endforeach
@endif

<div id="input-seos">
	<div class="new-input container-input">
		<div class="form-group col-sm-5 back_general_title_0">
		    {!! Form::label('tag', $tags['back_general_title']) !!}
		    {!! Form::text('seo_tag[]', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-sm-5 back_general_description_0">
		    {!! Form::label('value', $tags['back_general_description']) !!}
		    {!! Form::text('seo_value[]', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-sm-2">
		    {!! Form::label('', 'Eliminar') !!}
			{!! Form::button('X', ['class' => 'btn btn-danger remove_input']) !!}
		</div>
	</div>
</div>

@if($prefix=='seos')
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.seoTranslations.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
