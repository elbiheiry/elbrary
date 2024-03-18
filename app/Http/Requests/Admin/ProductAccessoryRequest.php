<?php

namespace App\Http\Requests\Admin;

use App\ProductAccessory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductAccessoryRequest extends FormRequest
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

    protected function failedValidation(Validator $validator)
    {
        $result = ['status' => 'error' ,'data' => $validator->errors()->first()];

        throw new HttpResponseException(response()->json($result , 200));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'برجاء ادخال اسم الملحق'
        ];
    }

    public function store($id)
    {
        $accessory = new ProductAccessory();

        $accessory->name = $this->name;
        $accessory->product_id = $id;

        $accessory->save();
    }

    public function edit($id)
    {
        $accessory = ProductAccessory::find($id);

        $accessory->name = $this->name;

        $accessory->save();
    }
}
