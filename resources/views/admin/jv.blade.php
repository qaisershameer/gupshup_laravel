@extends('admin.index')
@section('content')
    
    <style type="text/css">
    
        input[type='text'], input[type='date'], select
        {
          width: 400px;
          height: 30px;
          padding: 0 10px;
          font-size: 16px;
          box-sizing: border-box;
        }
        
        /* Number input */
        input[type='number'] {
          width: 160px;
          height: 30px;
          padding: 0 10px;
          font-size: 16px;
          box-sizing: border-box;
        }
        
        .div_deg {
            display: flex;
            justify-content: left;
            align-items: left;
        }

        .sar-th {
            font-weight: bold; 
            background-color:deepskyblue;
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
            width: 100%;
            text-align: center;
            margin: left;
            margin-top: 10px;
            border: 2px solid yellowgreen;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th {
          background-color: darkcyan;
          border: 1px solid skyblue;
          padding: 6px;
          font-size: 12px;
          font-weight: bold;
          color: white;
        }

        td {
          border: 1px solid skyblue;
          padding: 8px;
          font-size: 12px;
          color: white;
        }
        
    </style>
    
    <div class="container-fluid">
        
        <h3 style="color:white;">Journal Vouchers</h3>

        <div class="div_deg">
            
            <!-- Form to add voucher -->
            <form action="{{url('add_jv','JV')}}" method="post">
                @csrf

                  <!-- Hidden input for static "JV" voucherPrefix -->
                  <input type="hidden" id="voucherPrefix" name="voucherPrefix" value="JV">

                <div>

                  <!-- Input for Voucher Date -->
                  <input type="date" id="dateInput" name="voucherDate" placeholder="11-Nov-2024" required>
                  
                    <!-- Select box for credit accounts -->
                    <select name="crAcId" class="select2" id="craccountSelect" required>
                        <option value="">Select Credit Account</option>  
                        @foreach($accounts as $account)
                            <option value="{{ $account->acId }}">{{ $account->acTitle }}</option>
                        @endforeach
                    </select>

                    <!-- Credit fields -->
                    <input type="number" id="creditSR" name="creditSR" placeholder="SAR Credit" step="any" required>
                    <input type="number" id="credit" name="credit" placeholder="PKR Credit" step="any" required>
                  </div>

                  <div>

                    <!-- Remarks field -->
                  <input type="text" name="remarks" placeholder="Enter Remarks" value="Amount Transfered." required>

                    <!-- Select box for debit accounts -->
                    <select name="drAcId" class="select2" id="draccountSelect" required>
                        <option value="">Select Debit Account</option>  
                        @foreach($accounts as $account)
                            <option value="{{ $account->acId }}">{{ $account->acTitle }}</option>
                        @endforeach
                    </select>
                    
                    <!-- Credit fields -->
                    <input type="number" id="debitSR" name="debitSR" placeholder="SAR Debit" step="any" required>
                    <input type="number" id="debit" name="debit" placeholder="PKR Debit" step="any" required>

                    <!-- Submit button -->
                    <input class="btn btn-success" type="submit" value="Save">
                    
                  </div>

            </form>
            
        </div>
              
        <div class="div_deg table-responsive">  <!-- Added Bootstrap responsive table class -->
                
            <!-- Table for displaying voucher data -->
            <table class="table_deg">
                <thead>
                    <tr>
                        <th> Sr. </th>
                        <th> Date </th>
                        <th> VC </th>
                        
                        <th colspan="3" > Credit Account </th>
                        
                        <th colspan="3" > Debit Account </th>
    
                        <th> Remarks </th>
                        <th> Action </th>                        
                    </tr>
    
                    <tr>
                        <td colspan="3"></td>
                        <th> Account </th>
                        
                        <td class="sar-th"> SR </td>
                        <td class="pkr-th"> PK </td>
                        
                        <th> Account </th>
                        <td class="sar-th"> SR </td>
                        <td class="pkr-th"> PK </td>
                        
                        <td colspan="2"> </th>
                    </tr>                        
                </thead>
                
                <tbody>
    
                    @foreach ($data as $index => $vouchers)
                    <tr>
                        <td> {{ (int) $index + 1 }} </td>
                        <td> {{ \Carbon\Carbon::parse($vouchers->voucherDate)->format('d M') }} </td>
                        <td> {{$vouchers->voucherPrefix}} </td>
                        
                        <td class="left"> {{$vouchers->crAcTitle}} </td>
                        <td class="right">{!! $vouchers->creditSR == 0 ? '&nbsp;' : number_format($vouchers->creditSR, 0, '.', ',') !!}</td>
                        <td class="right">{!! $vouchers->credit == 0 ? '&nbsp;' : number_format($vouchers->credit, 2, '.', ',') !!}</td>
                        
                        <td class="left"> {{$vouchers->drAcTitle}} </td>
                        <td class="right">{!! $vouchers->debitSR == 0 ? '&nbsp;' : number_format($vouchers->debitSR, 0, '.', ',') !!}</td>
                        <td class="right">{!! $vouchers->debit == 0 ? '&nbsp;' : number_format($vouchers->debit, 2, '.', ',') !!}</td>
                        
                        <td class="left"> {{$vouchers->remarks}} </td>
                        <td>
                          <a class="btn btn-success" href="{{url('edit_jv', $vouchers->voucherId)}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_voucher', $vouchers->voucherId)}}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
          
         </div>
          
    </div>

    <script>
        // Set current date in the date input field
        const now = new Date();
        const day = String(now.getDate()).padStart(2, '0');
        const month = String(now.getMonth() + 1).padStart(2, '0'); 
        const year = now.getFullYear();
        const currentDate = `${year}-${month}-${day}`;
      
        document.getElementById('dateInput').value = currentDate;
      
        const creditSR = document.getElementById('creditSR');
        const debitSR = document.getElementById('debitSR');
        
        const credit = document.getElementById('credit');
        const debitS = document.getElementById('debit');
        
        creditSR.addEventListener('input', function() {debitSR.value = creditSR.value; });  // Set debit value to the same as credit value
        credit.addEventListener('input', function() {debit.value = credit.value; });        // Set debit value to the same as credit value
      
    </script>

@endsection