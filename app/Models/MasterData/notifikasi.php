<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use user, type user, notifikasi
use App\Models\User;
use App\Models\Notifikasi;


class notifikasi extends Model
{

    //declare table
    public $table = 'notifikasi';

    // harus diisi date yyyy-mm-dd hh:mm
    protected $dates =[
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
    'id' ,
    'user_id' ,
    'type_user_id' ,
    'judul',
    'pesan',
    'created_at',
    'updated_at',
    'deleted_at',

    ];

    public function Type_user()
    {
        return $this->belongsTo(TypeUser::class, 'type_user_id', 'id');
    }
     public function User()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
