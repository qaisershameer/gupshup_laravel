<!DOCTYPE html>
<html>
  <head> 
    
    @include('admin.css')

    <style>
        table
        {
          border: 1px solid skyblue;
          /* margin: auto; */
          width: 800px;
        }
        th
        {
          background: skyblue;
          color: white;
          padding: 10px;
          margin: 10px;
        }
        td
        {          
          color: white;
          padding: 10px;
          margin: 10px;
        }
    </style>

  </head>
  <body>
    
        @include('admin.header')

        @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <form action="{{url('delete_food')}}" method="post" enctype="multipart/form-data">

              @csrf

            <div>

              <h1>All Foods Data</h1>
              <table>

                <tr>

                  <th>Food Title</th>
                  <th>Details</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Update</th>
                  <th>Delete</th>

                </tr>

                @foreach ($data as $data)

                <tr>
                  <td> {{$data->title}} </td>
                  <td> {{$data->detail}} </td>
                  <td> {{$data->price}} </td>
                  <td> <img width="100" height="100" src="food_img/{{$data->image}}" alt=""> </td>

                  <td> <a class="btn btn-success"
                    {{-- onclick="return confirm('Are you sure want to update this record...?')" --}}
                    href="{{url('update_food',$data->id)}}"
                    >Update </a>
                  </td>
                  
                  <td>
                      <a class="btn btn-danger"                      
                        onclick="return confirm('Are you sure want to delete this record...?')"
                        href="{{url('delete_food',$data->id)}}
                        ">Delete</a>

                    </a>
                    
                   
                  </td>

                </tr>

                @endforeach

              </table>

            </div>

            </form>

          </div>
      </div>
    </div>
    
    <!-- JavaScript files-->
    @include('admin.js')

  </body>
  
</html>