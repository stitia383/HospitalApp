<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Inpatient;
use App\Nurse;
use App\Patient;
use App\PatientHistory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $doctor = Doctor::all();
        $patient = Patient::all();
        $nurse = Nurse::all();
        $history = PatientHistory::all();
        $rawat = Inpatient::all();
        return view('home', compact('doctor', 'patient', 'nurse', 'history', 'rawat'));
    }
}
