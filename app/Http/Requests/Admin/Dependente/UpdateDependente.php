<?php

namespace App\Http\Requests\Admin\Dependente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDependente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.dependente.edit', $this->dependente);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => ['sometimes', 'string'],
            'nascimento' => ['sometimes', 'date'],
            'enabled' => ['sometimes', 'boolean'],
            'cliente' => ['required'],
            'parentesco' => ['required'],
        ];
    }

    /**
     * Modify input data
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
        return null;
    }

    public function getParentescoId()
    {
        if ($this->has('parentesco')) {
            return $this->get('parentesco')['id'];
        }
        return null;
    }
}
