<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RoleUser extends Model
{
       //use hasfactori
    use SoftDeletes;
    //declare table
    public $table = 'role_user';

    // harus diisi date yyyy-mm-dd hh:mm
    protected $dates =[
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    //declare fillable atau bisa di isi
    protected $fillable = [
    'role_id'.
    'user_id',
    'created_at',
    'updated_at',
    'deleted_at',

    ];
    public function role()
    {
        return $this->belongsTo('App\Models\ManagementAccess\Role','role_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
