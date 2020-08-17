<div id="modal-regular3" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @include('flash::message')
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Gestione delle immagini</h3>
            </div>
            <div class="modal-body">
                <!-- Upload Block -->
				<div class="block full hidden-xs">
				    <!-- Upload Title -->
				    <div class="block-title">
				        <div class="block-options pull-right">
				            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Impostazioni"><i class="fa fa-cog"></i></a>
				        </div>
				        <h2><i class="fa fa-cloud-upload"></i> Caricare <strong>un immagini</strong></h2>
				    </div>
				    <!-- END Upload Title -->

				    <!-- Upload Content -->
				    {{--<form action="{{route('modal_galery.galery.saveGalery',[$companybio['id']])}}" class="dropzone">{{ csrf_field() }}</form>--}}
                    <form action="{{route($ruta,$id)}}" class="dropzone">{{ csrf_field() }}</form>
                    <!-- END Upload Content -->
				</div>
				<!-- END Upload Block -->
                <div class="block-title">
                    <h2>Solo immagini con estensione <strong>"jpg, jpeg, png o gif"</strong></h2>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="close_modal" class="btn btn-sm btn-default" {{--onclick="javascript:parent.location.reload();"--}}>Vicino</button>
            </div>
        </div>
    </div>
</div>

{{--@section('js2')
    <script type="text/javascript">
        $('#close_modal').click(function() {
            alert("Entrada")
            $('#modal-regular3').reload();
            //alert("Entrada")
            //location.reload();
            //location.reload(true);
        });
    </script>
@endsection--}}
{{--
@stop--}}
