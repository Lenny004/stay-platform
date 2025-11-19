@php($resourceId = $resourceKey ?? \Illuminate\Support\Str::uuid())

<div class="content-actions" data-settings-resource="{{ $resourceId }}" data-store-url="{{ $routes['store'] ?? '' }}" data-update-url="{{ $routes['update'] ?? '' }}" data-destroy-url="{{ $routes['destroy'] ?? '' }}">
    <form class="content-actions__search">
        <div class="select--search">
            <input type="text" placeholder="Buscar..." data-settings-search>
            <img class="select--searchIcon" src="{{ asset('resources/icons/search.png') }}" alt="Buscar">
        </div>
        <a class="btn--refresh" data-settings-refresh title="Restablecer filtros">
            <img src="{{ asset('resources/icons/reset.png') }}" alt="Restablecer">
        </a>
    </form>
    <div class="content-actions__add">
        <a class="btn primary-button" data-open-modal data-settings-open>
            Agregar
        </a>
    </div>
</div>

<div class="table--container">
    <table class="data-table" data-settings-table>
        <thead>
            <tr>
                @foreach ($columns as $column)
                    <th>{{ $column['label'] }}</th>
                @endforeach
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
                <tr data-record-id="{{ $record->id }}">
                    @foreach ($columns as $column)
                        <td>{{ data_get($record, $column['attribute']) }}</td>
                    @endforeach
                    <td>
                        <div class="actions">
                            <a class="btn--update" data-settings-edit title="Editar">
                                <img src="{{ asset('resources/icons/edit.png') }}" alt="Editar">
                            </a>
                            <a class="btn--delete" data-settings-delete title="Eliminar">
                                <img src="{{ asset('resources/icons/delete.png') }}" alt="Eliminar">
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('components.shared.modal')

@pushOnce('scripts')
<script>
    window.StayAdminSettings = window.StayAdminSettings || {};
    window.StayAdminSettings['{{ $resourceId }}'] = {
        resourceKey: @json($resourceKey),
        routes: @json($routes ?? []),
        formFields: @json($formFields ?? []),
        columns: @json($columns ?? []),
    };
</script>
@endPushOnce
