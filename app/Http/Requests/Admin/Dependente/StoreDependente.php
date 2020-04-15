<?php

namespace App\Http\Requests\Admin\Dependente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreDependente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.dependente.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string'],
            'nascimento' => ['required', 'date'],
            'enabled' => ['required', 'boolean'],
            'cliente' => ['required'],
            'parentesco' => ['required'],
        ];
    }

    /**
     * Modify input data.
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }

    public function getClienteId()
    {
        if ($this->has('cliente')) {
            return $this->get('cliente')['id'];
        }
    }

    public function getParentescoId()
    {
        if ($this->has('parentesco')) {
            return $this->get('parentesco')['id'];
        }
    }
}
