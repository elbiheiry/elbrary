<?php

namespace App\Http\Requests\Admin;

use App\ProductCut;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductCutRequest extends FormRequest
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
            'name.required' => 'برجاء ادخال طريقه القطع'
        ];
    }

    public function store($id)
    {
        $cut = new ProductCut();

        $cut->name = $this->name;
        $cut->type = $this->type;
        $cut->price = $this->price;
        $cut->product_id = $id;

        $cut->save();
    }

    public function edit($id)
    {
        $cut = ProductCut::find($id);

        $cut->name = $this->name;

        $cut->save();
    }
}
