<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Previous;
use App\Models\History;

class PreviousController extends Controller
{
    public function create($id){
        $history = History::find($id);
        $previous = new Previous();
    
        $previous->history_id = $history->id;
        $previous->Date = request("Date");
        $previous->Case = request('Case');
        $previous->Procedure = request('Procedure');
        $previous->Treatment = request('Treatment');
        $previous->Weight = request("Weight");
        $previous->Medications = request('Medications');
        $previous->Dosage = request('Dosage');
        $previous->Frequency = request('Frequency');
        $previous->Notes = request('Notes');
        $previous->save();
    
        return redirect()->back();
    }

    public function update($id){
        $previous = Previous::find($id);

        $previous->Date = request("Date");
        $previous->Case = request('Case');
        $previous->Procedure = request('Procedure');
        $previous->Treatment = request('Treatment');
        $previous->Weight = request("Weight");
        $previous->Medications = request('Medications');
        $previous->Dosage = request('Dosage');
        $previous->Frequency = request('Frequency');
        $previous->Notes = request('Notes');
        $previous->save();
    

        return redirect()->back();
}

    public function delete($id){
        $previous = Previous::find($id);
        $previous->delete();

        return redirect()->back();
    }
}
