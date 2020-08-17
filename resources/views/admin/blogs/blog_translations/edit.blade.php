@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Blog Translation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($blogTranslation, ['route' => ['admin.blogTranslations.update', $blogTranslation->id], 'method' => 'patch']) !!}

                        @include('admin.blogs.blog_translations.fields')
                           @if(!empty($filesDB))
                               @if(!empty($object))
                                   <div class="row push">
                                       <div class="form-group">
                                           <div class="col-md-6" style="width: 585px">
                                               {{--{!! Form::label('image', 'Caricare immagine:') !!}--}}
                                               <a href="#modal-regular2" class="btn btn-success" data-toggle="modal" title="Premere per aggiungere una nuova immagine per questa Gallerie fotografiche">
                                                   {{--<i class="fa fa-file-image-o"></i>--}} Caricare immagine
                                               </a>
                                           </div>
                                       </div>
                                   </div>
                               @endif
                           @endif
                   {!! Form::close() !!}
               </div>
               @if(!empty($filesDB))
                   @if(!empty($object))
                       @include('admin.utils.multimedia.index', ['id' => ['object' => $object],'filesDB' => $filesDB,'blogTranslation_id' => $blogTranslation->id])
                       {{--{!! Form::open(['route' => 'admin.modal_galery.galery.saveGaleryOfStorage']) !!}
                       @include('admin.modal_galery.galeryStorage', ['galery' => $filesDB,'ruta' => 'admin.modal_galery.galery.saveGaleryOfStorage','id' => $object->id])
                       {!! Form::close() !!}--}}
                   @endif
               @endif
           </div>
       </div>
   </div>
@endsection