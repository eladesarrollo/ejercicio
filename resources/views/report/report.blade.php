@php
    $total = 0;
@endphp

<table class="table table-condensed">
    <thead>
        <tr>
            <th>No</th>
            <th>Nombre Proyecto</th>
            <th>Fecha Asignación</th>
            <th>Monto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($assigments as $assigment)

        <tr>
            <td>{{ $assigment->project_id }}</td>
            <td>{{ $assigment->project->name }}</td>
            <td>{{ $assigment->assigment_date }}</td>
            <td>{{ number_format($assigment->amount, 2) }}</td>
        </tr>

        @php
            $total += $assigment->amount;
        @endphp
            
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="2"></th>
            <th>Monto Total:</th>
            <th>{{ number_format($total, 2) }}</th>
        </tr>
    </tfoot>
</table>