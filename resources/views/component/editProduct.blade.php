@extends('home')
@section('content')
<!-- View (Edit Catalog's Name) -->
<div class="right_col" role="main" style="height: 460px">
<h5>Sửa thông tin sản phẩm:</h5>
    <ul>
    @foreach ($errors ->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
    <div class="x_content">
        <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" 
        action="/product/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Tên sản phẩm:
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"  class="form-control " name="name" value="{{$product->name}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Giá ($):
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"  class="form-control " name="price" value="{{$product->price}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Mô tả:
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"  class="form-control " name="desc" value="{{$product->desc}}">
                </div>
            </div>
            <div class="item form-group">
                <label for="catalog_name" class="col-form-label col-md-3 col-sm-3 label-align">Chọn danh mục: </label>
                <div class="col-md-2 col-sm-2 btn-group" role="group">
                    <select name="catalogID" id="catalog">
                        @foreach ($catagories as $catagorie)
                        <option value="{{$catagorie->id}}">{{$catagorie->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image_link">Chọn ảnh sản phẩm:
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="form-control" name="image_link" value="">
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