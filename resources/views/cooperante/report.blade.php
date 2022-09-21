<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">Direccion</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $elemento)
        <tr>
            <th scope="row">{{$elemento->id}}</th>
            <td>{{$elemento->nombre}}</td>
            <td>{{$elemento->email}}</td>
            <td>{{$elemento->direccion}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
