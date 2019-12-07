<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SearchController extends Controller
{
    public function store(Request $request)
    {
        $search = new Search();
        $search->item_per_page = $request->item_per_page;
        $search->save();
    }
    public function update(Request $request,$id)
    {
        $id = $request->all()["search"]["id"];
        $search = Search::findOrFail($id);
        $search->item_per_page = $request->all()["search"]["item_per_page"];
        $search->save();
    }
    public function show($id){
        $search = Search::findOrFail($id);
        return $search;
    }
    public function setsession(Request $request)
    {
        $user_id = $request->query('user_id');
        session(['user_id'=>$user_id]);
        $session_id = $request->query('session_id');
        session(['session_id'=>$session_id]);
//        return redirect('/');
        return Redirect::to('http://52.87.98.116/#/dashboard');
    }
}
