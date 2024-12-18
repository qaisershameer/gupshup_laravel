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
            width: 100%;
            text-align: center;
            margin: left;
            margin-top: 10px;
            border: 2px solid yellowgreen;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
        
        <h3 style="color:white;">Cash Book Report</h3>

        <div class="div_deg">

                    <!--Form to view cash_book -->
                    <form action="{{url('cash_book')}}" method="post">
                        @csrf

                        <div>
                            <!--Input for Date From To -->
                            <input type="date" id="dateFrom" name="dateFrom" value="{{ $datefrom }}" required>
                            <input type="date" id="dateTo" name="dateTo" value="{{ $dateto }}" required>
                            
                            <!--Sumbit Button -->
                            <button class="btn btn-success" type="submit"><i class="fas fa-search"></i> View Cash Book</button>
                            {{-- <lable style="color:white" > Date From: {{ \Carbon\Carbon::parse($datefrom)->format('d-M-y')}} to {{ \Carbon\Carbon::parse($dateto)->format('d-M-y') }}</lable> --}}
                            
                        </div>

                    </form>
                    
                
        </div>
              
        <div class="div_deg table-responsive">  <!-- Added Bootstrap responsive table class -->
            <!-- Table for displaying voucher data -->
            <table class="table_deg">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Date</th>
                            <th>VC</th>
                            <th >Remarks</th>
                            <th >Ref. Account</th>
                            
                            <th colspan="2">SAR</th>
                            <th colspan="2">PKR</th>
                            
                        </tr>
                        <tr>
                            
                            <td colspan="5"></td>
                            
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
                    
                    @foreach ($data as $index => $vouchers)
                    <tr>
                        <td> {{ (int) $index + 1 }} </td>
                        <td> {{ \Carbon\Carbon::parse($vouchers->voucherDate)->format('d M') }} </td>
                        <td> {{$vouchers->voucherPrefix}} </td>
                        
                        <td class="left"> {{$vouchers->remarks}} </td>
                        <td class="left"> {{ $vouchers->drAcId != 0 ? $vouchers->drAcTitle : $vouchers->crAcTitle }} </td>
                        
                        <td class="right">{!! $vouchers->debitSR == 0 ? '&nbsp;' : number_format($vouchers->debitSR, 0, '.', ',') !!}</td>
                        <td class="right">{!! $vouchers->creditSR == 0 ? '&nbsp;' : number_format($vouchers->creditSR, 0, '.', ',') !!}</td>
                        
                        <td class="right">{!! $vouchers->debit == 0 ? '&nbsp;' : number_format($vouchers->debit, 2, '.', ',') !!}</td>
                        <td class="right">{!! $vouchers->credit == 0 ? '&nbsp;' : number_format($vouchers->credit, 2, '.', ',') !!}</td>
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
                    
                    <tr>
                        <td colspan="4"></td>
                        <th style="text-align:right;"> Totals : </th>

                        <td class="sar-total">{{ number_format($sum_debitSR, 0, '.', ',') }}</td>
                        <td class="sar-total">{{ number_format($sum_creditSR, 0, '.', ',') }}</td>

                        <td class="pkr-total">{{ number_format($sum_debit, 2, '.', ',') }}</td>
                        <td class="pkr-total">{{ number_format($sum_credit, 2, '.', ',') }}</td>
                        
                    </tr>

                    <tr>
                        <td colspan="4"></td>
                        <th style="text-align:right;"> B/F Balance : </th>
                        
                        <th colspan="2" class="right">{{ number_format($sum_SAR, 0, '.', ',') }}</th>
                        <th colspan="2" class="right">{{ number_format($sum_PKR, 2, '.', ',') }}</th>
                    </tr>
                    
                  </tbody>
                </table>
        </div>
            
    </div>

    {{-- <script>
      // Set current date in the date input field
      const now = new Date();
      const day = String(now.getDate()).padStart(2, '0');
      const month = String(now.getMonth() + 1).padStart(2, '0'); 
      const year = now.getFullYear();
      
      const currentDate = `${year}-${month}-${day}`;
      const startDate = `${year}-01-01`;
      
      document.getElementById('dateInputFrom').value = currentDate;
      document.getElementById('dateInputTo').value = currentDate;
      
    </script> --}}

  @endsection