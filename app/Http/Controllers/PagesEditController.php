<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesEditController extends Controller
{
    //
    //    public function execute($id){
//        $page = Page::find($id);
//        dd($page);
//    }

    public function execute(Page $page, Request $request){

        //Delete
        if($request->isMethod('delete')){
            $page->delete();
            return redirect('admin')->with('status', 'Page is deleted');
        }

        //Edit
        if($request->isMethod('post')){
            $input = $request->except('_token');//baci tokenic

            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'alias'=> 'required|max:255|unique:pages,alias,'.$input['id'],//unique exni pages table-i hamar, baci konkret id unecox alias column-ic
                'text' => 'required'
            ]);

            if($validator->fails()){
                return redirect()->route('pagesEdit',['page'=>$input['id']])->withErrors($validator);
            }

            if($request->hasFile('images')){
                $file = $request->file('images');
                $file->move(public_path().'/assets/img', $file->getClientOriginalName());
                $input['images'] = $file->getClientOriginalName();
            }else {
                $input['images'] = $input['old_images'];
            }
            unset($input['old_images']);

            $page->fill($input);

            if($page->update()){
                return redirect('admin')->with('status','The page was updated');
            }
        }
        $old = $page->toArray();

        //Knkari Edit Page
        if(view()->exists('admin.pages_edit')){
            $data = [
                'title' => 'Edit Page - '.$old['name'],
                'data' => $old
            ];

            return view('admin.pages_edit', $data);
        }
    }

}
