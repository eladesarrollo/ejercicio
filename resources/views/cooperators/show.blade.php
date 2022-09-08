@include('layout/header')

<div class="overflow-x-auto relative py-4 px-10">
    <a href="{{ route('assignments.create', ['cooperator_id' => $cooperator->id])}}" class="px-6 py-3 bg-blue-500 hover:bg-blue-700 text-white rounded">Asignar Nuevo Proyecto</a>
    <br>
    <br>
    <p class="text-center">Proyectos asignados a </p>
    <h2 class="text-blue-900 text-center p-2 text-lg font-medium">{{ $cooperator->name }}</h2>
    <div class="py-2">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse border border-slate-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6 border border-slate-300">
                        No.
                    </th>
                    <th scope="col" class="py-3 px-6 border border-slate-300">
                        Proyecto
                    </th>
                    <th scope="col" class="py-3 px-6 border border-slate-300">
                        Fecha asignación
                    </th>
                    <th scope="col" class="py-3 px-6 border border-slate-300">
                        Monto
                    </th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0; $total = 0; @endphp
                @foreach ($assigments as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="py-4 px-6 border border-slate-300">
                            {{ $i = $i + 1 }}
                        </td>
                        <td class="py-4 px-6 border border-slate-300">
                            {{ $item->project->name }}
                        </td>
                        <td class="py-4 px-6 border border-slate-300">
                            {{ date('m/d/Y', strtotime($item->date)) }}
                        </td>
                        <td class="py-4 px-6 border border-slate-300">
                            $ {{ number_format($item->amount, 2, '.', ',') }}
                        </td>
                    </tr>
                    @php $total += $item->amount @endphp
                @endforeach
                <tr>
                    <td class="py-4 px-6 border border-slate-3000 text-right font-bold" colspan="3">Total</td>
                    <td class="py-4 px-6 border border-slate-300">$ {{ number_format($total, 2, '.', ',') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
