@extends('admin.layouts.master')
@section('page')
    View Orders
@endsection
@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Orders</h4>
                <p class="category">List of all orders</p>
            </div>
            <div class="content table-responsive table-full-width">
                @include('admin.layouts.message')
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->product_id}}</td>
                        <td>
                            {{$item->quantity}}
                            
                        </td>
                        <td>
                            
                            {{$item->price}}
                            
                        </td>
                        <td>
                            {{$item->created_at}}
                        </td>
                        <td>

                            Action
                        </td>
                    </tr>
                    @endforeach
                    

                    
                    </tbody>
                </table>

            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">User Details</h4>
                    <p class="category">
                        User Details
                    </p>
                </div>
                <div class="content table-responsive table-full-width">
                    @include('admin.layouts.message')
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{$order->user->id}}</th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>{{$order->user->name}}</th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>{{$order->user->email}}</th>
                            </tr>
                            <tr>
                                <th>Register At</th>
                                <th>{{$order->user->created_at}}</th>
                            </tr>
                        </thead>
                    </table>
    
                </div>
            </div>
        </div>
        @foreach ($order->products as $item)
            
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Product Details</h4>
                    <p class="category">
                        Products Details
                    </p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{$item->id}}</th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>{{$item->name}}</th>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <th>{{$item->description}}</th>
                            </tr>
                            <tr>
                                <th>image</th> 
                            <th><img src="{{url("/uploads/$item->image")}}" alt="" class="img-thumbnail"
                         style="width: 200px"></th>
                            </tr>
                        </thead>
                    </table>
    
                </div>
            </div>
        </div>
        @endforeach            
</div>
@endsection