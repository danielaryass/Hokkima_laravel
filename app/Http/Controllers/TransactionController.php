<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Cart;
// use model transaction
use App\Models\Transaction;
// use model product
use App\Models\Product;
// use model notifikasi
use App\Models\Notifikasi;
// use str_random
use Illuminate\Support\Str;
use Auth;
use Symfony\Component\HttpFoundation\Response;
use Gate;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::where('user_id', Auth::user()->id)->latest()->get();
        return view('pages.backsite.transaction.index',compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $transaction = Transaction::latest()->get();
        return view('pages.backsite.transaction.edit',compact('transaction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->invoice_number = "TRX-".Str::random(10);
        $transaction->user_id = Auth::user()->id;
        $transaction->status = "PENDING";
        $transaction->metode_pembayaran = $request->metode_pembayaran;
        $transaction->alamat_pengiriman = $request->alamat_pengiriman;
        $transaction->no_hp = $request->no_hp;
        $transaction->nama_pembeli = $request->nama_pembeli;
        $transaction->total_price = $request->total_price;

        
        $transaction->save();

        foreach(Cart::getContent() as $item){
        $itemModel = Product::find($item->id);
        $transaction->product()->attach($itemModel, [
            'quantity' => $item->quantity,
            'price' => $item->price
        ]);
    }

        $transaction->save();
        $product = Product::findOrFail($item->id);
        $product->qty = $product->qty - $item->quantity;
        $product->save();

        $notifikasi = new Notifikasi;
        $notifikasi->type_user_id= 1;
        $notifikasi->judul = "Order Baru dengan nomor Transaksi " . $transaction->invoice_number;
        $notifikasi->pesan = "Silahkan segera cek dan lakukan pengiriman";
        $notifikasi->save();

        $notifikasi = new Notifikasi;
        $notifikasi->user_id = Auth::user()->id;
        $notifikasi->judul = "Order Baru dengan nomor Transaksi " . $transaction->invoice_number;
        $notifikasi->pesan = "Silahkan segera cek dan lakukan pengiriman";
        $notifikasi->save();
        Cart::clear();

         alert()->success('Berhasil', 'Berhasil Checkout');
        return redirect()->route('backsite.transaction.show', $transaction->invoice_number);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($invoice_number)
    {
        
        $transaction = Transaction::with('product')->where('invoice_number',$invoice_number)->firstOrFail();
         $product = $transaction->product;
         $total = $product->map(function ($product) {
        return $product->pivot->quantity * $product->pivot->price;
    })->sum();
        $ongkir = 5000;
        $notifikasi = Notifikasi::where('type_user_id', Auth()->user()->detail_user->type_user->id)->get();
        // dd($notifikasi);
        return view('pages.backsite.transaction.show',compact('transaction','product','total','ongkir','notifikasi'));
    }

    public function trx()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        $transaction = Transaction::latest()->get();
        return view('pages.backsite.transaction.trx',compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($invoice_number)
    {
        $transaction = Transaction::where('invoice_number',$invoice_number)->firstOrFail();
        return view('pages.backsite.transaction.edit',compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$invoice_number)
    {
        // ubah status
      $data = $request->status;
      $transaction = Transaction::where('invoice_number',$invoice_number)->firstOrFail();
        $transaction->status = $data;
        $transaction->save();

        if($transaction->status == "SUCCESS"){
            $notifikasi = new Notifikasi;
            $notifikasi->user_id = $transaction->user_id;
            $notifikasi->judul = "Transaksi dengan nomor " . $transaction->invoice_number . " telah berhasil";
            $notifikasi->pesan = "Produk akan segera dikirim dan anda akan dihubungi oleh admin";
            $notifikasi->save();}



        

        // alert berhasil mengubah status
        alert()->success('Berhasil', 'Berhasil Mengubah Status');
        return redirect()->route('backsite.transaction.trx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
