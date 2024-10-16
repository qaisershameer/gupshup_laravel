<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Cart;

use App\Models\Food;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function my_home()
    {

        $data = Food::all();

        return view('home.index', compact('data'));
    }

    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;

            if($usertype == 'admin')
            {
                return view('admin.index');
            }
            else
            {
                $data = Food::all();
                return view('home.index', compact('data'));
            }

        }
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $food = Food::find($id);

            $cart_title = $food->title;

            $cart_detail = $food->detail;

            $cart_image = $food->image;

            $cart_qty = $request->qty;

            $cart_price = $cart_qty * $food->price;
            

            $data = new Cart;

            $data->title = $cart_title;
            $data->detail = $cart_detail;
            $data->image = $cart_image;
            $data->price = $cart_price;
            $data->qty = $cart_qty;

            $data->save();

            // return redirect()->back();
            return redirect('/home#blog');


        } 
        
        else

        {
            return redirect("login");            
        }
    }
}
