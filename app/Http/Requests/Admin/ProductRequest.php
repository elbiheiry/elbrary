<?php

namespace App\Http\Requests\Admin;

use App\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class ProductRequest extends FormRequest
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
        if (\Request::route()->getName() == 'admin.products'){
            return [
                'name' => 'required',
                'price' => 'required',
                'image' => 'required|image|max:5120'
            ];
        }else{
            return [
                'name' => 'required',
                'price' => 'required',
                'image' => 'image|max:5120'
            ];
        }
    }

    public function messages()
    {
        if (\Request::route()->getName() == 'admin.products'){
            return [
                'name.required' => 'برجاء ادخال الاسم',
                'price.required' => 'برجاء ادخال سعر المنتج',
                'image.required' => 'برجاء رفع صوره',
                'image.image' => 'يجب اختيار صوره وليس ملف',
                'image.max' => 'حجم الصوره يجب الا يزيد عن 5 ميجابايت'
            ];
        }else{
            return [
                'name.required' => 'برجاء ادخال الاسم',
                'price.required' => 'برجاء ادخال سعر المنتج',
                'image.image' => 'يجب اختيار صوره وليس ملف',
                'image.max' => 'حجم الصوره يجب الا يزيد عن 5 ميجابايت',
            ];
        }
    }

    public function store()
    {
        $product = new Product();

        $product->name = $this->name;
        $product->slug = str_slug($this->name);
        $product->active = $this->active;
        $product->price = $this->price;

        $this->image->store('products');
        $product->image = $this->image->hashName();

        Image::make(storage_path('uploads/products').'/'.$product->image)
            ->resize(490,370)
            ->save(storage_path('uploads/products').'/'.$product->image);

        $product->save();
    }

    public function edit($id)
    {
        $product = Product::find($id);

        $product->name = $this->name;
        $product->slug = str_slug($this->name);
        $product->active = $this->active;
        $product->price = $this->price;

        if (!empty($this->image)) {
            @unlink(storage_path('uploads/products') . "/{$product->image}");
            $this->image->store('products');
            $product->image = $this->image->hashName();
            Image::make(storage_path('uploads/products').'/'.$product->image)
                ->resize(490,370)
                ->save(storage_path('uploads/products').'/'.$product->image);
        }

        $product->save();
    }
}
