@extends('main')
@section('content')
<h1>Reportes registrados</h1>

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Fecha</th>
            <th>Status</th>
            <th>Detalle</th>
        </tr>
    </thead>
    <tbody>
    @foreach($reports as $report)
        <tr>
            <td>{{ $report->id }}</th>
            <td>{{ $report->fecha }}</th>
            <td>{{ $report->status->nombre }}</th>
            <td><a href="{{ route('report.show', $report->id) }}">Ver</a></th>
        </tr>
    </tbody>
    @endforeach
</table>

@stop
