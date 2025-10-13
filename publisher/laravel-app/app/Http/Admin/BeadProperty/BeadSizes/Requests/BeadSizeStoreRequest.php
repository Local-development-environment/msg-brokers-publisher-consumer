<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadSizes\Requests;

use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use Illuminate\Foundation\Http\FormRequest;

final class BeadSizeStoreRequest extends FormRequest
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
            'data.attributes'       => ['required','array:value,length_name_id,unit'],
            'data.attributes.value' => ['required','numeric','unique:pgsql_pub.jw_properties.bead_sizes,value'],
            'data.attributes.unit'  => ['required','string'],
            'data.attributes.length_name_id'  => ['required','integer','exists:pgsql_pub.jw_properties.length_names,id'],
            // relationships
            'data.relationships'    => ['prohibited'],
        ];
    }
}
