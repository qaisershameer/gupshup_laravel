@extends('admin.index')
@section('content')

    <style type="text/css">
    
        /* Date text select input */
        input[type='date'], [type='text'], select {
          width: 270px;
          height: 45px;
          padding: 0 10px;
          font-size: 16px;
          box-sizing: border-box;
        }

        /* Number input */
        input[type='number'] {
          width: 150px;
          height: 45px;
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
            width: 1200px;
            text-align: center;
            margin: left;
            margin-top: 10px;
            border: 2px solid yellowgreen;
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
        <h3 style="color:white;">Receipt Vouchers</h3>

        <div class="div_deg">
            <!-- Form to add voucher -->
            <form action="{{url('add_crv','CR')}}" method="post">
                @csrf

                <div>
                    
                    <!-- Hidden input for static "CR" voucherPrefix -->
                    <input type="hidden" id="voucherPrefix" name="voucherPrefix" value="CR">

                    <!-- Input for Voucher Date -->
                    <input type="date" id="dateInput" name="voucherDate" required>

                    <!-- Select box for accounts -->
                    <select name="acId" id="accountSelect" class="select2" required>
                        <option value="">Select Account</option>  
                        @foreach($accounts as $account)
                            <option value="{{ $account->acId }}">{{ $account->acTitle }}</option>
                        @endforeach
                    </select>

                    <!-- Credit fields -->
                    <input type="number" id="creditSR" name="creditSR" placeholder="SAR Credit" step="any" required>
                    <input type="number" id="credit" name="credit" placeholder="PKR Credit" step="any" required>
                    
                    <!-- Remarks field -->
                    <input type="text" name="remarks" placeholder="Enter Remarks" value="Cash Received." required>

                    <!-- Submit button -->
                    <input class="btn btn-success" type="submit" value="Save">

                </div>
            </form>
        </div>

        <!-- Table for displaying voucher data -->
        <table class="table_deg">
            <tr>
                <th> Sr. </th>
                <th> Date </th>
                <th> VC </th>
                <th> Ref. Account </th>
                <th> Remarks </th>
                <th class="sar-th"> SAR </th>
                <th class=" pkr-th"> PKR </th>
                <th> Action </th>
            </tr>

            @foreach ($data as $index => $vouchers)
            <tr>
                <td> {{ (int) $index + 1 }} </td>
                <td> {{ \Carbon\Carbon::parse($vouchers->voucherDate)->format('d M') }} </td>
                <td> {{$vouchers->voucherPrefix}} </td>
                <td class="left"> {{$vouchers->crAcTitle}} </td>
                <td class="left"> {{$vouchers->remarks}} </td>
                
                <td class="right">{!! $vouchers->creditSR == 0 ? '&nbsp;' : number_format($vouchers->creditSR, 0, '.', ',') !!}</td>
                <td class="right">{!! $vouchers->credit == 0 ? '&nbsp;' : number_format($vouchers->credit, 2, '.', ',') !!}</td>
                
                <td>
                    <a class="btn btn-success" href="{{url('edit_crv', $vouchers->voucherId)}}"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_voucher', $vouchers->voucherId)}}"><i class="fas fa-trash-alt"></i></a>
                </td>                        
                
            </tr>
            @endforeach
        </table>
    </div>

    <script>
      // Set current date in the date input field
      const now = new Date();
      const day = String(now.getDate()).padStart(2, '0');
      const month = String(now.getMonth() + 1).padStart(2, '0'); 
      const year = now.getFullYear();
      const currentDate = `${year}-${month}-${day}`;
      document.getElementById('dateInput').value = currentDate;
    </script>

  @endsection