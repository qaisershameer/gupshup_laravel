<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        input[type='text'], input[type='number'], input[type='date'], select
        {
          width: 350px;
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

        .table_deg {
            width: 1500px;
            text-align: center;
            margin: left;
            margin-top: 50px;
            border: 2px solid yellowgreen;
        }

        th {
          background-color: skyblue;
          padding: 15px;
          font-size: 20px;
          font-weight: bold;
          color: white;
        }

        td {
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
                <h1 style="color:white;">Journal Vouchers</h1>

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
                            <select name="crAcId" id="accountSelect" required>
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
                            <select name="drAcId" id="accountSelect" required>
                                <option value="">Select Debit Account</option>  
                                @foreach($accounts as $account)
                                    <option value="{{ $account->acId }}">{{ $account->acTitle }}</option>
                                @endforeach
                            </select>
                            <!-- Credit fields -->
                            <input type="number" id="debitSR" name="debitSR" placeholder="SAR Debit" step="any" required>
                            <input type="number" id="debit" name="debit" placeholder="PKR Debit" step="any" required>

                            <!-- Submit button -->
                            <input class="btn btn-primary" type="submit" value="Add JV">
                            
                          </div>

                    </form>
                </div>
              
              <div>    
                <!-- Table for displaying voucher data -->
                <table class="table_deg">
                    <tr>
                        <th> Sr. # </th>
                        <th> Date </th>
                        <th> Type </th>
                        
                        <th> CR Account </th>
                        <th> SAR CR </th>
                        <th> PKR CR</th>
                        
                        <th> DR Account </th>
                        <th> SAR DR </th>
                        <th> PKR DR</th>
                        
                        <th> Remarks </th>
                        <th> Action </th>                        
                    </tr>

                    @foreach ($data as $index => $vouchers)
                    <tr>
                        <td> {{ (int) $index + 1 }} </td>
                        <td> {{ \Carbon\Carbon::parse($vouchers->voucherDate)->format('d-M-y') }} </td>
                        <td> {{$vouchers->voucherPrefix}} </td>
                        
                        <td> {{$vouchers->crAcTitle}} </td>
                        <td>{!! $vouchers->creditSR == 0 ? '&nbsp;' : number_format($vouchers->creditSR, 0, '.', ',') !!}</td>
                        <td>{!! $vouchers->credit == 0 ? '&nbsp;' : number_format($vouchers->credit, 2, '.', ',') !!}</td>
                        
                        <td> {{$vouchers->drAcTitle}} </td>
                        <td>{!! $vouchers->debitSR == 0 ? '&nbsp;' : number_format($vouchers->debitSR, 0, '.', ',') !!}</td>
                        <td>{!! $vouchers->debit == 0 ? '&nbsp;' : number_format($vouchers->debit, 2, '.', ',') !!}</td>
                        
                        <td> {{$vouchers->remarks}} </td>
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
                </table>
            </div>
        </div>
    </div>

    @include('admin.js')

    <script>
      // Set current date in the date input field
      const now = new Date();
      const day = String(now.getDate()).padStart(2, '0');
      const month = String(now.getMonth() + 1).padStart(2, '0'); 
      const year = now.getFullYear();
      const currentDate = `${year}-${month}-${day}`;
      document.getElementById('dateInput').value = currentDate;
    </script>

    <script>
      $(document).ready(function() {
          $('#accountSelect').select2({
              placeholder: 'Search and Select Account',
              allowClear: true
          });
      });
    </script>
  </body>
</html>
