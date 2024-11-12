<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Models\Food;

use App\Models\Order;

use App\Models\Book;

use App\Models\Currency;

use App\Models\AccType;

use App\Models\AccParent;

use App\Models\Accounts;

use App\Models\Area;

use App\Models\Vouchers;

class AdminController extends Controller
{
    public function add_food()
    {

        return view('admin.add_food');

    }

    public function upload_food(Request $request)
    {

        $data = new Food;
        
        $data->title = $request->title;

        $data->detail = $request->detail;

        $data->price = $request->price;

        $image = $request->img;

        $filename = time().'.'.$image->getClientOriginalExtension();

        $request->img->move('food_img', $filename);

        $data->image = $filename;

        $data->save();

        return redirect()->back();

    }
    
    public function view_food()
    {

        $data = Food::all();

        return view('admin.view_food', compact('data'));

    }

    public function update_food($id)
    {

        $food = Food::find($id);
        return view('admin.update_food', compact('food'));

    }

    public function edit_food(Request $request, $id)
    {

        $data = Food::find($id);

        $data->title = $request->title;

        $data->detail = $request->detail;

        $data->price = $request->price;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('food_img', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        return redirect('view_food');

    }
    
    public function delete_food($id)
    {

        $data = Food::find($id);
        
        $data->delete();

        return redirect()->back();

    }    

    public function orders()
    {
        $data = Order::all();
        return view('admin.order', compact('data'));
    }

    public function on_the_way($id)
    {

        $data = Order::find($id);

        $data->delivery_status = 'On the Way';

        $data->save();

        return redirect()->back();

    }

    public function delivered($id)
    {

        $data = Order::find($id);

        $data->delivery_status = 'Delivered';

        $data->save();

        return redirect()->back();

    }

    public function cancelled($id)
    {

        $data = Order::find($id);

        $data->delivery_status = 'Cancelled';

        $data->save();

        return redirect()->back();

    }    

    public function reservations()
    {
        $data = Book::all();
        return view('admin.reservations', compact('data')); 
    }

    public function table_confirm($id)
    {

        $data = Book::find($id);

        $data->status = 'Confirmed';

        $data->save();

        return redirect()->back();

    }

    public function table_pending($id)
    {

        $data = Book::find($id);

        $data->status = 'Pendig';

        $data->save();

        return redirect()->back();

    }

    public function table_cancelled($id)
    {

        $data = Book::find($id);

        $data->status = 'Cancelled';

        $data->save();

        return redirect()->back();

    }

    //////////////////// Currency TABLE CRUD ////////////////////
    
    public function view_currency()
    {
        $data = Currency::orderBy('currencyTitle')->get();
        return view('admin.currency', compact('data')); 
    }
      
    public function add_currency(Request $request)
    {

        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $uid = Auth::id(); // Get the currently authenticated user's ID

        $data = new Currency;

        $data->currencyTitle = $request->currency_name;
        $data->uId = $uid;

        $data->save();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Currency Added Successfully.');

        return redirect()->back();
    }

    public function edit_currency($id)
    {        

        $data = Currency::find($id);
        
        return view('admin.edit_currency', compact('data'));
    }

    public function update_currency(Request $request, $id)    
    {        
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }
                
        $uid = Auth::id(); // Get the currently authenticated user's ID

        $data = Currency::find($id);

        $data->currencyTitle = $request->currency_name;

        $data->save();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Currency Updated Successfully.');

        return redirect('/currency');
    }
    
    public function delete_currency($Id)    
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $data = Currency::find($Id);

        $data->delete();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Selected Currency Deleted Successfully.');

        return redirect()->back();

    }    

    //////////////////// AREEA TABLE CRUD ////////////////////
    
    public function view_area()
    {
        $data = Area::orderBy('areaTitle')->get();
        return view('admin.area', compact('data')); 
    }
    
    public function add_area(Request $request)
    {

        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $uid = Auth::id(); // Get the currently authenticated user's ID

        $data = new Area;

        $data->areaTitle = $request->area_name;
        $data->uId = $uid;

        $data->save();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Area Added Successfully.');

        return redirect()->back();
    }

    public function edit_area($id)
    {        

        $data = Area::find($id);
        
        return view('admin.edit_area', compact('data'));
    }

    public function update_area(Request $request, $id)    
    {        
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }
                
        $uid = Auth::id(); // Get the currently authenticated user's ID

        $data = Area::find($id);

        $data->areaTitle = $request->area_name;

        $data->save();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Area Updated Successfully.');

        return redirect('/area');
    }
    
    public function delete_area($id)    
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $data = Area::find($id);

        $data->delete();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Selected Area Deleted Successfully.');

        return redirect()->back();

    }

    //////////////////// AccType TABLE CRUD ////////////////////
    
    public function view_acctype()
    {
        $data = AccType::orderBy('accTypeId')->get();
        return view('admin.acctype', compact('data')); 
    }

    public function add_acctype(Request $request)
    {

        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $uid = Auth::id(); // Get the currently authenticated user's ID

        $data = new AccType;

        $data->accTypeTitle = $request->acctype_name;
        $data->uId = $uid;

        $data->save();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Account Type Added Successfully.');

        return redirect()->back();
    }

    public function edit_acctype($id)
    {        

        $data = AccType::find($id);
        
        return view('admin.edit_acctype', compact('data'));
    }

    public function update_acctype(Request $request, $id)    
    {        
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }
                
        $uid = Auth::id(); // Get the currently authenticated user's ID

        $data = AccType::find($id);

        $data->accTypeTitle = $request->acctype_name;

        $data->save();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Account Type Updated Successfully.');

        return redirect('/acctype');
    }
    
    public function delete_acctype($Id)    
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $data = AccType::find($Id);

        $data->delete();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Selected Account Type Deleted Successfully.');

        return redirect()->back();

    }    
    
    //////////////////// AccParent TABLE CRUD ////////////////////
    
    public function view_accparent()
    {
        $accType = AccType::orderBy('accTypeId')->get();

        $data = AccParent::select('accparent.parentId', 
                                            'accparent.accParentTitle', 
                                            'accparent.updated_at', 
                                            'accparent.accTypeId',
                                            'acctype.accTypeTitle')
                                        ->join('acctype', 'accparent.accTypeId', '=', 'acctype.accTypeId')
                                        // ->where('accounts.uId', $uId)
                                        ->orderBy('acctype.accTypeTitle')
                                        ->orderBy('accparent.accParentTitle')
                                        ->get();
                                        
        return view('admin.accparent', compact('data', 'accType'));                                        
    }

    public function add_accparent(Request $request)
    {

        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $uid = Auth::id(); // Get the currently authenticated user's ID

        $data = new AccParent;

        $data->accParentTitle = $request->accparent_name;
        $data->accTypeId = $request->accTypeId;
        $data->uId = $uid;

        $data->save();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Parent Account Added Successfully.');

        return redirect()->back();
    }

    public function edit_accparent($id)
    {        

        $accType = AccType::orderBy('accTypeId')->get();

        $data = AccParent::select('accparent.parentId', 
                                            'accparent.accParentTitle', 
                                            'accparent.updated_at', 
                                            'accparent.accTypeId',
                                            'acctype.accTypeTitle')
                                        ->join('acctype', 'accparent.accTypeId', '=', 'acctype.accTypeId')
                                        ->where('accparent.parentId', $id)
                                        ->orderBy('acctype.accTypeTitle')
                                        ->orderBy('accparent.accParentTitle')
                                        ->first();
        
        return view('admin.edit_accparent', compact('data','accType'));
    }

    public function update_accparent(Request $request, $id)    
    {        
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }
                
        $uid = Auth::id(); // Get the currently authenticated user's ID

        $data = AccParent::find($id);

        $data->accParentTitle = $request->accparent_name;
        $data->accTypeId = $request->accTypeId;
        $data->uId = $uid;

        $data->save();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Parent Account Updated Successfully.');

        return redirect('/accparent');
    }
    
    public function delete_accparent($Id)    
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $data = AccParent::find($Id);

        $data->delete();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Selected Parent Account Deleted Successfully.');

        return redirect()->back();

    }    

    //////////////////// Accounts TABLE CRUD ////////////////////
    
    public function view_accounts()
    {
        $accType = AccType::orderBy('accTypeId')->get();

        $accParent = AccParent::orderBy('accParentTitle')->get();

        $area = Area::orderBy('areaTitle')->get();

        $currency = Currency::orderBy('currencyTitle')->get();

        $data = Accounts::select('accounts.acId',
                                    'accounts.acTitle',                                    
                                    'accounts.accTypeId',                                    
                                    'accounts.parentId',                                    
                                    'accounts.areaId',                                    
                                    'accounts.currencyId',                                    
                                    'accounts.updated_at',                                    
                                    'acctype.accTypeTitle',
                                    'currency.currencyTitle', 
                                    'accparent.accParentTitle',
                                    'area.areaTitle')
                                ->join('currency', 'accounts.currencyId', '=', 'currency.currencyId')
                                ->join('acctype', 'accounts.accTypeID', '=', 'acctype.accTypeId')
                                ->join('accparent', 'accounts.parentId', '=', 'accparent.parentId')
                                ->join('area', 'accounts.areaId', '=', 'area.areaId')
                                // ->where('accounts.uId', $uId)
                                // ->orderBy('accType.accTypeTitle')
                                ->orderBy('accounts.acTitle')
                                ->get();

                                // dd($data);

        return view('admin.accounts', compact('data','accType','accParent','area','currency')); 
    }

    public function add_account(Request $request)
    {

        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $uid = Auth::id(); // Get the currently authenticated user's ID

        $data = new Accounts;

        $data->acTitle = $request->account_name;
        $data->accTypeId = $request->accTypeId;
        $data->parentId = $request->parentId;
        $data->areaId = $request->areaId;
        $data->currencyId = $request->currencyId;
        $data->uId = $uid;

        $data->save();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Account Added Successfully.');

        return redirect()->back();
    }

    public function edit_account($id)
    {        

        $accType = AccType::orderBy('accTypeId')->get();

        $accParent = AccParent::orderBy('accParentTitle')->get();

        $area = Area::orderBy('areaTitle')->get();

        $currency = Currency::orderBy('currencyTitle')->get();

        $data = DB::table('accounts')
                        ->select(
                            'accounts.acId',
                            'accounts.acTitle',
                            'accounts.accTypeId',
                            'accounts.parentId',
                            'accounts.areaId',
                            'accounts.currencyId',
                            'accounts.updated_at',
                            'acctype.accTypeTitle',
                            'currency.currencyTitle',
                            'accparent.accParentTitle',
                            'area.areaTitle'
                        )
                        ->join('currency', 'accounts.currencyId', '=', 'currency.currencyId')
                        ->join('acctype', 'accounts.accTypeID', '=', 'acctype.accTypeId')
                        ->join('accparent', 'accounts.parentId', '=', 'accparent.parentId')
                        ->join('area', 'accounts.areaId', '=', 'area.areaId')
                        ->where('accounts.acId', $id)
                        // ->orderBy('accType.accTypeTitle')
                        ->orderBy('accounts.acTitle')
                        ->first(); // get();
        
        return view('admin.edit_account', compact('data','accType','accParent','area','currency')); 

    }

    public function update_account(Request $request, $id)    
    {        
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $uid = Auth::id(); // Get the currently authenticated user's ID
    
        $data = Accounts::find($id);

        // Update the account data
        $data->acTitle = $request->account_name;
        $data->accTypeId = $request->accTypeId;
        $data->parentId = $request->parentId;
        $data->areaId = $request->areaId;
        $data->currencyId = $request->currencyId;
        $data->uId = $uid;
        
        $data->save();
    
        toastr()->timeOut(2000)->closeButton()->addSuccess('Account Updated Successfully.');

        return redirect('/accounts');

    }   

    public function delete_account($Id)    
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $data = Accounts::find($Id);

        $data->delete();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Selected Account Deleted Successfully.');

        return redirect()->back();

    }
    
    //////////////////// Vouchers TABLE CRUD ////////////////////
    
    public function view_vouchersCR(Request $request)
    {
        // $data = Vouchers::orderBy('voucherPrefix')->get();

        $voucherPrefix = $request->voucherPrefix;

        // $accounts = Accounts::orderBy('accTypeId')->orderBy('acTitle')->get();
        $accounts = Accounts::orderBy('acTitle')->get();

        $data = DB::table('vouchers')
                        ->select('vouchers.voucherId',
                                'vouchers.voucherDate',
                                'vouchers.voucherPrefix',
                                'vouchers.remarks',
                                'vouchers.drAcId',
                                'vouchers.crAcId',
                                'vouchers.debit',
                                'vouchers.credit',
                                'vouchers.debitSR',
                                'vouchers.creditSR',
                                'vouchers.uId',
                                'accounts_dr.acTitle as drAcTitle',
                                'acctype_dr.accTypeTitle as drAcTypeTitle',
                                'accounts_cr.acTitle as crAcTitle',
                                'acctype_cr.accTypeTitle as crAcTypeTitle')
                                // ->leftJoin('vouchersdetail', 'vouchers.voucherId', '=', 'vouchersdetail.voucherId')
                                ->leftJoin('accounts as accounts_dr', 'vouchers.drAcId', '=', 'accounts_dr.acId')
                                ->leftJoin('acctype as acctype_dr', 'accounts_dr.accTypeId', '=', 'acctype_dr.accTypeId')
                                ->leftJoin('accounts as accounts_cr', 'vouchers.crAcId', '=', 'accounts_cr.acId')
                                ->leftJoin('acctype as acctype_cr', 'accounts_cr.accTypeId', '=', 'acctype_cr.accTypeId')
                            // ->where('vouchers.uId', $uId)
                            // ->where('vouchers.voucherPrefix', $voucherPrefix)
                            ->where('vouchers.voucherPrefix', 'CR')
                            ->orderBy('vouchers.voucherDate', 'desc')
                            ->orderBy('vouchers.updated_at', 'desc')
                            ->get();

                            // dd($voucherPrefix);
                            // dd($data);

        return view('admin.crv', compact('data','accounts')); 
    }

    public function view_vouchersCP(Request $request)
    {
        // $data = Vouchers::orderBy('voucherPrefix')->get();

        $voucherPrefix = $request->voucherPrefix;

        // $accounts = Accounts::orderBy('accTypeId')->orderBy('acTitle')->get();
        $accounts = Accounts::orderBy('acTitle')->get();

        $data = DB::table('vouchers')
                        ->select('vouchers.voucherId',
                                'vouchers.voucherDate',
                                'vouchers.voucherPrefix',
                                'vouchers.remarks',
                                'vouchers.drAcId',
                                'vouchers.crAcId',
                                'vouchers.debit',
                                'vouchers.credit',
                                'vouchers.debitSR',
                                'vouchers.creditSR',
                                'vouchers.uId',
                                'accounts_dr.acTitle as drAcTitle',
                                'acctype_dr.accTypeTitle as drAcTypeTitle',
                                'accounts_cr.acTitle as crAcTitle',
                                'acctype_cr.accTypeTitle as crAcTypeTitle')
                                // ->leftJoin('vouchersdetail', 'vouchers.voucherId', '=', 'vouchersdetail.voucherId')
                                ->leftJoin('accounts as accounts_dr', 'vouchers.drAcId', '=', 'accounts_dr.acId')
                                ->leftJoin('acctype as acctype_dr', 'accounts_dr.accTypeId', '=', 'acctype_dr.accTypeId')
                                ->leftJoin('accounts as accounts_cr', 'vouchers.crAcId', '=', 'accounts_cr.acId')
                                ->leftJoin('acctype as acctype_cr', 'accounts_cr.accTypeId', '=', 'acctype_cr.accTypeId')
                            // ->where('vouchers.uId', $uId)
                            // ->where('vouchers.voucherPrefix', $voucherPrefix)
                            ->where('vouchers.voucherPrefix', 'CP')
                            ->orderBy('vouchers.voucherDate', 'desc')
                            ->orderBy('vouchers.updated_at', 'desc')
                            ->get();

                            // dd($voucherPrefix);
                            // dd($data);

        return view('admin.cpv', compact('data','accounts')); 
    }

    public function view_vouchersJV(Request $request)
    {
        $voucherPrefix = $request->voucherPrefix;

        $accounts = Accounts::orderBy('acTitle')->get();

        $data = DB::table('vouchers')
                        ->select('vouchers.voucherId',
                                'vouchers.voucherDate',
                                'vouchers.voucherPrefix',
                                'vouchers.remarks',
                                'vouchers.crAcId',
                                'vouchers.creditSR',
                                'vouchers.credit',
                                'vouchers.drAcId',
                                'vouchers.debit',
                                'vouchers.debitSR',
                                'vouchers.uId',
                                'accounts_dr.acTitle as drAcTitle',
                                'acctype_dr.accTypeTitle as drAcTypeTitle',
                                'accounts_cr.acTitle as crAcTitle',
                                'acctype_cr.accTypeTitle as crAcTypeTitle')
                                // ->leftJoin('vouchersdetail', 'vouchers.voucherId', '=', 'vouchersdetail.voucherId')
                                ->leftJoin('accounts as accounts_dr', 'vouchers.drAcId', '=', 'accounts_dr.acId')
                                ->leftJoin('acctype as acctype_dr', 'accounts_dr.accTypeId', '=', 'acctype_dr.accTypeId')
                                ->leftJoin('accounts as accounts_cr', 'vouchers.crAcId', '=', 'accounts_cr.acId')
                                ->leftJoin('acctype as acctype_cr', 'accounts_cr.accTypeId', '=', 'acctype_cr.accTypeId')
                            // ->where('vouchers.uId', $uId)
                            // ->where('vouchers.voucherPrefix', $voucherPrefix)
                            ->where('vouchers.voucherPrefix', 'JV')
                            ->orderBy('vouchers.voucherDate', 'desc')
                            ->orderBy('vouchers.updated_at', 'desc')
                            ->get();

                            // dd($voucherPrefix);
                            // dd($data);

        return view('admin.jv', compact('data','accounts')); 
    }

    public function add_voucher(Request $request)
    {

        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $uid = Auth::id(); // Get the currently authenticated user's ID

        $data = new Vouchers;

        $voucherDate = $request->voucherDate;
        // $formattedDate = Carbon::createFromFormat('d-m-Y', $voucherDate)->format('Y-m-d');
        $formattedDate = Carbon::parse($request->voucherDate)->format('Y-m-d');        

        $voucherPrefix = $request->voucherPrefix;

        $data->voucherDate = $formattedDate;
        $data->voucherPrefix = $voucherPrefix;
        $data->remarks = $request->remarks;
        $data->uId = $uid;

        if ($voucherPrefix == 'CR')
        {
            $data->crAcId = $request->acId;
            $data->credit = $request->credit;
            $data->creditSR = $request->creditSR;    
        }

        if ($voucherPrefix == 'CP')
        {
            $data->drAcId = $request->acId;
            $data->debit = $request->debit;
            $data->debitSR = $request->debitSR;
        }

        if ($voucherPrefix == 'JV')
        {
            $data->crAcId = $request->crAcId;
            $data->credit = $request->credit;
            $data->creditSR = $request->creditSR;    

            $data->drAcId = $request->drAcId;
            $data->debit = $request->debit;
            $data->debitSR = $request->debitSR;            
        }

        $data->save();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Voucher Added Successfully.');

        return redirect()->back();
    }

    public function edit_crv($id)
    {        
        $accounts = Accounts::orderBy('acTitle')->get();

        $data = DB::table('vouchers')
                        ->select(
                                'vouchers.voucherId',
                                'vouchers.voucherDate',
                                'vouchers.voucherPrefix',
                                'vouchers.remarks',
                                'vouchers.drAcId',
                                'vouchers.crAcId',
                                'vouchers.debit',
                                'vouchers.credit',
                                'vouchers.debitSR',
                                'vouchers.creditSR',
                                'vouchers.uId',
                                'accounts_dr.acTitle as drAcTitle',
                                'acctype_dr.accTypeTitle as drAcTypeTitle',
                                'accounts_cr.acTitle as crAcTitle',
                                'acctype_cr.accTypeTitle as crAcTypeTitle'
                        )
                        ->leftJoin('accounts as accounts_dr', 'vouchers.drAcId', '=', 'accounts_dr.acId')
                        ->leftJoin('acctype as acctype_dr', 'accounts_dr.accTypeId', '=', 'acctype_dr.accTypeId')
                        ->leftJoin('accounts as accounts_cr', 'vouchers.crAcId', '=', 'accounts_cr.acId')
                        ->leftJoin('acctype as acctype_cr', 'accounts_cr.accTypeId', '=', 'acctype_cr.accTypeId')
                        ->where('vouchers.voucherId', $id)                        
                        // ->orderBy('accounts.acTitle')
                        ->first(); // get();
        
        return view('admin.edit_crv', compact('data','accounts')); 

    }

    public function edit_cpv($id)
    {        
        $accounts = Accounts::orderBy('acTitle')->get();
        
        $data = DB::table('vouchers')
                        ->select(
                                'vouchers.voucherId',
                                'vouchers.voucherDate',
                                'vouchers.voucherPrefix',
                                'vouchers.remarks',
                                'vouchers.drAcId',
                                'vouchers.crAcId',
                                'vouchers.debit',
                                'vouchers.credit',
                                'vouchers.debitSR',
                                'vouchers.creditSR',
                                'vouchers.uId',
                                'accounts_dr.acTitle as drAcTitle',
                                'acctype_dr.accTypeTitle as drAcTypeTitle',
                                'accounts_cr.acTitle as crAcTitle',
                                'acctype_cr.accTypeTitle as crAcTypeTitle'
                        )
                        ->leftJoin('accounts as accounts_dr', 'vouchers.drAcId', '=', 'accounts_dr.acId')
                        ->leftJoin('acctype as acctype_dr', 'accounts_dr.accTypeId', '=', 'acctype_dr.accTypeId')
                        ->leftJoin('accounts as accounts_cr', 'vouchers.crAcId', '=', 'accounts_cr.acId')
                        ->leftJoin('acctype as acctype_cr', 'accounts_cr.accTypeId', '=', 'acctype_cr.accTypeId')
                        ->where('vouchers.voucherId', $id)                        
                        // ->orderBy('accounts.acTitle')
                        ->first(); // get();
        
        return view('admin.edit_cpv', compact('data','accounts')); 

    }

    public function edit_jv($id)
    {        
        $accounts = Accounts::orderBy('acTitle')->get();

        $data = DB::table('vouchers')
                        ->select(
                                'vouchers.voucherId',
                                'vouchers.voucherDate',
                                'vouchers.voucherPrefix',
                                'vouchers.remarks',
                                'vouchers.drAcId',
                                'vouchers.crAcId',
                                'vouchers.debit',
                                'vouchers.credit',
                                'vouchers.debitSR',
                                'vouchers.creditSR',
                                'vouchers.uId',
                                'accounts_dr.acTitle as drAcTitle',
                                'acctype_dr.accTypeTitle as drAcTypeTitle',
                                'accounts_cr.acTitle as crAcTitle',
                                'acctype_cr.accTypeTitle as crAcTypeTitle'
                                )
                        ->leftJoin('accounts as accounts_dr', 'vouchers.drAcId', '=', 'accounts_dr.acId')
                        ->leftJoin('acctype as acctype_dr', 'accounts_dr.accTypeId', '=', 'acctype_dr.accTypeId')
                        ->leftJoin('accounts as accounts_cr', 'vouchers.crAcId', '=', 'accounts_cr.acId')
                        ->leftJoin('acctype as acctype_cr', 'accounts_cr.accTypeId', '=', 'acctype_cr.accTypeId')
                        ->where('vouchers.voucherId', $id)                        
                        // ->orderBy('accounts.acTitle')
                        ->first(); // get();
        
        return view('admin.edit_jv', compact('data','accounts')); 

    }

    public function update_voucher(Request $request, $id)    
    {        
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $uid = Auth::id(); // Get the currently authenticated user's ID
    
        $data = Vouchers::find($id);

        // Update the Voucher data
        $voucherDate = $request->voucherDate;
        // $formattedDate = Carbon::createFromFormat('d-m-Y', $voucherDate)->format('Y-m-d');
        $formattedDate = Carbon::parse($request->voucherDate)->format('Y-m-d');        

        $voucherPrefix = $request->voucherPrefix;

        $data->voucherDate = $formattedDate;
        $data->voucherPrefix = $voucherPrefix;
        $data->remarks = $request->remarks;
        $data->uId = $uid;

        if ($voucherPrefix == 'CR')
        {
            $data->crAcId = $request->acId;
            $data->credit = $request->credit;
            $data->creditSR = $request->creditSR;    
        }

        if ($voucherPrefix == 'CP')
        {
            $data->drAcId = $request->acId;
            $data->debit = $request->debit;
            $data->debitSR = $request->debitSR;
        }

        if ($voucherPrefix == 'JV')
        {
            $data->crAcId = $request->crAcId;
            $data->credit = $request->credit;
            $data->creditSR = $request->creditSR;    

            $data->drAcId = $request->drAcId;
            $data->debit = $request->debit;
            $data->debitSR = $request->debitSR;            
        }

        $data->save();
    
        toastr()->timeOut(2000)->closeButton()->addSuccess('Voucher Updated Successfully.');

        if ($voucherPrefix == 'CR') {return redirect('/crv');}
        if ($voucherPrefix == 'CP') {return redirect('/cpv');}
        if ($voucherPrefix == 'JV') {return redirect('/jv');}        

    }   

    public function delete_voucher($Id)    
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $data = Vouchers::find($Id);

        $data->delete();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Selected Voucher Deleted Successfully.');

        return redirect()->back();

    }
    
    //////////////////// Vouchers TABLE REPORTS ////////////////////
    
    //////////////////// AC LEDGER REPORT ////////////////////
    
    public function ac_ledger(Request $request)
    {
        
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $datefrom = Carbon::parse($request->dateFrom)->format('Y-m-d');
        $dateto = Carbon::parse($request->dateTo)->format('Y-m-d');
        $acId = $request->acId;
        $accounts = Accounts::orderBy('acTitle')->get();
        
        // dd($datefrom, $datefrom);
        
        $data = [];
        if(!empty($acId)){
            $data = DB::table('vouchers')
                       ->select('vouchers.voucherId',
                                'vouchers.voucherDate',
                                'vouchers.voucherPrefix',
                                'vouchers.remarks',
                                'vouchers.drAcId',
                                'vouchers.crAcId',
                                'vouchers.debit',
                                'vouchers.credit',
                                'vouchers.debitSR',
                                'vouchers.creditSR',
                                'vouchers.uId',
                                'accounts_dr.acTitle as drAcTitle',
                                'acctype_dr.accTypeTitle as drAcTypeTitle',
                                'accounts_cr.acTitle as crAcTitle',
                                'acctype_cr.accTypeTitle as crAcTypeTitle')
                                // ->leftJoin('vouchersdetail', 'vouchers.voucherId', '=', 'vouchersdetail.voucherId')
                                ->leftJoin('accounts as accounts_dr', 'vouchers.drAcId', '=', 'accounts_dr.acId')
                                ->leftJoin('acctype as acctype_dr', 'accounts_dr.accTypeId', '=', 'acctype_dr.accTypeId')
                                ->leftJoin('accounts as accounts_cr', 'vouchers.crAcId', '=', 'accounts_cr.acId')
                                ->leftJoin('acctype as acctype_cr', 'accounts_cr.accTypeId', '=', 'acctype_cr.accTypeId')
                            // ->where('vouchers.uId', $uId)
                            ->where(function($query) use ($acId)
                            {$query
                                ->where('vouchers.drAcId', $acId)
                                ->orWhere('vouchers.crAcId', $acId);
                            })                                            
                            ->whereBetween('vouchers.voucherDate', [$datefrom, $dateto])
                            ->orderBy('vouchers.voucherDate', 'desc')
                            ->orderBy('vouchers.updated_at', 'desc')
                            ->get();
        }
       
        return view('admin.ac_ledger', compact('data','accounts','acId','datefrom','dateto')); 
    }
    
    //////////////////// CASH BOOK REPORT ////////////////////
    
    public function cash_book(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $datefrom = $request->has('dateFrom') ? Carbon::parse($request->dateFrom)->format('Y-m-d') : now()->format('Y-m-d');
        $dateto = $request->has('dateTo') ? Carbon::parse($request->dateTo)->format('Y-m-d') : now()->format('Y-m-d');
    
        $data = [];
        if(!empty($datefrom))
            {$data = DB::table('vouchers')
                   ->select('vouchers.voucherId',
                            'vouchers.voucherDate',
                            'vouchers.voucherPrefix',
                            'vouchers.remarks',
                            'vouchers.drAcId',
                            'vouchers.crAcId',
                            'vouchers.debit',
                            'vouchers.credit',
                            'vouchers.debitSR',
                            'vouchers.creditSR',
                            'vouchers.uId',
                            'accounts_dr.acTitle as drAcTitle',
                            'acctype_dr.accTypeTitle as drAcTypeTitle',
                            'accounts_cr.acTitle as crAcTitle',
                            'acctype_cr.accTypeTitle as crAcTypeTitle')
                    ->leftJoin('accounts as accounts_dr', 'vouchers.drAcId', '=', 'accounts_dr.acId')
                    ->leftJoin('acctype as acctype_dr', 'accounts_dr.accTypeId', '=', 'acctype_dr.accTypeId')
                    ->leftJoin('accounts as accounts_cr', 'vouchers.crAcId', '=', 'accounts_cr.acId')
                    ->leftJoin('acctype as acctype_cr', 'accounts_cr.accTypeId', '=', 'acctype_cr.accTypeId')
                    ->whereIn('vouchers.voucherPrefix', ['CR', 'CP'])
                    ->whereBetween('vouchers.voucherDate', [$datefrom, $dateto])
                    ->orderBy('vouchers.voucherDate', 'desc')
                    ->orderBy('vouchers.updated_at', 'desc')
                    ->get();
            }
            
        return view('admin.cash_book', compact('data','datefrom','dateto')); 
    }

    //////////////////// TRAIL BALANCE REPORT ////////////////////
    
    public function trail_balance(Request $request)
    {
       // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $uid = Auth::id(); // Get the currently authenticated user's ID
    
        $accounts = Accounts::orderBy('acTitle')->get();
        
        // Now you can access the request data
        $datefrom = Carbon::parse($request->dateFrom)->format('Y-m-d');
        $dateto = Carbon::parse($request->dateTo)->format('Y-m-d');
    
        $data = DB::table('vouchers')
                   ->select('vouchers.voucherId',
                            'vouchers.voucherDate',
                            'vouchers.voucherPrefix',
                            'vouchers.remarks',
                            'vouchers.drAcId',
                            'vouchers.crAcId',
                            'vouchers.debit',
                            'vouchers.credit',
                            'vouchers.debitSR',
                            'vouchers.creditSR',
                            'vouchers.uId',
                            'accounts_dr.acTitle as drAcTitle',
                            'acctype_dr.accTypeTitle as drAcTypeTitle',
                            'accounts_cr.acTitle as crAcTitle',
                            'acctype_cr.accTypeTitle as crAcTypeTitle')
                    ->leftJoin('accounts as accounts_dr', 'vouchers.drAcId', '=', 'accounts_dr.acId')
                    ->leftJoin('acctype as acctype_dr', 'accounts_dr.accTypeId', '=', 'acctype_dr.accTypeId')
                    ->leftJoin('accounts as accounts_cr', 'vouchers.crAcId', '=', 'accounts_cr.acId')
                    ->leftJoin('acctype as acctype_cr', 'accounts_cr.accTypeId', '=', 'acctype_cr.accTypeId')
                    // ->whereIn('vouchers.voucherPrefix', ['CR', 'CP'])
                    ->whereBetween('vouchers.voucherDate', [$datefrom, $dateto])
                    ->orderBy('vouchers.voucherDate', 'desc')
                    ->orderBy('vouchers.updated_at', 'desc','datefrom','dateto')
                    ->get();
    
        return view('admin.trail_balance', compact('data', 'accounts','datefrom','dateto')); 
    }
    
}
