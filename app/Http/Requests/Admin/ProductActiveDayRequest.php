<?php

namespace App\Http\Requests\Admin;

use App\Cityday;
use App\ProductActiveDay;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductActiveDayRequest extends FormRequest
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
            'name.required' => 'برجاء ادخال اليوم'
        ];
    }

    public function store($id)
    {
        $day = new ProductActiveDay();

        $day->name = $this->name;
        $day->active = $this->active;
        $day->product_id = $id;

        $day->save();
    }

    public function edit($id)
    {
        $day = ProductActiveDay::find($id);

        $day->name = $this->name;
        $day->active = $this->active;

        $day->save();
    }
}
