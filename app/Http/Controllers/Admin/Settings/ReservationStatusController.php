<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\ReservationStatus;
use Illuminate\Validation\Rule;

class ReservationStatusController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = ReservationStatus::class;
        $this->viewPath = 'admin.settings.reservation-status';
        $this->routePrefix = 'admin.settings.reservation-status';
        $this->resourceKey = 'reservation-status';
        $this->routeParameter = 'reservation_status';

        $this->formFields = [
            [
                'name' => 'reservation_status',
                'label' => 'Estado de reservación',
                'type' => 'text',
                'max' => 20,
                'required' => true,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'reservation_status', 'label' => 'Estado de reservación'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'reservation_status' => ['required', 'string', 'max:20', Rule::unique('reservation_status', 'reservation_status')],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'reservation_status' => ['required', 'string', 'max:20', Rule::unique('reservation_status', 'reservation_status')->ignore($id)],
        ];
    }

    protected function messages(): array
    {
        return [
            'reservation_status.required' => 'El estado de reservación es obligatorio.',
            'reservation_status.unique' => 'El estado de reservación ya existe.',
        ];
    }
}
