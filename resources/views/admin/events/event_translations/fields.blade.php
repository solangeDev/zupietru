@include('admin.utils.modal.modal', [
    'template' => 'admin.utils.seo_translations.fields',
    'prefix' => 'event_',
    'utils_modal_title' => $tags['back_seos_modal_title']
])

@if (isset($eventTranslation))
    {!! Form::hidden('id', null) !!}
    {!! Form::hidden('event_id', null) !!}
    {!! Form::hidden('_method', 'PATCH') !!}
    {!! Form::hidden('event_id', null) !!}
    {!! Form::hidden('seos_id', $eventTranslation->event->row->seo->id) !!}
@endif

<!-- Language Id Field -->
<div class="form-group col-sm-6 col-sm-offset-3 {{ $errors->has('language_id') ? 'has-error' : '' }}">
    {!! Form::label('language_id', $tags['back_general_language'], ['class' => 'control-label']) !!}
    {!! Form::select('language_id', $lang, @$eventTranslation->language_id, ['class' => 'select-chosen', 'data-placeholder' => 'Seleccione el lenguaje.', 'placeholder' => 'Seleccione el lenguaje.']) !!}
    @if ($errors->has('language_id'))
        <span class="help-block">{{ $errors->first('language_id') }}</span>
    @endif
</div>

<!-- EventCategory Field -->
<div class="form-group {{$errors->has('event_category_id') ? 'has-error' : ''}} col-sm-6 col-sm-offset-3">
    {!! Form::label('event_category_id', $tags['back_event_categories_title'], ['class' => 'control-label']) !!}
    {!! Form::select('event_category_id', $event_category, @$eventTranslation->event->eventCategory->id, ['class' => 'select-chosen', 'data-placeholder' => $tags['back_general_select'], 'placeholder' => $tags['back_general_select']]) !!}
    @if ($errors->has('event_category_id'))
        <span class="help-block">{{ $errors->first('event_category_id') }}</span>
    @endif
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 col-sm-offset-3 {{ $errors->has('title') ? 'has-error' : '' }}">
    {!! Form::label('title', $tags['back_general_title'], ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    @if ($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
    @endif
</div>

<!-- Subtitle Field -->
<div class="form-group col-sm-6 col-sm-offset-3 {{ $errors->has('subtitle') ? 'has-error' : '' }}">
    {!! Form::label('subtitle', $tags['back_general_subtitle'], ['class' => 'control-label']) !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
    @if ($errors->has('subtitle'))
        <span class="help-block">{{ $errors->first('subtitle') }}</span>
    @endif
</div>

<!-- Description Field -->
<div class="form-group col-sm-6 col-sm-offset-3 {{ $errors->has('description') ? 'has-error' : '' }}">
    {!! Form::label('description', $tags['back_general_description'], ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    @if ($errors->has('description'))
        <span class="help-block">{{ $errors->first('description') }}</span>
    @endif
</div>

<div class="form-group col-sm-6 col-sm-offset-3 {{ $errors->has('start_date') || $errors->has('end_date') ? 'has-error' : '' }}">
    <label class="control-label">Select Date</label>
    <div class="input-group input-daterange" data-date-format="dd/mm/yyyy">
        @php 
            if(isset($eventTranslation)){
                $start_date = new DateTime($eventTranslation->event->start_date); 
                $end_date = new DateTime($eventTranslation->event->end_date); 
            }
        @endphp
        {!! Form::text('start_date', isset($start_date)?$start_date->format('d/m/Y'):null, ['class' => 'form-control text-center', 'id' => 'start_date', 'placeholder' => 'Start']) !!}
        <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
        {!! Form::text('end_date', isset($end_date)?$end_date->format('d/m/Y'):null, ['class' => 'form-control text-center', 'id' => 'end_date', 'placeholder' => 'End']) !!}
    </div>
    @if ($errors->has('description'))
        <span class="help-block">{{ $errors->first('start_date') }} {{ $errors->first('end_date') }}</span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-6 col-sm-offset-3 {{ $errors->has('language_id') ? 'has-error' : '' }}">
    {!! Form::submit($tags['back_general_save'], ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.events.index') !!}" class="btn btn-default">{{ $tags['back_general_back'] }}</a>
</div>

