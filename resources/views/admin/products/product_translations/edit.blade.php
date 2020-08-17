@extends('layouts.admin.app')

@section('content')
   @include('layouts.admin.partials.dashboard-header-top', [
       'title'         =>   $tags['back_products_title'],
       'subtitle'      =>   $tags['back_general_edit'],
       'icon'          =>   'fa fa-cogs',
       'breadcrumb'    =>   array (
                               array (
                                   'title' => $tags['back_general_home'],
                                   'route' => 'home'
                               ),
                               array (
                                   'title' => $tags['back_products_title'],
                                   'route' => 'admin.products.index'
                               ),
                               array (
                                   'title' => $tags['back_general_edit'],
                               ),
                            )
   ])

   <div class="block full">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productTranslation, ['route' => ['admin.products.update', $productTranslation->id], 'method' => 'patch']) !!}

                        @include('admin.products.product_translations.fields')

                       {{--{!! Form::close() !!}--}}

                       @if(!empty($filesDB))
                           @if(!empty($object))
                               <div class="row push">
                                   <div class="form-group">
                                       <div class="col-md-6" style="width: 585px">
                                           <a href="#modal-regular2" class="btn btn-success" data-toggle="modal" title="Premere per aggiungere una nuova immagine per questa Gallerie fotografiche">
                                               Caricare immagine
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
                       @include('admin.utils.multimedia.index', ['id' => ['object' => $object],'filesDB' => $filesDB,'objectTranslation_id' => $productTranslation->id])
                   @endif
               @endif
          </div>
      </div>
  </div>
@endsection


@section('js')
  <script type="text/javascript">
    // Duplica los input
    $('#add-input').on('click', function(){
      $(".new-input").clone().removeClass('new-input').appendTo("#input-seos");
    });

    // Elimina los input
    $(document).on('click', ".remove_input", function() {
      var parent = $(this).parents().get(1);
      if ( !$(parent).hasClass('new-input') ) {
        $(this).parents('.container-input').remove();
      } 
    });

    // Eliminar seo_translations
    $(document).on('click', ".seo_delete", function() {
      if (confirm('Are you sure you want to Delete Ad ?')){
        var section = $(this).parents().get(1);
        $(section).hide();

        var send = $.post('/delete/seo', {_token: $('meta[name="csrf-token"]').attr('content'), id: $(this).val()});

        send.done(function( data ) {
          console.log(data)
        });
      } else {
        return false;
      }
    });

    //para combobox dependiente category -> subcategory
    $(document).ready(function(){
      $('#product_category_id').change(function(){
        //obtengo las variables a utilizar
        var category = $(this).val();
        //consulta ajax para llenar el combo de distrito
        $.get("/admin/products/subcategory_por_category/" + category + "", function(data) {
          //PARA SUBCATEGORIA
          var subcategory = data[0];
          //vaciar combo de subcategory (de los datos que ya estan cargados)
          $('#subcategory_id').empty();
          //llenar combo de subcategory con los nuevos datos correspondientes al category seleccionado
          $('#subcategory_id').append("<select class='form-control' name='subcategory_id' id='subcategory_id'></select>");
          $('#subcategory_id').append("<option title='Selezionare' value='0'>{{$tags['back_general_select']}}</option>");
          $.each(subcategory, function(key, element) {
            $('#subcategory_id').append("<option title='" + element + "' value='" + key + "'>" + element + "</option>");
          });
          }
        );
      });
    });
  </script>
@endsection