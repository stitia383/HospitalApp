<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inpatient extends Model
{
    protected $guarded = [];
     public function nurse(){
         return $this->belongsTo(Nurse::class, 'id_nurse');
     }

     public function patient(){
         return $this->belongsTo(Patient::class, '');
     }
    protected $fillable = ['id_nurse', 'room_number'];
}
