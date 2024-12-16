<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Dompdf\Dompdf;

use Dompdf\Options;

use App\Models\Area;

use App\Models\Book;

use App\Models\Food;

use App\Models\Order;

use App\Models\AccType;

use App\Models\Accounts;

use App\Models\Currency;

use App\Models\Vouchers;

use App\Models\AccParent;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

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
        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        $data = Currency::where('uId', $uId)->orderBy('currencyTitle')->get();
        return view('admin.currency', compact('data')); 
    }
      
    public function add_currency(Request $request)
    {

        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $uId = Auth::id(); // Get the currently authenticated user's ID

        $data = new Currency;

        $data->currencyTitle = $request->currency_name;
        $data->uId = $uId;

        $data->save();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Currency Added Successfully.');

        return redirect()->back();
    }

    public function edit_currency($id)
    {        
        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        $data = Currency::where('uId', $uId)->find($id);
        
        return view('admin.edit_currency', compact('data'));
    }

    public function update_currency(Request $request, $id)    
    {        
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }
                
        $uId = Auth::id(); // Get the currently authenticated user's ID

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
        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        $data = Area::where('uId', $uId)->orderBy('areaTitle')->get();
        
        return view('admin.area', compact('data')); 
    }
    
    public function add_area(Request $request)
    {

        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $uId = Auth::id(); // Get the currently authenticated user's ID

        $data = new Area;

        $data->areaTitle = $request->area_name;
        $data->uId = $uId;

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
                
        $uId = Auth::id(); // Get the currently authenticated user's ID

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
        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        $data = AccType::where('uId', $uId)->orderBy('accTypeId')->get();
        
        return view('admin.acctype', compact('data')); 
    }

    public function add_acctype(Request $request)
    {

        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // or handle accordingly
        }

        $uId = Auth::id(); // Get the currently authenticated user's ID

        $data = new AccType;

        $data->accTypeTitle = $request->acctype_name;
        $data->uId = $uId;

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
                
        $uId = Auth::id(); // Get the currently authenticated user's ID

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

        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        $accType = AccType::where('uId', $uId)->orderBy('accTypeId')->get();

        $data = AccParent::select('accparent.parentId', 
                                            'accparent.accParentTitle', 
                                            'accparent.updated_at', 
                                            'accparent.accTypeId',
                                            'acctype.accTypeTitle')
                                        ->join('acctype', 'accparent.accTypeId', '=', 'acctype.accTypeId')
                                        ->where('accparent.uId', $uId)
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

        $uId = Auth::id(); // Get the currently authenticated user's ID

        $data = new AccParent;

        $data->accParentTitle = $request->accparent_name;
        $data->accTypeId = $request->accTypeId;
        $data->uId = $uId;

        $data->save();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Parent Account Added Successfully.');

        return redirect()->back();
    }

    public function edit_accparent($id)
    {        
        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        $accType = AccType::where('uId', $uId)->orderBy('accTypeId')->get();

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
                
        $uId = Auth::id(); // Get the currently authenticated user's ID

        $data = AccParent::find($id);

        $data->accParentTitle = $request->accparent_name;
        $data->accTypeId = $request->accTypeId;
        $data->uId = $uId;

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
        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        $accType = AccType::where('uId', $uId)->orderBy('accTypeId')->get();

        $accParent = AccParent::where('uId', $uId)->orderBy('accParentTitle')->get();

        $area = Area::where('uId', $uId)->orderBy('areaTitle')->get();

        $currency = Currency::where('uId', $uId)->orderBy('currencyTitle')->get();

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
                                ->where('accounts.uId', $uId)
                                // ->orderBy('accType.accTypeTitle')
                                ->orderBy('accounts.acTitle')
                                ->get();

                                // dd($data);

        return view('admin.accounts', compact('data','accType','accParent','area','currency')); 
    }

    public function add_account(Request $request)
    {

        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login'); // or handle accordingly
        }
        $uId = Auth::id(); // Get the currently authenticated user's ID

        $data = new Accounts;

        $data->acTitle = $request->account_name;
        $data->accTypeId = $request->accTypeId;
        $data->parentId = $request->parentId;
        $data->areaId = $request->areaId;
        $data->currencyId = $request->currencyId;
        $data->uId = $uId;

        $data->save();

        toastr()->timeOut(2000)->closeButton()->addSuccess('Account Added Successfully.');

        return redirect()->back();
    }

    public function edit_account($id)
    {
        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login'); // or handle accordingly
        }
        $uId = Auth::id(); // Get the currently authenticated user's ID
        

        $accType = AccType::where('uId', $uId)->orderBy('accTypeId')->get();

        $accParent = AccParent::where('uId', $uId)->orderBy('accParentTitle')->get();

        $area = Area::where('uId', $uId)->orderBy('areaTitle')->get();

        $currency = Currency::where('uId', $uId)->orderBy('currencyTitle')->get();

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
    
        $uId = Auth::id(); // Get the currently authenticated user's ID
    
        $data = Accounts::find($id);

        // Update the account data
        $data->acTitle = $request->account_name;
        $data->accTypeId = $request->accTypeId;
        $data->parentId = $request->parentId;
        $data->areaId = $request->areaId;
        $data->currencyId = $request->currencyId;
        $data->uId = $uId;
        
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

        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        // $data = Vouchers::orderBy('voucherPrefix')->get();

        $voucherPrefix = $request->voucherPrefix;

        // $accounts = Accounts::orderBy('accTypeId')->orderBy('acTitle')->get();
        $accounts = Accounts::where('uId', $uId)->orderBy('acTitle')->get();

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
                            ->where('vouchers.uId', $uId)
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

        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        // $data = Vouchers::orderBy('voucherPrefix')->get();

        $voucherPrefix = $request->voucherPrefix;

        // $accounts = Accounts::orderBy('accTypeId')->orderBy('acTitle')->get();
        $accounts = Accounts::where('uId', $uId)->orderBy('acTitle')->get();

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
                            ->where('vouchers.uId', $uId)
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
        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        $voucherPrefix = $request->voucherPrefix;

        $accounts = Accounts::where('uId', $uId)->orderBy('acTitle')->get();

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
                            ->where('vouchers.uId', $uId)
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

        $uId = Auth::id(); // Get the currently authenticated user's ID

        $data = new Vouchers;

        $voucherDate = $request->voucherDate;
        // $formattedDate = Carbon::createFromFormat('d-m-Y', $voucherDate)->format('Y-m-d');
        $formattedDate = Carbon::parse($request->voucherDate)->format('Y-m-d');        

        $voucherPrefix = $request->voucherPrefix;

        $data->voucherDate = $formattedDate;
        $data->voucherPrefix = $voucherPrefix;
        $data->remarks = $request->remarks;
        $data->uId = $uId;

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
        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        $accounts = Accounts::where('uId', $uId)->orderBy('acTitle')->get();

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
        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        $accounts = Accounts::where('uId', $uId)->orderBy('acTitle')->get();
        
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
        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        $accounts = Accounts::where('uId', $uId)->orderBy('acTitle')->get();

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
    
        $uId = Auth::id(); // Get the currently authenticated user's ID
    
        $data = Vouchers::find($id);

        // Update the Voucher data
        $voucherDate = $request->voucherDate;
        // $formattedDate = Carbon::createFromFormat('d-m-Y', $voucherDate)->format('Y-m-d');
        $formattedDate = Carbon::parse($request->voucherDate)->format('Y-m-d');        

        $voucherPrefix = $request->voucherPrefix;

        $data->voucherDate = $formattedDate;
        $data->voucherPrefix = $voucherPrefix;
        $data->remarks = $request->remarks;
        $data->uId = $uId;

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
        
        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        // Parse date from request and format them
        if($request->dateFrom == ""){
            $currentYear = Carbon::now()->year;
            $datefrom = $currentYear.'-01-01';
            $dateto = Carbon::now()->format('Y-m-d');
            
        }else{
            $datefrom = $request->dateFrom;
            $dateto = $request->dateTo;  
        }

        $acId = $request->acId;
        $accounts = Accounts::where('uId', $uId)->orderBy('acTitle')->get();
        
        $selectedAccount = $accounts->firstWhere('acId', $acId);
        $acTitle = $selectedAccount ? $selectedAccount->acTitle : ' !!! ';
        
        $balance = $this->ledger_balance($uId, $acId, 'ALL', 'ALL', $datefrom, $dateto);

      
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
                            ->where('vouchers.uId', $uId)
                            ->where(function($query) use ($acId)
                            {$query
                                ->where('vouchers.drAcId', $acId)
                                ->orWhere('vouchers.crAcId', $acId);
                            })                                            
                            ->whereBetween('vouchers.voucherDate', [$datefrom, $dateto])
                            ->orderBy('vouchers.voucherDate', 'asc')
                            ->orderBy('vouchers.updated_at', 'asc')
                            ->get();
        }

        $routeName = Route::currentRouteName();
        if($routeName == 'pdf_ledger'){
            
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
            $dompdf = new Dompdf($options);
    
            // Load HTML content for PDF
            $html = view('admin.ac_ledger_pdf', compact('data', 'accounts', 'acId', 'acTitle', 'datefrom', 'dateto', 'balance'))->render();
    
            // Load HTML to Dompdf
            $dompdf->loadHtml($html);
    
            // (Optional) Set paper size
            $dompdf->setPaper('A4', 'portrait');
    
            // Render the PDF (first pass)
            $dompdf->render();
    
            // Download the generated PDF
            return $dompdf->stream('ac_ledger_pdf.pdf');
        }
       
        return view('admin.ac_ledger', compact('data','accounts','acId','datefrom','dateto', 'balance')); 
    }
    
    // public function pdf_ledger(Request $request)
    // {
    //     $routeName = Route::currentRouteName();
    //     $routeAction = Route::currentRouteAction();
    //     $currentUrl = url()->current();
    //     dd($routeAction,$currentUrl,$routeName);
    //     // Check if user is authenticated
    //     if (!Auth::check()) {return redirect()->route('login');}
        
    //     $uId = Auth::id(); // Get the currently authenticated user's ID
        
    //     $datefrom = Carbon::parse($request->dateFrom)->format('Y-m-d');
    //     $dateto = Carbon::parse($request->dateTo)->format('Y-m-d');
    //     $acId = $request->acId;
    //     $accounts = Accounts::where('uId', $uId)->orderBy('acTitle')->get();

    //     $selectedAccount = $accounts->firstWhere('acId', $acId);
    //     $acTitle = $selectedAccount ? $selectedAccount->acTitle : ' !!! ';
        
    //     $balance = $this->ledger_balance($uId, $acId, 'ALL', 'ALL', $datefrom, $dateto);
        
    //     // dd($datefrom, $datefrom);
        
    //     $data = [];
    //     if(!empty($acId)){
    //         $data = DB::table('vouchers')
    //                    ->select('vouchers.voucherId',
    //                             'vouchers.voucherDate',
    //                             'vouchers.voucherPrefix',
    //                             'vouchers.remarks',
    //                             'vouchers.drAcId',
    //                             'vouchers.crAcId',
    //                             'vouchers.debit',
    //                             'vouchers.credit',
    //                             'vouchers.debitSR',
    //                             'vouchers.creditSR',
    //                             'vouchers.uId',
    //                             'accounts_dr.acTitle as drAcTitle',
    //                             'acctype_dr.accTypeTitle as drAcTypeTitle',
    //                             'accounts_cr.acTitle as crAcTitle',
    //                             'acctype_cr.accTypeTitle as crAcTypeTitle')
    //                             // ->leftJoin('vouchersdetail', 'vouchers.voucherId', '=', 'vouchersdetail.voucherId')
    //                             ->leftJoin('accounts as accounts_dr', 'vouchers.drAcId', '=', 'accounts_dr.acId')
    //                             ->leftJoin('acctype as acctype_dr', 'accounts_dr.accTypeId', '=', 'acctype_dr.accTypeId')
    //                             ->leftJoin('accounts as accounts_cr', 'vouchers.crAcId', '=', 'accounts_cr.acId')
    //                             ->leftJoin('acctype as acctype_cr', 'accounts_cr.accTypeId', '=', 'acctype_cr.accTypeId')
    //                         ->where('vouchers.uId', $uId)
    //                         ->where(function($query) use ($acId)
    //                         {$query
    //                             ->where('vouchers.drAcId', $acId)
    //                             ->orWhere('vouchers.crAcId', $acId);
    //                         })                                            
    //                         ->whereBetween('vouchers.voucherDate', [$datefrom, $dateto])
    //                         ->orderBy('vouchers.voucherDate', 'asc')
    //                         ->orderBy('vouchers.updated_at', 'asc')
    //                         ->get();
    //     }
       
    //     // $pdf = pdf::loadView('admin.ac_ledger_pdf', compact('data', 'accounts','acId', 'acTitle', 'datefrom','dateto'));
    //     // return $pdf->download('ac_ledger_pdf.pdf');
        
    //     // Initialize Dompdf with options
    //     $options = new Options();
    //     $options->set('isHtml5ParserEnabled', true);
    //     $options->set('isPhpEnabled', true);
    //     $dompdf = new Dompdf($options);

    //     // Load HTML content for PDF
    //     $html = view('admin.ac_ledger_pdf', compact('data', 'accounts', 'acId', 'acTitle', 'datefrom', 'dateto', 'balance'))->render();

    //     // Load HTML to Dompdf
    //     $dompdf->loadHtml($html);

    //     // (Optional) Set paper size
    //     $dompdf->setPaper('A4', 'portrait');

    //     // Render the PDF (first pass)
    //     $dompdf->render();

    //     // Download the generated PDF
    //     return $dompdf->stream('ac_ledger_pdf.pdf');
    
    // }
    
    //////////////////// CASH BOOK REPORT ////////////////////
    
    public function cash_book(Request $request)
    {
        // Check if user is authenticated
        if (!Auth::check()) {return redirect()->route('login');}
        
        $uId = Auth::id(); // Get the currently authenticated user's ID
        
        // Parse date from request and format them
        if($request->dateFrom == ""){
            $currentYear = Carbon::now()->year;
            $datefrom = $currentYear.'-01-01';
            $dateto = Carbon::now()->format('Y-m-d');
            
        }else{
            $datefrom = $request->dateFrom;
            $dateto = $request->dateTo;  
        }
    
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
                    ->where('vouchers.uId', $uId)
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
        if (!Auth::check()) { return redirect()->route('login'); }
        
        $uId = Auth::id(); // Get the currently authenticated user's ID

        // Parse date from request and format them
        if($request->dateFrom == ""){
            $currentYear = Carbon::now()->year;
            $datefrom = $currentYear.'-01-01';
            $dateto = Carbon::now()->format('Y-m-d');
            
        }else{
            $datefrom = $request->dateFrom;
            $dateto = $request->dateTo;  
        }
                
        // Get the accounts for the user
        $accounts = Accounts::where('uId', $uId)->orderBy('acTitle')->get();
        $accType = AccType::where('uId', $uId)->orderBy('accTypeId')->get();
        $accParent = AccParent::where('uId', $uId)->orderBy('accParentTitle')->get();
        $area = Area::where('uId', $uId)->orderBy('areaTitle')->get();
        $currency = Currency::where('uId', $uId)->orderBy('currencyTitle')->get();        

        $accTypeId = isset($request->accTypeId) ? $request->accTypeId : 'ALL';
        $areaId = isset($request->areaId) ? $request->areaId : 'ALL';
        
        // $parentId = isset($request->parentId) ? $request->parentId : 'ALL';
        // $currencyId = isset($request->currencyId) ? $request->currencyId : 'ALL';
        
        // $accTypeId = $request->accTypeId ?? 'ALL';
        // $areaId = $request->areaId ?? 'ALL';

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
                0 AS credit,
                0 AS creditSR
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
                
                0 AS debit,
                0 AS debitSR,
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
            DB::raw('SUM(credit) AS credit'),
            DB::raw('SUM(creditSR) AS creditSR')
        )
        ->groupBy('acId', 'acTitle', 'accTypeTitle', 'accTypeId', 'accTypeTitle', 'areaId', 'areaTitle')
        ->having('acId', '<>', 0)
        ->orderBy('acTitle');
        
        // Conditionally add the accTypeId filter
        $bindings = [$uId, $datefrom, $dateto, $uId, $datefrom, $dateto];
        
        if ($accTypeId !== 'ALL') {
            $query->where('accTypeId', $accTypeId);
            $bindings[] = $accTypeId; // Add accTypeId to bindings
        } else {
            $query->whereNotNull('accTypeId');
        }

        if ($areaId !== 'ALL') {
            $query->where('areaId', $areaId);
            $bindings[] = $areaId; // Add areaId to bindings
        } else {
            $query->whereNotNull('areaId');
        }        
        
        $query->setBindings($bindings);
        
        $data = $query->get();

        // Return the results to the view
        return view('admin.trail_balance', compact('data', 'accounts', 'accType', 'accTypeId', 'accParent', 'area', 'areaId', 'currency', 'datefrom', 'dateto'));
    }

    //////////////////// ACCOUNT OPENING ENDING BALANCE QUERY ////////////////////

    public function ledger_balance($uId, $acId, $accTypeId, $areaId, $datefrom, $dateto)
    {

        $SessionID = 1;
        $balance = [];
        
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
                0 AS credit,
                0 AS creditSR
            FROM
                vouchers
            LEFT JOIN accounts ON vouchers.drAcId = accounts.acId
            LEFT JOIN acctype ON accounts.accTypeId = acctype.accTypeId
            LEFT JOIN area ON accounts.areaId = area.areaId
            WHERE
                vouchers.uId = ? AND vouchers.drAcId = ? AND vouchers.voucherDate < ? 
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
                
                0 AS debit,
                0 AS debitSR,
                SUM(vouchers.credit) AS credit,
                SUM(vouchers.creditSR) AS creditSR
            FROM
                vouchers
            LEFT JOIN accounts ON vouchers.crAcId = accounts.acId
            LEFT JOIN acctype ON accounts.accTypeId = acctype.accTypeId
            LEFT JOIN area ON accounts.areaId = area.areaId
            WHERE
                vouchers.uId = ? AND vouchers.crAcId = ? AND vouchers.voucherDate < ?
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
            DB::raw('SUM(credit) AS credit'),
            DB::raw('SUM(credit) AS credit'),
            DB::raw('SUM(debit) - SUM(credit) AS balancePK'),
            DB::raw('SUM(debitSR) - SUM(creditSR) AS balanceSR')
        )
        ->groupBy('acId', 'acTitle', 'accTypeTitle', 'accTypeId', 'accTypeTitle', 'areaId', 'areaTitle')
        ->having('acId', '<>', 0)
        ->orderBy('acTitle');
        
        // Conditionally add the accTypeId filter
        $bindings = [$uId, $acId, $datefrom, $uId, $acId, $datefrom];
        
        if ($accTypeId !== 'ALL') {
            $query->where('accTypeId', $accTypeId);
            $bindings[] = $accTypeId; // Add accTypeId to bindings
        } else {
            $query->whereNotNull('accTypeId');
        }

        if ($areaId !== 'ALL') {
            $query->where('areaId', $areaId);
            $bindings[] = $areaId; // Add areaId to bindings
        } else {
            $query->whereNotNull('areaId');
        }        
        
        $query->setBindings($bindings);
        
        // $data = $query->get();
        $balance = $query->get();
        
        return $balance;
    }

}