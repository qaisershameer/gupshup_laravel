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
            width: 1200px;
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
                <h3 style="color:white;">A/C Ledger Report</h3>

                <div class="div_deg">

                     <!--Form to add voucher -->
                    <form action="{{url('ac_ledger')}}" method="post">
                        @csrf

                        <!--Hidden input for static "JV" voucherPrefix -->
                        <input type="hidden" id="voucherPrefix" name="voucherPrefix" value="JV">

                        <div>
                            <!--Select box for accounts-->
                            <!--{{-- <select name="acId[]" class="select2" id="accountSelect" required multiple="multiple"> for multiple selction --}}-->
                            <select name="acId" class="select2" id="accountSelect" required>
                                <option value="">Select Account</option>  
                                @foreach($accounts as $account)
                                    <option value="{{ $account->acId }}" {{$acId== $account->acId ?'selected':''}}>{{ $account->acTitle }}</option>
                                @endforeach
                            </select>
                            
                            <!--Input for Date From To -->
                            <input type="date" id="dateInputFrom" name="dateFrom" value="{{ old('dateFrom', $datefrom) }}" required>
                            <input type="date" id="dateInputTo" name="dateTo" value="{{ old('dateTo', $dateto) }}" required>

                            <!--Sumbit Button -->
                            <button class="btn btn-success" type="submit"><i class="fas fa-search"></i> View Ledger</button>
                            
                        </div>

                    </form>
                </div>
              
              <div>    

                <!-- Table for displaying voucher data -->
                <table class="table_deg">
                    <thead>
                        <tr>
                            <th> Sr. </th>
                            <th> Date </th>
                            <th> VC </th>
                            <th> Remarks </th>
                            <th> Ref. Account </th>
                            
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
                            
                            $bal_SAR = 0;
                            $bal_PKR = 0;

                            $sum_SAR = 0;
                            $sum_PKR = 0;
                            
                        ?>
                        
                        @foreach ($data as $index => $vouchers)
                        <tr>
                            <td> {{ (int) $index + 1 }} </td>
                            <td> {{ \Carbon\Carbon::parse($vouchers->voucherDate)->format('d M') }} </td>
                            <td> {{$vouchers->voucherPrefix}} </td>
                            
                            <td class="left"> {{$vouchers->remarks}} </td>
                            
                            <td class="left"> {{$acId == $vouchers->drAcId ? $vouchers->crAcTitle : $vouchers->drAcTitle }}
                            </td>
    
                            <!--<td class="right"> {!! $vouchers->debitSR == 0 ? '&nbsp;' : number_format($vouchers->debitSR, 0, '.', ',') !!} </td>-->
                            <!--<td class="right">{!! $vouchers->creditSR == 0 ? '&nbsp;' : number_format($vouchers->creditSR, 0, '.', ',') !!}</td>-->
                            <!--<td class="right">{!! $vouchers->debit == 0 ? '&nbsp;' : number_format($vouchers->debit, 2, '.', ',') !!}</td>-->
                            <!--<td class="right">{!! $vouchers->credit == 0 ? '&nbsp;' : number_format($vouchers->credit, 2, '.', ',') !!}</td>-->
                            
                            <td class="right">{!! ($acId == $vouchers->drAcId ? number_format($vouchers->debitSR, 0, '.', ',') : '&nbsp;' ) !!} </td>
                            <td class="right">{!! ($acId == $vouchers->crAcId ? number_format($vouchers->creditSR, 0, '.', ',') : '&nbsp;' ) !!} </td>
                            
                            <td class="right">{!! ($acId == $vouchers->drAcId ? number_format($vouchers->debit, 2, '.', ',') : '&nbsp;' ) !!} </td>
                            <td class="right">{!! ($acId == $vouchers->crAcId ? number_format($vouchers->credit, 2, '.', ',') : '&nbsp;' ) !!} </td>

                        </tr>
    
                        <?php
                        
                            if ($vouchers->voucherPrefix == 'JV') {
                                
                                if ($acId == $vouchers->drAcId) {
                                    
                                    $sum_debitSR += $vouchers->debitSR;
                                    $sum_debit += $vouchers->debit;
                                    
                                    $sum_creditSR = $sum_creditSR;
                                    $sum_credit = $sum_credit;

                                    // $sum_SAR = $sum_SAR;
                                    // $sum_PKR = $sum_PKR;
                                    
                                    
                                } else {
                                    
                                    $sum_debitSR = $sum_debitSR;
                                    $sum_debit = $sum_debit;
                                    
                                    $sum_creditSR += $vouchers->creditSR;
                                    $sum_credit += $vouchers->credit;
                                }

        
                            } else {
    
                                $sum_debitSR += $vouchers->debitSR;
                                $sum_creditSR += $vouchers->creditSR;
    
                                $sum_debit += $vouchers->debit;
                                $sum_credit += $vouchers->credit;

                                // $sum_SAR += ($vouchers->debitSR - $vouchers->creditSR);
                                // $sum_PKR += ($vouchers->debit - $vouchers->credit);
                                
                            }
                            
                            $sum_SAR = $sum_debitSR - $sum_creditSR;
                            $sum_PKR = $sum_debit - $sum_credit;

                        ?>
                        
                        @endforeach
                        
                        <!--<tr style="background-color: yellow;">-->
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