<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\Service;
use Illuminate\Validation\Rule;

class ServiceController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = Service::class;
        $this->viewPath = 'admin.settings.services';
        $this->routePrefix = 'admin.settings.services';
        $this->resourceKey = 'services';
        $this->routeParameter = 'service';

        $this->formFields = [
            [
                'name' => 'service_name',
                'label' => 'Servicio',
                'type' => 'text',
                'max' => 100,
                'required' => true,
            ],
            [
                'name' => 'service_image',
                'label' => 'Nombre de archivo (icono)',
                'type' => 'text',
                'max' => 80,
                'required' => false,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'service_name', 'label' => 'Servicio'],
            ['attribute' => 'service_image', 'label' => 'Icono'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'service_name' => ['required', 'string', 'max:100', Rule::unique('services', 'service_name')],
            'service_image' => ['nullable', 'string', 'max:80'],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'service_name' => ['required', 'string', 'max:100', Rule::unique('services', 'service_name')->ignore($id)],
            'service_image' => ['nullable', 'string', 'max:80'],
        ];
    }

    protected function messages(): array
    {
        return [
            'service_name.required' => 'El nombre del servicio es obligatorio.',
            'service_name.unique' => 'El servicio ya está registrado.',
        ];
    }
}
