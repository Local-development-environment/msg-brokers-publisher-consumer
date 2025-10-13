<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\Beads\Requests;

use Domain\Jewelleries\Categories\Enums\CategoryListEnum;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

final class BeadStoreRequest extends FormRequest
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
            'data'                  => ['required','array:type,attributes,relationships,id','min:3'],
            'data.id'               => [
                'required','int','unique:pgsql_pub.jw_properties.beads,id',
                Rule::exists('pgsql_pub.jewelleries.jewelleries','id')
                    ->where('category_id', DB::table('jewelleries.categories')
                        ->where('name',CategoryListEnum::BEADS->value)->value('id'))
            ],
            'data.type'             => ['required','string','in:' . Bead::TYPE_RESOURCE],
            'data.attributes'       => ['required','array:bead_base_id,clasp_id,id'],
            'data.attributes.bead_base_id' => ['required','integer','exists:pgsql_pub.jw_properties.bead_bases,id'],
            'data.attributes.clasp_id' => ['required','integer','exists:pgsql_pub.jw_properties.clasps,id'],
            // relationships
            'data.relationships'    => ['missing'],
        ];
    }
}
