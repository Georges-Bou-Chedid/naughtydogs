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
        $history2 = History::where('DueDate', '<=', Carbon::now()->subDays(3)->toDateTimeString())->get();

        foreach($history as $histories){
            $pets = $histories->pet;
            $vaccine = $histories->vaccine;
            $deworming = $histories->deworming;
            $annualvaccin = $histories->annualvaccin;
            $tridewor = $histories->tridewor;
            $kyste = $histories->kyste;
            $monthly = $histories->monthly;
            $previous = $histories->previous;

            if($pets==NULL){
                $pets = new Pet();
                $pets->history_id = $histories->id;
                $pets->save();
            
           if($vaccine->isEmpty()){
                $vaccine = new Vaccine();
                $vaccine->history_id = $histories->id;
                $vaccine->save();
            }
         if($deworming->isEmpty()){
                $deworming = new Deworming();
                $deworming->history_id = $histories->id;
                $deworming->save();
            }
          if($annualvaccin->isEmpty()){
                $annualvaccin = new Annualvaccin();
                $annualvaccin->history_id = $histories->id;
                $annualvaccin->save();
            }
           if($tridewor->isEmpty()){
                $tridewor = new Tridewor();
                $tridewor->history_id = $histories->id;
                $tridewor->save();
            }
          if($kyste->isEmpty()){
                $kyste = new Kyste();
                $kyste->history_id = $histories->id;
                $kyste->save();
            }
           if($monthly->isEmpty()){
                $monthly = new Monthly();
                $monthly->history_id = $histories->id;
                $monthly->save();
            }
          if($previous->isEmpty()){
                $previous = new Previous();
                $previous->history_id = $histories->id;
                $previous->save();
            }
        }

        $histories->DueDate =Carbon::now()->addDays(1000)->toDateTimeString();
        $histories->save();
    
        $vaccine1 = Vaccine::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($vaccine1 as $vaccines1){
        if($vaccines1 != NULL){
            $histories->DueDate = $vaccines1->Date ;
            $histories->save();
            }
        }
        $deworming1 = Deworming::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($deworming1 as $dewormings1){
            if($dewormings1 != NULL){
                $histories->DueDate = $dewormings1->Date;
                $histories->save();
            }
        }
        $annualvaccin1 = Annualvaccin::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($annualvaccin1 as $annualvaccins1){
            if($annualvaccins1 != NULL){
                $histories->DueDate = $annualvaccins1->Date;
                $histories->save();
            }
        }
        $tridewor1 = Tridewor::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($tridewor1 as $tridewors1){
            if($tridewors1 != NULL){
                $histories->DueDate = $tridewors1->Date;
                $histories->save();
            }
        }
        $kyste1 = Kyste::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($kyste1 as $kystes1){
            if($kystes1 != NULL){
                $histories->DueDate = $kystes1->Date;
                $histories->save();
            }
        }
        $monthly1 = Monthly::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($monthly1 as $monthlys1){
            if($monthlys1 != NULL){
                $histories->DueDate = $monthlys1->Date;
                $histories->save();
            }
        }
        $previous1 = Previous::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($previous1 as $previouses1){
            if($previouses1 != NULL){
                $histories->DueDate = $previouses1->Date;
                $histories->save();
            }
        }
    }
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
        $history2 = History::where('DueDate', '<=', Carbon::now()->subDays(3)->toDateTimeString())->get();

        foreach($history as $histories){
            $histories->DueDate =Carbon::now()->subDays(1000)->toDateTimeString();
            $histories->save();
    
        $vaccine1 = Vaccine::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($vaccine1 as $vaccines1){
        if($vaccines1 != NULL){
            $histories->DueDate = $vaccines1->Date ;
            $histories->save();
            }
        }
        $deworming1 = Deworming::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($deworming1 as $dewormings1){
            if($dewormings1 != NULL){
                $histories->DueDate = $dewormings1->Date;
                $histories->save();
            }
        }
        $annualvaccin1 = Annualvaccin::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($annualvaccin1 as $annualvaccins1){
            if($annualvaccins1 != NULL){
                $histories->DueDate = $annualvaccins1->Date;
                $histories->save();
            }
        }
        $tridewor1 = Tridewor::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($tridewor1 as $tridewors1){
            if($tridewors1 != NULL){
                $histories->DueDate = $tridewors1->Date;
                $histories->save();
            }
        }
        $kyste1 = Kyste::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($kyste1 as $kystes1){
            if($kystes1 != NULL){
                $histories->DueDate = $kystes1->Date;
                $histories->save();
            }
        }
        $monthly1 = Monthly::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($monthly1 as $monthlys1){
            if($monthlys1 != NULL){
                $histories->DueDate = $monthlys1->Date;
                $histories->save();
            }
        }
        $previous1 = Previous::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $histories->id)->get();
        foreach($previous1 as $previouses1){
            if($previouses1 != NULL){
                $histories->DueDate = $previouses1->Date;
                $histories->save();
            }
        }
    }
    
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

       
        $vaccine1 = Vaccine::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $history->id)->get();
        $deworming1 = Deworming::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $history->id)->get();
        $annualvaccin1 = Annualvaccin::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $history->id)->get();
        $tridewor1 = Tridewor::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $history->id)->get();
        $kyste1 = Kyste::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $history->id)->get();
        $monthly1 = Monthly::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $history->id)->get();
        $previous1 = Previous::where('Date', '<=', Carbon::now()->addDays(4)->toDateTimeString())->where('Date', '>=', Carbon::now()->subDays(3)->toDateTimeString())->where('history_id' , $history->id)->get();

       
       

        return view ('SectionRecord/editpet', ['history' => $history , 'pets' => $pets , 'vaccine' => $vaccine , 'vaccine1' => $vaccine1 ,
        'deworming' => $deworming, 'deworming1' => $deworming1 , 'annualvaccin' => $annualvaccin , 'annualvaccin1' => $annualvaccin1 ,'tridewor' => $tridewor , 'tridewor1' => $tridewor1 , 'kyste' => $kyste 
        , 'kyste1' => $kyste1 , 'monthly' => $monthly ,'monthly1' => $monthly1
        , 'previous' => $previous , 'previous1' => $previous1]);
        
    }

    public function look($id){
        $history = History::find($id);
        $pets = $history->pet;
        $vaccine = $history->vaccine;
        $deworming = $history->deworming;
        $annualvaccin = $history->annualvaccin;
        $tridewor = $history->tridewor;
        $kyste = $history->kyste;
        $monthly = $history->monthly;
        $previous = $history->previous;

        return view ('SectionRecord/lookpet', ['history' => $history , 'pets' => $pets , 'vaccine' => $vaccine , 
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
   