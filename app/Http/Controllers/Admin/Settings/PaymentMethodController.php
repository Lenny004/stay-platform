<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\PaymentMethod;
use Illuminate\Validation\Rule;

class PaymentMethodController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = PaymentMethod::class;
        $this->viewPath = 'admin.settings.payment-methods';
        $this->routePrefix = 'admin.settings.payment-methods';
        $this->resourceKey = 'payment-methods';
        $this->routeParameter = 'payment_method';

        $this->formFields = [
            [
                'name' => 'payment_method',
                'label' => 'Método de pago',
                'type' => 'text',
                'max' => 50,
                'required' => true,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'payment_method', 'label' => 'Método de pago'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'payment_method' => ['required', 'string', 'max:50', Rule::unique('payment_methods', 'payment_method')],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'payment_method' => ['required', 'string', 'max:50', Rule::unique('payment_methods', 'payment_method')->ignore($id)],
        ];
    }

    protected function messages(): array
    {
        return [
            'payment_method.required' => 'El método de pago es obligatorio.',
            'payment_method.unique' => 'El método de pago ya está registrado.',
        ];
    }
}
