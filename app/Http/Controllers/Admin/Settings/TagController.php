<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\Tag;
use Illuminate\Validation\Rule;

class TagController extends SettingCrudController
{
    public function __construct()
    {
        $this->modelClass = Tag::class;
        $this->viewPath = 'admin.settings.tags';
        $this->routePrefix = 'admin.settings.tags';
        $this->resourceKey = 'tags';
        $this->routeParameter = 'tag';

        $this->formFields = [
            [
                'name' => 'tag_name',
                'label' => 'Etiqueta',
                'type' => 'text',
                'max' => 50,
                'required' => true,
            ],
        ];

        $this->tableColumns = [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'tag_name', 'label' => 'Etiqueta'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'tag_name' => ['required', 'string', 'max:50', Rule::unique('tags', 'tag_name')],
        ];
    }

    protected function updateRules(int $id): array
    {
        return [
            'tag_name' => ['required', 'string', 'max:50', Rule::unique('tags', 'tag_name')->ignore($id)],
        ];
    }

    protected function messages(): array
    {
        return [
            'tag_name.required' => 'El nombre de la etiqueta es obligatorio.',
            'tag_name.unique' => 'La etiqueta ya existe.',
        ];
    }
}
