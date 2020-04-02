<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inpatient extends Model
{
    protected $guarded = [];
     public function nurse(){
         return $this->belongsTo(Nurse::class, 'id_nurse');
     }

     public function treatmentstatus(){
         return $this->belongsTo(TreatmentStatus::class, 'id_treatment_statues');
     }
    protected $fillable = ['id_nurse', 'room_number', 'id_treatment_statues'];
}
