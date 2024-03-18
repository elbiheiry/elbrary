<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل المدينه</h5>
        </div>
        <form class="edit-form" action="{{route('admin.home.edit',['id' => $home->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <span ><i class="ErrorMessage hidden" style="text-align:center; color: #D10508; font-size: 14px;"></i></span>
                <span ><i class="SuccessMessage hidden" style="text-align:center; color: #2fd119; font-size: 14px;"></i></span>
                {!! csrf_field() !!}
                <div class="form-group">
                    <div class="img-block">
                        <img src="{{asset('storage/uploads/home/'.$home->image)}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                        <input type="file" name="image" style="display: none;">
                    </div>
                </div>
                <div class="form-group">
                    <label>العنوان</label>
                    <input class="form-control" type="text" name="title" value="{{$home->title}}">
                </div>
                <div class="form-group">
                    <label>الوصف</label>
                    <textarea class="form-control" name="description">{{$home->description}}</textarea>
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
            </div>
        </form>
    </div>
</div>