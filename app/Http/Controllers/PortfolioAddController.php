<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PortfolioAddController extends Controller
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
                'filter' => 'required|unique:portfolios|max:255',

            ], $massages);

            if($validator->fails()){
                return redirect()->route('portfolioAdd')->withErrors($validator)->withInput();//withInput formi mej kpahi arden lracvac dashter@
            }

            //upload file
            if($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();//nkari irakan anun@

                $file->move(public_path().'/assets/img', $input['images']);
            }

            //Saving into database

            $portfolio = new Portfolio();
            $portfolio->fill($input);

            if($portfolio->save()){
                return redirect('admin')->with('status', 'The Portfolio was added');
            }

        }
        if(view()->exists('admin.portfolios_add')){
            $data=['title' => 'New Portfolio'];
            return view('admin.portfolios_add', $data);
        }
        abort(404);
    }
}
