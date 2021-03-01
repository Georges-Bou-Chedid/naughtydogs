<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deworming;
use App\Models\History;

class DewormingController extends Controller
{
    public function create($id){
        $history = History::find($id);
        $deworming = new Deworming();
    
        $deworming->history_id = $history->id;
        $deworming->type = request("type");
        $deworming->Brand = request('Brand');
        $deworming->Date = request('Date');
        $deworming->Weight = request('Weight');
        $deworming->save();
    
        return redirect()->back();
    }

    public function update($id){
        $deworming = Deworming::find($id);

        $deworming->type = request("type");
        $deworming->Brand = request('Brand');
        $deworming->Date = request('Date');
        $deworming->Weight = request('Weight');
        $deworming->save();

        return redirect()->back();
}

    public function delete($id){
        $deworming = Deworming::find($id);
        $deworming->delete();

        return redirect()->back();
    }
}
