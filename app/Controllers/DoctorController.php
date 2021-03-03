<?php

namespace App\Controllers;
use App\Models\Doctor;
use App\Repositories\DoctorRepository;
use App\Requests\DoctorRequest;
use App\Requests\DoctorUpdate;
use Validator;

use Illuminate\Http\Request;

class DoctorController extends Controller
{

    protected $doctorRepository;
    
    public function __construct(doctorRepository $doctorRepository)
    {
       $this->doctorRepository = $doctorRepository;
    }


    public function createDoctor(DoctorRequest $request)
    {
        $validated = $request->validated();

        $doctor = $this->doctorRepository->createDoctor($request->all());

        // dd($doctor);

        return redirect('/doctor')->withErrors(['status' => 'doctor record successfully created']);
    }

    public function updateDoctor(DoctorUpdate $request, $id)
    {
        $validated = $request->validated();

        $doctor = $this->doctorRepository->update($id);

        return redirect('/doctor')->withErrors(['status' => 'doctor record successfully updated']);
    }
    
    public function deleteDoctor($id)
    {

        $doctor = $this->doctorRepository->delete($id);

        return redirect('/doctor')->withErrors(['status' => 'doctor record successfully edited']);
    }
}
