<?php

namespace App\Http\Controllers;

use App\Inpatient;
use App\Nurse;
use App\TreatmentStatus;
use Illuminate\Http\Request;

class InpatiensController extends Controller
{
    public function index(){
        $patient = Inpatient::with('nurse')->orderBy('created_at', 'DESC')->paginate(10);
        $patient = Inpatient::with('treatmentstatus')->orderBy('created_at', 'DESC')->paginate(10);
        return view ('admin.rawatinap.rawatinap', compact('patient'));
    }

    public function create(){
        $nurse = Nurse::orderBy('name', 'ASC')->get();
        $status = TreatmentStatus::orderBy('status', 'ASC')->get();
        return view('admin.rawatinap.create', compact('nurse', 'status'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'room_number' => 'required|integer',
            'id_nurse' => 'required|exists:nurses,id',
            'id_treatment_statues' => 'required|exists:treatment_statuses,id'
        ]);

        try {
            $inpatient = Inpatient::create([
                'room_number' => $request->room_number,
                'id_nurse' => $request->id_nurse,
                'id_treatment_statues' => $request->id_treatment_statues

            ]);
            return redirect(route('rawatinap.index'))
                ->with(['success' => '<strong>Kamar' . $inpatient->name . '</strong> Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id){
        $inpatient = Inpatient::findorFail($id);
        $nurse = Nurse::orderBy('name', 'ASC')->get();
        $status = TreatmentStatus::orderBy('status', 'ASC')->get();
        return view('admin.rawatinap.edit', compact('nurse', 'status', 'inpatient'));
    }

    public function update(Request $request,$id){
        try {
            $this->validate($request, [
                'room_number' => 'required|integer',
                'id_nurse' => 'required|exists:nurses,id',
                'id_treatment_statues' => 'required|exists:treatment_statuses,id'
            ]);
                $inpatient = Inpatient::findOrFail($id);
                $inpatient->update([
                    'room_number' => $request->room_number,
                    'id_nurse' => $request->id_nurse,
                    'id_treatment_statues' => $request->id_treatment_statues

                ]);

                return redirect(route('rawatinap.index'))
                    ->with(['success' => 'Kamar Nomor<strong> ' . $inpatient->room_number . '</strong> Diperbaharui']);
            } catch (\Exception $e) {
                return redirect()->back()
                    ->with(['error' => $e->getMessage()]);
            }
    }

    public function destroy($id){
        $inpatient = Inpatient::findOrFail($id);
        $inpatient->delete();
        return redirect()->route('rawatinap.index')->with(['danger' => 'Kamar Nomor<strong> ' . $inpatient->room_number . '</strong> Dihapus']);
    }

    public function select_inap(Request $id){
        $patient = Inpatient::where('id_treatment_statues', $id->treatment_statues)->get()->pluck('id');
        return response()->json($patient);

    }
}
