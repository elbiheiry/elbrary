<?php

namespace App\Http\Requests\Admin;

use App\ProductDiscount;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductDiscountRequest extends FormRequest
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
            'amount' => 'required',
            'code' => 'required|unique:product_discounts,code,'.$this->id
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => 'برجاء ادخال قيمه الخصم',
            'code.required' => 'برجاء ادخال كود الخصم',
            'code.unique' => 'هذا الكود مستخدم بالفعل',
        ];
    }

    public function store($id)
    {
        $discount = new ProductDiscount();

        $discount->type = $this->type;
        $discount->amount = $this->amount;
        $discount->code = $this->code;
        $discount->product_id = $id;

        $discount->save();
    }

    public function edit($id)
    {
        $discount = ProductDiscount::find($id);

        $discount->type = $this->type;
        $discount->amount = $this->amount;
        $discount->code = $this->code;

        $discount->save();
    }
}
