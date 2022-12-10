
<h1>Hola Kevin!</h1>
<p>Te recordamos que los siguientes Dominios estan por vencer:</p>
<table class="table" border="1">
    <thead>
        <tr>
            <th>
                N°
            </th>
            <th>
                Cliente
            </th>
            <th scope="col">
                Nombre
            </th>
            <th scope="col">
                Registro
            </th>
            <th scope="col">
                Actualizacion
            </th>
            <th scope="col">
                Expira
            </th>
            <th scope="col">
                Estado
            </th>
        </tr>
    </thead>
    <tbody>
        @php
            $contador = 1;
        @endphp
        @foreach ($dominios as $dominio)
        <tr scope="row">
            <td>
                {{$contador}}
            </td>
            <td>
                {{$dominio->nombre}} {{$dominio->apellidos}}
            </td>
            <td>
                {{$dominio->nombre_dominio}}
            </td>
            <td>
                {{$dominio->registro}}
            </td>
            <td>
                {{$dominio->actualizacion}}
            </td>
            <td>
                {{$dominio->expira}}
            </td>
            <td>
                @if ($dominio->estado == 1)
                    Activo
                @elseif ($dominio->estado == 0)
                    Suspendido
                @endif
            </td>
        </tr>
            @php
                $contador ++;
            @endphp
        @endforeach
    </tbody>
</table>

