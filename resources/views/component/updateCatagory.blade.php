@extends('home')
@section('content')
<!-- View (Edit Catalog's Name) -->
<div class="right_col" role="main" style="height: 460px">
    <div class="x_content">
        <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" 
        action="/catagory/edit/{{$catagory->id}}" method="POST">
        @csrf
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Tên danh mục:
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text"  class="form-control " name="name" value="{{$catagory->name}}">
                </div>
            </div>
            
            
            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    
                    <button type="submit" class="btn btn-success" name="editCatalog">SAVE</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection