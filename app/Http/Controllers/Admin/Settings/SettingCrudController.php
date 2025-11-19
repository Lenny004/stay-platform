<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

abstract class SettingCrudController extends Controller
{
    /** @var class-string<Model> */
    protected string $modelClass;

    protected string $viewPath;

    protected string $routePrefix;

    protected string $resourceKey;

    protected ?string $routeParameter = null;

    /** @var array<int, array<string, mixed>> */
    protected array $formFields = [];

    /** @var array<int, array<string, string>> */
    protected array $tableColumns = [];

    protected string $defaultOrderBy = 'id';

    protected string $defaultOrderDirection = 'asc';

    public function index(): Response
    {
        $modelClass = $this->modelClass;
        $records = $modelClass::query()
            ->orderBy($this->defaultOrderBy, $this->defaultOrderDirection)
            ->get();

        return response()->view($this->viewPath, [
            'records' => $records,
            'columns' => $this->tableColumns,
            'formFields' => $this->formFields,
            'resourceKey' => $this->resourceKey,
            'routes' => $this->routeDefinitions(),
        ]);
    }

    public function store(Request $request)
    {
        $payload = $this->validated($request);
        $modelClass = $this->modelClass;
        $record = $modelClass::create($payload);

        return response()->json([
            'estado' => 1,
            'message' => 'Registro creado correctamente',
            'dataset' => $record,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $payload = $this->validated($request, $id);
        $modelClass = $this->modelClass;
        $record = $modelClass::findOrFail($id);
        $record->update($payload);

        return response()->json([
            'estado' => 1,
            'message' => 'Registro actualizado correctamente',
            'dataset' => $record->refresh(),
        ]);
    }

    public function destroy(int $id)
    {
        $modelClass = $this->modelClass;
        $record = $modelClass::findOrFail($id);
        $record->delete();

        return response()->json([
            'estado' => 1,
            'message' => 'Registro eliminado correctamente',
        ]);
    }

    protected function validated(Request $request, ?int $id = null): array
    {
        $rules = $this->rules($id);
        $messages = $this->messages();

        return $request->validate($rules, $messages);
    }

    protected function rules(?int $id = null): array
    {
        return $id === null ? $this->storeRules() : $this->updateRules($id);
    }

    protected function storeRules(): array
    {
        return [];
    }

    protected function updateRules(int $id): array
    {
        return $this->storeRules();
    }

    protected function messages(): array
    {
        return [];
    }
    protected function uniqueRule(string $table, string $column, ?int $id = null): Unique
    {
        $rule = Rule::unique($table, $column);

        if ($id !== null) {
            $rule->ignore($id);
        }

        return $rule;
    }

    protected function routeDefinitions(): array
    {
        $parameter = $this->routeParameter();

        return [
            'store' => route($this->routeName('store')),
            'update' => route($this->routeName('update'), [$parameter => '__ID__']),
            'destroy' => route($this->routeName('destroy'), [$parameter => '__ID__']),
        ];
    }

    protected function routeName(string $action): string
    {
        return sprintf('%s.%s', $this->routePrefix, $action);
    }

    protected function routeParameter(): string
    {
        if ($this->routeParameter) {
            return $this->routeParameter;
        }

        return Str::singular(str_replace('-', '_', $this->resourceKey));
    }

    protected function fieldNames(): array
    {
        return Arr::pluck($this->formFields, 'name');
    }
}
