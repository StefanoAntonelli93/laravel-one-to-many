<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // posso usare anche array per le validazioni
            'name' => ['required', 'string', 'min:5', 'max:70', Rule::unique('projects')->ignore($this->project)],
            'description' => 'string|min:5|max:255',
            // se id di type esiste nell'entità type alla colonna id allora è valido
            'type_id' => ['nullable', 'exists:types,id']
        ];
    }
}
