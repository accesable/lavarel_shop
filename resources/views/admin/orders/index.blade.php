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
                        <th>ID</th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $item)
                    <tr>
                        
                        <td>{{$item->id}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>
                            
                            @foreach ($item->products as $product)
                                {{$product->name.","}}
                            @endforeach
                        </td>
                        <td>
                            
                            @foreach ($item->orderItems as $Orderitem)
                                {{$Orderitem->quantity.","}}
                            @endforeach
                        </td>
                        <td>{{$item->address}}</td>
                        <td>
                            @if ($item->status)
                                <span class="label label-success">Confirmed</span></td>
                            @else
                                <span class="label label-warning">Pending</span></td>
                            @endif
                            
                        <td>

                            @if ($item->status)
                                {{link_to_route('order.pending','Pending',$item->id,['class'=>'btn btn-warning btn-sm'])}}
                            @else
                                {{link_to_route('order.confirm','Confirmed',$item->id,['class'=>'btn btn-success btn-sm'])}}
                            @endif
                                {{link_to_route('orders.show',' ',$item->id,['class'=>'btn btn-info btn-sm ti-list'])}}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        
                        <td>1</td>
                        <td>Dakota Rice</td>
                        <td>Samsung Galaxy</td>
                        <td>2</td>
                        <td>7/433,USA</td>
                        <td><span class="label label-success">Confirmed</span></td>
                        <td>
                            <button class="btn btn-sm btn-success ti-close"
                                    title="Cancel Order"></button>

                            <button class="btn btn-sm btn-primary ti-view-list-alt"
                                    title="Details"></button>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection