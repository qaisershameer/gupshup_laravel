@extends('admin.index')
@section('content')

    <style>
        label
        {
            display: inline-block;
            width: 200px;
            color: white;
        }

        .div_deg
        {
            padding: 10px;
        }
    </style>

    <div class="container-fluid">

            <form action="{{url('upload_food')}}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="div_deg"></div>

                <label for="">Food Title</label>
                <input type="text" name="title" required>

                <div class="div_deg"></div>

                <label for="">Food Details</label>
                <textarea name="detail" id="" cols="50" rows="5" required></textarea>                

                <div class="div_deg"></div>

                <label for="">Price</label>
                <input type="text" name="price" required>

                <div class="div_deg"></div>

                <label for="">Image</label>
                <input type="file" name="img" required>

                <div class="div_deg"></div>

                <input type="submit" value="Add Food" class="btn btn-warning">

            </form>

          </div>
          
  @endsection