@extends('admin.index')
@section('content')
    
    <style type="text/css">
    
        label
        {
          display: inline-block;
          width: 150px;
          font-size: 18px!important;
          color: white!important;
          padding: 10px;
        }
        
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
              
        <h1 style="color:white;">Update Account</h1>

        <div class="div_deg">
    
            <form action="{{url('update_account', $data->acId)}}" method="post">
                
                @csrf
                  
                <div>
                      <label for=""> Account Title </label>  
                      <input type="text" name="account_name" value="{{$data->acTitle}}" placeholder="Enter Account Title" required>
                </div>

                <div>              
                    <label for=""> Account Type </label>  
                    <select name="accTypeId" required>
                        <option value="">Select Account Type</option>
                        @foreach($accType as $accType)  <!-- Use $acc here -->
                            <option value="{{ $accType->accTypeId }}" 
                                {{ $data->accTypeId == $accType->accTypeId ? 'selected' : '' }}>
                                {{ $accType->accTypeTitle }}
                            </option>
                        @endforeach
                    </select>                    
                </div>
                
                <div>
                    <label for=""> Parent Account </label>  
                    <select name="parentId" required>
                        <option value="">Select Parent Account</option>
                        @foreach($accParent as $accParent)
                            <option value="{{$accParent->parentId}}" 
                                {{ $data->parentId == $accParent->parentId ? 'selected' : '' }}>
                                {{$accParent->accParentTitle}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for=""> Area </label>
                    <select name="areaId" required>
                        <option value="">Select Area</option>
                        @foreach($area as $area)
                            <option value="{{$area->areaId}}" 
                                {{ $data->areaId == $area->areaId ? 'selected' : '' }}>
                                {{$area->areaTitle}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for=""> Currency </label>  
                    <select name="currencyId" required>
                        <option value="">Select Currency</option>
                        @foreach($currency as $currency)
                            <option value="{{$currency->currencyId}}" 
                                {{ $data->currencyId == $currency->currencyId ? 'selected' : '' }}>
                                {{$currency->currencyTitle}}
                            </option>
                        @endforeach
                    </select>
                </div>    
              
                <div>
                    <label for=""></label>
                    <input class="btn btn-success" type="submit" value="Update Account">
                </div>

              </form>
              
        </div>              

    </div>

@endsection