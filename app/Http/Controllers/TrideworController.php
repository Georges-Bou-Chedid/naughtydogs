<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tridewor;
use App\Models\History;

class TrideworController extends Controller
{
    public function create($id){
        $history = History::find($id);
        $tridewor = new Tridewor();
    
        $tridewor->history_id = $history->id;
        $tridewor->type = request("type");
        $tridewor->Brand = request('Brand');
        $tridewor->Date = request('Date');
        $tridewor->Weight = request('Weight');
        $tridewor->save();
    
        return redirect()->back();
    }

    public function update($id){
        $tridewor = Tridewor::find($id);

        $tridewor->type = request("type");
        $tridewor->Brand = request('Brand');
        $tridewor->Date = request('Date');
        $tridewor->Weight = request('Weight');
        $tridewor->save();

        return redirect()->back();
}

    public function delete($id){
        $tridewor = Tridewor::find($id);
        $tridewor->delete();

        return redirect()->back();
    }
}
