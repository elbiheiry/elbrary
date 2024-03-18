@extends('admin.layouts.master')
@section('title')
    الايام
@endsection
@section('models')
    <div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل تريد حذف هذه اليوم ؟</h5>
                </div>
                <form class="modal-footer text-center">
                    <a type="button" class="custom-btn modalDLTBTN">مسح</a>
                    <a type="button" class="custom-btn red-bc" data-dismiss="modal">اغلاق</a>
                </form>
            </div>
        </div>
    </div>
    <div id="common-modal" class="modal fade" role="dialog">

    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>الايام</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">لوحة التحكم</a></li>
                    <li class="active">الايام</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.products.days',['id' => $id])}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <span><i class="ErrorMessage hidden" style="text-align:center; color: #D10508; font-size: 14px;"></i></span>
                <span><i class="SuccessMessage hidden" style="text-align:center; color: #2fd119; font-size: 14px;"></i></span>

                <div class="col-md-6 form-group">
                    <label>اليوم</label>
                    <select class="form-control" name="name">
                        <option value="السبت">السبت</option>
                        <option value="الاحد">الاحد</option>
                        <option value="الاثنين">الاثنين</option>
                        <option value="الثلاثاء">الثلاثاء</option>
                        <option value="الاربعاء">الاربعاء</option>
                        <option value="الخميس">الخميس</option>
                        <option value="الجمعه">الجمعه</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>مفعل</label>
                    <select class="form-control" name="active">
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                    </select>
                </div>
                <div class="spacer-15"></div>

                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
            </form>
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="spacer-15"></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                        <tr >
                            <th class="text-center">#</th>
                            <th class="text-center">اليوم</th>
                            <th class="text-center">مفعل</th>
                            <th class="text-center">الخيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($days as $index => $day)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$day->name}}</td>
                                <td>{{$day->active == 1 ? 'نعم' : 'لا'}}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.products.days.intervals',['id' => $day->id])}}" class="icon-btn blue-bc">
                                        <i class="fa fa-calendar"></i>
                                        الاحجام
                                    </a>
                                    <button data-url="{{route('admin.products.days.info',['id' => $day->id])}}" class="btn-modal-view icon-btn green-bc">
                                        <i class="fa fa-pencil"></i>
                                        تعديل
                                    </button>
                                    <button data-url="{{route('admin.products.days.delete',['id' => $day->id])}}" data-toggle="modal" data-target="#delete_user" class="icon-btn red-bc deleteBTN">
                                        <i class="fa fa-trash-o"></i>
                                        حذف
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection