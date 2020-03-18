<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DoctorType;

class DoctortypeController extends Controller
{
    public function index(){
        $doctor_type = DoctorType::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.tipedokter', compact('doctor_type'));
    }

    public function store(Request $request){
        //validasi form
        $this->validate($request, [
            'doctor_type' => 'required|string|max:50'
        ]);

        try {
            $doctor_type = DoctorType::firstOrCreate([
                'doctor_type' => $request->doctor_type
            ]);
            return redirect()->back()->with(['success' => 'Tipe Dokter: ' . $doctor_type->doctor_type. ' Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
            }

        }

        public function destroy($id){
            $doctor_type = DoctorType::findOrFail($id);
            $doctor_type->delete();
            return redirect()->back()->with(['success' => 'Tipe Dokter: '. $doctor_type->doctor_type . ' Berhasil Dihapus']);
        }

        public function edit($id){
            $doctor_types = DoctorType::findOrFail($id);
            return view('admin.editTipedokter', compact('doctor_type'));
        }
}
