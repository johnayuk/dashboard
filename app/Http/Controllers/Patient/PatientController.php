<?php

namespace App\Http\Controllers\Patient;
use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class PatientController extends Controller
{
    public function index(){
        $patients = Patient::all();
        
         return view('admin\patientdeck')->with('patients',$patients);
     }



     public function createPatient(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string',],
            'last_name' => ['required', 'string',],
            'condition' => ['required','string'],
            'ward' => ['required','string'],
            'doctor_assigned' => ['required','string', 'max:100'],
            'ward'=>['required','string', 'max:100'],
            'phone'=> ['required','string', 'max:100'],
            
        ]);
        $patient = new Patient();
        $patient->name = $request->input('name');
        $patient->last_name = $request->input('last_name');
        $patient->condition = $request->input('condition');
        $patient->doctor_assigned = $request->input('doctor_assigned');
        $patient->ward = $request->input('ward');
        $patient->phone = $request->input('phone');


        // dd($patient->name);

        $patient->save();
        return redirect('/user_patient')->withErrors(['status' => 'patient record successfully']);
    }


    public function updatePatient(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'last_name'=>'required',
            'condition'=>'required',
            'doctor_assigned'=>'required',
            'ward'=>'required',
            'phone'=>'required'
        ]);

        $patient = Patient::find($id);

        $input = $request -> all();

        $patient->fill($input)->save();

        // return redirect('/dashboard')->withErrors(['status' => 'record successfully updated']);

        // $users = User::find($id);
        // $users->name = $request->input('user_name');
        //     $users->user_type = $request->input('user_type');
        
        // $users->update();

        return redirect('/user_patient')->withErrors(['status' => 'patient record successfully']);
    }

    public function delete(Request $request,$id)
    {
          $del =Patient::findOrFail($id);
          $del->delete();

          return redirect('/user_patient')->withErrors(['status' => 'patient deleted successfully']);
    }

}


