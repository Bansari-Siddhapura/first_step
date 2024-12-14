<?php

namespace Modules\ItemManager\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $id = $this->id ?? '';
        return [
            'item_id' => 'required|unique:items_master,item_id,' . $id,
            'item_name' => 'required',
            'version' => 'required',
            'category' => 'required',
            'color' => 'required',
            'image_thumbnail_link' => 'required',
            'license_update' => 'nullable',
            'serve_latest_updates' => 'nullable'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
