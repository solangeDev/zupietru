            @foreach($tagTranslations as $tagTranslation)
                @if ($tagTranslation->language_id==$id_language)
                    <!-- Tag Field -->
                    <div class="form-group col-sm-12" style="width:55%">
                        {!! Form::label('tag', 'Etichetta:') !!}
                        {!! Form::text('tag[]', $tagTranslation->tag, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                    <!-- Value Field -->
                    <div class="form-group col-sm-12 col-lg-12" style="width:50%">
                        {!! Form::label('value', 'Valore:') !!}
                        {!! Form::textarea('value[]', $tagTranslation->value, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::hidden('tagTranslation_id[]', $tagTranslation->id, ['class' => 'form-control']) !!}
                    <!-- Language Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::hidden('language_id[]', $id_language, ['class' => 'form-control']) !!}
                    </div>
                @endif
            @endforeach