<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

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
}
