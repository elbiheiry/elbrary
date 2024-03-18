<?php

namespace App\Http\Requests\Admin;

use App\Home;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class HomeRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'max:5120'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'برجاء ادخال العنوان',
            'description.required' => 'برجاء ادخال الوصف',
            'image.max' => 'اقصي حجم متاح للصوره هو 5 ميجابايت'
        ];
    }

    public function edit($id)
    {
        $home = Home::find($id);

        $home->title = $this->title;
        $home->description = $this->description;

        if ($this->image){
            @unlink(storage_path('uploads/home/').$home->image);
            $this->image->store('home');
            $home->image = $this->image->hashName();
        }

        $home->save();
    }
}
