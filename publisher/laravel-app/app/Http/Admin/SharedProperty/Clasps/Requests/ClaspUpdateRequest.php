<?php

namespace App\Http\Admin\SharedProperty\Clasps\Requests;

use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Illuminate\Foundation\Http\FormRequest;

class ClaspUpdateRequest extends FormRequest
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
            'data'                                => ['required','array:type,attributes,relationships','min:2'],
            'data.type'                           => ['required','string','in:' . Clasp::TYPE_RESOURCE],
            'data.attributes'                     => [
                'required','array:name'
            ],
            'data.attributes.name'          => ['required','string','unique:pgsql_pub.jw_properties.clasps,name'],
            // relationships
            'data.relationships'            => ['prohibited'],
        ];
    }
}
