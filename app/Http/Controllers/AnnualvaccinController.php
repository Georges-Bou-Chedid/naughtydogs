<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annualvaccin;
use App\Models\History;

class AnnualvaccinController extends Controller
{
    public function create($id){
        $history = History::find($id);
        $annualvaccin = new Annualvaccin();
    
        $annualvaccin->history_id = $history->id;
        $annualvaccin->type = request("type");
        $annualvaccin->Brand = request('Brand');
        $annualvaccin->Date = request('Date');
        $annualvaccin->Weight = request('Weight');
        $annualvaccin->save();
    
        return redirect()->back();
    }

    public function update($id){
        $annualvaccin = Annualvaccin::find($id);

        $annualvaccin->type = request("type");
        $annualvaccin->Brand = request('Brand');
        $annualvaccin->Date = request('Date');
        $annualvaccin->Weight = request('Weight');
        $annualvaccin->save();

        return redirect()->back();
}

    public function delete($id){
        $annualvaccin = Annualvaccin::find($id);
        $annualvaccin->delete();

        return redirect()->back();
    }
}
