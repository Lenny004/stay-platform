<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\PaymentStatus;
use Illuminate\Validation\Rule;

class PaymentStatusController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = PaymentStatus::class;
        $this->viewPath = 'admin.settings.payment-status';
        $this->routePrefix = 'admin.settings.payment-status';
        $this->resourceKey = 'payment-status';
        $this->routeParameter = 'payment_status';

        $this->formFields = [
            [
                'name' => 'payment_status',
                'label' => 'Estado de pago',
                'type' => 'text',
                'max' => 20,
                'required' => true,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'payment_status', 'label' => 'Estado de pago'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'payment_status' => ['required', 'string', 'max:20', Rule::unique('payment_status', 'payment_status')],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'payment_status' => ['required', 'string', 'max:20', Rule::unique('payment_status', 'payment_status')->ignore($id)],
        ];
    }

    protected function messages(): array
    {
        return [
            'payment_status.required' => 'El estado de pago es obligatorio.',
            'payment_status.unique' => 'El estado de pago ya existe.',
        ];
    }
}
