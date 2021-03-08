@extends('home')
@section('content')
<!-- page content -->
<div class="right_col" role="main" style="height: 460px">
    <h5>Danh mục hàng hoá:</h5>
    <div class="x_content">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($catagories as $catagory) 
                <tr>
                    <th scope='row'>{{$catagory->id}}</th>
                    <td><a href="/catagory/detail/{{$catagory->id}}">{{$catagory->name}}</a></td>
                    <td><a href="/catagory/edit/{{$catagory->id}}" class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit </a> 
                        <a href="/catagory/delete/{{$catagory->id}}" class='btn btn-danger btn-xs' 
                        onclick="return confirm('Bạn có chắc chắn muốn xoá danh mục {{$catagory->name}}')"><i class='fa fa-trash-o'></i> Delete </a>
                    </td>
                </tr> 
            @endforeach   
            </tbody>
        </table>
        {{$catagories->links()}}
        <button type="button" class="btn btn-round btn-success" name="addCatalog" 
        onclick="window.location.href=`{{route('show-addcatagory')}}`">Thêm danh mục</button>
    </div>
</div>
@endsection