<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Validator;

class DepartmentController extends Controller
{
     
public function createDepartment(Request $request){

    $validator = Validator::make($request->all(),[
        'name' => ['required', 'string',],        
    ]);


    $department = new Department();
    $department-> name = $request->input('name');
    // dd($department);

    $department->save();

    return redirect('/department');
}
   

}
