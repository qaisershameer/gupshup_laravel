<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Food;

use App\Models\Cart;

use App\Models\Order;

use App\Models\Book;

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
                $total_user = User::where('usertype','=','user')->count();                
                
                $total_food = Food::all()->count();

                $total_order = Order::all()->count();

                $total_delivered = Order::where('delivery_status','=','Delivered')->count();

                return view('admin.index', compact('total_user', 'total_food', 'total_order', 'total_delivered'));
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
            $data->userid = Auth()->user()->id;

            $data->save();

            // return redirect()->back();
            return redirect('/home#blog');

        } 
        
        else

        {
            return redirect("login");            
        }
    }

    public function my_cart()
    {
        $user_id = Auth()->user()->id;

        $data = Cart::find($user_id);

        $data = Cart::where('userid', '=', $user_id)->get();

        return view('home.my_cart', compact('data'));
    }

    public function remove_cart($id)
    {
        $data = Cart::find($id);

        $data->delete();

        return redirect()->back();

    }

    public function confirm_order(Request $request)  
    {

        $user_id = Auth()->user()->id;

        $cart = Cart::where('userid','=', $user_id)->get();

        // dd($cart);

        foreach($cart as $cart)
        {
            
            $order = new Order;

            $order->name = $request->name;

            $order->email = $request->email;

            $order->address = $request->address;

            $order->phone = $request->phone;

            $order->title = $cart->title;

            $order->qty = $cart->qty;

            $order->price = $cart->price;

            $order->image = $cart->image;

            $order->save();

            $data = Cart::find($cart->id);

            $data->delete();

        }

        return redirect()->back();

    }

    public function book_table(Request $request)
    {

        $data = new Book;

        $data->phone = $request->phone;

        $data->guest = $request->guest;        

        $data->time = $request->time;

        $data->date = $request->date;

        $data->note = $request->note;

        $data->save();

        return redirect()->back();

    }

}
