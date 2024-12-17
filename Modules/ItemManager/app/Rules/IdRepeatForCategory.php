<?php

namespace Modules\ItemManager\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Modules\ItemManager\Models\ItemMaster;

class IdRepeatForCategory implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public $category, $id;
    public function __construct($category, $id)
    {
        $this->category = $category;
        $this->id = $id;
        //  dd($this->id);
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $count = ItemMaster::where('item_id', $value)->where('category', $this->category)->count();
        if ($this->id == '') {
            if ($count >= 2) {
                $fail('this item id is repeated 3rd time for that category');
            }
        } else {
            $found_column = ItemMaster::where('item_id', $value)->where('category', $this->category)->where('id', $this->id)->count();
            if ($found_column >= 1) {
                if ($count >= 3) {
                    $fail('this item id is repeated 3rd time for that category');
                }
            } else {
                if ($count >= 2) {
                    $fail('this item id is repeated 3rd time for that category');
                }
            }
        }
    }
}
