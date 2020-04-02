<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nurse;
use App\Doctor;

class NurseController extends Controller
{
        public function index()
        {
            $nurse = Nurse::with('doctor')->orderBy('created_at', 'DESC')->paginate(10);
            return view('admin.perawat.index', compact('nurse'));

        }

        public function create(){
            $doctor = Doctor::orderBy('name', 'ASC')->get();
            return view('admin.perawat.create', compact('doctor'));
        }


        public function store(Request $request){
            $this->validate($request, [
                'name' => 'required|string|max:100',
                'id_doctor' => 'required|exists:doctors,id'
            ]);


            try {
                $nurse = Nurse::create([
                    'name' => $request->name,
                    'id_doctor' => $request->id_doctor,
                    'gender' => $request->gender
                ]);
                return redirect(route('perawat.index'))
                    ->with(['success' => '<strong>' . $nurse->name . '</strong> Ditambahkan']);
            } catch (\Exception $e) {
                return redirect()->back()
                    ->with(['error' => $e->getMessage()]);
            }
        }

        public function edit($id){
            $nurse = Nurse::findOrFail($id);
            $doctor = Doctor::orderBy('name', 'ASC')->get();
            return view('admin.perawat.edit', compact('nurse', 'doctor'));
        }

        public function update(Request $request, $id){
            try {
                $this->validate($request, [
                    'name' => 'required|string|max:100',
                    'id_doctor' => 'required|exists:doctors,id'
                ]);
                    $nurse = Nurse::findOrFail($id);
                    $nurse->update([
                        'name' => $request->name,
                        'id_doctor' => $request->id_doctor,
                        'gender' => $request->gender
                    ]);

                    return redirect(route('perawat.index'))
                        ->with(['success' => '<strong>' . $nurse->name . '</strong> Diperbaharui']);
                } catch (\Exception $e) {
                    return redirect()->back()
                        ->with(['error' => $e->getMessage()]);
                }
        }

        public function destroy($id){
            $nurse = Nurse::findOrFail($id);
            $nurse->delete();
            return redirect()->back()->with(['success'  => '<strong>' . $nurse->name . '</strong> Telah Dihapus!']);
        }
}
