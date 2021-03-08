@extends('home')
@section('content')
<div class="right_col" role="main" style="height: 460px">
    <h5>Danh sách Sản phẩm</h5>
    <div class="x_content">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá ($)</th>
                    <th>Mô tả</th>
                    <th>Danh Mục</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope='row'>{{$product->id}}</th>
                        <td><a href='/product/detail/{{$product->id}}'>{{$product->name}}</a></td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->desc}}</td>
                        <td>{{$product->catalogname}}</td>
                        <td><a href="/product/update/{{$product->id}}" class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit </a> 
                            <a href="/product/destroy/{{$product->id}}" class='btn btn-danger btn-xs' 
                            onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm {{$product->name}}')"><i class='fa fa-trash-o'></i> Delete </a>
                        </td>
                    </tr> 
                @endforeach          
            </tbody>
        </table>
        {{$products->links()}}
        <button type="button" class="btn btn-round btn-success"
         onclick="window.location.href=`{{route('create-product')}}`">Thêm sản phẩm</button>
    </div>
</div>
@endsection