<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceAddController extends Controller
{
    public function execute(Request $request){

        //Saving Form Information

        if($request->isMethod('post')){
            $input = $request->except('_token');//formi infon vecnel masivi mej baci tokenic

            //sxalneri targmanutyun
            $massages = [
                'required' => 'ays :attribute partadir e',
                'unique' => 'ays :attribute krknvec'
            ];


            $validator = Validator::make($input,[
                'name' => 'required|max:255',
                'text' => 'required',
                'icon' => 'required|unique:services|max:255',

            ], $massages);

            if($validator->fails()){
                return redirect()->route('serviceAdd')->withErrors($validator)->withInput();//withInput formi mej kpahi arden lracvac dashter@
            }

            //Saving into database

            $portfolio = new Service();
            $portfolio->fill($input);

            if($portfolio->save()){
                return redirect('admin')->with('status', 'The Service was added');
            }

        }
        if(view()->exists('admin.services_add')){
            $data=['title' => 'New Service'];
            return view('admin.services_add', $data);
        }
        abort(404);
    }
}
