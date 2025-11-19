<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\UsState;
use Illuminate\Validation\Rule;

class UsStateController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = UsState::class;
        $this->viewPath = 'admin.settings.us-states';
        $this->routePrefix = 'admin.settings.us-states';
        $this->resourceKey = 'us-states';
        $this->routeParameter = 'us_state';

        $this->formFields = [
            [
                'name' => 'state_name',
                'label' => 'Estado',
                'type' => 'text',
                'max' => 50,
                'required' => true,
            ],
            [
                'name' => 'state_code',
                'label' => 'Código',
                'type' => 'text',
                'max' => 7,
                'required' => true,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'state_name', 'label' => 'Estado'],
            ['attribute' => 'state_code', 'label' => 'Código'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'state_name' => ['required', 'string', 'max:50', Rule::unique('us_states', 'state_name')],
            'state_code' => ['required', 'string', 'max:7', Rule::unique('us_states', 'state_code')],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'state_name' => ['required', 'string', 'max:50', Rule::unique('us_states', 'state_name')->ignore($id)],
            'state_code' => ['required', 'string', 'max:7', Rule::unique('us_states', 'state_code')->ignore($id)],
        ];
    }

    protected function messages(): array
    {
        return [
            'state_name.required' => 'El nombre del estado es obligatorio.',
            'state_name.unique' => 'El estado ya está registrado.',
            'state_code.required' => 'El código del estado es obligatorio.',
            'state_code.unique' => 'El código ya está en uso.',
        ];
    }
}
