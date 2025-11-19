<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\Currency;
use Illuminate\Validation\Rule;

class CurrencyController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = Currency::class;
        $this->viewPath = 'admin.settings.currencies';
        $this->routePrefix = 'admin.settings.currencies';
        $this->resourceKey = 'currencies';
        $this->routeParameter = 'currency';

        $this->formFields = [
            [
                'name' => 'currency',
                'label' => 'Divisa',
                'type' => 'text',
                'max' => 50,
                'required' => true,
            ],
            [
                'name' => 'symbol',
                'label' => 'Símbolo',
                'type' => 'text',
                'max' => 5,
                'required' => false,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'currency', 'label' => 'Divisa'],
            ['attribute' => 'symbol', 'label' => 'Símbolo'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'currency' => ['required', 'string', 'max:50', Rule::unique('currencies', 'currency')],
            'symbol' => ['nullable', 'string', 'max:5'],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'currency' => ['required', 'string', 'max:50', Rule::unique('currencies', 'currency')->ignore($id)],
            'symbol' => ['nullable', 'string', 'max:5'],
        ];
    }

    protected function messages(): array
    {
        return [
            'currency.required' => 'El nombre de la divisa es obligatorio.',
            'currency.unique' => 'La divisa ya está registrada.',
        ];
    }
}
