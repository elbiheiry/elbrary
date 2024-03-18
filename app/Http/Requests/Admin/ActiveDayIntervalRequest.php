<?php

namespace App\Http\Requests\Admin;

use App\ActiveDayInterval;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ActiveDayIntervalRequest extends FormRequest
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
            'name' => 'required',
            'start' => 'required',
            'end' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'برجاء ادخال اسم المده',
            'start.required' => 'برجاء ادخال موعد بدايه الفتره',
            'end.required' => 'برجاء ادخال موعد نهايه الفتره'
        ];
    }

    public function store($id)
    {
        $interval = new ActiveDayInterval();

        $interval->name = $this->name;
        $interval->start = $this->start;
        $interval->end = $this->end;
        $interval->day_id = $id;

        $interval->save();
    }

    public function edit($id)
    {
        $interval = ActiveDayInterval::find($id);

        $interval->name = $this->name;
        $interval->start = $this->start;
        $interval->end = $this->end;

        $interval->save();
    }
}
