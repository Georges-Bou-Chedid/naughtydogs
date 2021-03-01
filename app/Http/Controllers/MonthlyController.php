<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monthly;
use App\Models\History;

class MonthlyController extends Controller
{
    public function create($id){
        $history = History::find($id);
        $monthly = new Monthly();
    
        $monthly->history_id = $history->id;
        $monthly->spot = request("spot");
        $monthly->Brand = request('Brand');
        $monthly->Date = request('Date');
        $monthly->Weight = request('Weight');
        $monthly->save();
    
        return redirect()->back();
    }

    public function update($id){
        $monthly = Monthly::find($id);

        $monthly->spot = request("spot");
        $monthly->Brand = request('Brand');
        $monthly->Date = request('Date');
        $monthly->Weight = request('Weight');
        $monthly->save();

        return redirect()->back();
}

    public function delete($id){
        $monthly = Monthly::find($id);
        $monthly->delete();

        return redirect()->back();
    }
}
