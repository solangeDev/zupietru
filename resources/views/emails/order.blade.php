<div>
    <div>Nombre {{$name}}</div> 

    <table border="1">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $detail)
                <tr>
                    <th>{{$detail["title"]}}</th>
                    <th>{{$detail["cant"]}}</th>
                    <th>{{number_format($detail["amount_total"], 2, ',', ' ')}}</th>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>Total {{number_format($total, 2, ',', ' ')}}</div> 
</div>