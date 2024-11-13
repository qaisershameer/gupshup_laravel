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
              
              <h1 style="color:white;">Update Currency</h1>

              <div class="div_deg">
    
                <form action="{{url('update_currency', $data->currencyId)}}" method="post">
    
                    @csrf
    
                    <div>
                      <input type="text" name="currency_name" value="{{$data->currencyTitle}}" placeholder="Enter Currency Title" required>
                        <input class="btn btn-success" type="submit" value="Update currency">
                    </div>
    
                </form>
    
              </div>              

          </div>
          
@endsection