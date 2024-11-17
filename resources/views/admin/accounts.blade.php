@extends('admin.index')
@section('content')

    <style type="text/css">
        input[type='text'], input[type='number'], select {
            width: 220px;
            height: 45px;
            padding: 10px;
            font-size: 16px;
            bottom-margin: 10px;
            box-sizing: border-box;
        }
    
        .div_deg {
            display: flex;
            justify-content: left;
            align-items: left;
        }
    
        .sar-th {
            font-weight: bold; 
            background-color: deepskyblue;
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

        .table_deg {
            width: 100%;  /* Set to 100% for responsiveness */
            text-align: center;
            margin-top: 20px; /* Added top margin here */
            border: 2px solid yellowgreen;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
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
        <h3 style="color:white;">Accounts Information</h3>
    
        <div class="div_deg">
            <form action="{{url('add_account')}}" method="post">
                @csrf
                <div>
                    <input type="text" name="account_name" placeholder="Enter Account Title" required>
                    <select name="accTypeId" required>
                        <option value=""> Select Account Type </option>                            
                        @foreach($accType as $accType)
                            <option value="{{$accType->accTypeId}}"> {{$accType->accTypeTitle}} </option>
                        @endforeach
                    </select>
    
                    <select name="parentId" required>
                        <option value=""> Select Parent Account </option>                            
                        @foreach($accParent as $accParent)
                            <option value="{{$accParent->parentId}}"> {{$accParent->accParentTitle}} </option>
                        @endforeach
                    </select>
    
                    <select name="areaId" required>
                        <option value=""> Select Area </option>
                        @foreach($area as $area)
                            <option value="{{$area->areaId}}"> {{$area->areaTitle}} </option>
                        @endforeach
                    </select>
    
                    <select name="currencyId" required>
                        <option value=""> Select Currency </option>
                        @foreach($currency as $currency)
                            <option value="{{$currency->currencyId}}"> {{$currency->currencyTitle}} </option>
                        @endforeach
                    </select>
    
                    <input class="btn btn-success" type="submit" value="Save">
                </div>
            </form>
        </div>              
    
        <div class="table-responsive table_deg">  <!-- Added Bootstrap responsive table class -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> Sr  </th>
                        <th> ID  </th>
                        <th> Account Title </th>
                        <th> Type </th>
                        <th> Parent </th>
                        <th> Area </th>
                        <th> Currency </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $account)
                    <tr>
                        <td> {{ (int) $index + 1 }} </td>
                        <td> {{$account->acId}} </td>
                        <td class="left"> {{$account->acTitle}} </td>
                        <td> {{$account->accTypeTitle}} </td>
                        <td> {{$account->accParentTitle}} </td>
                        <td> {{$account->areaTitle}} </td>
                        <td> {{$account->currencyTitle}} </td>
                        <td>
                            <a class="btn btn-success" href="{{url('edit_account', $account->acId)}}"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_account', $account->acId)}}"><i class="fas fa-trash-alt"></i></a>
                        </td>                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  <!-- End of table-responsive div -->
    </div>

@endsection
