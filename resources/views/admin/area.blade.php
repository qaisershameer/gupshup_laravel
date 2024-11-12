<!DOCTYPE html>
<html>
  <head> 
    
    @include('admin.css')
    
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
    
  </head>
  <body>
    
      @include('admin.header')

      @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
              
              <h1 style="color:white;">Areas Information</h1>

              <div class="div_deg">
    
                <form action="{{url('add_area')}}" method="post">
    
                    @csrf
    
                    <div>
                        <input type="text" name="area_name" placeholder="Enter Area Title" required>
                        <input class="btn btn-primary" type="submit" value="Add Area">
                    </div>
    
                </form>
    
              </div>              

            <table class="table_deg">
                <tr>
                    <th> Sr. #  </th>
                    <th> Area Id  </th>
                    <th> Area Title </th>
                    <th> Updated @ </th>
                    <th> Action </th>
                </tr>

               @foreach ($data as $key => $data)                                    
                <tr>
                    <!-- SrNo column -->
                    <td>{{ $key + 1 }}</td>
                    <td> {{$data->areaId}} </td>
                    <td> {{$data->areaTitle}} </td>
                    <td> {{ \Carbon\Carbon::parse($data->updated_at)->format('d-M-y') }} </td>
                    
                    <td>
                        <a class="btn btn-success" href="{{url('edit_area', $data->areaId)}}"><i class="fas fa-pencil-alt"></i></a>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_area', $data->areaId)}}"><i class="fas fa-trash-alt"></i></a>
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