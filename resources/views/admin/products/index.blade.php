@extends('admin.layouts.master')
@section('page')
    All Product
@endsection

@section('content')
<div class="content table-responsive table-full-width">
    @include('admin.layouts.message')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Desc</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
            <tr>
            
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->description}}</td>
                <td><img src="{{url("/uploads/$item->image")}}" alt="" class="img-thumbnail"
                         style="width: 50px"></td>
                <td>
                    {{Form::open(['route'=>['products.destroy',$item->id],'method'=>'DELETE'])}}
                        {{Form::button('<span class="fa fa-trash"></span>',['type'=>'submit','class'=>'btn btn-danger btn-sm','onclick'=>'return confirm("Are you sure want to delete")'])}}
                        {{link_to_route('products.edit','',$item->id,['class'=>'btn btn-info btn-sm ti-pencil'])}}
                        {{link_to_route('products.show','',$item->id,['class'=>'btn btn-info btn-sm ti-list'])}}
                    {{Form::close()}}
                    {{-- <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                    <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                    <button class="btn btn-sm btn-primary ti-view-list-alt"
                            title="Details"></button> --}}
                </td>
            </tr>
            @endforeach
        
        </tbody>
    </table>

</div>
@endsection