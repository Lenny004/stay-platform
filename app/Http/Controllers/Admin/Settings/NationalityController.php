<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\Nationality;
use Illuminate\Validation\Rule;

class NationalityController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = Nationality::class;
        $this->viewPath = 'admin.settings.nationalities';
        $this->routePrefix = 'admin.settings.nationalities';
        $this->resourceKey = 'nationalities';
        $this->routeParameter = 'nationality';

        $this->formFields = [
            [
                'name' => 'country_name',
                'label' => 'País',
                'type' => 'text',
                'max' => 50,
                'required' => true,
            ],
            [
                'name' => 'country_code',
                'label' => 'Código telefónico',
                'type' => 'text',
                'max' => 10,
                'required' => false,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'country_name', 'label' => 'País'],
            ['attribute' => 'country_code', 'label' => 'Código'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'country_name' => ['required', 'string', 'max:50', Rule::unique('nationalities', 'country_name')],
            'country_code' => ['nullable', 'string', 'max:10', Rule::unique('nationalities', 'country_code')],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'country_name' => ['required', 'string', 'max:50', Rule::unique('nationalities', 'country_name')->ignore($id)],
            'country_code' => ['nullable', 'string', 'max:10', Rule::unique('nationalities', 'country_code')->ignore($id)],
        ];
    }

    protected function messages(): array
    {
        return [
            'country_name.required' => 'El nombre del país es obligatorio.',
            'country_name.unique' => 'El país ya está registrado.',
            'country_code.unique' => 'El código ya está asociado a otro país.',
        ];
    }
}
