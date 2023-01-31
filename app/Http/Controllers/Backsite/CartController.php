<?php

namespace App\Http\Controllers\backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
// use request cart
use App\Http\Requests\cart\StoreCartRequest;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $cartItems = \Cart::getContent();
          $ongkir = 5000;
          $kode = rand(100,499);
          $total_barang= \Cart::getTotalQuantity();
          $subtotal = \Cart::getTotal() + $ongkir + $kode;
        return view('pages.backsite.cart.index', compact('cartItems', 'ongkir', 'subtotal', 'total_barang', ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        // check if there is enough stock for each item
    
        
        
            $product = Product::findOrFail($request->id);
        if ($product->qty < $request->quantity) {
        alert()->error('Gagal','Stok Produk Tidak cukup');
        return redirect()->route('backsite.product.show', $request->id);
        }
       \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);

        
        alert()->success('Berhasil','Produk telah ditambahkan ke keranjang');

        return redirect()->route('backsite.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('Berhasil', 'Keranjang telah diperbaharui!');

        return redirect()->route('cart.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
            \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }
    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('backsite.cart.index');
    }
}
