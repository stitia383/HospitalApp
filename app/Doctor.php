<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];
    public function doctortype(){
        return $this->belongsTo(DoctorType::class, 'id_doctor_type');
    }
    protected $fillable = ['name', 'gender', 'id_doctor_type'];


}
