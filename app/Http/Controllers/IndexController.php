<?php

namespace App\Http\Controllers;

use App\Models\Pricinglist;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Controllers\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storePlanrequest;

class IndexController extends Controller
{
    /*
    * @return void
    */
    public function index(){
        $pricing = Pricinglist::latest()->get();
        if(!auth()->user()){
            return view ('Roles/welcome', ['pricing' => $pricing]);
        }

        if(auth()->user()->role == User::MEMBER){
            return view('Roles/Member' ,['pricing' => $pricing]);
             }
        return view('Roles/Admin',['pricing' => $pricing]);
        }
    

    public function create(){
        return view('Upgrade/CreatePlan');
    }

    public function store(storePlanrequest $request){

        $pricing = new Pricinglist();

        $pricing->title = $request->title;
        $pricing->img = $request->img;
        $pricing->Description = $request->Description;
       
        $pricing->save();

        return redirect('/');
    }

    public function edit($id){
        $pricing = Pricinglist::find($id);
        return view ('Upgrade/editpricing', ['pricing' => $pricing]);
    }

    public function update(storeHistoryrequest $id){
        $pricing = Pricinglist::find($id);
        
        $pricing->title = $request->title;
        $pricing->img = $request->img;
        $pricing->Description = $request->Description;
       
        $pricing->save();

        return redirect('/');
    }

    public function delete($id){
        $pricing = Pricinglist::find($id);
        $pricing->delete();

        return redirect('/');
    }

    public function fetch(){
            return view ('Roles/Admin', ['pricing' => auth()->user()->timeline()]);
    }    
}

