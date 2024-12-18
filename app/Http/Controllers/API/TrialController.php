<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Vouchers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;

class TrialController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    
    // public function index(Request $request)
    // {
    //     $uId = (int)$request->uId;   // Ensure uId is an integer
        
    //     $accTypeId = isset($request->$accTypeId) ? $request->$accTypeId : 'ALL';
    //     $areaId = isset($request->$areaId) ? $request->$areaId : 'ALL';

    //     // $areaId = (int)$request->areaId;  // Same for areaId if needed
    //     // $accTypeId = (int)$request->accTypeId;  // Same for accTypeId if needed        
    
    //     $dateFrom = $request->dateFrom;
    //     $dateTo = $request->dateTo;
    
    //     $formatFrom = Carbon::parse($dateFrom)->format('Y-m-d');
    //     $formatTo = Carbon::parse($dateTo)->format('Y-m-d');
        
    //     // Combine debits and credits using a union
    //     $query = DB::table(DB::raw("( 
    //             SELECT
    //             COALESCE(vouchers.drAcId, 0) AS acId,
    //             accounts.acTitle,
    //             accounts.accTypeId,
    //             acctype.accTypeTitle,
    //             accounts.areaId,
    //             area.areaTitle,
    //             SUM(vouchers.debit) AS debit,
    //             SUM(vouchers.debitSR) AS debitSR,
    //             0 AS totalCredit,
    //             0 AS totalCreditSR
    //         FROM
    //             vouchers
    //         LEFT JOIN accounts ON vouchers.drAcId = accounts.acId
    //         LEFT JOIN acctype ON accounts.accTypeId = acctype.accTypeId
    //         LEFT JOIN area ON accounts.areaId = area.areaId
    //         WHERE
    //             vouchers.uId = ? AND vouchers.voucherDate BETWEEN ? AND ?
    //         GROUP BY
    //             vouchers.drAcId,
    //             accounts.acTitle,
    //             accounts.accTypeId,
    //             acctype.accTypeTitle,
    //             accounts.areaId,
    //             area.areaTitle
    //         UNION ALL
    //         SELECT
    //             COALESCE(vouchers.crAcId, 0) AS acId,
    //             accounts.acTitle,
    //             accounts.accTypeId,
    //             acctype.accTypeTitle,
    //             accounts.areaId,
    //             area.areaTitle,
    //             0 AS totalDebit,
    //             0 AS totalDebitSR,
    //             SUM(vouchers.credit) AS credit,
    //             SUM(vouchers.creditSR) AS creditSR
    //         FROM
    //             vouchers
    //         LEFT JOIN accounts ON vouchers.crAcId = accounts.acId
    //         LEFT JOIN acctype ON accounts.accTypeId = acctype.accTypeId
    //         LEFT JOIN area ON accounts.areaId = area.areaId
    //         WHERE
    //             vouchers.uId = ? AND vouchers.voucherDate BETWEEN ? AND ?
    //         GROUP BY
    //             vouchers.crAcId,
    //             accounts.acTitle,
    //             accounts.accTypeId,
    //             acctype.accTypeTitle,
    //             accounts.areaId,
    //             area.areaTitle) AS combined"))
    //         ->select(
    //             'acId',
    //             'acTitle',
    //             'accTypeId',
    //             'accTypeTitle',
    //             'areaId',
    //             'areaTitle',
    //             DB::raw('SUM(debit) AS debit'),
    //             DB::raw('SUM(debitSR) AS debitSR'),
    //             DB::raw('SUM(totalCredit) AS credit'),
    //             DB::raw('SUM(totalCreditSR) AS creditSR')
    //         )
    //     ->groupBy('acId', 'acTitle', 'accTypeTitle', 'accTypeId', 'accTypeTitle', 'areaId', 'areaTitle')
    //     ->having('acId', '<>', 0)
    //     ->orderBy('acTitle');
        
    //     // Conditionally add the accTypeId filter
    //     $bindings = [$uId, $formatFrom, $formatTo, $uId, $formatFrom, $formatTo];
        
    //     // if ($accTypeId !== 'ALL') {
    //     //     $query->where('accTypeId', $accTypeId);
    //     //     $bindings[] = $accTypeId; // Add accTypeId to bindings
    //     // } else {
    //     //     $query->whereNotNull('accTypeId');
    //     // }

    //     // if ($areaId !== 'ALL') {
    //     //     $query->where('areaId', $areaId);
    //     //     $bindings[] = $areaId; // Add areaId to bindings
    //     // } else {
    //     //     $query->whereNotNull('areaId');
    //     // }        
        
    //     $query->setBindings($bindings);
        
        
    //     $data = $query->get();
        
    //     // dd($data);
    
    //     // Prepare final data in the desired format
    //     $formattedData = $data->map(function ($items, $key) {
    //         return [
    //             'acId' => $key,
    //             'acTitle' => $items->first()->acTitle,   // Get the acTitle from the first item
    //             'accTypeTitle' => $items->first()->accTypeTitle,  // Get accTypeTitle from the first item
    //             'debit' => $items->sum('debit'),         // Sum all the debit values for this group
    //             'credit' => $items->sum('credit'),       // Sum all the credit values for this group
    //             'debitSR' => $items->sum('debitSR'),     // Sum all the debitSR values for this group
    //             'creditSR' => $items->sum('creditSR'),   // Sum all the creditSR values for this group
    //         ];
    //     })->values();  // Reset keys after mapping
    
    //     // Return the final formatted data in response
    //     return $this->sendResponse(['vouchers' => $formattedData], 'Trial Balance Data');
    // }
    

public function index(Request $request)
    {
        $uId = (int)$request->uId;   // Ensure uId is an integer
        
        // $areaId = (int)$request->areaId;  // Same for areaId if needed
        // $accTypeId = (int)$request->accTypeId;  // Same for accTypeId if needed

        $accTypeId = isset($request->accTypeId) ? $request->accTypeId : 'ALL';
        $areaId = isset($request->areaId) ? $request->areaId : 'ALL';
        
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;
    
        $formatFrom = Carbon::parse($dateFrom)->format('Y-m-d');
        $formatTo = Carbon::parse($dateTo)->format('Y-m-d');
        
        // // Combine debits and credits using a union
        // $query = DB::table(DB::raw("( 
        //         SELECT
        //         COALESCE(vouchers.drAcId, 0) AS acId,
        //         accounts.acTitle,
        //         acctype.accTypeTitle,
        //         SUM(vouchers.debit) AS debit,
        //         SUM(vouchers.debitSR) AS debitSR,
        //         0 AS totalCredit,
        //         0 AS totalCreditSR
        //     FROM
        //         vouchers
        //     LEFT JOIN accounts ON vouchers.drAcId = accounts.acId
        //     LEFT JOIN acctype ON accounts.accTypeId = acctype.accTypeId
        //     WHERE
        //         vouchers.uId = ? AND vouchers.voucherDate BETWEEN ? AND ?
        //     GROUP BY
        //         vouchers.drAcId,
        //         accounts.acTitle,
        //         acctype.accTypeTitle
        //     UNION ALL
        //     SELECT
        //         COALESCE(vouchers.crAcId, 0) AS acId,
        //         accounts.acTitle,
        //         acctype.accTypeTitle,
        //         0 AS totalDebit,
        //         0 AS totalDebitSR,
        //         SUM(vouchers.credit) AS credit,
        //         SUM(vouchers.creditSR) AS creditSR
        //     FROM
        //         vouchers
        //     LEFT JOIN accounts ON vouchers.crAcId = accounts.acId
        //     LEFT JOIN acctype ON accounts.accTypeId = acctype.accTypeId
        //     WHERE
        //         vouchers.uId = ? AND vouchers.voucherDate BETWEEN ? AND ?
        //     GROUP BY
        //         vouchers.crAcId,
        //         accounts.acTitle,
        //         acctype.accTypeTitle) AS combined"))
        //     ->select(
        //         'acId',
        //         'acTitle',
        //         'accTypeTitle',
        //         DB::raw('SUM(debit) AS debit'),
        //         DB::raw('SUM(debitSR) AS debitSR'),
        //         DB::raw('SUM(totalCredit) AS credit'),
        //         DB::raw('SUM(totalCreditSR) AS creditSR')
        //     )
        //     ->groupBy('acId', 'acTitle', 'accTypeTitle')
        //     ->havingRaw('acId <> 0')
        //     ->orderBy('acTitle')
        //     ->setBindings([$uId, $formatFrom, $formatTo, $uId, $formatFrom, $formatTo]);
    
        // $data = $query->get();
    
        // // Transform the results into the desired format
        // $sortedResults = $data->groupBy('acId'); // Group by 'acId'
    
        // // Prepare final data in the desired format
        // $formattedData = $sortedResults->map(function ($items, $key) {
        //     return [
        //         'acId' => $key,
        //         'acTitle' => $items->first()->acTitle,   // Get the acTitle from the first item
        //         'accTypeTitle' => $items->first()->accTypeTitle,  // Get accTypeTitle from the first item
        //         'debit' => $items->sum('debit'),         // Sum all the debit values for this group
        //         'credit' => $items->sum('credit'),       // Sum all the credit values for this group
        //         'debitSR' => $items->sum('debitSR'),     // Sum all the debitSR values for this group
        //         'creditSR' => $items->sum('creditSR'),   // Sum all the creditSR values for this group
        //     ];
        // })->values();  // Reset keys after mapping
    
        // // Return the final formatted data in response
        // return $this->sendResponse(['vouchers' => $formattedData], 'Trial Balance Data');
        
        
        $query = DB::table(DB::raw("( 
            SELECT
                COALESCE(vouchers.drAcId, 0) AS acId,
                accounts.acTitle,
                accounts.accTypeId,
                acctype.accTypeTitle,
                accounts.areaId,
                area.areaTitle,
                SUM(vouchers.debit) AS debit,
                SUM(vouchers.debitSR) AS debitSR,
                0 AS totalCredit,
                0 AS totalCreditSR
            FROM
                vouchers
            LEFT JOIN accounts ON vouchers.drAcId = accounts.acId
            LEFT JOIN acctype ON accounts.accTypeId = acctype.accTypeId
            LEFT JOIN area ON accounts.areaId = area.areaId
            WHERE
                vouchers.uId = ? AND vouchers.voucherDate BETWEEN ? AND ?
            GROUP BY
                vouchers.drAcId,
                accounts.acTitle,
                accounts.accTypeId,
                acctype.accTypeTitle,
                accounts.areaId,
                area.areaTitle
            UNION ALL
            SELECT
                COALESCE(vouchers.crAcId, 0) AS acId,
                accounts.acTitle,
                accounts.accTypeId,
                acctype.accTypeTitle,
                accounts.areaId,
                area.areaTitle,
                0 AS totalDebit,
                0 AS totalDebitSR,
                SUM(vouchers.credit) AS credit,
                SUM(vouchers.creditSR) AS creditSR
            FROM
                vouchers
            LEFT JOIN accounts ON vouchers.crAcId = accounts.acId
            LEFT JOIN acctype ON accounts.accTypeId = acctype.accTypeId
            LEFT JOIN area ON accounts.areaId = area.areaId
            WHERE
                vouchers.uId = ? AND vouchers.voucherDate BETWEEN ? AND ?
            GROUP BY
                vouchers.crAcId,
                accounts.acTitle,
                accounts.accTypeId,
                acctype.accTypeTitle,
                accounts.areaId,
                area.areaTitle
        ) AS combined"))
        ->select(
            'acId',
            'acTitle',
            'accTypeId',
            'accTypeTitle',
            'areaId',
            'areaTitle',
            DB::raw('SUM(debit) AS debit'),
            DB::raw('SUM(debitSR) AS debitSR'),
            DB::raw('SUM(totalCredit) AS credit'),
            DB::raw('SUM(totalCreditSR) AS creditSR')
        )
        ->groupBy('acId', 'acTitle', 'accTypeTitle', 'accTypeId', 'accTypeTitle', 'areaId', 'areaTitle')
        ->havingRaw('acId <> 0')
        ->orderBy('acTitle');
        
        // Initialize bindings
        $bindings = [$uId, $formatFrom, $formatTo, $uId, $formatFrom, $formatTo];
        
        // Add conditional filters for accTypeId
        if ($accTypeId !== 'ALL') {
            $query->where('accTypeId', $accTypeId);
            $bindings[] = $accTypeId;
        } else {
            $query->whereNotNull('accTypeId');
        }
        
        // Add conditional filters for areaId
        if ($areaId !== 'ALL') {
            $query->where('areaId', $areaId);
            $bindings[] = $areaId;
        } else {
            $query->whereNotNull('areaId');
        }
        
        // Bind parameters to the query
        $query->setBindings($bindings);
        
        $data = $query->get();
        
        // dd($data);
        
        // Transform the results into the desired format
        $sortedResults = $data->groupBy('acId');
        
        // Prepare final data in the desired format
        $formattedData = $sortedResults->map(function ($items, $key) {
            return [
                'acId' => $key,
                'acTitle' => $items->first()->acTitle,   // Get the acTitle from the first item
                'accTypeId' => $items->first()->accTypeId,  // Get accTypeTitle from the first item
                'accTypeTitle' => $items->first()->accTypeTitle,  // Get accTypeTitle from the first item
                'areaId' => $items->first()->areaId,  // Get accTypeTitle from the first item
                'areaTitle' => $items->first()->areaTitle,  // Get accTypeTitle from the first item
                'debit' => $items->sum('debit'),         // Sum all the debit values for this group
                'credit' => $items->sum('credit'),       // Sum all the credit values for this group
                'debitSR' => $items->sum('debitSR'),     // Sum all the debitSR values for this group
                'creditSR' => $items->sum('creditSR'),   // Sum all the creditSR values for this group
            ];
        })->values();  // Reset keys after mapping
        
        // Return the final formatted data in response
        return $this->sendResponse(['vouchers' => $formattedData], 'Trial Balance Data');

    }    


}
