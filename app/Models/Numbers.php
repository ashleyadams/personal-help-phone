<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Numbers extends Model
{

    protected $table = 'numbers';

    public $timestamps = false;

    public function roles()
    {
        return $this->belongsToMany('App\Models\Roles', 'numbers_roles', 'number_id', 'role_id');
    }

}
