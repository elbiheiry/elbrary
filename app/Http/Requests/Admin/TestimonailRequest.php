<?php

namespace App\Http\Requests\Admin;

use App\Testimonial;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TestimonailRequest extends FormRequest
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
            'image' => request()->route()->getName() == 'admin.testimonials' ? 'required|max:5120' : 'max:5120'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => request()->route()->getName() == 'admin.testimonials' ? 'برجاء ادخال صوره لراي العميل' : '',
            'image.max' => 'اقصي حجم متاح للصوره هو 5 ميجابايت'
        ];
    }

    public function store()
    {
        $testimonial = new Testimonial();

        $this->image->store('testimonials');
        $testimonial->image = $this->image->hashName();

        $testimonial->save();
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);

        if ($this->image){
            @unlink(storage_path('uploads/testimonials/').$testimonial->image);
            $this->image->store('testimonials');
            $testimonial->image = $this->image->hashName();
        }

        $testimonial->save();
    }
}
