<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function getViewProdEdit()
    {
        if(Auth::user()->isAdmin()){
            $data = [
                'prod'=>Products::all()
            ];
            return view('shop.product-editing', $data);
        }else{
            return redirect('/');
        }
    }


    public function postSaveProd(Request $request)
    {
        if($request->has('id_prod')){
            foreach ($request->id_prod as $key=>$id) {
             $production = Products::find($id);
             if($production){
                 $production->count = $request->count_prod[$key];
                 $production->save();
                 return redirect()->back();
             }
            }
        }
    }
}
