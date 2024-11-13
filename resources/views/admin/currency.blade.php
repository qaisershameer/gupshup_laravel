@extends('admin.index')
@section('content')

    <style type="text/css">
        input[type='text'], input[type='number'], select {
          width: 380px;
          height: 45px;
          padding: 10px;
          font-size: 16px;
          box-sizing: border-box;
        }
        
        .div_deg {
            display: flex;
            justify-content: left;
            align-items: left;
        }

        .table_deg {
            width: 600px;
            text-align: center;
            margin: left;
            margin-top: 10px;
            border: 2px solid yellowgreen;
        }

        .sar-th {
            font-weight: bold; 
            background-color:deepskyblue;
            color: white;            
        }
        
        .sar-total {
            background-color: deepskyblue;
            text-align: right;
            font-weight: bold;
            color: white;
        }
                
        .pkr-th {
            background-color: mediumSeaGreen;
            color: white; 
            font-weight: bold;
        }
        
        .pkr-total {
            background-color: mediumSeaGreen;
            color: white; 
            text-align: right;
            font-weight: bold;
        }
        
        .right {
            text-align: right;
        }
        
        .left {
            text-align: left;
        }
        
        th {
          background-color: darkcyan;
          border: 1px solid skyblue;
          padding: 6px;
          font-size: 16px;
          font-weight: bold;
          color: white;
        }

        td {
          border: 1px solid skyblue;
          padding: 8px;
          font-size: 14px;
          color: white;
        }
        
    </style>
    
    <div class="container-fluid">

            <h3 style="color:white"> Currency Information </h3>

              <div class="div_deg">
    
                <form action="{{url('add_currency')}}" method="post">
    
                    @csrf
    
                    <div>
                        <input type="text" name="currency_name" placeholder="Enter Currency Title" required>
                        <input class="btn btn-success" type="submit" value="Save">
                    </div>
    
                </form>
    
              </div>              

            <table class="table_deg">
                <tr>
                    <th> Sr  </th>
                    <th> ID  </th>
                    <th> Currency Title </th>
                    <!--<th> Updated @ </th>-->
                    <th> Action </th>
                </tr>

               @foreach ($data as $key => $data)                                    
                <tr>
                    <!-- SrNo column -->
                    <td>{{ $key + 1 }}</td>
                    <td> {{$data->currencyId}} </td>
                    <td> {{$data->currencyTitle}} </td>
                    <!--<td> {{ \Carbon\Carbon::parse($data->updated_at)->format('d-M-y') }} </td>-->
                    
                    <td>
                        <a class="btn btn-success" href="{{url('edit_currency', $data->currencyId)}}"> <i class="fas fa-pencil-alt"></i> </a>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_currency', $data->currencyId)}}"> <i class="fas fa-trash-alt"></i> </a>
                    </td>                        
                </tr>
            @endforeach

            </table>            

          </div>

@endsection