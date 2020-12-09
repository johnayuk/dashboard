<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    public function index(){
          $about = AboutUs::all();

          return view('/aboutUs',compact('about'));
    }


    public function updateAbout(Request $request, $aboutId){

        $about = AboutUs::find($aboutId);

            $input = $request->all();

            $about->fill($input)->save();

            // dd($about);

            return redirect('/aboutUs');
    }
}
