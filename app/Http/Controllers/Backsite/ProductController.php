<?php

namespace App\Http\Controllers\backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Notifikasi;
use Carbon\Carbon;
// use response
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\StoreProductRequest;
use Gate;
use Auth;
use File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $product = Product::all();
foreach ($product as $item) {
    if ($item->qty < 10) {
        // cek apakah notifikasi untuk produk ini sudah dibuat dalam waktu sehari sebelumnya
        $existingNotification = Notifikasi::where('judul', "Stok Produk " . $item->nama . " Hampir Habis")
                                         ->where('created_at', '>=', Carbon::now()->subDay())
                                         ->first();
        if (!$existingNotification) {
            $notification = new Notifikasi;
            $notification->type_user_id = 2;
            $notification->judul = "Stok Produk " . $item->nama . " Hampir Habis";
            $notification->pesan = "Segera lakukan penambahan stok dan update data produk";
            $notification->save();
        }
    }
}


      return view('pages.backsite.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('pages.backsite.product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->all();

        // re format before push to table
        $data['harga'] = str_replace(',', '', $data['harga']);
        $data['harga'] = str_replace('IDR ', '', $data['harga']);

        // upload process here
        $path = public_path('app/public/assets/file-product');
        if(!File::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-product');
        }

        // change file locations
        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->store(
                'assets/file-product', 'public'
            );
        }else{
            $data['photo'] = "";
        }

        // store to database
        $product = Product::create($data);

        alert()->success('Berhasil', 'Produk Berhasil Ditambahkan');
        return redirect()->route('backsite.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages.backsite.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('pages.backsite.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
               // get all request from frontsite
        $data = $request->all();

        // re format before push to table
        $data['harga'] = str_replace(',', '', $data['harga']);
        $data['harga'] = str_replace('IDR ', '', $data['harga']);

        // upload process here
        // change format photo
        if(isset($data['photo'])){

             // first checking old photo to delete from storage
            $get_item = $doctor['photo'];

            // change file locations
            $data['photo'] = $request->file('photo')->store(
                'assets/file-product', 'public'
            );

            // delete old photo from storage
            $data_old = 'storage/'.$get_item;
            if (File::exists($data_old)) {
                File::delete($data_old);
            }else{
                File::delete('storage/app/public/'.$get_item);
            }

        }

        // update to database
        $product->update($data);

        alert()->success('Berhasil', 'Data produk berhasil diubah');
        return redirect()->route('backsite.product.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $get_item = $product['photo'];

        $data = 'storage/'.$get_item;
        if (File::exists($data)) {
            File::delete($data);
        }else{
            File::delete('storage/app/public/'.$get_item);
        }

        $product->forceDelete();

        alert()->success('Berhasil', 'Produk berhasil dihapus');
        return back();
    }
}
