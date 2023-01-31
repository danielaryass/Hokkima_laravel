<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    //use hasfactori
    use SoftDeletes;
    //declare table
    public $table = 'permission';

    // harus diisi date yyyy-mm-dd hh:mm
    protected $dates =[
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    //declare fillable atau bisa di isi
    protected $fillable = [
    'title', 
    'created_at',
    'updated_at',
    'deleted_at',

    ];

    // many to many

    public function role()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Role');
    }
    
    public function permission_role()
    {
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole','permission_id');
    }
}
