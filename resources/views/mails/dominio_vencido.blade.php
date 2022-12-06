
<h1>Hola Kevin!</h1>
<p>Te recordamos que los siguientes Dominios estan por vencer:</p>
<table class="table" border="1">
    <thead>
        <tr>
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
            <th scope="col">
                Dias Restantes
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dominios as $dominio)
        <tr scope="row">
            <td>
                {{$dominio->nombre}}
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
            <td style="text-align: center;">
                {{$dominio->dias_restantes}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

