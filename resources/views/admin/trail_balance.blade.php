@extends('admin.index')
@section('content')

    <style type="text/css">
        input[type='text'], input[type='number'], select {
          width: 300px;
          height: 45px;
          padding: 10px;
          font-size: 16px;
          box-sizing: border-box;
        }
        
        input[type='date']
        {
          width: 180px;
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
            margin-top: 10px;
            border: 2px solid yellowgreen;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .sar-th {
            font-weight: bold; 
            background-color:deepskyblue;
            color: white;
            font-weight: bold;
            font-size: 14px;
        }
        
        .sar-total {
            background-color: deepskyblue;
            text-align: right;
            font-weight: bold;
            color: white;
            font-size: 14px;
        }
                
        .pkr-th {
            background-color: mediumSeaGreen;
            color: white; 
            font-weight: bold;
            font-size: 14px;
        }
        
        .pkr-total {
            background-color: mediumSeaGreen;
            color: white; 
            text-align: right;
            font-weight: bold;
            font-size: 14px;
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
          font-size: 14px;
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
        
        <h3 style="color:white;">Trail Balance Report {{$datefrom}}</h3>

        <div class="div_deg">

             <!--Form to add voucher -->
            <form action="{{url('trail_balance')}}" method="post">
                @csrf

                <!--Hidden input for static "JV" voucherPrefix -->
                <input type="hidden" id="voucherPrefix" name="voucherPrefix" value="JV">

                <div>

                    <select name="accTypeId">
                        <option value=""> Select Account Type </option>                            
                        @foreach($accType as $accType)                            
                            <option value="{{ $accType->accTypeId }}" {{$accTypeId == $accType->accTypeId ?'selected':''}}>{{ $accType->accTypeTitle }}</option>
                        @endforeach
                    </select>
    
                    <!--<select name="parentId">-->
                    <!--    <option value=""> Select Parent Account </option>                            -->
                    <!--    @foreach($accParent as $accParent)-->
                    <!--        <option value="{{$accParent->parentId}}"> {{$accParent->accParentTitle}} </option>-->
                    <!--    @endforeach-->
                    <!--</select>-->
    
                    <select name="areaId">
                        <option value=""> Select Area </option>
                        @foreach($area as $area)
                            <option value="{{ $area->areaId }}" {{$areaId == $area->areaId ?'selected':''}}>{{ $area->areaTitle }}</option>
                        @endforeach
                    </select>
    
                    <!--<select name="currencyId">-->
                    <!--    <option value=""> Select Currency </option>-->
                    <!--    @foreach($currency as $currency)-->
                    <!--        <option value="{{$currency->currencyId}}"> {{$currency->currencyTitle}} </option>-->
                    <!--    @endforeach-->
                    <!--</select>-->
                        
                    <!--Input for Date From To -->
                    <input type="date" id="dateFrom" name="dateFrom" value="{{ $datefrom }}" required>
                    <input type="date" id="dateTo" name="dateTo" value="{{ $dateto }}" required>
                    
                    <!--Sumbit Button -->
                    <button class="btn btn-success" type="submit"><i class="fas fa-search"></i>View Trial</button>
                    
                </div>

            </form>
        </div>
              
        <div class="div_deg table-responsive">  <!-- Added Bootstrap responsive table class -->
        
            <!-- Table for displaying voucher data -->
            <table class="table_deg">
                <thead>
                    <tr>
                        <th> Sr. # </th>
                        <th> Account Title </th>
                        <th colspan="3"> SAR </th>
                        <th colspan="3"> PKR</th>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td class="sar-th">Dr</td>
                        <td class="sar-th">Cr</td>
                        <td class="sar-th">Balance</td>
                        <td class="pkr-th">Dr</td>
                        <td class="pkr-th">Cr</td>
                        <td class="pkr-th">Balance</td>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                        $sum_debit = 0;
                        $sum_credit = 0;
                        
                        $sum_debitSR = 0;
                        $sum_creditSR = 0;
                        
                        $row_balance_SAR = 0;
                        $row_balance_PKR = 0;
                        
                        $sum_BF_SAR = 0;
                        $sum_BF_PKR = 0;
                    ?>
                    
                    @foreach ($data as $index => $trail)

                    <?php
                        $sum_debitSR += $trail->debitSR;
                        $sum_creditSR += $trail->creditSR;
                        
                        $sum_debit += $trail->debit;
                        $sum_credit += $trail->credit;
                        
                        $row_balance_SAR = $trail->debitSR - $trail->creditSR;
                        $row_balance_PKR = $trail->debit - $trail->credit;
                        
                        $sum_BF_SAR += ($trail->debitSR - $trail->creditSR);
                        $sum_BF_PKR += ($trail->debit - $trail->credit);
                    ?>
                    
                    <tr>
                        <td> {{ (int) $index + 1 }} </td>
                        <td class="left"> {{ $trail->acTitle }} </td>

                        <td class="right"> {!! $trail->debitSR == 0 ? '&nbsp;' : number_format($trail->debitSR, 0, '.', ',') !!} </td>
                        <td class="right"> {!! $trail->creditSR == 0 ? '&nbsp;' : number_format($trail->creditSR, 0, '.', ',') !!} </td>
                        <td class="right sar-th"> {!! $row_balance_SAR == 0 ? '-' : number_format($row_balance_SAR, 0, '.', ',') !!} </td>
                        
                        <td class="right"> {!! $trail->debit == 0 ? '&nbsp;' : number_format($trail->debit, 2, '.', ',') !!} </td>
                        <td class="right"> {!! $trail->credit == 0 ? '&nbsp;' : number_format($trail->credit, 2, '.', ',') !!} </td>
                        <td class="right pkr-th"> {!! $row_balance_PKR == 0 ? '-' : number_format($row_balance_PKR, 2, '.', ',') !!} </td>

                    </tr>
                    
                    @endforeach
                    
                    <tr>
                        <td></td>
                        <th class="right" >Totals : </th>
                        <td class="sar-total">{{ number_format($sum_debitSR, 0, '.', ',') }}</td>
                        <td class="sar-total">{{ number_format($sum_creditSR, 0, '.', ',') }}</td>
                        <th class="right">{{ number_format($sum_BF_SAR, 0, '.', ',') }}</th>
                        <td class="pkr-total">{{ number_format($sum_debit, 2, '.', ',') }}</td>
                        <td class="pkr-total">{{ number_format($sum_credit, 2, '.', ',') }}</td>
                        <th class="right">{{ number_format($sum_BF_PKR, 2, '.', ',') }}</th>
                    </tr>
    
                    <!--<tr>-->
                    <!--    <td></td>-->
                    <!--    <th class="right">B/F Balance : </th>-->
                    <!--    <th colspan="3" class="right">{{ number_format($sum_BF_SAR, 0, '.', ',') }}</th>-->
                    <!--    <th colspan="3" class="right">{{ number_format($sum_BF_PKR, 2, '.', ',') }}</th>-->
                    <!--</tr>-->
                    
                </tbody>
            </table>
                
            </div>
            
    </div>
@endsection