@section('css')
<style type="text/css">
    .jumperr-hidden {
        display: none;
    }
</style>
@endsection

<div class="col-sm-8 col-sm-offset-2">
    <div class="text-center">
        <h3>
            {{ $tags['back_orders_user_info'] }}
        </h3>
    </div>
</div>

<!-- User Exists Field -->
<div class="form-group {{$errors->has('user_exists') ? 'has-error' : ''}} col-sm-8  col-sm-offset-2">
    {!! Form::label('', $tags['back_orders_user_exists'], ['class' => 'form-group']) !!}
    <br>
    {!! Form::label('user_exists', $tags['back_general_yes'], ['class' => 'form-group', 'style' => 'font-weight:500;']) !!}
    {!! Form::radio('user_exists', 1, true, ['id' => 'user_exists']) !!}
    {!! Form::label('user_no_exists', $tags['back_general_no'], ['class' => 'form-group', 'style' => 'font-weight:500;']) !!}
    {!! Form::radio('user_exists', 0, false, ['id' => 'user_no_exists']) !!}
    @if ($errors->has('user_exists'))
        <span class="help-block">{{ $errors->first('user_exists') }}</span>
    @endif
</div>

<div class="col-sm-8 col-sm-offset-2">
    <div class="block">
        <div class="block-title"><h4>{{ $tags['back_orders_user_info'] }}</h4></div>
        <div class="box-body">
            <div class="row" id="container-user_info">
                <!-- begin::USUARIO REGISTRADO -->
                    <div class="inputs-register_user form-group {{$errors->has('user_id') ? 'has-error' : ''}} col-sm-8 col-sm-offset-2
                        @php
                        $old_user_exists = old('user_exists');
                        if( isset($old_user_exists) ){
                            echo ($old_user_exists==1)?'':'jumperr-hidden';
                        }
                        @endphp">
                        {!! Form::label('user_id', $tags['back_user_title']) !!}
                        {!! Form::select('user_id', $users,  null, ['class' => 'select-chosen', 'data-placeholder' => $tags['back_general_select'], 'placeholder' => $tags['back_general_select']]) !!}
                        @if ($errors->has('user_id'))
                            <span class="help-block">{{ $errors->first('user_id') }}</span>
                        @endif
                    </div>
                <!-- end::USUARIO REGISTRADO -->

                <!-- begin::USUARIO NO REGISTRADO -->
                    <!-- begin::no_register_user_name -->
                    <div class="inputs-no_register_user form-group {{$errors->has('no_register_user_name') ? 'has-error' : ''}} col-sm-8 col-sm-offset-2
                        @php
                        $old_user_exists = old('user_exists');
                        if( isset($old_user_exists) ){
                            echo ($old_user_exists==0)?'':'jumperr-hidden';
                        }
                        else {
                            echo 'jumperr-hidden';
                        }
                        @endphp">
                        {!! Form::label('no_register_user_name', $tags['back_general_name']) !!}
                        {!! Form::text('no_register_user_name', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('no_register_user_name'))
                            <span class="help-block">{{ $errors->first('no_register_user_name') }}</span>
                        @endif
                    </div>
                    <!-- end::no_register_user_name -->
                    <!-- begin::no_register_user_email -->
                    <div class="inputs-no_register_user form-group {{$errors->has('no_register_user_email') ? 'has-error' : ''}} col-sm-8 col-sm-offset-2
                        @php
                        $old_user_exists = old('user_exists');
                        if( isset($old_user_exists) ){
                            echo ($old_user_exists==0)?'':'jumperr-hidden';
                        }
                        else {
                            echo 'jumperr-hidden';
                        }
                        @endphp">
                        {!! Form::label('no_register_user_email', $tags['back_general_email']) !!}
                        {!! Form::text('no_register_user_email', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('no_register_user_email'))
                            <span class="help-block">{{ $errors->first('no_register_user_email') }}</span>
                        @endif
                    </div>
                    <!-- end::no_register_user_email -->
                    <!-- begin::no_register_user_phone -->
                    <div class="inputs-no_register_user form-group {{$errors->has('no_register_user_phone') ? 'has-error' : ''}} col-sm-8 col-sm-offset-2
                        @php
                        $old_user_exists = old('user_exists');
                        if( isset($old_user_exists) ){
                            echo ($old_user_exists==0)?'':'jumperr-hidden';
                        }
                        else {
                            echo 'jumperr-hidden';
                        }
                        @endphp">
                        {!! Form::label('no_register_user_phone', $tags['back_general_phone']) !!}
                        {!! Form::text('no_register_user_phone', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('no_register_user_phone'))
                            <span class="help-block">{{ $errors->first('no_register_user_phone') }}</span>
                        @endif
                    </div>
                    <!-- end::no_register_user_phone -->
                <!-- end::USUARIO NO REGISTRADO -->
            </div>
            <div class="row">
                <!-- begin::delivery_address -->
                <div class="form-group {{$errors->has('delivery_address') ? 'has-error' : ''}} col-sm-8 col-sm-offset-2">
                    {!! Form::label('delivery_address', 'Delivery Address:') !!}
                    {!! Form::text('delivery_address', null, ['class' => 'form-control', 'id' => 'delivery_address']) !!}
                    @if ($errors->has('delivery_address'))
                        <span class="help-block">{{ $errors->first('delivery_address') }}</span>
                    @endif
                </div>
                <!-- end::delivery_address -->
            </div>
        </div>
    </div>
</div>

<div class="col-sm-8 col-sm-offset-2">
    <div class="text-center">
        <h3>
            {{ $tags['back_order_product_items'] }}
            <a href="javascript:void(0)" id="button-product_presentations" class="btn btn-primary btn-sm pull-right">{{ $tags['back_general_addnew'] }}</a>
        </h3>
    </div>
</div>

<!-- Grid Blocks Content -->
<div class="col-sm-8 col-sm-offset-2">
    <div class="block">
        <div class="block-title"><h4>{{ $tags['back_order_product_items'] }}</h4></div>
        <div class="box-body" id="container-product_presentations">
            {{-- javascript content --}}
        </div>
    </div>
</div>
<!-- END Grid Blocks -->


<div class="col-sm-8 col-sm-offset-2">
    <div class="text-center">
        <h3>
            {{ $tags['back_order_price_summary'] }}
            <a href="javascript:void(0)" id="button-refresh_summary" class="btn btn-primary btn-sm pull-right">Refresh</a>
        </h3>
    </div>
</div>

<!-- begin::price inputs -->
    <!-- Subtotal Field -->
    <div class="form-group {{$errors->has('subtotal') ? 'has-error' : ''}} col-sm-4 col-sm-offset-6">
        {!! Form::label('subtotal', $tags['back_general_subtotal'].':') !!}
        {!! Form::number('subtotal', null, ['class' => 'form-control', 'readonly' => true]) !!}
        @if ($errors->has('subtotal'))
            <span class="help-block">{{ $errors->first('subtotal') }}</span>
        @endif
    </div>

    <!-- Tax Field -->
    <div class="form-group {{$errors->has('tax') ? 'has-error' : ''}} col-sm-4 col-sm-offset-6">
        {!! Form::label('tax', $tags['back_general_tax'].':') !!}
        {!! Form::number('tax', null, ['class' => 'form-control', 'readonly' => true]) !!}
        @if ($errors->has('tax'))
            <span class="help-block">{{ $errors->first('tax') }}</span>
        @endif
    </div>

    <!-- Total Field -->
    <div class="form-group {{$errors->has('total') ? 'has-error' : ''}} col-sm-4 col-sm-offset-6">
        {!! Form::label('total', $tags['back_general_total'].':') !!}
        {!! Form::number('total', null, ['class' => 'form-control', 'readonly' => true]) !!}
        @if ($errors->has('total'))
            <span class="help-block">{{ $errors->first('total') }}</span>
        @endif
    </div>
<!-- end::price inputs -->


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.orders.index') !!}" class="btn btn-default">{{ $tags['back_general_cancel'] }}</a>
</div>

<input type="hidden" id="count-product_presentations" value="0">

@section('js')
<script type="text/javascript">
    // para agregar y eliminar filas de productos
    $(document).ready(function() {
        // añadir fila de producto
        var first = add_row();
        first.children('.div-remove-product_presentations').addClass('hidden');

        //añade una nueva linea para agregar producto
        $('#button-product_presentations').on('click', function() {
            // añadir fila de producto
            add_row();
        });

        // funcion para añadir una fila de producto
        function add_row() {
            var currentRow = $('.real-product_presentations').clone()
                                                             .removeClass('real-product_presentations')
                                                             .removeClass('hidden')
                                                             .addClass('current-product_presentations')
                                                             .appendTo('#container-product_presentations');
            var form_control = currentRow.children('.class-p');
            form_control.children('.chosen').chosen();

            return currentRow;
        }

        //elimina la linea del producto seleccionado
        $(document).on('click', '.remove-product_presentations', function() {
            var parent = $(this).parents().get(1);
            if ( !$(parent).hasClass('real-product_presentations') ) {
                $(parent).remove();
            }
        });
    });

    //para calcular subtotal, iva y total
    $(document).ready(function() {

        // para ir obtetiendo los productos (id), los precios de
        // cada uno (price) y las cantidades de cada uno (count) y los ivas (iva)
        $(document).on('change', '.select-product', function() {

            var parent;
            var div_product_count;
            var input_product_count;
            var select_product_price;
            var select_product_iva;
            var options;
            var optionsIVA;

            //para resetear el campo 'Product Amount' cuando cambie el select de productos
            parent = $(this).parents().get(1);
            div_product_count = $(parent).children('.div-product_count');
            input_product_count = $(div_product_count).children('.input-product_count');
            $(input_product_count).val(null);

            // Indice de la posicion del producto seleccionado en el select
            var index_selected = $(this).prop('selectedIndex');
            // console.log(index_selected);

            //para seleccionar el precio en el select hidden segun el producto seleccionado en el select
            select_product_price = $(parent).children('.select-product_price');
            options = $(select_product_price).children('option').eq(index_selected).prop('selected', true);

            //para seleccionar el IVA en el select hidden segun el producto seleccionado en el select
            select_product_iva = $(parent).children('.select-product_iva');
            optionsIVA = $(select_product_iva).children('option').eq(index_selected).prop('selected', true);


            // DESHABILITAR LOS PRODUCTOS SECCIONADOS EN OTROS SELECTS
            div_container = $(parent).parents().get(0);
            var this_index = $(this).children('option:selected').index();
            s_current_product_presentations = $(div_container).children();
            $.each(s_current_product_presentations, function(index, current_product_presentations) {
                var div_product    = $(current_product_presentations).children('.div-product');
                var select_product = $(div_product).children('.select-product');

                var options = $(select_product).children();
                $.each(options, function(indexJ, option) {
                    if ( indexJ == this_index ) {
                        $(option).attr('disabled','disabled');
                        // console.log($(option));
                    }
                });
            });
        })

        // actualizar subtotal, iva y total
        $('#button-refresh_summary').on('click', function() {

            var product_count = [];
            var product_price = [];
            var product_iva = [];
            $('select[name^="product_presentation_id"]').each(function(key, value) {
                // array de product_count
                if ( $('.current-product_presentations input[name^="products_amount"]')[key]!=undefined ) {
                    product_count.push(
                        $('.current-product_presentations input[name^="products_amount"]')[key].value
                    );
                }

                // array de product_price
                if ( $('.current-product_presentations select[name^="product_price"]')[0].options[key].innerText !== 'NA' ) {
                    product_price.push(
                        $('.current-product_presentations select[name^="product_price"]')[0].options[key].innerText
                    );
                }

                // array de product_iva
                if ( $('.current-product_presentations select[name^="product_iva"]')[0].options[key].innerText !== 'NA' ) {
                    product_iva.push(
                        $('.current-product_presentations select[name^="product_iva"]')[0].options[key].innerText
                    );
                }
            });

            console.log(product_count);
            console.log(product_price);
            console.log(product_iva);

            var subtotal = 0;
            var iva = 0;
            var total = 0;

            $.each(product_price, function(index, valueJ) {
                if( !isNaN( parseInt(valueJ) ) ){
                    total    = total    + ( product_count[index]*product_price[index] );
                    iva      = iva      + ( product_count[index]*(product_iva[index]*product_price[index]) );
                    subtotal = subtotal + ( product_count[index]*(product_price[index]-(product_iva[index]*product_price[index])) );
                }
            });

            $('#subtotal').val(subtotal);
            $('#tax').val(iva);
            $('#total').val(total);

        })
    });

    // para user registrato
    $(document).ready(function(){
        $('#user_exists').change(function(){
            if( $("#user_exists").is(':checked')) {
                $('.inputs-register_user').show();
                $('.inputs-no_register_user').hide();
            }
        });
        $('#user_no_exists').change(function(){
            if( $("#user_no_exists").is(':checked')) {
                $('.inputs-no_register_user').show();
                $('.inputs-register_user').hide();
            }
        });
    });

    // para dinamismo de user y addresses
    $(document).ready(function(){
        $('#user_id').on('change', function(){
            $('.current-delivery_address').remove();
            var current_delivery_address = $('.real-delivery_address').clone()
                                                                      .removeClass('real-delivery_address')
                                                                      .removeClass('hidden')
                                                                      .addClass('current-delivery_address')
                                                                      .appendTo('#container-user_info');
            var user_id = $(this).val();

            $.get("/admin/orders/user_address_by_user/" + user_id + "",
                function(data) {
                    // console.log(data[0]);
                    //para UserAddress
                    var user_address = data[0];
                    //llenar combo de user_address con los nuevos datos correspondientes al category seleccionado
                    // $('.current-delivery_address').append("<select class='form-control' name='delivery_address' id='delivery_address'></select>");

                    var select = $('.current-delivery_address select').empty();
                    select.addClass('select-delivery_address');

                    select.append("<option title='{{ $tags['back_general_select'] }}' value='0'>{{$tags['back_general_select']}}</option>");
                    $.each(user_address, function(key, element) {
                        select.append("<option title='" + element + "' value='" + element + "'>" + element + "</option>");
                    });

                    select.chosen();
                    activeAddressSelect(select);
                }
            );
        });
    });

    function activeAddressSelect(select_) {
        // alert('holaaa');
        select_.on('change', function() {

            $('#delivery_address').val( $(this).val() );

        });
    }
</script>
@endsection