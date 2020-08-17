<div id="galery-image-backoffice" class="carousel slide">
    <div class="carousel-inner">
        @if($galery== null)
            <div class="well text-center">Nessuna immagine trovata.</div>
        @else
            @foreach($galery->chunk(3) as $key => $imageTres)
                <div class="{{($key==0 )? 'active': ''}} item gallery">
                    <div class="gallery" data-toggle="lightbox-gallery">
                        <div class="row">
                            @foreach($imageTres as $image)
                                @if($image->multimedia!= null)
                                    <div class="col-sm-4 gallery-image">
                                        <img src="{{ asset('storage/multimedia/'.$image->multimedia->name) }}" alt="image">
                                        <div class="gallery-image-options text-center">
                                            {{--<a href="{{ asset('images/img1.jpg') }}" data-toggle="lightbox-image" title="This is some info text about the image" class="gallery-link btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>

                                            <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>--}}
                                            <a href="{{ asset('storage/multimedia/'.$image->multimedia->name) }}"
                                               data-dismiss="modal" data-toggle="modal"
                                               {{--data-toggle="lightbox-image"--}}
                                               title="Questo è un testo informativo sull'immagine"
                                               class="gallery-link btn btn-sm btn-primary"><i class="fa fa-eye"></i>Vista</a>
                                            <a  id="close_modal_x" href="{{ route($ruta, ['image_module' => $image->id,'id' => $id]) }}" class="btn btn-sm btn-alt btn-primary" data-toggle="tooltip" title="Rimuovere"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <!-- Controls -->
        <a class="left carousel-control no-hover" href="#galery-image-backoffice" data-slide="prev">
            <span><i class="fa fa-chevron-left"></i></span>
        </a>
        <a class="right carousel-control no-hover" href="#galery-image-backoffice" data-slide="next">
            <span><i class="fa fa-chevron-right"></i></span>
        </a>
        <!-- END Controls -->
    </div>
</div>

{{--@section('js2')
    <script type="text/javascript">
        $('#close_modal_x').click(function() {
            alert('Modal');
            $('#galery-image-backoffice').load();
        });
    </script>
@endsection--}}
