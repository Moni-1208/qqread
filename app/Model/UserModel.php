<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table='user';

    protected $primaryKey='u_id';

    protected $fillable = ['u_name', 'u_pwd'];

    public $timestamps = false;
}
