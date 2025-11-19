<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\UserType;
use Illuminate\Validation\Rule;

class UserTypeController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = UserType::class;
        $this->viewPath = 'admin.settings.user-types';
        $this->routePrefix = 'admin.settings.user-types';
        $this->resourceKey = 'user-types';
        $this->routeParameter = 'user_type';

        $this->formFields = [
            [
                'name' => 'user_type',
                'label' => 'Tipo de usuario',
                'type' => 'text',
                'max' => 50,
                'required' => true,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'user_type', 'label' => 'Tipo de usuario'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'user_type' => ['required', 'string', 'max:50', Rule::unique('user_types', 'user_type')],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'user_type' => ['required', 'string', 'max:50', Rule::unique('user_types', 'user_type')->ignore($id)],
        ];
    }

    protected function messages(): array
    {
        return [
            'user_type.required' => 'El tipo de usuario es obligatorio.',
            'user_type.unique' => 'El tipo de usuario ya existe.',
        ];
    }
}
