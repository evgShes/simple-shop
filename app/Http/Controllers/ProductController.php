<?php

namespace App\Http\Controllers;

use App\City;
use App\History;
use ShesShoppingCart\Src\Cart;
use App\Carts;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function getProducts($city = null)
    {
        $products = Products::query();
        if (!empty($city)) $products->where('city_id', $city);
        $data = [
            'products' => $products->get(),
            'city' => City::all()->sortBy('name'),
            'city_id' => $city
        ];
        return view('shop.index', $data);
    }

    public function getCartView(Request $request)
    {
        $cart = Cart::get();
        $totalPrice = $cart['total_price'];
        $products = $cart['items'];
        return view('shop.shopping-cart', ['products' => $products, 'totalPrice' => $totalPrice]);
    }

    public function getAddToCart(Request $request, $id = null)
    {
        $product = Products::find($id);
        $data = [[
            'id' => $product->id,
            'qty' => 0,
            'price' => $product->price,
            'item' => $product,
        ]];
        $cart = Cart::add($data);
        return redirect('/');
    }

    public function getCartReduce(Request $request, $id)
    {
        $cart = Cart::reduce($id);
        return redirect()->route('cart.view');
    }

    public function getCartIncrease(Request $request, $id)
    {
        $cart = Cart::increase($id);
        return redirect()->route('cart.view');
    }

    public function getCartRemove(Request $request, $id)
    {
        $cart = Cart::remove($id);
        return redirect()->route('cart.view');
    }

    public function getCartDestroy()
    {
        Cart::delete();
        return redirect()->route('cart.view');
    }

    public function getBuy()
    {
        $cart = Cart::get();
        if (!empty($cart['items'])) {
            $total_price = $cart['total_price'];
            $total_qty = $cart['total_qty'];
            foreach ($cart['items'] as $prod) {
                $product = Products::find($prod['id']);
                $product->count = $product->count - $prod['qty'];
                $product->save();
                Cart::remove($prod['id']);
                $history = History::create([
                    'user_id' => Auth::id(),
                    'prod_qty' => $prod['qty'],
                    'prod_name' => $product->title,
                    'prod_price' => $product->price,
                ]);
            }
            $data = [
                'total_price' => $total_price,
                'total_qty' => $total_qty,
            ];
            return view('shop.message-purchase', $data);
        } else {
            return redirect('/');
        };
    }


    public function getShowHistory()
    {
        $hist = Auth::user()->history;
        $data = [
            'hist'=>$hist
        ];
        return view('shop.user-history', $data);
    }
}
