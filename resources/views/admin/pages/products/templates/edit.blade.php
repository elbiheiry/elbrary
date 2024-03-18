<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل المنتج</h5>
        </div>
        <form class="edit-form" action="{{route('admin.products.edit',['id' => $product->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <span><i class="ErrorMessage hidden" style="text-align:center; color: #D10508; font-size: 14px;"></i></span>
                <span><i class="SuccessMessage hidden" style="text-align:center; color: #2fd119; font-size: 14px;"></i></span>
                {!! csrf_field() !!}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الاسم</label>
                        <input class="form-control" type="text" name="name" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label>السعر</label>
                        <input class="form-control" type="number" name="price" value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label>اظهار</label>
                        <select class="form-control" name="active">
                            <option value="1" @if($product->active == 1){{'selected'}}@endif>نعم</option>
                            <option value="0" @if($product->active == 0){{'selected'}}@endif>لا</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-block">
                        <img src="{{asset('storage/uploads/products/'.$product->image)}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                        <input type="file" name="image" style="display: none;">
                    </div>
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
        </form>
    </div>
</div>