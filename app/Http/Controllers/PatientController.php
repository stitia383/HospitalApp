<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
    public function index(){
        $data_pasien = Patient::get();
        return view('admin.pasien.index', compact('data_pasien'));
    }

    public function store(Request $request){
        $file = $request->file('photo');
        $directory = 'photo';

        $pasien = new Patient($request->all());

        if($request->hasFile('photo')) {
            $fileName = time().$file->getClientOriginalName();
            $file->move($directory, $fileName);
            $pasien->photo = $fileName;
        }

        $pasien->save();

        return redirect()->route('pasienindex');
    }

    public function destroy($id){
        $pasien = Patient::findOrFail($id);
        $pasien->delete();
        return redirect()->route('pasienindex');
    }

    public function edit($id){

        $pasien = Patient::findOrFail($id);
        return view('admin.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id){

        $pasien = Patient::findOrFail($id);
        $file = $request->file('photo');
        $directory = 'photo';

        $pasien->update($request->all());

        if($request->hasFile('photo')){
            $fileName = time().$file->getClientOriginalName();
            $file->move($directory, $fileName);
            $pasien->photo = $fileName;
        }

        $pasien->save();
        return redirect()->route('pasienindex');

    }
}
