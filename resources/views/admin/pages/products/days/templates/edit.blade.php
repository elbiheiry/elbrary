<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل اليوم</h5>
        </div>
        <form class="edit-form" action="{{route('admin.products.days.edit',['id' => $day->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <span><i class="ErrorMessage hidden" style="text-align:center; color: #D10508; font-size: 14px;"></i></span>
                <span><i class="SuccessMessage hidden" style="text-align:center; color: #2fd119; font-size: 14px;"></i></span>
                {!! csrf_field() !!}

                <div class="col-md-6 form-group">
                    <label>اليوم</label>
                    <select class="form-control" name="name">
                        <option value="السبت" @if($day->name == 'السبت'){{'selected'}}@endif>السبت</option>
                        <option value="الاحد" @if($day->name == 'الاحد'){{'selected'}}@endif>الاحد</option>
                        <option value="الاثنين" @if($day->name == 'الاثنين'){{'selected'}}@endif>الاثنين</option>
                        <option value="الثلاثاء" @if($day->name == 'الثلاثاء'){{'selected'}}@endif>الثلاثاء</option>
                        <option value="الاربعاء" @if($day->name == 'الاربعاء'){{'selected'}}@endif>الاربعاء</option>
                        <option value="الخميس" @if($day->name == 'الخميس'){{'selected'}}@endif>الخميس</option>
                        <option value="الجمعه" @if($day->name == 'الجمعه'){{'selected'}}@endif>الجمعه</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>مفعل</label>
                    <select class="form-control" name="active">
                        <option value="1" @if($day->active == 1){{'selected'}}@endif>نعم</option>
                        <option value="0" @if($day->active == 0){{'selected'}}@endif>لا</option>
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