<!DOCTYPE html>
<html>
  <head> 
    
    @include('admin.css')
    
    <style type="text/css">
    
        input[type='text'], select
        {
            width: 420px;
            height: 45px;
            /* color: white; */
        }
        
        .div_deg
        {
            display: flex;
            justify-content: left;
            align-items: left;
            padding: 10px;
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
              
              <h1 style="color:white;">Parent Accounts Information</h1>

              <div class="div_deg">
    
                <form action="{{url('add_accparent')}}" method="post">
    
                    @csrf
    
                    <div>
                        <input type="text" name="accparent_name" placeholder="Enter Parent Account Title" required>
      
                        <select name="accTypeId" required>
                          <option value=""> Select Account Type </option>                            
                          @foreach($accType as $accType)
                            <option value="{{$accType->accTypeId}}"> {{$accType->accTypeTitle}} </option>
                          @endforeach
                        </select>>    

                        <input class="btn btn-primary" type="submit" value="Add Parent Account">
                    </div>
    
                </form>
    
              </div>              

            <table class="table_deg">
                <tr>
                    <th> Sr. #  </th>
                    <th> Parent Id </th>
                    <th> Parent Title </th>
                    <th> Account Type </th>                    
                    <th> Updated @ </th>
                    <th> Action </th>
                </tr>

               @foreach ($data as $key => $data)                                    
                <tr>
                    <!-- SrNo column -->
                    <td>{{ $key + 1 }}</td>
                    <td> {{$data->parentId}} </td>
                    <td> {{$data->accParentTitle}} </td>
                    <td> {{$data->accTypeTitle}} </td>                    
                    <td> {{ \Carbon\Carbon::parse($data->updated_at)->format('d-M-y') }} </td>
                    
                    <td>
                        <a class="btn btn-success" href="{{url('edit_accparent', $data->parentId)}}"><i class="fas fa-pencil-alt"></i></a>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_accparent', $data->parentId)}}"><i class="fas fa-trash-alt"></i></a>
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