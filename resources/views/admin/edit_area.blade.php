@extends('admin.index')
@section('content')

    <style type="text/css">
    
        input[type='text']
        {
            width: 420px;
            height: 45px;
        }
        
        .div_deg
        {
            display: flex;
            justify-content: left;
            align-items: left;
        }

        .table_deg
        {
            width: 1500px;
            text-align: center;
            margin: left;
            margin-top: 50px;
            border: 2px solid yellowgreen;
        }

        th
        {
          background-color: skyblue;
          padding: 15px;
          font-size: 20px;
          font-weight: bold;
          color: white;
        }

        td
        {
          border: 1px solid skyblue;
          padding: 10px;
          font-size: 15px;
          color: white;
        }

    </style>
    
          <div class="container-fluid">
              
              <h1 style="color:white;">Update Area</h1>

              <div class="div_deg">
    
                <form action="{{url('update_area', $data->areaId)}}" method="post">
    
                    @csrf
    
                    <div>
                      <input type="text" name="area_name" value="{{$data->areaTitle}}" placeholder="Enter Area Title" required>
                        <input class="btn btn-success" type="submit" value="Update Area">
                    </div>
    
                </form>
    
              </div>              

          </div>
          
@endsection