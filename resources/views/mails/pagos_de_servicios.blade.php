
<h1>Hola Kevin!</h1>
<p>Te mostramos los detalles de los Pagos:</p>
<table class="table" border="1">
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
            <td>
                {{$cronograma->fecha_vencimiento}}
            </td>
            <td>
                {{$cronograma->estado}}
            </td>
            <td>
                {{$cronograma->importe_total}}
            </td>
        </tr>
            @php
                $contador ++;
            @endphp
        @endforeach
    </tbody>
</table>
