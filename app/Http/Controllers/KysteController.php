<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kyste;
use App\Models\History;

class KysteController extends Controller
{
    public function create($id){
        $history = History::find($id);
        $kyste = new Kyste();
    
        $kyste->history_id = $history->id;
        $kyste->spot = request("spot");
        $kyste->Brand = request('Brand');
        $kyste->Date = request('Date');
        $kyste->Weight = request('Weight');
        $kyste->save();
    
        return redirect()->back();
    }

    public function update($id){
        $kyste = Kyste::find($id);

        $kyste->spot = request("spot");
        $kyste->Brand = request('Brand');
        $kyste->Date = request('Date');
        $kyste->Weight = request('Weight');
        $kyste->save();

        return redirect()->back();
}

    public function delete($id){
        $kyste = Kyste::find($id);
        $kyste->delete();

        return redirect()->back();
    }
}
