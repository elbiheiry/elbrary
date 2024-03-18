<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل الخصم</h5>
        </div>
        <form class="edit-form" action="{{route('admin.products.discount.edit',['id' => $discount->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <span><i class="ErrorMessage hidden" style="text-align:center; color: #D10508; font-size: 14px;"></i></span>
                <span><i class="SuccessMessage hidden" style="text-align:center; color: #2fd119; font-size: 14px;"></i></span>
                {!! csrf_field() !!}

                <div class="form-group">
                    <label>الكود</label>
                    <input class="form-control" type="text" name="code" value="{{$discount->code}}">
                </div>
                <div class="form-group">
                    <label>قيمه الخصم</label>
                    <input type="number" class="form-control" name="amount" value="{{$discount->amount}}">
                </div>
                <div class="form-group">
                    <label>نوع الخصم</label>
                    <select class="form-control" name="type">
                        <option value="0" @if($discount->type == 0){{'selected'}}@endif>نسبه</option>
                        <option value="1" @if($discount->type == 1){{'selected'}}@endif>قيمه</option>
                    </select>
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
            </div>
        </form>
    </div>
</div>