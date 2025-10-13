<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadSizes\Requests;

use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use Illuminate\Foundation\Http\FormRequest;

final class BeadSizeUpdateRequest extends FormRequest
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
            'data'                  => ['required','array:type,attributes,relationships','min:2'],
            'data.type'             => ['required','string','in:' . BeadSize::TYPE_RESOURCE],
            'data.attributes'       => ['required','array:value,length_name_id,unit','min:1'],
            'data.attributes.value' => [
                'sometimes','required','numeric','unique:pgsql_pub.jw_properties.bead_sizes,value'
            ],
            'data.attributes.unit'            => ['sometimes','required','string'],
            'data.attributes.length_name_id'  => ['sometimes','required','integer'],
            // relationships
            'data.relationships'              => ['missing'],
        ];
    }
}
