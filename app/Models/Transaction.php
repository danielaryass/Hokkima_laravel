<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use product
use App\Models\Product;
// use softdelete
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    //declare table
    public $table = 'transactions';

    // harus diisi date yyyy-mm-dd hh:mm
    protected $dates =[
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
    'invoice_number' ,
    'user_id' ,
    'total_price',
    'status',
    'bukti_pembayaran',
    'metode_pembayaran',
    'alamat_pengiriman',
    'no_hp',
    'nama_pembeli',
    'created_at',
    'updated_at',
    'deleted_at',
    ];
    public function product()
{
   return $this->belongsToMany(Product::class, 'product_transaction')->withPivot('quantity', 'price');
}
}

