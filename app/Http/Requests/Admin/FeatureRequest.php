<?php

namespace App\Http\Requests\Admin;

use App\Feature;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FeatureRequest extends FormRequest
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
            'description' => 'required',
            'image' => request()->route()->getName() == 'admin.features' ? 'required|max:5120' : 'max:5120'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'برجاء ادخال الاسم',
            'description.required' => 'برجاء ادخال الوصف',
            'image.required' => request()->route()->getName() == 'admin.features' ? 'برجاء ادخال صوره للخدمه' : '',
            'image.max' => 'اقصي حجم متاح للصوره هو 5 ميجابايت'
        ];
    }

    public function store()
    {
        $feature = new Feature();

        $feature->name = $this->name;
        $feature->description = $this->description;
        
        $this->image->store('features');
        $feature->image = $this->image->hashName();
        
        $feature->save();
    }

    public function edit($id)
    {
        $feature = Feature::find($id);

        $feature->name = $this->name;
        $feature->description = $this->description;

        if ($this->image){
            @unlink(storage_path('uploads/features/').$feature->image);
            $this->image->store('features');
            $feature->image = $this->image->hashName();
        }

        $feature->save();
    }
}
