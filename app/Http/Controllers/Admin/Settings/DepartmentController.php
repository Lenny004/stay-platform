<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\Department;
use Illuminate\Validation\Rule;

class DepartmentController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = Department::class;
        $this->viewPath = 'admin.settings.departments';
        $this->routePrefix = 'admin.settings.departments';
        $this->resourceKey = 'departments';
        $this->routeParameter = 'department';

        $this->formFields = [
            [
                'name' => 'department',
                'label' => 'Departamento',
                'type' => 'text',
                'max' => 50,
                'required' => true,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'department', 'label' => 'Departamento'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'department' => ['required', 'string', 'max:50', Rule::unique('departments', 'department')],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'department' => ['required', 'string', 'max:50', Rule::unique('departments', 'department')->ignore($id)],
        ];
    }

    protected function messages(): array
    {
        return [
            'department.required' => 'El nombre del departamento es obligatorio.',
            'department.unique' => 'El departamento ya está registrado.',
        ];
    }
}
