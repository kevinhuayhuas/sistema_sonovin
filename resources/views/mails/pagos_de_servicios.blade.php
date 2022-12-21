
<h1>Hola Kevin!</h1>

<p>Estos son los servicios que hay que pagar:</p>
<table class="table" border="1" style="text-align:center">
    <thead>
        <tr>
            <th>
                N°
            </th>
            <th>
                Nombre
            </th>
            <th scope="col">
                Entidad
            </th>
            <th scope="col">
                Codigo
            </th>
            <th scope="col">
                Fecha de Vencimiento
            </th>
            <th scope="col">
                Estado
            </th>
            <th scope="col">
                Importe
            </th>
            <th scope="col">
                Te quedan
            </th>
        </tr>
    </thead>
    <tbody>
        @php
            $contador = 1;
        @endphp
        @foreach ($cronogramas as $cronograma)
        <tr scope="row">
            <td>
                {{$contador}}
            </td>
            <td>
                {{$cronograma->nombre_pago}}
            </td>
            <td>
                {{$cronograma->entidad}} 
            </td>
            <td>
                {{$cronograma->codigo_pago}}
            </td>
            <td style="background-color: darkorange">
                {{$cronograma->fecha_vencimiento}}
            </td>
            <td>
                {{$cronograma->estado}}
            </td>
            <td>
               S/ {{number_format($cronograma->importe_total,2)}}
            </td>
            <td>
                {{$cronograma->dias_restantes}} dias para hacer el pago
            </td>
        </tr>
            @php
                $contador ++;
            @endphp
        @endforeach
    </tbody>
</table>

<p>Estos son los pagos ya vencidos, URGENTE PAGAR:</p>
<table class="table" border="1" style="text-align:center">
    <thead>
        <tr>
            <th>
                N°
            </th>
            <th>
                Nombre
            </th>
            <th scope="col">
                Entidad
            </th>
            <th scope="col">
                Codigo
            </th>
            <th scope="col">
                Fecha de Vencimiento
            </th>
            <th scope="col">
                Estado
            </th>
            <th scope="col">
                Importe
            </th>
        </tr>
    </thead>
    <tbody>
        @php
            $contador = 1;
        @endphp
        @foreach ($cronogramasVencidos as $cronograma)
        @if ($cronograma->estado != 1)
        <tr scope="row">
            <td>
                {{$contador}}
            </td>
            <td>
                {{$cronograma->nombre_pago}}
            </td>
            <td>
                {{$cronograma->entidad}} 
            </td>
            <td>
                {{$cronograma->codigo_pago}}
            </td>
            <td style="background-color: crimson; color:aliceblue">
                {{$cronograma->fecha_vencimiento}}
            </td>
            <td>
                {{$cronograma->estado}}
            </td>
            <td>
               S/ {{number_format($cronograma->importe_total,2)}}
            </td>
        </tr>
        @endif
            @php
                $contador ++;
            @endphp
        @endforeach
    </tbody>
</table>
