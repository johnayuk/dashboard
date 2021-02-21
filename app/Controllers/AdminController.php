<?php

namespace App\Controllers;
use App\Models\Admin;
use App\Repositories\AdminRepository;
use App\Requests\AdminRequest;
use Validator;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $adminRepository;
    
    public function __construct(adminRepository $adminRepository)
    {
       $this->adminRepository = $adminRepository;
    }


    public function createAdmin(AdminRequest $request)
    {
        $validated = $request->validated();

        $doctor = $this->adminRepository->createAdmin($request->all());

        // dd($doctor);

        return redirect('/admin')->withErrors(['status' => 'doctor record successfully created']);
    }

    public function updateAdmin(AdminRequest $request, $id)
    {
        $validated = $request->validated();

        $doctor = $this->adminRepository->update($id);

        return redirect('/admin')->withErrors(['status' => 'doctor record successfully updated']);
    }
    
    public function deleteAdmin($id)
    {

        $doctor = $this->adminRepository->delete($id);

        return redirect('/admin')->withErrors(['status' => 'doctor record successfully edited']);
    }
}
