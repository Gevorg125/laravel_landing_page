<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PortfolioEditController extends Controller
{
    //
    //    public function execute($id){
//        $page = Page::find($id);
//        dd($page);
//    }

    public function execute(Portfolio $portfolio, Request $request){


        //Delete
        if($request->isMethod('delete')){
            $portfolio->delete();
            return redirect('admin')->with('status', 'Portfolio is deleted');
        }

        //Edit
        if($request->isMethod('post')){
            $input = $request->except('_token');//baci tokenic

            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'filter'=> 'required|max:255|unique:portfolios,filter,'.$input['id'],//unique exni pages table-i hamar, baci konkret id unecox alias column-ic
            ]);

            if($validator->fails()){
                return redirect()->route('portfolioEdit',['portfolio'=>$input['id']])->withErrors($validator);
            }

            if($request->hasFile('images')){
                $file = $request->file('images');
                $file->move(public_path().'/assets/img', $file->getClientOriginalName());
                $input['images'] = $file->getClientOriginalName();
            }else {
                $input['images'] = $input['old_images'];
            }
            unset($input['old_images']);

            $portfolio->fill($input);

            if($portfolio->update()){
                return redirect('admin')->with('status','The portfolio was updated');
            }
        }
        $old = $portfolio->toArray();

        //Knkari Edit Page

        if(view()->exists('admin.portfolios_edit')){
            $data = [
                'title' => 'Edit Portfolio - '.$old['name'],
                'data' => $old
            ];


        }
        return view('admin.portfolios_edit', $data);
    }

}