<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    
    <style type="text/css">
    
        label
        {
          display: inline-block;
          width: 150px;
          font-size: 18px!important;
          color: white!important;
          padding: 10px;
        }
        
        input[type='text'], input[type='number'], input[type='date'], select
        {
            width: 500px;
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
              
              <h1 style="color:white;">Update Receipt</h1>

              <div class="div_deg">
    
                <form action="{{url('update_crv', $data->voucherId)}}" method="post">
                  @csrf
                  
                <div>

                    <!-- Hidden input for static "CR" voucherPrefix -->
                    <input type="hidden" id="voucherPrefix" name="voucherPrefix" value="CR">

                    <label for=""> Date </label>  
                    <!-- Input for Voucher Date -->
                    <input type="date" id="dateInput" name="voucherDate" value="{{$data->voucherDate}}" placeholder="10-Nov-2024" required>
                    
                </div>

                <div>              
                    <label for=""> Account </label>

                    <select name="acId" required>
                        <option value="">Select Account</option>
                        @foreach($accounts as $accounts)
                            <option value="{{$accounts->acId}}" 
                                {{ $data->crAcId == $accounts->acId ? 'selected' : '' }}>
                                {{$accounts->acTitle}}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for=""> SAR </label>  
                    <input type="number" id="creditSR" name="creditSR" placeholder="SAR Credit" step="any" value="{{ $data->creditSR}}">
                </div>

                <div>
                    <label for=""> PKR </label>  
                    <input type="number" id="credit" name="credit" placeholder="PKR Credit" step="any" value="{{ $data->credit}}">
                </div>

                <div>
                    <label for=""> Currency </label>  
                    <input type="text" name="remarks" placeholder="Enter Remarks" value="{{ $data->remarks}}" required>
                </div>    
              
                <div>    
                      <input class="btn btn-primary" type="submit" value="Update Receipt">
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