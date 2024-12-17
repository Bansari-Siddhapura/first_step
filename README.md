# Validations

## 3 ways

- 1.validations inside controller
- 2.validation inside request file
- 3.custom validation Rules

### 1. validations inside controller

- we can use validate() of request instance for apply validations :
- it takes array as a parameter and array contains key and values

  - key : it is your database column name
  - value : it is your validations that are applied to that column - we can separate multiple validation either '|'' or we pass multiple validations inside single array

  - in array : 'item_id' => ['required', 'unique:items_master,item_id,' . $id],
  - using '|' : 'item_id' => 'required|unique:items_master,item_id,' . $id,

- if we want to pass the custom error message then we need to pass that inside second array.

for example :

```php
 public function store(Request $request)
    {
        $id = $request->id ?? '';
         $request->validate([
            'item_id' => ['required', 'unique:items_master,item_id,' . $id],
            'item_name' => 'required',
            'version' => 'required',
            'category' => 'required',
            'color' => 'required',
            'image_thumbnail_link' => 'required',
            'license_update' => 'nullable',
            'serve_latest_updates' => 'nullable'
        ], [
            'item_id.required' => 'item id required',
            'item_id.unique' => 'item_id must be unique'
        ]);

        //your logics
         return redirect()->route('items.show');
    }
```

### 2. validation using request file

- it provides 3 methods:
  - 1.rules() : it returns the set of rules in array.
  - 2.messages() : we can create this method manually for customizing error messages.
  - 3.authorize() : it determine if the user is authorized to make this request. it return true or false if true then if all validation rules are matches then pass request to the controller method and if false then after validation checking it throws 403(this action is unauthorized)

```php
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

    public function messages()
    {
        return [
            'item_id.required' => 'item id required',
            'item_id.unique' => 'item_id must be unique'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
```

### 3. custom validations

#### 1. create custom rule

- if we want to create globally :

  - it created at app\Rules\repeatOnly2.php

```php
    php artisan make:rule repeatOnly2
```

- if we want to create in module :

  - it created at Modules/ItemManager/app/Rules/RepeatOnlyTwoTime.php  

```php
    php artisan module:make-rule repeatOnlyTwoTime ItemManager
```

- how can use custom validation ?

for example :

- i want to make my custom validation like item name only repeat 2 time if user enter same item name third time then validation rise.

- Request File :

```php
 'item_name' => ['required','string',new RepeatOnlyTwoTime],
```

- repeatOnlyTwoTime.php :

```php
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
```

### list of validations

- required : required
- unique : another way to pass unique validation
    `php
        Rule::unique('items_master')->ignore($id)
    `
- size : size:5
- regex : regex:/[a-zA-Z0-9]{1,3}\.\d{2}\.\d{1,2}/
- nullable : nullable
- contains : contains:food,cloth (it is useful when we want to must contain this value)
- between : between:5,10 (it works like size. In this example min value 5 and max value 10 so its length between 5 to 10)
- digits : digits:5 (it works like size but it only allow digits with length or size)
- digits_between : digits_between:5,10 (it only allows digits length between 5 to 10)
- lowercase : lowercase
- uppercase : uppercase
- prohibited : it allows to must be empty field
- url : url:http,https
- exclude_if : exclude_if:item_name,books (it exclueds the validations of that fields where it applied if item_name is books)

- image validations :

  - image : must be an image in jpg, jpeg, png, bmp, gif, svg, or webp.
  - extentions : mimes:jpg,png (that only allows jpg and png images). , mimes:docx,pdf (that only allow docx and pdf files)
  - file : must be a successfully uploaded file
  - file types : File::types(['sql', 'jpg','png'])->min(30)->max(12 \* 1024)
  - dimensions : File::image()->min(30)->max(12 \* 1024)->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500))

```php
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
```
