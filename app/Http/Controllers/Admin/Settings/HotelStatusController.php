<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\HotelStatus;
use Illuminate\Validation\Rule;

class HotelStatusController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = HotelStatus::class;
        $this->viewPath = 'admin.settings.hotel-status';
        $this->routePrefix = 'admin.settings.hotel-status';
        $this->resourceKey = 'hotel-status';
        $this->routeParameter = 'hotel_status';

        $this->formFields = [
            [
                'name' => 'status',
                'label' => 'Estado',
                'type' => 'text',
                'max' => 8,
                'required' => true,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'status', 'label' => 'Estado'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'status' => ['required', 'string', 'max:8', Rule::unique('hotel_status', 'status')],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'status' => ['required', 'string', 'max:8', Rule::unique('hotel_status', 'status')->ignore($id)],
        ];
    }

    protected function messages(): array
    {
        return [
            'status.required' => 'El estado es obligatorio.',
            'status.unique' => 'El estado ya existe.',
        ];
    }
}
