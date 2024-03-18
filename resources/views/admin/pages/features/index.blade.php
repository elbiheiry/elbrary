@extends('admin.layouts.master')
@section('title')
    المميزات
@endsection
@section('models')
    <div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل تريد حذف هذه الميزه ؟</h5>
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
                <h2>المميزات</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">لوحة التحكم</a></li>
                    <li class="active">المميزات</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.features')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <span class="col-sm-12"><i class="ErrorMessage hidden" style="text-align:center; color: #D10508; font-size: 14px;"></i></span>
                <span class="col-sm-12"><i class="SuccessMessage hidden" style="text-align:center; color: #2fd119; font-size: 14px;"></i></span>

                <div class="col-md-8">
                    <div class="form-group">
                        <label>الاسم</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>الوصف</label>
                        <input class="form-control" type="text" name="description">
                    </div>
                </div>

                <div class="col-md-4 form-group">
                    <div class="img-block">
                        <img src="{{asset('assets/admin/images/teys.jpg')}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                        <input type="file" name="image" style="display: none;">
                    </div>
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
                            <th class="text-center">الاسم</th>
                            <th class="text-center">الخيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($features as $index => $feature)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$feature->name}}</td>
                                <td class="text-center">
                                    <button data-url="{{route('admin.features.info',['id' => $feature->id])}}" class="btn-modal-view icon-btn green-bc">
                                        <i class="fa fa-pencil"></i>
                                        تعديل
                                    </button>
                                    <button data-url="{{route('admin.features.delete',['id' => $feature->id])}}" data-toggle="modal" data-target="#delete_user" class="icon-btn red-bc deleteBTN">
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