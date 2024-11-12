<!DOCTYPE html>
<html>
  <head> 
    
    @include('admin.css')
    
    <style type="text/css">
    
        input[type='text'], select
        {
            width: 225px;
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
              
              <h1 style="color:white;">Accounts Information</h1>

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

                        <input class="btn btn-primary" type="submit" value="Add Account">
                    </div>
    
                </form>
    
              </div>              

            <table class="table_deg">
                <tr>
                    <th> Sr. #  </th>
                    <th> Ac Id  </th>
                    <th> Account Title </th>
                    <th> Type </th>
                    <th> Parent </th>
                    <th> Area </th>
                    <th> Currency </th>
                    <th> Updated @ </th>
                    <th> Action </th>
                </tr>

                @foreach ($data as $index => $account)
                <tr>
                    <!-- SrNo column -->
                    <td> {{ (int) $index + 1 }} </td>
                    <td> {{$account->acId}} </td>
                    <td> {{$account->acTitle}} </td>
                    <td> {{$account->accTypeTitle}} </td>
                    <td> {{$account->accParentTitle}} </td>
                    <td> {{$account->areaTitle}} </td>
                    <td> {{$account->currencyTitle}} </td>
                    <td> {{ \Carbon\Carbon::parse($account->updated_at)->format('d-M-y') }} </td>
                    
                    <td>
                        <a class="btn btn-success" href="{{url('edit_account', $account->acId)}}"><i class="fas fa-pencil-alt"></i></a>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_account', $account->acId)}}"><i class="fas fa-trash-alt"></i></a>
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