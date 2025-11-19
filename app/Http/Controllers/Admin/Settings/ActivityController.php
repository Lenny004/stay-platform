<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\Activity;
use Illuminate\Validation\Rule;

class ActivityController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = Activity::class;
        $this->viewPath = 'admin.settings.activities';
        $this->routePrefix = 'admin.settings.activities';
        $this->resourceKey = 'activities';
        $this->routeParameter = 'activity';

        $this->formFields = [
            [
                'name' => 'activity_name',
                'label' => 'Nombre de la actividad',
                'type' => 'text',
                'max' => 100,
                'required' => true,
            ],
            [
                'name' => 'activity_image',
                'label' => 'Nombre de archivo (icono)',
                'type' => 'text',
                'max' => 80,
                'required' => false,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'activity_name', 'label' => 'Actividad'],
            ['attribute' => 'activity_image', 'label' => 'Icono'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'activity_name' => ['required', 'string', 'max:100', Rule::unique('activities', 'activity_name')],
            'activity_image' => ['nullable', 'string', 'max:80'],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'activity_name' => ['required', 'string', 'max:100', Rule::unique('activities', 'activity_name')->ignore($id)],
            'activity_image' => ['nullable', 'string', 'max:80'],
        ];
    }

    protected function messages(): array
    {
        return [
            'activity_name.required' => 'El nombre de la actividad es obligatorio.',
            'activity_name.unique' => 'Esta actividad ya está registrada.',
        ];
    }
}
