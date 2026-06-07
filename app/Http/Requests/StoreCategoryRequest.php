<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest{
    public function authorize(){
        return true;
    }
    protected function prepareForValidation(){
        $input = $this->all();
        array_walk($input, function (&$val) {
        if (is_string($val)) {
            $val = trim(strip_tags($val));
        }
    });
    $this->merge($input);
}
    public function rules(){
        return [
            "name" => "required|string|max:255",
        ];
    }
    public function messages(){
        return [
            "name.required" => "Nama kategori wajib diisi.",
        ];
    }
}