@extends('layouts.admin.app')
@section('css')
    <style type="text/css">
        #exTab1 .tab-content {
        /*color : white;*/
        background-color: whitesmoke;
        padding : 5px 15px;
        }

        #exTab2 h3 {
        /*color : white;*/
        /*background-color: white;*/
        padding : 5px 15px;
        }

        /* remove border radius for the tab */

        #exTab1 .nav-pills > li > a {
        border-radius: 0;
        }

        /* change border radius for the tab , apply corners on top*/

        #exTab3 .nav-pills > li > a {
        border-radius: 4px 4px 0 0 ;
        }

        #exTab3 .tab-content {
        /*color : white;*/
        /*background-color: white;*/
        padding : 5px 15px;
        }
</style>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Tag traduzione
        </h1>
   </section>

   <div class="content">
       @include('adminlte-templates::common.errors')
       @if( $tag == 0 )
           {!! Form::model($frontSections, ['route' => ['admin.tagTranslations.preparedEdit', 1], 'method' => 'patch', 'class' => 'form-bordered','id','clickable-wizard']) !!}

                <div id="exTab1" class="container">
                    <div class="form-group col-sm-12">
                       <h1>
                           Pantaloni: {{$screen->name}}
                       </h1>
                    </div>
                    @if(!empty($frontSections))
                        {!! Form::hidden('screen_name', $screen->name, ['class' => 'form-control']) !!}
                        {!! Form::hidden('screen_id', $screen->id, ['class' => 'form-control']) !!}
                       <div class="form-group col-sm-12" style="width: 50%">
                               {!! Form::label('front_section_id', 'Selezionare sezione pantaloni:') !!}
                                   <select class="form-control" id="front_section_id[]" name="front_section_id[]">
                                       @foreach($frontSections as $frontSection)
                                           <option value="{{$frontSection->id}}">{{$frontSection->name}}</option>
                                       @endforeach
                                   </select>
                           <!-- Submit Field -->
                           <div class="form-group col-sm-12">
                               {!! Form::submit('Ricerca', ['class' => 'btn btn-primary']) !!}
                               <a href="{!! route('admin.tagTranslations.index') !!}" class="btn btn-default">Cancel</a>
                           </div>
                       </div>
                    @endif
               </div>
           {!! Form::close() !!}
       @else
           {!! Form::model($tagTranslations, ['route' => ['admin.tagTranslations.update', 1], 'method' => 'post', 'class' => 'form-bordered','id','clickable-wizard']) !!}
                    <?php $cont=1;
                        $count=count($languages);
                    ?>
                   <!-- First Step -->
                       <div id="exTab1" class="container">
                                        <ul  class="nav nav-pills">
                                           @foreach($languages->chunk(1) as $key => $languagesChunk)
                                               @foreach($languagesChunk as $language)
                                                   <?php if($cont==1) { ?>
                                                   <li class="active">
                                                   <?php } else {?>
                                                   <li>
                                                   <?php }  $cont=$cont+1; ?>
                                                       {{--<a href="javascript:void(0)" data-gotostep="clickable-{{ $countLanguage }}"><strong>{{ $language->name }}</strong></a>--}}
                                                       <a  href="#{{ $language->code }}" data-toggle="tab">{{ $language->name }}</a>
                                                   </li>
                                               @endforeach
                                            @endforeach
                                            <!-- END First Step -->
                                        </ul>
                                        <?php $cont=1;?>
                                       <div class="tab-content clearfix">
                                       @if(!empty($screen))
                                           <!-- Screens Field -->
                                               <div class="form-group col-sm-6" style="width:50%">
                                                   {!! Form::label('screen', 'Pantaloni: ') !!}
                                                   {!! Form::label('screen_name', $screen->name, ['class' => 'form-control']) !!}
                                                   {!! Form::hidden('screen_id', $screen->id, ['class' => 'form-control']) !!}
                                               </div>
                                       @endif
                                       @if(!empty($frontSection))
                                       <!-- Front Section Id Field -->
                                           <div class="form-group col-sm-6" style="width:50%">
                                               {!! Form::label('front_section', 'Sezione pantaloni:') !!}
                                               {!! Form::label('front_name', $frontSection->name, ['class' => 'form-control']) !!}
                                               {!! Form::hidden('front_section_id', $frontSection->id, ['class' => 'form-control']) !!}
                                           </div>
                                       @endif
                                                   @foreach($languages->chunk(1) as $key => $languagesChunk)
                                                       @foreach($languagesChunk as $language)
                                                       <?php
                                                           $active="";
                                                            if($cont==1) {
                                                                $active="active";
                                                            }
                                                            $cont=$cont+1; ?>
                                                            <div class="tab-pane {{$active}}" id="{{ $language->code }}">
                                                                @include('admin.utils.tag_translations.fields',['id_language' => $language->id ])
                                                            </div>
                                                       @endforeach
                                                   @endforeach
                                       </div>
                           <!-- Submit Field -->
                           <div class="form-group col-sm-12">
                               {!! Form::submit('Salvare', ['class' => 'btn btn-primary']) !!}
                               <a href="{!! route('admin.tagTranslations.index') !!}" class="btn btn-default">Cancel</a>
                           </div>
                                <!-- END Step Info -->
                            </div>
                       {{--@endfor--}}
                    </div>
           {!! Form::close() !!}
        @endif
   </div>
@endsection