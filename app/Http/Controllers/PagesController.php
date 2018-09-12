<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function execute(){
        if(view()->exists('admin.pages')){
            $pages = Page::all();

            $data = [
                'title' => 'Pages',//vorpes string e
                'pages' => $pages
            ];
            return view('admin.pages', $data);
        }
        abort(404);
    }
}
