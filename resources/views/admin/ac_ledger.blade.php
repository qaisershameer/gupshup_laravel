<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        input[type='text'], input[type='number'], select
        {
          width: 400px;
          height: 45px;
          padding: 10px;
          font-size: 16px;
          box-sizing: border-box;
        }
        input[type='date']
        {
          width: 200px;
          height: 45px;
          padding: 10px;
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
            margin-top: 10px;
            border: 2px solid yellowgreen;
        }

        th {
          background-color: skyblue;
          padding: 6px;
          font-size: 18px;
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
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3 style="color:white;">A/C Ledger Report</h3>

                <div class="div_deg">

                     <!--Form to add voucher -->
                    <form action="{{url('ac_ledger')}}" method="post">
                        @csrf

                        <!--Hidden input for static "JV" voucherPrefix -->
                        <input type="hidden" id="voucherPrefix" name="voucherPrefix" value="JV">

                        <div>
                            <!--Select box for accounts-->
                            {{-- <select name="acId[]" class="select2" id="accountSelect" required multiple="multiple"> for multiple selction --}}
                            <select name="acId" class="select2" id="accountSelect" required>
                                <option value="">Select Account</option>  
                                @foreach($accounts as $account)
                                    <option value="{{ $account->acId }}" {{$acId== $account->acId ?'selected':''}}>{{ $account->acTitle }}</option>
                                @endforeach
                            </select>
                            
                            <!--Input for Date From To -->
                            <input type="date" id="dateInputFrom" name="dateFrom" placeholder="01-Jan-2024" required>
                            <input type="date" id="dateInput" name="dateTo" placeholder="11-Nov-2024" required>
                            
                            <!--Sumbit Button -->
                            <button class="btn btn-success" type="submit"><i class="fas fa-search"></i> View Ledger</button>
                            
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

                        <th> SAR DR </th>
                        <th> SAR CR </th>
                        
                        <th> PKR DR</th>
                        <th> PKR CR</th>
                        
                        <th> Account Title </th>
                        <th> Remarks </th>
                                
                    </tr>

                    <?php 
                        $sum_debit = 0;
                        $sum_credit = 0;
                        
                        $sum_debitSR = 0;
                        $sum_creditSR = 0;
                        
                        $sum_SAR = 0;
                        $sum_PKR = 0;
                    ?>
                    
                    @foreach ($data as $index => $vouchers)
                    <tr>
                        <td> {{ (int) $index + 1 }} </td>
                        <td> {{ \Carbon\Carbon::parse($vouchers->voucherDate)->format('d-M-y') }} </td>
                        <td> {{$vouchers->voucherPrefix}} </td>
                        
                        <td>{!! $vouchers->debitSR == 0 ? '&nbsp;' : number_format($vouchers->debitSR, 0, '.', ',') !!}</td>
                        <td>{!! $vouchers->creditSR == 0 ? '&nbsp;' : number_format($vouchers->creditSR, 0, '.', ',') !!}</td>
                        
                        <td>{!! $vouchers->debit == 0 ? '&nbsp;' : number_format($vouchers->debit, 2, '.', ',') !!}</td>
                        <td>{!! $vouchers->credit == 0 ? '&nbsp;' : number_format($vouchers->credit, 2, '.', ',') !!}</td>
                        
                        <td> {{ $vouchers->drAcId != 0 ? $vouchers->drAcTitle : $vouchers->drAcTitle }} </td>
                        <td> {{$vouchers->remarks}} </td>
                    </tr>

                    <?php
                        $sum_debitSR += $vouchers->debitSR;
                        $sum_creditSR += $vouchers->creditSR;
                        
                        $sum_debit += $vouchers->debit;
                        $sum_credit += $vouchers->credit;
                        
                        $sum_SAR += ($vouchers->debitSR - $vouchers->creditSR);
                        $sum_PKR += ($vouchers->debit - $vouchers->credit);
                    ?>
                    
                    @endforeach
                    
                    <!--<tr style="background-color: yellow;">-->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="font-weight: bold; background-color: yellow; color: red;">{{ number_format($sum_debitSR, 0, '.', ',') }}</td>
                        <td style="font-weight: bold; background-color: yellow; color: red;">{{ number_format($sum_creditSR, 0, '.', ',') }}</td>
                        <td style="font-weight: bold; background-color: yellow; color: red;">{{ number_format($sum_debit, 2, '.', ',') }}</td>
                        <td style="font-weight: bold; background-color: yellow; color: red;">{{ number_format($sum_credit, 2, '.', ',') }}</td>
                        <td style="font-weight: bold; background-color: yellow; color: red;">Totals</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th></th>
                        <th>{{ number_format($sum_SAR, 0, '.', ',') }}</th>
                        <th></th>
                        <th>{{ number_format($sum_PKR, 2, '.', ',') }}</th>
                        <th>B/F Balance</th>
                        <td></td>
                    </tr>
                    
                </table>

            </div>
        </div>
    </div>
    
    @include('admin.js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

    <script>
      // Set current date in the date input field
      const now = new Date();
      const day = String(now.getDate()).padStart(2, '0');
      const month = String(now.getMonth() + 1).padStart(2, '0'); 
      const year = now.getFullYear();
      
      const currentDate = `${year}-${month}-${day}`;
      const startDate = `${year}-01-01`;
      
      document.getElementById('dateInputFrom').value = startDate;
      document.getElementById('dateInput').value = currentDate;
      
    </script>

  </body>
</html>
