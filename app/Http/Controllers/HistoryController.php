<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\History;
use App\Models\Pet;
use App\Models\Vaccine;
use App\Models\Deworming;
use App\Models\Annualvaccin;
use App\Models\Tridewor;
use App\Models\Kyste;
use App\Models\Monthly;
use App\Models\Previous;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Http\Requests\storeHistoryrequest;

class HistoryController extends Controller
{
    public function UserHistory(){
  
        $history = History::where('user_id', auth()->id())->latest('DueDate')->get();

        if($history->isEmpty()){
            return redirect('/')->with('Historyempty', 'Sorry No History Found!!');
        }

        return view('UpgradeHistory/UserHistory' ,['histories' => $history]);

    }

    public function History(){
        $history = History::orderBy('DueDate', 'asc')->get();
        $users = User::all();
        $history1 = History::where('DueDate', '<=', Carbon::now()->addDays(4)->toDateTimeString())->get();
        $history2 = History::where('DueDate', '<=', Carbon::now()->subDays(1)->toDateTimeString())->get();

        return view('UpgradeHistory/AdminHistory' ,['histories' => $history , 'histories1' => $history1 , 'histories2' => $history2 , 'users' => $users ]);
    }

    public function getHistory(){
        $getSelectValue = Request::input('username');

        if($getSelectValue == auth()->user()->id){
            return redirect('/allHistory');
        }
        else{
        $history = History::where('user_id', $getSelectValue)->orderBy('DueDate', 'asc')->get();
        $history1 = History::where('DueDate', '<=', Carbon::now()->addDays(4)->toDateTimeString())->get();
        $history2 = History::where('DueDate', '<=', Carbon::now()->toDateTimeString())->get();
        $users = User::all();
        $users1 = User::where('id' , $getSelectValue)->get();

        return view('UpgradeHistory/History' ,['histories' => $history ,'histories1' => $history1 , 'histories2' => $history2  , 'users' => $users, 'users1' => $users1]);
        }

    }

    public function create(){
        $users = User::all();
        return view('UpgradeHistory/CreateHistory', ['users' => $users]);
    }

    public function store(storeHistoryrequest $request){
       $validated = $request->validated();

        $history = new History();

        $history->title = $request->title;
        $history->user_id = $request->createuser;
        $history->DueDate = NULL;
       

        $history->save();

        return redirect('/allHistory');
    }


    public function editpet($id){
        $history = History::find($id);
        $pets = $history->pet;
        $vaccine = $history->vaccine;
        $deworming = $history->deworming;
        $annualvaccin = $history->annualvaccin;
        $tridewor = $history->tridewor;
        $kyste = $history->kyste;
        $monthly = $history->monthly;
        $previous = $history->previous;

        if($pets==NULL){
            $pets = new Pet();
            $pets->history_id = $history->id;
            $pets->save();
        }
        if($vaccine->isEmpty()){
            $vaccine = new Vaccine();
            $vaccine->history_id = $history->id;
            $vaccine->save();
        }
       if($deworming->isEmpty()){
            $deworming = new Deworming();
            $deworming->history_id = $history->id;
            $deworming->save();
        }
         if($annualvaccin->isEmpty()){
            $annualvaccin = new Annualvaccin();
            $annualvaccin->history_id = $history->id;
            $annualvaccin->save();
        }
        if($tridewor->isEmpty()){
            $tridewor = new Tridewor();
            $tridewor->history_id = $history->id;
            $tridewor->save();
        }
       if($kyste->isEmpty()){
            $kyste = new Kyste();
            $kyste->history_id = $history->id;
            $kyste->save();
        }
        if($monthly->isEmpty()){
            $monthly = new Monthly();
            $monthly->history_id = $history->id;
            $monthly->save();
        }
        if($previous->isEmpty()){
            $previous = new Previous();
            $previous->history_id = $history->id;
            $previous->save();
        }

        return view ('SectionRecord/editpet', ['history' => $history , 'pets' => $pets , 'vaccine' => $vaccine , 
        'deworming' => $deworming, 'annualvaccin' => $annualvaccin , 'tridewor' => $tridewor , 'kyste' => $kyste , 'monthly' => $monthly 
        , 'previous' => $previous]);
        
    }

    public function update(storeHistoryrequest $request , $id){
        $history = History::find($id);
        
        $history->user_id = $request->createuser;
        $history->title = $request->title;
        $history->Description = $request->Description;
        $history->DueDate = $request->DueDate;
        $history->Time = request('Time');
       
        if ($history->Time == NULL){
            $history->Time = "No Specific Time";
        }
        $history->save();

        return redirect('/allHistory');
    }

    public function delete($id){
        $history = History::find($id);
        $history->delete();

        return redirect('/allHistory');
    }
}
   