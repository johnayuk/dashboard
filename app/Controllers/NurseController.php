<?php

namespace App\Controllers;
use App\Models\Nurse;
use App\Repositories\NurseRepository;
use App\Requests\NurseRequest;
use Validator;

use Illuminate\Http\Request;

class NurseController extends Controller
{

    protected $doctorRepository;
    
    public function __construct(nurseRepository $nurseRepository)
    {
       $this->nurseRepository = $nurseRepository;
    }


    public function createNurse(NurseRequest $request)
    {
        $validated = $request->validated();
        $nurse = $this->nurseRepository->create($request->all());

        return redirect('/nurse')->withErrors(['status' => 'nures record successfully created']);
    }

    public function updateNurse(NurseRequest $request, $id)
    {
        $validated = $request->validated();
        $nurse = $this->nurseRepository->update($id);

        // $doctor = $this->doctorRepository->update($Id);

        return redirect('/nurse')->withErrors(['status' => 'nurses record successfully edited']);
    }

    public function deleteNurse($id){
      $doctor = $this->nurseRepository->delete($id);

      return redirect('/nurse')->withErrors(['status' => 'nurses record successfully deleted']);
  }
    
}
