<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A/C Ledger Report</title>
    <style type="text/css">
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;margin: 0;
            padding: 0;
            /*background-color: #f4f7f9;*/
            /*color: #333;*/
        }

        h3, p {
            text-align: left;
            font-size: 10px;
            margin-bottom: 5px;
            color: #34495e;
            /*font-style: italic;*/
            font-weight: bold;
        }


        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid yellowgreen;
            margin-top: 5px;
            background-color: #ffffff;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 5px 6px;
            border: 1px solid skyblue;
            font-size: 9px;
            text-align: left;
        }

        th {
            background-color: #2980b9;
            border: 1px solid skyblue;
            /*font-style: italic;*/
            color: white;
            /*color: #34495e;*/
            font-weight: bold;
            /*text-transform: uppercase;*/
        }


        .sar-th {
            color: white;
            font-weight: bold;
            text-align: center;
            /*font-style: italic;*/
            background-color:deepskyblue;
        }
        
        .sar-total {
            background-color: deepskyblue;
            text-align: right;
            font-weight: bold;
            color: white;
        }
                
        .pkr-th {
            color: white;
            font-weight: bold;
            text-align: center;
            /*font-style: italic;*/
            background-color: mediumSeaGreen;
        }
        
        .pkr-total {
            color: white; 
            text-align: right;
            font-weight: bold;
            background-color: mediumSeaGreen;
        }
        
        /* Center, Left, and Right Alignments */
        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .left {
            text-align: left;
        }

        /* Row Hover Effect */
        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tr:hover {
            /*background-color: #f1f1f1;*/
        }

        /* Total Row Styling */
        .total-row {
            background-color: #ecf0f1;
            font-weight: bold;
        }

        .total-row td {
            color: #34495e;
        }

    </style>
</head>

<body>
    <h3>A/c Title: {{ $acTitle }}</h3>
    <p>From: {{ \Carbon\Carbon::parse($datefrom)->format('d-M-y') }} to {{ \Carbon\Carbon::parse($dateto)->format('d-M-y') }}</p>

    <table>
        <thead>
            <tr>
                <th class="center"> Sr. </th>
                <th class="center"> VC </th>
                <th class="center"> Date </th>
                <th class="center"> Remarks </th>
                <th class="center"> Ref. Account </th>
                
                <th  class="sar-th"colspan="3">SAR</th>
                <th  class="pkr-th"colspan="3">PKR</th>

            </tr>
            
            <tr>
                <td colspan="5"></td>
                
                <td class="sar-th">Dr</td>
                <td class="sar-th">Cr</td>
                <th class="sar-th">Bal</th>

                <td class="pkr-th">Dr</td>
                <td class="pkr-th">Cr</td>
                <th class="pkr-th">Bal</th>

            </tr>
            
        </thead>
        
        <tbody>

            <tr>
                <th colspan="5" class="right">Opening Balance : </th>
                <td class="sar-total"> 
                    {!! (count($balance) > 0 && $balance[0]->balanceSR >= 0) ? number_format($balance[0]->balanceSR, 0, '.', ',') : '&nbsp;' !!} 
                </td>
                
                <td class="sar-total"> 
                    {!! (count($balance) > 0 && $balance[0]->balanceSR < 0) ? number_format($balance[0]->balanceSR, 0, '.', ',') : '&nbsp;' !!} 
                </td>
            
                <th class="sar-total"> 
                    {!! (count($balance) > 0 && $balance[0]->balanceSR >= 0)
                            ? number_format($balance[0]->balanceSR, 0, '.', ',')
                            : (count($balance) > 0 ? number_format($balance[0]->balanceSR, 0, '.', ',') : '&nbsp;') !!} 
                </th>

                <td class="pkr-total"> 
                    {!! (count($balance) > 0 && $balance[0]->balancePK >= 0) ? number_format($balance[0]->balancePK, 1, '.', ',') : '&nbsp;' !!} 
                </td>
                
                <td class="pkr-total"> 
                    {!! (count($balance) > 0 && $balance[0]->balancePK < 0) ? number_format($balance[0]->balancePK, 1, '.', ',') : '&nbsp;' !!} 
                </td>
            
                <th class="pkr-total"> 
                    {!! (count($balance) > 0 && $balance[0]->balancePK >= 0)
                            ? number_format($balance[0]->balancePK, 1, '.', ',')
                            : (count($balance) > 0 ? number_format($balance[0]->balancePK, 1, '.', ',') : '&nbsp;') !!} 
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
                <td class="center"> {{ (int) $index + 1 }} </td>
                <td class="center"> {{$vouchers->voucherPrefix}} </td>
                <td class="center"> {{ \Carbon\Carbon::parse($vouchers->voucherDate)->format('d/m') }} </td>
                
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

                <td class="pkr-total">{{ number_format($sum_debit, 1, '.', ',') }}</td>
                <td class="pkr-total">{{ number_format($sum_credit, 1, '.', ',') }}</td>
                <td class="pkr-total">{{ number_format($running_PK, 1, '.', ',') }}</td>
            </tr>


        </tbody>
    
    </table>
    
    <p class="center">Software by: <a target="_blank" href="https://qrdpro.com"> QR Dev Team </a> &copy; vision: 2020-2030.</p>

</body>
</html>
