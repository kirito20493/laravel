@extends('home')
@section('content')
<div class="right_col" role="main" style="height: 460px">
    <h5>Danh sách User</h5>
    <div class="x_content">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <th scope='row'>{{$customer->id}}</th>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->address}}</td>
                        <td><a href="/user/delete/{{$customer->id}}" class='btn btn-danger btn-xs' 
                        onclick="return confirm('Bạn có chắc chắn muốn xoá tài khoản {{$customer->email}}')"><i class='fa fa-trash-o'></i> Delete </a></td>
                    </tr> 
                @endforeach          
            </tbody>
        </table>
        {{$customers->links()}}
    </div>
</div>
@endsection