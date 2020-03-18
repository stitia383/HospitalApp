<?php

namespace App\Http\Controllers;

use App\Inpatient;
use App\Nurse;
use App\Patient;
use Illuminate\Http\Request;

class InpatiensController extends Controller
{
    public function index(){
        $patient = Inpatient::with('nurse')->orderBy('created_at', 'DESC')->paginate(10);
        $patient = Inpatient::with('patient')->orderBy('created_at', 'DESC')->paginate(10);
        return view ('admin.history.rawatinap', compact('patient'));
    }
}
