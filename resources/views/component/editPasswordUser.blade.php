@extends('home')
@section('content')
<!-- View (Edit Catalog's Name) -->
<div class="right_col" role="main" style="height: 460px">
<h5>Thay đổi mật khẩu: </h5>
    <ul>
    @foreach ($errors ->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    {{$err ?? ''}}
    </ul>
    <div class="x_content">
        <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" 
        action="{{route('update-user')}}" method="POST">
        @csrf
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">email:
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"  class="form-control " name="email" value="{{$email}}" disabled>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Mật khẩu cũ:
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="password"  class="form-control " name="Oldpassword" value="">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pasword">Mật khẩu mới:
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="password"  class="form-control " name="password" value="">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="password-confirmation">Nhập lại mật khẩu mới:
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="password"  class="form-control " name="password-confirmation" value="">
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">   
                    <button type="submit" class="btn btn-success">SAVE</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection