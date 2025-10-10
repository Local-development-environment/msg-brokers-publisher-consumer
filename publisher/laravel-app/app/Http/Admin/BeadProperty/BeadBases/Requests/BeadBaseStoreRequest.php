<?php

namespace App\Http\Admin\BeadProperty\BeadBases\Requests;

use Domain\JewelleryProperties\Beads\BeadBases\Models\BeadBase;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Illuminate\Foundation\Http\FormRequest;

class BeadBaseStoreRequest extends FormRequest
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
            'data.type'                           => ['required','string','in:' . BeadBase::TYPE_RESOURCE],
            'data.attributes'                     => [
                'required','array:name'
            ],
            'data.attributes.name'          => ['required','string','unique:pgsql_pub.jw_properties.bead_bases,name'],
            // relationships
            'data.relationships'            => ['sometimes','required','array:beads'],
            // one to many Insert Colour to Inserts
            'data.relationships.beads'             => ['required_with:data.relationships','array:data'],
            'data.relationships.beads.data'        => ['required_with:data.relationships.beads','array','min:1'],
            'data.relationships.beads.data.*'      => ['required_with:data.relationships.beads','array:id,type'],
            'data.relationships.beads.data.*.type' => ['required_with:data.relationships.beads','string','in:' . Bead::TYPE_RESOURCE],
            'data.relationships.beads.data.*.id'   => [
                'required_with:data.relationships.beads', 'integer', 'distinct', 'exists:pgsql_pub.jw_properties.beads,id'
            ],
        ];
    }
}
