<?php

namespace Modules\ItemManager\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Modules\ItemManager\Models\ItemMaster;

class RepeatOnlyTwoTime implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {      
        $item_names = ItemMaster::pluck('item_name')->all();
        $number_of_values = array_count_values($item_names);

        if (array_key_exists($value, $number_of_values) == $value) {
            $count = ItemMaster::where('item_name', $value)->count();
            //dd($count);
            if ($count >= 2) {
                $fail('Item name repeated 3rd time');
            }
        }
    }
}
