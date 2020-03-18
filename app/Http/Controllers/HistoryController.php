<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\TreatmentStatus;
use App\Doctor;
use App\PatientHistory;
use App\Nurse;
use App\Inpatient;


class HistoryController extends Controller
{
    public function index(){
       $history = PatientHistory::with('patient')->orderBy('created_at', 'DESC')->paginate(10);
        $history = PatientHistory::with('doctor')->orderBy('created_at', 'DESC')->paginate(10);
       $history = PatientHistory::with('treatmentstatus')->orderBy('created_at', 'DESC')->paginate(10);
       $nurse = Nurse::orderBy('name', 'ASC')->get();

        return view('admin.history.index', compact('history', 'nurse'));

    }

    public function create(){
        $doctor = Doctor::orderBy('name', 'ASC')->get();
        $patient = Patient::orderBy('name', 'ASC')->get();
        $status = TreatmentStatus::orderBy('status', 'ASC')->get();
        return view('admin.history.create', compact('doctor','patient','status'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'id_patient' => 'required|exists:patients,id',
            'id_doctor' => 'required|exists:doctors,id',
            'disease' => 'required|string|max:100',
            'id_treatment_statues' => 'required|exists:treatment_statuses,id'

        ]);

        try {
            $history = PatientHistory::create([
                'id_patient' => $request->id_patient,
                'id_doctor' => $request->id_doctor,
                'disease' => $request->disease,
                'id_treatment_statues' => $request->id_treatment_statues
            ]);
            return redirect(route('riwayatpasien.index'))
                ->with(['success' => '<strong>' . $history->name . '</strong> Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['error' => $e->getMessage()]);
        }

    }

    public function destroy($id){
        $history = PatientHistory::findOrFail($id);
        $history->delete();
        return redirect()->back()->with(['success' => '<strong>' . $history->name . '</strong> Telah Dihapus!']);
    }

    public function edit($id){
        $history = PatientHistory::findOrFail($id);
        $patient = Patient::orderBy('name', 'ASC')->get();
        return view('admin.history.edit', compact('history', 'patient'));
    }

    public function show($id){
        $history = PatientHistory::findOrFail($id);
        $patient = Patient::orderBy('name', 'ASC')->get();
        return view('admin.history.rawatinap', compact('history', 'patient'));
    }

}
