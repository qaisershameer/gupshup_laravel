@extends('admin.index')
@section('content')

    <style type="text/css">
        input[type='text'], input[type='number'], select {
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
            width: 1000px;
            text-align: center;
            margin: left;
            margin-top: 10px;
            border: 2px solid yellowgreen;
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
        
        <h3 style="color:white;">Trail Balance Report</h3>

        <div class="div_deg">

             <!--Form to add voucher -->
            <form action="{{url('trail_balance')}}" method="get">
                @csrf

                <!--Hidden input for static "JV" voucherPrefix -->
                <input type="hidden" id="voucherPrefix" name="voucherPrefix" value="JV">

                <div>
                    <!--Input for Date From To -->
                    <input type="date" id="dateInputFrom" name="dateFrom" value="{{ old('dateFrom', $datefrom) }}" required>
                    <input type="date" id="dateInputTo" name="dateTo" value="{{ old('dateTo', $dateto) }}" required>
                    
                    <!--Sumbit Button -->
                    <button class="btn btn-success" type="submit"><i class="fas fa-search"></i> View Trial Balance</button>
                    
                </div>

            </form>
        </div>
              
        <div>    
                
                <!-- Table for displaying voucher data -->
                <table class="table_deg">
                    <thead>
                        <tr>
                            <th> Sr. # </th>
                            <th> Account Title </th>
                            <th colspan="2"> SAR </th>
                            <th colspan="2"> PKR</th>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td class="sar-th">Dr</td>
                            <td class="sar-th">Cr</td>
                            <td class="pkr-th">Dr</td>
                            <td class="pkr-th">Cr</td>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                            $sum_debit = 0;
                            $sum_credit = 0;
                            
                            $sum_debitSR = 0;
                            $sum_creditSR = 0;
                            
                            $sum_SAR = 0;
                            $sum_PKR = 0;
                        ?>
                        
                        @foreach ($data as $index => $trail)
                        <tr>
                            <td> {{ (int) $index + 1 }} </td>
                           <td class="left"> {{ $trail->acTitle }} </td>
    
                            <td class="right">{!! $trail->debitSR == 0 ? '&nbsp;' : number_format($trail->debitSR, 0, '.', ',') !!}</td>
                            <td class="right">{!! $trail->creditSR == 0 ? '&nbsp;' : number_format($trail->creditSR, 0, '.', ',') !!}</td>
                            
                            <td class="right">{!! $trail->debit == 0 ? '&nbsp;' : number_format($trail->debit, 2, '.', ',') !!}</td>
                            <td class="right">{!! $trail->credit == 0 ? '&nbsp;' : number_format($trail->credit, 2, '.', ',') !!}</td>
                        </tr>
        
                        <?php
                            $sum_debitSR += $trail->debitSR;
                            $sum_creditSR += $trail->creditSR;
                            
                            $sum_debit += $trail->debit;
                            $sum_credit += $trail->credit;
                            
                            $sum_SAR += ($trail->debitSR - $trail->creditSR);
                            $sum_PKR += ($trail->debit - $trail->credit);
                        ?>
                        
                        @endforeach
                        
                        <tr>
                            <td></td>
                            <th class="right" >Totals : </th>
                            <td class="sar-total">{{ number_format($sum_debitSR, 0, '.', ',') }}</td>
                            <td class="sar-total">{{ number_format($sum_creditSR, 0, '.', ',') }}</td>
                            <td class="pkr-total">{{ number_format($sum_debit, 2, '.', ',') }}</td>
                            <td class="pkr-total">{{ number_format($sum_credit, 2, '.', ',') }}</td>
                        </tr>
        
                        <tr>
                            <td></td>
                            <th class="right">B/F Balance : </th>
                            <th colspan="2" class="right">{{ number_format($sum_SAR, 0, '.', ',') }}</th>
                            <th colspan="2" class="right">{{ number_format($sum_PKR, 2, '.', ',') }}</th>
                        </tr>
                        
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
      const startDate = `${year}-01-01`;
      
      document.getElementById('dateInputFrom').value = startDate;
      document.getElementById('dateInputTo').value = currentDate;
      
    </script>

@endsection