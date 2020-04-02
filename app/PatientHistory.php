<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientHistory extends Model
{
    protected $guarded = [];
    public function patient(){
        return $this->belongsTo(Patient::class, 'id_patient');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }

    public function treatmentstatus(){
        return $this->belongsTo(TreatmentStatus::class, 'id_treatment_statues');
    }

    public function inpatient(){
        return $this->belongsTo(Inpatient::class, 'id_inpatients');
    }

    protected $fillable = ['id',  'id_patient', 'id_doctor', 'id_treatment_statues','disease', 'id_inpatients'];
}
