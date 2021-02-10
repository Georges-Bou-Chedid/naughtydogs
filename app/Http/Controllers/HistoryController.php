<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\History;
use App\Models\Archive;
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

        return view('Upgrade/UserHistory' ,['histories' => $history]);

    }

    public function History(){
        $history = History::orderBy('DueDate', 'asc')->get();
        $users = User::all();
        $history1 = History::where('DueDate', '<=', Carbon::now()->addDays(4)->toDateTimeString())->get();
        $history2 = History::where('DueDate', '<=', Carbon::now()->toDateTimeString())->get();

        return view('Upgrade/AdminHistory' ,['histories' => $history , 'histories1' => $history1 , 'histories2' => $history2 , 'users' => $users ]);
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

        return view('Upgrade/History' ,['histories' => $history ,'histories1' => $history1 , 'histories2' => $history2  , 'users' => $users, 'users1' => $users1]);
        }

    }

    public function create(){
        $users = User::all();
        return view('Upgrade/CreateHistory', ['users' => $users]);
    }

    public function store(storeHistoryrequest $request){
       $validated = $request->validated();

        $history = new History();

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


    public function edit($id){
        $users = User::all();
        $history = History::find($id);
        return view ('Upgrade/edithistory', ['history' => $history], ['users' => $users]);
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

    public function showarchive(){
        $archives = Archive::orderby('DueDate' , 'desc')->get();
        $users = User::all();

        return view ('archive' , ['archives' => $archives , 'users' => $users]);
    }

    public function showclientarchive(){
        $getSelectValue = Request::input('username');

        if($getSelectValue == auth()->user()->id){
            return redirect('/archive');
        }
        else{
        $archives = Archive::where('user_id', $getSelectValue)->orderBy('DueDate', 'desc')->get();
        $users = User::all();
        $users1 = User::where('id' , $getSelectValue)->get();

        return view('clientarchive' ,['archives' => $archives , 'users' => $users, 'users1' => $users1]);
        }
    }

    public function deletearchive($id){
        $archive = Archive::find($id);
        $archive->delete();

        return redirect('/archive');
    
    }

    public function archive($id){
        $history = History::find($id);
        $archives = new Archive();

        $archives->user_id = $history->user_id;
        $archives->title = $history->title;
        $archives->Description = $history->Description;
        $archives->DueDate = $history->DueDate;
        $archives->Time = $history->Time;

        $archives->save();

        $history->delete();
        return redirect('/allHistory');
    }
    
}
