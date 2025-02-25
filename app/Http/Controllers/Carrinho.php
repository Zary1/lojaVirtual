<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Cart; 
use Illuminate\Support\Facades\Auth;

class Carrinho extends Controller
{
    // Exibir o carrinho de compras
    public function showCart()
    {
        $cartItems = Cart::with('product')
            ->where(function ($query) {
                if (Auth::check()) {
                    $query->where('user_id', Auth::id());
                } else {
                    $query->where('session_id', session()->getId());
                }
            })
            ->where('type', 'cart') // Filtra apenas os itens do carrinho
            ->get();

        return view('front_end.cart', ['cartItems' => $cartItems]);
    }

    // Adicionar um produto ao carrinho
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();
        
        // Verifica se o item já existe no carrinho
        $cartItem = Cart::where('product_id', $id)
            ->where(function ($query) use ($user) {
                if ($user) {
                    $query->where('user_id', $user->id);
                } else {
                    $query->where('session_id', session()->getId());
                }
            })
            ->where('type', 'cart') // Garante que o tipo seja 'cart'
            ->first();

        if ($cartItem) {
            // Se o item já existe no carrinho, apenas atualiza a quantidade
            $cartItem->quantity += $request->input('quantity', 1);
            $cartItem->save();
        } else {
            // Se o item ainda não está no carrinho, adiciona um novo
            $cartItem = new Cart();
            if ($user) {
                $cartItem->user_id = $user->id;
            } else {
                $cartItem->session_id = session()->getId();
            }

            $cartItem->product_id = $product->id;
            $cartItem->quantity = $request->input('quantity', 1);
            $cartItem->type = 'cart'; // Adiciona o tipo 'cart'
            $cartItem->save();
        }

        return redirect()->back();
    }

    // Remover um item do carrinho
    public function removeFromCart($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->back();
    }

    // Atualizar a quantidade do carrinho
    public function updateCart(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->back();
    }

    // Adicionar um produto aos favoritos
    public function favorito(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();

        // Verifica se o item já existe nos favoritos
        $cartItem = Cart::where('product_id', $id)
            ->where(function ($query) use ($user) {
                if ($user) {
                    $query->where('user_id', $user->id);
                } else {
                    $query->where('session_id', session()->getId());
                }
            })
            ->where('type', 'favorite') 
            ->first();

        if (!$cartItem) {
            // Se o item ainda não está nos favoritos, adiciona um novo
            $cartItem = new Cart();
            if ($user) {
                $cartItem->user_id = $user->id;
            } else {
                $cartItem->session_id = session()->getId();
            }

            $cartItem->product_id = $product->id;
            $cartItem->quantity = 1; // Não se aplica uma quantidade aqui para favoritos
            $cartItem->type = 'favorite'; // Adiciona o tipo 'favorite'
            $cartItem->save();
        }

        return redirect()->back();
    }

    // Exibir os favoritos
    public function showFavorito()
    {
        $cartItems = Cart::with('product')
            ->where(function ($query) {
                if (Auth::check()) {
                    $query->where('user_id', Auth::id());
                } else {
                    $query->where('session_id', session()->getId());
                }
            })
            ->where('type', 'favorite') // Filtra apenas os itens favoritos
            ->get();

        return view('front_end.favoritos', ['cartItems' => $cartItems]);
    }
}
