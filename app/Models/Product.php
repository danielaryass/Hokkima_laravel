<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use transaction
use App\Models\Transaction;

class Product extends Model
{
    use SoftDeletes;
    //declare table
    public $table = 'products';

    // harus diisi date yyyy-mm-dd hh:mm
    protected $dates =[
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
    'id' ,
    'nama' ,
    'photo',
    'tipe',
    'deskripsi',
    'harga',
    'qty',
    'created_at',
    'updated_at',
    'deleted_at',

    ];
    public function transactions()
{
    return $this->belongsToMany(Transaction::class);
}

}
