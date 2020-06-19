<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method() == 'PUT'){
            //Form Update
            return [
                'name_service' => 'required|min:4|unique:services',
                'image' => 'max:1000',
                'fk_category' => 'required'
            ];
        }else{
            //Form Create
            return [
                'name_service' => 'required|min:4|unique:services',
                'image' => 'required|image|max:1000',
                'fk_category' => 'required'
            ];
        }
    }

    public function messages(){
        return [
            'name_service.required' => 'El campo nombre es obligatorio',
            'name_service.min' => 'El campo nombre debe tener mínimo :min caracteres',
            'name_service.unique' => 'El campo nombre debe ser único',
            'image.required' => 'El campo imagen es obligatorio',
            'image.image' => 'El campo imagen debe ser de tipo imagen',
            'image.max' => 'El campo imagen no puede superar 1 kilobyte',
            'fk_category.required' => 'El campo categoría es obligatorio'
        ];
    }
}
