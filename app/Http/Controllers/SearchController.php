<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;

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
}
