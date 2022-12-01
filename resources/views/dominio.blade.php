<table>
<thead>
    <th>
        Dominio
    </th>
    <th>
        Registro 
    </th>
    <th>
        Actualizacion 
    </th>
    <th>
        Expira
    </th>
    <th>
        Estado
    </th>
    <th>
        Dias restantes
    </th>
</thead>
    <tbody>
        @if (is_array($arrayDominios) || is_object($arrayDominios))
            @foreach ($arrayDominios as $dominio )
            <tr>
                <td>{{$dominio->nombre}} </td>
                <td>{{$dominio->registro}}</td>
                <td>{{$dominio->actualizacion}}</td>
                <td> {{$dominio->expira}}</td>
                <td>{{$dominio->estado}}</td>
                <td>{{$dominio->dias_restantes}}</td>
            </tr>
            @endforeach
        @else
            <p>No es ni arreglo y objeto</p>
        @endif
    </tbody>
</table>

