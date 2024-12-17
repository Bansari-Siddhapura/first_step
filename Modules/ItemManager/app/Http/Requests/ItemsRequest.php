<?php

namespace Modules\ItemManager\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Modules\ItemManager\Rules\RepeatOnlyTwoTime;

class ItemsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $id = $this->id ?? '';
        // dd($this);
        return [
            'item_id' => ['required', 'numeric', 'digits_between:5,10', Rule::unique('items_master')->ignore($id)],
            'item_name' => ['required', 'string', new RepeatOnlyTwoTime],
            'version' => 'required|regex:/[a-zA-Z0-9]{1,3}\.\d{2}\.\d{1,2}/',
            'category' => 'required|array|min:2|contains:food',
            'color' => 'exclude_if:item_name,books|required',
            'image_thumbnail_link' => 'required|url:http,https',
            'profile' => ['required', File::image()->min(30)->max(12 * 1024)->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500))],
            'license_update' => 'nullable|boolean',
            'serve_latest_updates' => 'nullable|boolean'
        ];
    }

    public function messages()
    {
        return [
            'item_id.required' => 'Item id required',
            'item_id.unique' => 'Item id must be unique',
            'item_id.size' => 'Item id must be 5 digits',
            'category.contains' => 'Category must contain food',
            'image_thumbnail_link.url' => 'Link must be in valid format'
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
