<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\BeadMetrics\Requests;

use Domain\JewelleryProperties\Beads\BeadMetrics\Models\BeadMetric;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class BeadMetricUpdateRequest extends FormRequest
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
            'data.type'             => ['required','string','in:' . BeadMetric::TYPE_RESOURCE],
            'data.attributes'       => ['required','array:bead_size_id,bead_id,quantity,price','min:2'],
            'data.attributes.bead_size_id' => ['required','integer','exists:pgsql_pub.jw_properties.bead_sizes,id'],
            'data.attributes.bead_id'      => [
                'required','integer', Rule::unique('pgsql_pub.jw_properties.bead_metrics','bead_id')
                    ->where('bead_size_id', $this->input('data.attributes.bead_size_id')),
                'exists:pgsql_pub.jw_properties.beads,id'
            ],
            'data.attributes.quantity'     => ['sometimes','required','integer','min:0'],
            'data.attributes.price'        => ['sometimes','required','decimal:0,2','min:0'],
            // relationships
            'data.relationships'    => ['missing'],
        ];
    }

    public function messages(): array
    {
        return [
            'data.attributes.bead_id.unique' => 'A composite key for the selected bead_size_id with the selected bead_id already exists.',
        ];
    }
}
