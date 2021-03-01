<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccine;
use App\Models\History;

class VaccineController extends Controller
{
    public function create($id){
        $history = History::find($id);
        $vaccine = new Vaccine();
    
        $vaccine->history_id = $history->id;
        $vaccine->type = request("type");
        $vaccine->Brand = request('Brand');
        $vaccine->Date = request('Date');
        $vaccine->Weight = request('Weight');
        $vaccine->save();
    
        return redirect()->back();
    }

    public function update($id){
        $vaccine = Vaccine::find($id);

        $vaccine->type = request("type");
        $vaccine->Brand = request('Brand');
        $vaccine->Date = request('Date');
        $vaccine->Weight = request('Weight');
        $vaccine->save();

        return redirect()->back();
}

    public function delete($id){
        $vaccine = Vaccine::find($id);
        $vaccine->delete();

        return redirect()->back();
    }

}
