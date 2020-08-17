<div id="galery-image-backoffice_storage" class="carousel slide">
       {{--<input type="hidden" value="{{ csrf_token() }}" name="token">--}}
        <input type="hidden" value="{{ $object->id }}" name="id_object">
        <div class="carousel-inner">
            @if($galery== null)
                <div class="well text-center">Nessuna immagine trovata.</div>
            @else
                @foreach($galery->chunk(3) as $key => $imageTres)
                    <div class="{{($key==0 )? 'active': ''}} item gallery">
                        <div class="gallery" data-toggle="lightbox-gallery">
                            <div class="row">
                                @foreach($imageTres as $image)
                                    <div class="col-sm-4 gallery-image">
                                        <img src="{{ asset('storage/multimedia/'.$image->name) }}" alt="image" onclick="document.getElementById('modal01').style.display='block'" class="w3-hover-opacity">
                                        <div class="gallery-image-options text-center">
                                           {{-- <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-primary"
                                               data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>--}}
                                            <a href="{{ asset('storage/multimedia/'.$image->name) }}"
                                               data-dismiss="modal" data-toggle="modal"
                                               title="Questo è un testo informativo sull'immagine"
                                               class="gallery-link btn btn-sm btn-primary"
                                               >
                                            <i class="fa fa-eye"></i>
                                                Vista</a>
                                            <a href="#" class="btn btn-sm btn-alt btn-primary" data-toggle="tooltip"
                                               title="Selezionare">{!! Form::checkbox('images_id[]', $image->id,null) !!}</a>
                                            {{--<a href="{{ route($ruta, ['image_module' => $image->id,'id' => $id]) }}" class="btn btn-sm btn-alt btn-primary" data-toggle="tooltip" title="Rimuovere"><i class="fa fa-times"></i></a>--}}
                                        </div>
                                    </div>
                                    @include('admin.modal_galery.imgStore', ['image' => $image->name])
                                @endforeach
                            </div>
                        </div>
                    </div>
            @endforeach
        @endif
        <!-- Controls -->
            <a class="left carousel-control no-hover" href="#galery-image-backoffice_storage" data-slide="prev">
                <span><i class="fa fa-chevron-left"></i></span>
            </a>
            <a class="right carousel-control no-hover" href="#galery-image-backoffice_storage" data-slide="next">
                <span><i class="fa fa-chevron-right"></i></span>
            </a>
            <!-- END Controls -->
        </div>
        {{--<h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route($ruta, ['id' => $id]) !!}">Aggiungere</a>
        </h1>--}}
        {{--<div class="modal-footer">
            <button type="button" id="modal" class="btn btn-primary pull-right">Aggiungere</button>
        </div>--}}
        <div class="form-group col-sm-12 pull-right">
            {!! Form::submit('Aggiungere', ['class' => 'btn btn-primary']) !!}
        </div>
</div>