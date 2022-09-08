@include('layout.header')

<div class="overflow-x-auto relative py-4 px-10">
    <a href="{{ route('projects.create') }}" class="px-6 py-3 bg-blue-500 hover:bg-blue-700 text-white rounded">Agregar proyecto</a>
    <br>

    @if($errors->any())
        <h4 class="text-red-700 text-center p-2 font-medium">{{$errors->first()}}</h4>
    @endif
    <br>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Nombre
                </th>
                <th scope="col" class="py-3 px-6">
                    Descripción
                </th>
                <th scope="col" class="py-3 px-6 text-center" colspan="2">
                    Opciones
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
                    {{ $item->description }}
                </td>
                <td class="py-2 px-2 text-center">
                    <div class="my-2">
                        <a href="{{ route ('projects.edit', $item->id)}}" class="h-8 px-4 py-2 text-sm bg-indigo-800 text-white rounded font-medium">Editar</a>
                    </div>
                </td>
                <td class="py-2 px-2 text-center">
                    <div class="my-2">
                        <form action="{{ route('projects.destroy', $item)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="h-8 px-4 py-2 text-sm bg-red-700 text-white font-medium rounded">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>
