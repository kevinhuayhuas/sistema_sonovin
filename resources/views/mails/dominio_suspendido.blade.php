<h1>Hola!</h1>
<p>El siguiente dominio esta suspendido</p>
<p><strong>Nombre: </strong>{{$dominio->nombre}}</p>
<p><strong>Registro: </strong>{{$dominio->registro}}</p>
<p><strong>Expira: </strong>{{$dominio->expira}}</p>
<p><strong>Estado: </strong>
    @if ($dominio->estado == 1)
        Activo
    @elseif ($dominio->estado == 0)
        Suspendido
    @endif
</p>
<p><strong>Dias Restantes: </strong>{{$dominio->dias_restantes}}</p>