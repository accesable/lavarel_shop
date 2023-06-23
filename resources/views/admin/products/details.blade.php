@extends('admin.layouts.master')
@section('page')
    Product Detail    
@endsection
@section('content')
<div class="content table-responsive table-full-width">
    <table class="table table-striped">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{$product->id}}</td>
            </tr>

            <tr>
                <th>Name</th>
                <td>{{$product->name}}</td>
            </tr>

            <tr>
                <th>Description</th>
                <td>{{$product->description}}</td>
            </tr>

            <tr>
                <th>Price</th>
                <td>{{$product->price}}</td>
            </tr>

            <tr>
                <th>Created At</th>
                <td>{{$product->created_at}}</td>
            </tr>

            <tr>
                <th>Updated At</th>
                <td>{{$product->updated_at->diffForHumans()}}</td>
            </tr>

            <tr>
                <th>Image</th>
                <td><img src="{{url("/uploads/$product->image")}}" alt="" class="img-thumbnail" style="width: 150px;"></td>
            </tr>

        </tbody>

    </table>

</div>
@endsection