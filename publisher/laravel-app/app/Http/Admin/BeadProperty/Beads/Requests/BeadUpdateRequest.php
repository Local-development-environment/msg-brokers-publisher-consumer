<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\Beads\Requests;

use Domain\Jewelleries\Categories\Enums\CategoryListEnum;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
        $categoryId = DB::table('jewelleries.categories')->where('name',CategoryListEnum::BEADS->value)->value('id');

        return [
            'data'                  => ['required','array:type,id,attributes,relationships','min:3'],
            'data.id'               => [
                'required','int', Rule::exists('pgsql_pub.jewelleries.jewelleries','id')
                    ->where('category_id', $categoryId)
            ],
            'data.type'             => ['required','string','in:' . Bead::TYPE_RESOURCE],
            'data.attributes'       => ['required','array:bead_base_id,clasp_id','min:1'],
            'data.attributes.bead_base_id' => [
                'sometimes','required','integer','exists:pgsql_pub.jw_properties.bead_bases,id'
            ],
            'data.attributes.clasp_id' => ['sometimes','required','integer','exists:pgsql_pub.jw_properties.clasps,id'],
            // relationships
            'data.relationships'    => ['missing'],
        ];
    }
}
