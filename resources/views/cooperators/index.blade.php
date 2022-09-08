@include('layout.header')

<div class="overflow-x-auto relative py-4 px-10">
    <a href="{{ route('cooperators.create') }}" class="px-6 py-3 bg-blue-500 hover:bg-blue-700 text-white rounded">Agregar cooperante</a>
    <br>
    <br>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Nombre
                </th>
                <th scope="col" class="py-3 px-6">
                    Correo Electrónico
                </th>
                <th scope="col" class="py-3 px-6">
                    Dirección
                </th>
                <th scope="col" class="py-3 px-6">
                    Teléfono
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Administración
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Proyectos
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $item->name }}
                </th>
                <td class="py-4 px-6">
                    {{ $item->email }}
                </td>
                <td class="py-4 px-6">
                    {{ $item->address }}
                </td>
                <td class="py-4 px-6">
                    {{ $item->phone }}
                </td>
                <td class="text-center">
                    <div class="py-2">
                        <a href="{{ route ('cooperators.edit', $item->id)}}" class="h-8 px-4 py-2 text-sm bg-indigo-800 text-white rounded font-medium">Editar</a>
                    </div>
                    <div class="py-2">
                        <form action="{{ route('cooperators.destroy', $item)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="h-8 px-4 py-2 text-sm bg-red-700 text-white font-medium rounded">Eliminar</button>
                        </form>
                    </div>
                </td>
                <td class="text-center">
                    <div class="py-2">
                        <a href="{{ route ('cooperators.show', $item)}}" class="h-8 px-4 py-2 text-sm bg-amber-700 text-white rounded font-medium">Mostrar</a>
                    </div>
                    <div class="py-2">
                        <a href="{{ route ('assignments.create', ['cooperator_id' => $item->id])}}" class="h-8 px-4 py-2 text-sm bg-green-600 text-white rounded font-medium">Asignar</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>
