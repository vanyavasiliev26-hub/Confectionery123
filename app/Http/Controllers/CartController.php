<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return view('cart.index', compact('cart', 'total'));
    }

    
    public function add(Request $request, $id)
    {
        $product = Catalog::findOrFail($id);
        
        
        if ($product->quantity <= 0) {
            return redirect()->back()->with('error', 'Товара нет в наличии');
        }

        $cart = session()->get('cart', []);

        
        if (isset($cart[$id])) {       
            if ($cart[$id]['quantity'] + 1 > $product->quantity) {
                return redirect()->back()->with('error', 'Недостаточно товара на складе');
            }
            $cart[$id]['quantity']++;
        } else {
            
            $cart[$id] = [
                'id' => $product->id,
                'title' => $product->title,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
                'max_quantity' => $product->quantity
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Товар добавлен в корзину');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Catalog::findOrFail($id);
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            if ($request->quantity > $product->quantity) {
                return redirect()->back()->with('error', 'Недостаточно товара на складе');
            }
            
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            
            return redirect()->route('cart.index')->with('success', 'Количество обновлено');
        }

        return redirect()->back()->with('error', 'Товар не найден в корзине');
    }

    
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Товар удален из корзины');
        }

        return redirect()->back()->with('error', 'Товар не найден в корзине');
    }

    
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Корзина очищена');
    }

    
}