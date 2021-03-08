<!-- View -> Hiện thị danh sách product theo CatalogID -->
<!-- page content -->
@extends('home')
@section('content')
<div class="right_col" role="main" style="height: 460px">
    <div class="x_content">
                
        <div style='display: flex;'>
            <div style='margin-right: 50px';>
                <img src="{{asset('images/'.$product->image_link)}}" alt=''>
            </div>
            <div>
                <h1>Thông tin sản phẩm</h1>
                <ul style='font-size: 15px';>
                    <li>
                        <span style='font-weight: bold';>Tên sản phẩm</span>
                        <p>{{$product->name}}</p>
                    </li>
                    <li>
                        <span style='font-weight: bold';>Giá sản phẩm</span>
                        <p>{{$product->price}}$</p>
                    </li>
                    <li>
                        <span style='font-weight: bold';>Mô tả sản phẩm</span>
                        <p>{{$product->desc}}</p>
                    </li>
                </ul>
                <button type='button' class='btn btn-secondary btn-sm'><a href="{{route('show-list-product')}}" style='color:white';>Trở lại danh sách</a></button>
            </div>
        </div>
   
    </div>
</div>
@endsection