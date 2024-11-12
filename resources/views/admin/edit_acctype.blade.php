<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
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
              
              <h1 style="color:white;">Update Account Type</h1>

              <div class="div_deg">
    
                <form action="{{url('update_acctype', $data->accTypeId)}}" method="post">
    
                    @csrf
    
                    <div>
                      <input type="text" name="acctype_name" value="{{$data->accTypeTitle}}" placeholder="Enter Account Type Title" required>
                        <input class="btn btn-primary" type="submit" value="Update Account Type">
                    </div>
    
                </form>
    
              </div>              

          </div>
      </div>
    </div>
    
    <!-- JavaScript files-->
    @include('admin.js')

  </body>
  
</html>