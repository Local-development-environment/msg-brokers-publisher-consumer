<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\Bead\Requests;

use Domain\Jewelleries\Categories\Enums\CategoryBuilderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Models\BeadMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;

final class BeadUpdateRequest extends FormRequest
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
        $categoryId = DB::table('jewelleries.categories')->where('name',CategoryBuilderEnum::BEADS->value)->value('id');
        $query = explode('/',$this->get('q'));
        $dataId = end($query);
//        dd(end($query));

        return [
            'data'                  => ['required','array:type,id,attributes,relationships','min:3'],
            'data.id' => ['missing'],
//            'data.id'               => [
//                'required','int', 'unique:pgsql_pub.jw_properties.beads,id',
//                Rule::exists('pgsql_pub.jewelleries.jewelleries','id')
//                    ->where('category_id', $categoryId)
//            ],
            'data.type'             => ['required','string','in:' . Bead::TYPE_RESOURCE],
            'data.attributes'       => ['required','array:bead_base_id,clasp_id','min:1'],
            'data.attributes.bead_base_id' => [
                'sometimes','required','integer','exists:pgsql_pub.jw_properties.bead_bases,id'
            ],
            'data.attributes.clasp_id' => ['sometimes','required','integer','exists:pgsql_pub.jw_properties.clasps,id'],
            // relationships
            'data.relationships'    => ['sometimes','required','array:beadMetrics'],
            // one to many Bead to Bead Metrics
            'data.relationships.beadMetrics'             => ['required_with:data.relationships','array:data'],
            'data.relationships.beadMetrics.data'        => [
                'required_with:data.relationships.beadMetrics','array','min:1'
            ],
            'data.relationships.beadMetrics.data.*'      => [
                'required_with:data.relationships.beadMetrics','array:bead_id,type,quantity,price,neck_size_id'
            ],
            'data.relationships.beadMetrics.data.*.type' => [
                'required_with:data.relationships.beadMetrics','string','in:' . BeadMetric::TYPE_RESOURCE
            ],
            'data.relationships.beadMetrics.data.*.quantity' => ['required_with:data.relationships.beadMetrics','int'],
            'data.relationships.beadMetrics.data.*.price'        => [
                'required_with:data.relationships.beadMetrics','decimal:0,2'
            ],
            'data.relationships.beadMetrics.data.*.bead_id'      => [
                'required_with:data.relationships.beadMetrics',
                'same:' . $dataId,
                'integer', 'unique:pgsql_pub.jw_properties.beads,id'
            ],
            'data.relationships.beadMetrics.data.*.neck_size_id' => [
                'required_with:data.relationships.beadMetrics',
                'integer', 'distinct', 'exists:pgsql_pub.jw_properties.neck_sizes,id'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'data.id.exists' =>
                'Jewellery in the beads category with this ID does not exist.',
        ];
    }
}
