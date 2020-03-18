<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $fillable = ['id','name','id_doctor','gender'];

    public function doctor(){
        return $this->belongsTo(Doctor::class,'id_doctor');
    }

}
