<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\Food;
use Illuminate\Validation\Rule;

class FoodController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = Food::class;
        $this->viewPath = 'admin.settings.foods';
        $this->routePrefix = 'admin.settings.foods';
        $this->resourceKey = 'foods';
        $this->routeParameter = 'food';

        $this->formFields = [
            [
                'name' => 'food',
                'label' => 'Servicio de comida',
                'type' => 'text',
                'max' => 12,
                'required' => true,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'food', 'label' => 'Servicio de comida'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'food' => ['required', 'string', 'max:12', Rule::unique('foods', 'food')],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'food' => ['required', 'string', 'max:12', Rule::unique('foods', 'food')->ignore($id)],
        ];
    }

    protected function messages(): array
    {
        return [
            'food.required' => 'El nombre del servicio es obligatorio.',
            'food.unique' => 'El servicio ya está registrado.',
        ];
    }
}
