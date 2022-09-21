<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Proyecto</th>
        <th scope="col">Cooperante</th>
        <th scope="col">Fecha</th>
        <th scope="col">Monto</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $elemento)
        <tr>
            <th scope="row">{{$elemento->id}}</th>
            <td>{{$elemento->proyecto->nombre}}</td>
            <td>{{$elemento->cooperante->nombre}}</td>
            <td>{{$elemento->fecha}}</td>
            <td>{{$elemento->monto}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
