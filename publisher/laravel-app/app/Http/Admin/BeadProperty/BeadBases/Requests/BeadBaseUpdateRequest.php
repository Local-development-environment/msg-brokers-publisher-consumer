<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadBases\Requests;

use Domain\JewelleryProperties\Beads\BeadBases\Models\BeadBase;
use Illuminate\Foundation\Http\FormRequest;

final class BeadBaseUpdateRequest extends FormRequest
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
            'data.type'             => ['required','string','in:' . BeadBase::TYPE_RESOURCE],
            'data.attributes'       => ['required','array:name'],
            'data.attributes.name'  => ['required','string','unique:pgsql_pub.jw_properties.bead_bases,name'],
            // relationships
            'data.relationships'    => ['prohibited'],
        ];
    }
}
