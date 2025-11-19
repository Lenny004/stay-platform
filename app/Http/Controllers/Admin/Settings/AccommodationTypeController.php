<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\AccommodationType;
use Illuminate\Validation\Rule;

class AccommodationTypeController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = AccommodationType::class;
        $this->viewPath = 'admin.settings.accommodation-types';
        $this->routePrefix = 'admin.settings.accommodation-types';
        $this->resourceKey = 'accommodation-types';
        $this->routeParameter = 'accommodation_type';

        $this->formFields = [
            [
                'name' => 'accommodation_type',
                'label' => 'Tipo de alojamiento',
                'type' => 'text',
                'max' => 50,
                'required' => true,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'accommodation_type', 'label' => 'Tipo de alojamiento'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'accommodation_type' => ['required', 'string', 'max:50', Rule::unique('accommodation_types', 'accommodation_type')],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'accommodation_type' => ['required', 'string', 'max:50', Rule::unique('accommodation_types', 'accommodation_type')->ignore($id)],
        ];
    }

    protected function messages(): array
    {
        return [
            'accommodation_type.required' => 'El nombre del tipo de alojamiento es obligatorio.',
            'accommodation_type.unique' => 'El tipo de alojamiento ya existe.',
        ];
    }
}
