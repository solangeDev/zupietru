@extends('layouts.admin.app')
@section('content')
<section class="content-header">
    <h1 class="pull-left">Caricare immagine</h1>
    {{--<h1 class="pull-right">
       <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('admin.multimedia.create') !!}">Add New</a>
    </h1>--}}
</section><br>
    <div class="panel-body">

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
            {{--<div class="box box-primary">
                <div class="box-body">
                        @include('admin.utils.multimedia.table')
                </div>
            </div>--}}
            <div class="text-center">
                <div class="col-md-12">
                    <h1 class="pull-left">Cerca nuova immagine</h1><br><br><br><br>
                        <div class="form-group pull-left">
                                <a href="#modal-regular2" class="btn btn-success" data-toggle="modal" title="Premi per aggiungere una nuova immagine per questa suite">
                                    <i class="fa fa-file-image-o"></i>
                                </a>
                        </div>
                </div>
                <div class="col-md-12">
                    <h1 class="pull-left">Immagini nello Store</h1>
                    @if(!empty($filesDB))
                        @if(!empty($object))
                            {!! Form::open(['route' => 'admin.modal_galery.galery.saveGaleryOfStorage']) !!}
                                @include('admin.modal_galery.galeryStorage', ['galery' => $filesDB,'ruta' => 'admin.modal_galery.galery.saveGaleryOfStorage','id' => $object->id])
                            {!! Form::close() !!}
                        @endif
                    @endif
                </div>
                <div class="col-md-12">
                    <h1 class="pull-left">Immagini già memorizzate</h1>
                    @if(!empty($object))
                        @include('admin.modal_galery.galery', ['galery' => $object->galeryImages(),'ruta' => 'admin.modal_galery.galery.deleteGalery','id' => $object->id])
                        @include('admin.modal_galery.modal-image', ['id' => ['id' => $object->id],'ruta' => 'admin.modal_galery.galery.saveGalery'])
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

