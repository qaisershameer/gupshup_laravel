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
              
              <h1 style="color:white;">Update Payment</h1>

              <div class="div_deg">
    
                <form action="{{url('update_cpv', $data->voucherId)}}" method="post">
                  @csrf
                  
                <div>

                    <!-- Hidden input for static "CP" voucherPrefix -->
                    <input type="hidden" id="voucherPrefix" name="voucherPrefix" value="CP">

                    <label for=""> Date </label>  
                    <!-- Input for Voucher Date -->
                    <input type="date" id="dateInput" name="voucherDate" value="{{$data->voucherDate}}" placeholder="11-Nov-2024" required>
                    
                </div>

                <div>              
                    <label for=""> Account </label>

                    <select name="acId" required>
                        <option value="">Select Account</option>
                        @foreach($accounts as $accounts)
                            <option value="{{$accounts->acId}}" 
                                {{ $data->drAcId == $accounts->acId ? 'selected' : '' }}>
                                {{$accounts->acTitle}}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for=""> SAR </label>  
                    <input type="number" id="debitSR" name="debitSR" placeholder="SAR Debit" step="any" value="{{ $data->debitSR}}">
                </div>

                <div>
                    <label for=""> PKR </label>  
                    <input type="number" id="debit" name="debit" placeholder="PKR Debit" step="any" value="{{ $data->debit}}">
                </div>

                <div>
                    <label for=""> Currency </label>  
                    <input type="text" name="remarks" placeholder="Enter Remarks" value="{{ $data->remarks}}" required>
                </div>    
              
                <div>    
                      <input class="btn btn-primary" type="submit" value="Update Payment">
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