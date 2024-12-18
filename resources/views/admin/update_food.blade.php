@extends('admin.index')
@section('content')

    <style>
        .div_deg
        {
            padding: 10px;
        }
        label
        {
            display: inline-block;
            width: 200px;
        }
    </style>

    <div class="container-fluid">

            <h1>Update Food</h1>

            <form action="{{url('edit_food',$food->id)}}" method="post" enctype="multipart/form-data">
                
                @csrf

                <div class="div_deg">
                    <label for="">Food Title</label>
                    <input type="text" name="title" value="{{$food->title}}">
                </div>

                <div class="div_deg">
                    <label for="">Food Details</label>
                    <textarea name="detail" id="" cols="50" rows="5">{{$food->detail}}</textarea>                    
                </div>

                <div class="div_deg">
                    <label for="">Food Price</label>
                    <input type="text" name="price" value="{{$food->price}}">
                </div>

                <div class="div_deg">
                    <label for="">Current Image</label>
                    <img width="100px" height="100px" src="food_img/{{$food->image}}" alt="">                    
                </div>

                <div class="div_deg">
                    <label for="">Change Image</label>
                    <input type="file" name="image">                    
                </div>

                <div class="div_deg">
                    <input class="btn btn-success" type="submit" value="Update Food">

                </div>

            </form>

          </div>

@endsection