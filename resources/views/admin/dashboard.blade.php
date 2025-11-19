@extends('layouts.admin')

@section('title', 'Dashboard - Administración')
@section('page-title', 'Dashboard')

@php
    $bookings = [
        ['name' => 'Like a butterfly', 'category' => 'Boxing', 'schedule' => '09:00 - 11:00', 'manager' => 'Aaron Chapman', 'code' => 'H-001'],
        ['name' => 'Mind & Body', 'category' => 'Yoga', 'schedule' => '08:00 - 09:00', 'manager' => 'Adam Stewart', 'code' => 'H-002'],
        ['name' => 'Crit Cardio', 'category' => 'Gimnasio', 'schedule' => '09:00 - 10:00', 'manager' => 'Aaron Chapman', 'code' => 'H-003'],
        ['name' => 'Wheel Pose Full Posture', 'category' => 'Yoga', 'schedule' => '07:00 - 08:30', 'manager' => 'Donna Wilson', 'code' => 'H-004'],
        ['name' => 'Zumba Dance', 'category' => 'Baile', 'schedule' => '17:00 - 19:00', 'manager' => 'Donna Wilson', 'code' => 'H-005'],
        ['name' => 'Cardio Blast', 'category' => 'Gimnasio', 'schedule' => '17:00 - 19:00', 'manager' => 'Randy Porter', 'code' => 'H-006'],
        ['name' => 'Pilates Reformer', 'category' => 'Gimnasio', 'schedule' => '08:00 - 09:00', 'manager' => 'Randy Porter', 'code' => 'H-007'],
    ];
@endphp

@section('content')
    <div class="content-actions">
        <form class="content-actions__search" id="dashboard-search-form">
            <div class="select--search">
                <input type="text" placeholder="Buscar..." id="search">
                <img class="select--searchIcon" src="{{ asset('resources/icons/search.png') }}" alt="Buscar">
            </div>
            <a class="btn--refresh" id="refresh-table" title="Restablecer filtros">
                <img src="{{ asset('resources/icons/reset.png') }}" alt="Restablecer">
            </a>
        </form>
        <div class="content-actions__add">
            <a class="btn primary-button" data-open-modal>Agregar</a>
        </div>
    </div>

    <div class="table--container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Actividad</th>
                    <th>Categoría</th>
                    <th>Horario</th>
                    <th>Encargado</th>
                    <th>Código</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $row)
                    <tr>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['category'] }}</td>
                        <td>{{ $row['schedule'] }}</td>
                        <td>{{ $row['manager'] }}</td>
                        <td>{{ $row['code'] }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn--update" title="Editar">
                                    <img src="{{ asset('resources/icons/edit.png') }}" alt="Editar">
                                </a>
                                <a class="btn--delete" title="Eliminar">
                                    <img src="{{ asset('resources/icons/delete.png') }}" alt="Eliminar">
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
