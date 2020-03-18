<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name', 'id_role', 'address', 'no_hp', 'gender', 'photo'];
}
