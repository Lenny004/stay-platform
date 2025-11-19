<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\NearbyArea;
use Illuminate\Validation\Rule;

class NearbyAreaController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = NearbyArea::class;
        $this->viewPath = 'admin.settings.nearby-areas';
        $this->routePrefix = 'admin.settings.nearby-areas';
        $this->resourceKey = 'nearby-areas';
        $this->routeParameter = 'nearby_area';

        $this->formFields = [
            [
                'name' => 'nearby_area',
                'label' => 'Zona cercana',
                'type' => 'text',
                'max' => 100,
                'required' => true,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'nearby_area', 'label' => 'Zona cercana'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'nearby_area' => ['required', 'string', 'max:100', Rule::unique('nearby_areas', 'nearby_area')],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'nearby_area' => ['required', 'string', 'max:100', Rule::unique('nearby_areas', 'nearby_area')->ignore($id)],
        ];
    }

    protected function messages(): array
    {
        return [
            'nearby_area.required' => 'El nombre de la zona es obligatorio.',
            'nearby_area.unique' => 'La zona ya está registrada.',
        ];
    }
}
