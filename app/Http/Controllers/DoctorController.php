<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\DoctorType;


class DoctorController extends Controller
{
    public function index(){
        $dokter = Doctor::with('doctortype')->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.dokter.index', compact('dokter'));
    }
    public function create(){
        $doctor_type = Doctortype::orderBy('doctor_type', 'ASC')->get();
        return view('admin.dokter.create', compact('doctor_type'));
    }
    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|string|max:100',
            'id_doctor_type' => 'required|exists:doctor_types,id'
        ]);


        try {
            $dokter = Doctor::create([
                'name' => $request->name,
                'id_doctor_type' => $request->id_doctor_type,
                'gender' => $request->gender
            ]);
            return redirect(route('dokterindex'))
                ->with(['success' => '<strong>' . $dokter->name . '</strong> Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['error' => $e->getMessage()]);
        }
    }


    public function edit($id){
        $dokter = Doctor::findOrFail($id);
        $doctor_type = DoctorType::orderBy('doctor_type', 'ASC')->get();
        return view('admin.dokter.edit', compact('dokter', 'doctor_type'));
    }

    public function update(Request $request, $id){
        try {
            $this->validate($request, [
                'name' => 'required|string|max:100',
                'id_doctor_type' => 'required|exists:doctor_types,id'
            ]);
                $dokter = Doctor::findOrFail($id);
                $dokter->update([
                    'name' => $request->name,
                    'id_doctor_type' => $request->id_doctor_type,
                    'gender' => $request->gender
                ]);

                return redirect(route('dokterindex'))
                    ->with(['success' => '<strong>' . $dokter->name . '</strong> Diperbaharui']);
            } catch (\Exception $e) {
                return redirect()->back()
                    ->with(['error' => $e->getMessage()]);
            }
    }

    public function destroy($id)
    {
        $dokter = Doctor::findorFail($id);
        $dokter->delete();
        return redirect()->back()->with(['success' => '<strong>' . $dokter->name . '</strong> Telah Dihapus!']);
    }

}
