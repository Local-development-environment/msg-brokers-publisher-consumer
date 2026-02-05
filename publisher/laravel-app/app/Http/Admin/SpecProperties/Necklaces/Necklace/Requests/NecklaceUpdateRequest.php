<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Necklaces\Necklace\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Models\NecklaceMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Models\Necklace;

final class NecklaceUpdateRequest extends FormRequest
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
    final public function rules(): array
    {
        $query = explode('/',$this->get('q'));
        $dataId = end($query);

        return [
            'data'                  => ['required','array:type,id,attributes,relationships','min:3'],
            'data.id'               => ['missing'],
            'data.type'             => ['required','string','in:' . Necklace::TYPE_RESOURCE],
            'data.attributes'       => ['required','array:clasp_id','min:1'],
            'data.attributes.clasp_id' => ['sometimes','required','integer','exists:pgsql_pub.jw_properties.clasps,id'],
            // relationships
            'data.relationships'    => ['sometimes','required','array:necklaceMetrics'],
            // one to many Bead to Bead Metrics
            'data.relationships.necklaceMetrics'             => ['required_with:data.relationships','array:data'],
            'data.relationships.necklaceMetrics.data'        => [
                'required_with:data.relationships.necklaceMetrics','array','min:1'
            ],
            'data.relationships.necklaceMetrics.data.*'      => [
                'required_with:data.relationships.necklaceMetrics','array:necklace_id,type,quantity,price,neck_size_id'
            ],
            'data.relationships.necklaceMetrics.data.*.type' => [
                'required_with:data.relationships.necklaceMetrics','string','in:' . NecklaceMetric::TYPE_RESOURCE
            ],
            'data.relationships.necklaceMetrics.data.*.quantity' => ['required_with:data.relationships.necklaceMetrics','int'],
            'data.relationships.necklaceMetrics.data.*.price'        => [
                'required_with:data.relationships.necklaceMetrics','decimal:0,2'
            ],
            'data.relationships.necklaceMetrics.data.*.necklace_id'      => [
                'required_with:data.relationships.necklaceMetrics',
                'same:' . $dataId,
                'integer', 'unique:pgsql_pub.jw_properties.necklaces,id'
            ],
            'data.relationships.necklaceMetrics.data.*.neck_size_id' => [
                'required_with:data.relationships.necklaceMetrics',
                'integer', 'distinct', 'exists:pgsql_pub.jw_properties.neck_sizes,id'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'data.id.exists' =>
                'Jewellery in the necklaces category with this ID does not exist.',
        ];
    }
}
