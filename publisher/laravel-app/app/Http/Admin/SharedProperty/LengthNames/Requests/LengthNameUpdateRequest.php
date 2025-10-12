<?php

namespace App\Http\Admin\SharedProperty\LengthNames\Requests;

use Domain\Shared\JewelleryProperties\LengthNames\Models\LengthName;
use Illuminate\Foundation\Http\FormRequest;

class LengthNameUpdateRequest extends FormRequest
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
            'data'                          => ['required','array:type,attributes,relationships','min:2'],
            'data.type'                     => ['required','string','in:' . LengthName::TYPE_RESOURCE],
            'data.attributes'               => ['required','array:name,description','min:1'],
            'data.attributes.name'          => ['sometimes','string','unique:pgsql_pub.jw_properties.length_names,name'],
            'data.attributes.description'   => [
                'sometimes','string','unique:pgsql_pub.jw_properties.length_names,description'
            ],
            // relationships
            'data.relationships'            => ['prohibited'],
        ];
    }
}
