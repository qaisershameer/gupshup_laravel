@extends('admin.index')
@section('content')

    <style type="text/css">
        input[type='text'], input[type='number'], select {
          width: 400px;
          height: 45px;
          padding: 10px;
          font-size: 16px;
          margin-right: 5px;
          box-sizing: border-box;
        }
        
        input[type='date']
        {
          width: 200px;
          height: 45px;
          padding: 10px;
          font-size: 16px;
          margin-right: 5px;
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
            background-color:deepskyblue;
            /*font-style: italic;*/
            font-weight: bold; 
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
            /*font-style: italic;*/
            font-weight: bold;
            color: white; 
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
          /*font-style: italic;*/
          font-weight: bold;
          color: white;
          font-size: 12px;
          padding: 6px;
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
                        <input type="date" id="dateFrom" name="dateFrom" value="{{ $datefrom }}" required>
                        <input type="date" id="dateTo" name="dateTo" value="{{ $dateto }}" required>

                        <!--Sumbit Button -->
                        <button class="btn btn-success" type="submit"><i class="fas fa-search"></i> View</button>
                    </div>
                </form>

                <div style="display: flex; gap: 5px; padding: 5px; align-items: center;">
                    <!--Separate form for PDF generation -->
                    <form action="{{ url('pdf_ledger') }}" method="POST">
                        @csrf
                        <input type="hidden" name="acId" value="{{ $acId }}">
                        <input type="hidden" name="dateFrom" value="{{ $datefrom }}">
                        <input type="hidden" name="dateTo" value="{{ $dateto }}">
                        <button type="submit" class="btn btn-success"><i class="fas fa-print"></i> PDF</button>
                    </form>
                </div>
            
            </div>
            
            <div>
                
            </div>                
            
        </div>
          
        <div class="div_deg table-responsive">  <!-- Added Bootstrap responsive table class -->
            <!-- Table for displaying voucher data -->
            <table class="table_deg">
                <thead>
                    <tr>
                        <th> Sr. </th>
                        <th> VC </th>
                        <th> Date </th>
                        <th> Remarks </th>
                        <th> Ref. Account </th>
                        
                        <th colspan="3">SAR</th>
                        <th colspan="3">PKR</th>

                    </tr>
                    
                    <tr>
                        <td colspan="5"></td>
                        
                        <td class="sar-th">Dr</td>
                        <td class="sar-th">Cr</td>
                        <td class="sar-th">Bal</td>

                        <td class="pkr-th">Dr</td>
                        <td class="pkr-th">Cr</td>
                        <td class="pkr-th">Bal</td>

                    </tr>
                    
                </thead>
                
                <tbody>

                    <tr>
                        <th colspan="5" class="right">Opening Balance : </th>
                        
                        <!-- Sar Total Cells -->
                        <td class="sar-total"> 
                            {!! (count($balance) > 0 && $balance[0]->balanceSR >= 0) ? number_format($balance[0]->balanceSR, 0, '.', ',') : 0 !!} 
                        </td>
                        
                        <td class="sar-total"> 
                            {!! (count($balance) > 0 && $balance[0]->balanceSR < 0) ? number_format($balance[0]->balanceSR, 0, '.', ',') : 0 !!} 
                        </td>
                        
                        <th class="sar-total"> 
                            {!! (count($balance) > 0 && $balance[0]->balanceSR >= 0)
                                    ? number_format($balance[0]->balanceSR, 0, '.', ',')
                                    : (count($balance) > 0 ? number_format($balance[0]->balanceSR, 0, '.', ',') : 0) !!} 
                        </th>
                    
                        <!-- Pkr Total Cells -->
                        <td class="pkr-total"> 
                            {!! (count($balance) > 0 && $balance[0]->balancePK >= 0) ? number_format($balance[0]->balancePK, 1, '.', ',') : 0 !!}
                        </td>
                    
                        <td class="pkr-total"> 
                            {!! (count($balance) > 0 && $balance[0]->balancePK < 0) ? number_format($balance[0]->balancePK, 1, '.', ',') : 0 !!} 
                        </td>
                    
                        <th class="pkr-total"> 
                            {!! (count($balance) > 0 && $balance[0]->balancePK >= 0)
                                    ? number_format($balance[0]->balancePK, 1, '.', ',')
                                    : (count($balance) > 0 ? number_format($balance[0]->balancePK, 1, '.', ',') : 0) !!} 
                        </th>
                    </tr>
 
                    
                    <?php 
                    
                        $debit = 0;
                        $credit = 0;
                        
                        $debitSR = 0;
                        $creditSR = 0;
                        
                        $sum_debit = 0;
                        $sum_credit = 0;
                        
                        $sum_debitSR = 0;
                        $sum_creditSR = 0;

                        $sum_SAR = 0;
                        $sum_PKR = 0;
                        
                        $running_SR = count($balance) > 0 ? $balance->first()->balanceSR : 0;
                        $running_PK = count($balance) > 0 ? $balance->first()->balancePK : 0;
                        
                    ?>

                    @foreach ($data as $index => $vouchers)

                    <?php
                    
                        if ($vouchers->voucherPrefix == 'JV') {
                            
                            if ($acId == $vouchers->drAcId) {
                                
                                $debit = $vouchers->debit;
                                $debitSR = $vouchers->debitSR;
                                
                                $credit = 0;
                                $creditSR = 0;
                                
                                $sum_debitSR += $vouchers->debitSR;
                                $sum_debit += $vouchers->debit;
                                
                                $sum_creditSR = $sum_creditSR;
                                $sum_credit = $sum_credit;


                            } else {
                                
                                $debit = 0;
                                $debitSR = 0;

                                $credit = $vouchers->credit;
                                $creditSR = $vouchers->creditSR;

                                $sum_debitSR = $sum_debitSR;
                                $sum_debit = $sum_debit;
                                
                                $sum_creditSR += $vouchers->creditSR;
                                $sum_credit += $vouchers->credit;
                            }

    
                        } else {

                            $debit = $vouchers->debit;
                            $debitSR = $vouchers->debitSR;

                            $credit = $vouchers->credit;
                            $creditSR = $vouchers->creditSR;

                            $sum_debitSR += $vouchers->debitSR;
                            $sum_creditSR += $vouchers->creditSR;

                            $sum_debit += $vouchers->debit;
                            $sum_credit += $vouchers->credit;

                        }
                        
                        $running_SR += $debitSR - $creditSR;
                        $running_PK += $debit - $credit;
                            
                        $sum_SAR = $sum_debitSR - $sum_creditSR;
                        $sum_PKR = $sum_debit - $sum_credit;

                    ?>
                    
                    <tr>
                        <td> {{ (int) $index + 1 }} </td>
                        <td> {{$vouchers->voucherPrefix}} </td>
                        <td> {{ \Carbon\Carbon::parse($vouchers->voucherDate)->format('d M') }} </td>
                        
                        <td class="left"> {{$vouchers->remarks}} </td>
                        
                        <td class="left"> {{$acId == $vouchers->drAcId ? $vouchers->crAcTitle : $vouchers->drAcTitle }}
                        </td>

                        <td class="right">{!! ($acId == $vouchers->drAcId ? number_format($vouchers->debitSR, 0, '.', ',') : '&nbsp;' ) !!} </td>
                        <td class="right">{!! ($acId == $vouchers->crAcId ? number_format($vouchers->creditSR, 0, '.', ',') : '&nbsp;' ) !!} </td>
                        <td class="sar-total">{!! number_format($running_SR, 0, '.', ',') !!} </td>
                        
                        <td class="right">{!! ($acId == $vouchers->drAcId ? number_format($vouchers->debit, 1, '.', ',') : '&nbsp;' ) !!} </td>
                        <td class="right">{!! ($acId == $vouchers->crAcId ? number_format($vouchers->credit, 1, '.', ',') : '&nbsp;' ) !!} </td>
                        <td class="pkr-total">{!! number_format($running_PK, 1, '.', ',') !!} </td>

                    </tr>

                    @endforeach
                    
                    <!--<tr style="background-color: yellow;">-->
                    <tr>
                        <td colspan="4"></td>
                        <th style="text-align:right;"> Totals : </th>

                        <td class="sar-total">{{ number_format($sum_debitSR, 0, '.', ',') }}</td>
                        <td class="sar-total">{{ number_format($sum_creditSR, 0, '.', ',') }}</td>
                        <td class="sar-total">{{ number_format($running_SR, 0, '.', ',') }}</td>

                        <td class="pkr-total">{{ number_format($sum_debit, 2, '.', ',') }}</td>
                        <td class="pkr-total">{{ number_format($sum_credit, 2, '.', ',') }}</td>
                        <td class="pkr-total">{{ number_format($running_PK, 1, '.', ',') }}</td>
                        
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
      
      document.getElementById('dateInputFrom').value = startDate;
      document.getElementById('dateInputTo').value = currentDate;
      
    </script> --}}

@endsection