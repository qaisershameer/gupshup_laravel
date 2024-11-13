@extends('admin.index')
@section('content')

    <style type="text/css">
    
        input[type='text'], select
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
              
              <h1 style="color:white;">Update Parent Account</h1>

              <div class="div_deg">
    
                <form action="{{url('update_accparent', $data->parentId)}}" method="post">
                  @csrf
                  <div>
                      <input type="text" name="accparent_name" value="{{$data->accParentTitle}}" placeholder="Enter Parent Account Title" required>
              
                      <select name="accTypeId" required>
                          <option value="">Select Account Type</option>
                          @foreach($accType as $accType)
                              <option value="{{$accType->accTypeId}}" 
                                  {{ $data->accTypeId == $accType->accTypeId ? 'selected' : '' }}>
                                  {{$accType->accTypeTitle}}
                              </option>
                          @endforeach
                      </select>
              
                      <input class="btn btn-success" type="submit" value="Update Parent Account">
                  </div>
              </form>
              
              </div>              

          </div>

@endsection