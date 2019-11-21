<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{

    protected $table = 'roles';

    public $timestamps = false;

    protected $fillable = ['role_name'];

    public function numbers()
    {
        return $this->belongsToMany('App\Models\Numbers', 'numbers_roles', 'role_id', 'number_id');
    }

}
