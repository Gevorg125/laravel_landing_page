<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceEditController extends Controller
{
    public function execute(Service $service, Request $request){


        //Delete
        if($request->isMethod('delete')){
            $service->delete();
            return redirect('admin')->with('status', 'Service is deleted');
        }

        //Edit
        if($request->isMethod('post')){
            $input = $request->except('_token');//baci tokenic

            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'text' => 'required',
                'icon'=> 'required|max:255|unique:services,icon,'.$input['id'],//unique exni pages table-i hamar, baci konkret id unecox alias column-ic
            ]);

            if($validator->fails()){
                return redirect()->route('serviceEdit',['service'=>$input['id']])->withErrors($validator);
            }

            $service->fill($input);

            if($service->update()){
                return redirect('admin')->with('status','The service was updated');
            }
        }
        $old = $service->toArray();

        //Knkari Edit Page

        if(view()->exists('admin.services_edit')){
            $data = [
                'title' => 'Edit Service - '.$old['name'],
                'data' => $old
            ];


        }
        return view('admin.services_edit', $data);
    }
}
