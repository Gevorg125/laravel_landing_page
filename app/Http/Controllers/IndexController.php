<?php

namespace App\Http\Controllers;

use App\Page;
use App\People;
use App\Service;
use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function execute(Request $request){
        $pages = Page::all();
        $portfolios = Portfolio::get(['name', 'filter', 'images']);
        $services = Service::where('id', '<', 20)->get();
        $peoples = People::take(3)->get();

        $tags = DB::table('portfolios')->distinct()->pluck('filter');

        $menu = [];
        foreach($pages as $page){
            $item = ['title' => $page->name,
                     'alias' => $page->alias ];
            $menu[] = $item;
        }

        $item = ['title' => 'Services',
                 'alias' => 'service' ];
        $menu[] = $item;

        $item = ['title' => 'Portfolio',
                 'alias' => 'Portfolio' ];
        $menu[] = $item;

        $item = ['title' => 'Team',
                 'alias' => 'team' ];
        $menu[] = $item;

        $item = ['title' => 'Contact',
                 'alias' => 'contact' ];
        $menu[] = $item;

        return view('site.index', [
                                        'menu' => $menu,
                                        'pages' =>$pages,
                                        'services' => $services,
                                        'peoples' => $peoples,
                                        'portfolios' => $portfolios,
                                        'tags' => $tags,
                                      ]);
    }
}
