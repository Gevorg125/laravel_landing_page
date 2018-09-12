<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PagesAddController extends Controller
{
    //
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
                'alias' => 'required|unique:pages|max:255',
                'text' => 'required'
            ], $massages);

            if($validator->fails()){
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();//withInput formi mej kpahi arden lracvac dashter@
            }

            //upload file
            if($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();//nkari irakan anun@

                $file->move(public_path().'/assets/img', $input['images']);
            }

            //Saving into database

            $page = new Page();
            $page->fill($input);

            if($page->save()){
                return redirect('admin')->with('status', 'The Page was added');
            }

        }
        if(view()->exists('admin.pages_add')){
            $data=['title' => 'New Page'];
            return view('admin.pages_add', $data);
        }
        abort(404);
    }
}
