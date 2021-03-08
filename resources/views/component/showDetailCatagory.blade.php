<!-- View -> Hiện thị danh sách product theo CatalogID -->
<!-- page content -->
@extends ('home')
@section ('content')
<div class="right_col" role="main" style="height: 460px">
    <h5>Sản phẩm của danh mục:</h5><h5>{{$catagory->name}}</h5>
    <div class="x_content">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID SP</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá ($)</th>
                    <th>Mô tả</th>
                    <th>Ngày tạo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                        <tr>
                                <th scope='row'>{{$product->id}}</th>
                                <td>{{$product->name}}</a></td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->desc}}</td>
                                <td>{{$product->created_at}}</td>
                        </tr>
                @endforeach  
            </tbody>
        </table>
        {{$products->links()}}
    </div>
</div>
@endsection