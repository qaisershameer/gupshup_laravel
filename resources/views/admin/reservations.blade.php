<!DOCTYPE html>
<html>
  <head> 
    
    @include('admin.css')
    <style>
        table
        {
            border: 1px solid skyblue;
            margin: auto;
            width: 1500px;
        }
        th
        {
            color: white;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
            background-color: green;
            padding: 10px;
        }
        td
        {
            color: white;
            font-size: 12px;
            text-align: center;
            padding: 10px;
        }
    </style>
  </head>
  <body>
    
        @include('admin.header')

        @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <table>
                <tr>
                    <th> Phone Number </th>
                    <th> No of Guests </th>
                    <th> Time </th>
                    <th> Date </th>
                    <th> Special Instructions </th>
                    <th> Status </th>
                    <th> Change Status </th>
                </tr>

                @foreach ($data as $data)                                    
                    <tr>
                        <td> {{$data->phone}} </td>
                        <td> {{$data->guest}} </td>
                        <td> {{$data->time}} </td>
                        <td> {{$data->date}} </td>
                        <td> {{$data->note}} </td>
                        <td> {{$data->status}} </td>
                        <td>
                            <a onclick="return confirm('Are you sure to change this')" class="btn btn-warning" href="{{url('table_pending', $data->id)}}">Pending</a>
                            <a onclick="return confirm('Are you sure to change this')" class="btn btn-success" href="{{url('table_confirm', $data->id)}}">Confirmed</a>
                            <a onclick="return confirm('Are you sure to change this')" class="btn btn-danger" href="{{url('table_cancelled', $data->id)}}">Cancelled</a>
                        </td>                        
                    </tr>
                @endforeach
            </table>

          </div>
      </div>
    </div>
    
    <!-- JavaScript files-->
    @include('admin.js')

  </body>
  
</html>