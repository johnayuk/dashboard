<?php

namespace App\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Requests\PatientRequest;
use App\Repositories\PatientRepository;
use App\Models\Doctor;

class PatientController extends Controller
{
    protected $patientRepository;

    public function __construct(patientRepository $patientRepository){
        $this->patientRepository = $patientRepository;
    }

     public function createPatient(PatientRequest $request){
        $validated = $request->validated();

       $patient = $this->patientRepository->create($request->all());

        return redirect('/user_patient')->withErrors(['status' => 'patient record successfully']);
    }


    public function updatePatient(PatientRequest $request,$id)
    {
        $validated = $request->validated();

        $doctor = $this->patientRepository->update($id);

        return redirect('/user_patient')->withErrors(['status'=>'patient record successfully']);
    }



    public function delete($id)
    {
        $doctor = $this->patientRepository->delete($id);

        return redirect('/user_patient')->withErrors(['status' => 'patient deleted successfully']);
    }

}


