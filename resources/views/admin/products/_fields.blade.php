<div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
    {{Form::label('product_name','Product Name')}}
    {{Form::text('name',$product->name,['class'=>'form-control border-input','placeholder'=>'Macbook Pro'])}}
    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
</div>

<div class="form-group {{$errors->has('price') ? 'has-error' : ''}}">
    {{Form::label('product_price','Product Price:')}}
    {{Form::text('price',$product->price,['class'=>'form-control border-input','placeholder'=>'$2500'])}}
    <span class="text-danger">{{$errors->has('price') ? $errors->first('price') : ''}}</span>
</div>

<div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
    {{Form::label('product_description','Product Description:')}}
    {{Form::textarea('description',$product->description,['class'=>'form-control border-input','placeholder'=>'Your Description'])}}
    <span class="text-danger">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
</div>

<div class="form-group {{$errors->has('image') ? 'has-error' : ''}}">
    {{Form::label('product_image','Product Image:')}}
    {{Form::file('image',['class'=>'form-control border-input ','id'=>'image'])}}
    <div class="holder">
        <img id="imgPreview" class="imgUpload" src="#" alt="pic" />
    </div>
    <span class="text-danger">{{$errors->has('image') ? $errors->first('image') : ''}}</span>
</div>
