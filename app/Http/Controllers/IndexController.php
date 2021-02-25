<?php

namespace App\Http\Controllers;

use App\Models\Pricinglist;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storeUserequest;
use App\Http\Requests\storePlanrequest;

class IndexController extends Controller
{
    /*
    * @return void
    */
    public function index(){
        $pricing = Pricinglist::latest()->get();
        $users = User::all();
        if(!auth()->user()){
            return view ('Roles/welcome', ['pricing' => $pricing]);
        }

        if(auth()->user()->role == User::MEMBER){
            return view('Roles/Member' ,['pricing' => $pricing]);
             }
        return view('Roles/Admin',['pricing' => $pricing], ['users' => $users]);
        }


        public function getUser(){
            $getSelectValue = Request::input('username');
    
            if($getSelectValue == auth()->user()->id){
                return redirect('/');
            }
            else{
            $users = User::where('id' , $getSelectValue)->first();
            if($users->status == true){
            $users->status = false;
            $users->save();
            return redirect('/')->with('disabled' , 'Disabled');
            }
            else{
                $users->status = true;
                $users->save();
                return redirect('/')->with('enabled' , 'Enabled');
            }
        
            }
        }

        public function deleteUser(){
            $getSelectValue = Request::input('username1');

            if($getSelectValue == auth()->user()->id){
                return redirect('/');
            }
            else{
            $users = User::where('id' , $getSelectValue)->first();
            $users->delete();
            return redirect('/')->with('delete' , 'Deleted');
        }
    }
    

    public function create(){
        return view('Pricing/CreatePlan');
    }

    public function store(storePlanrequest $request){

        if ($request->hasFile('file')) {

            $image = $request->file('file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("assets/images"), $new_name);
        
            
        $pricing = new Pricinglist([
            "title" => $request->get('title'),
            "img" => $new_name,
            "Description" => $request->get('Description')
        ]);

        $pricing->save(); // Finally, save the record.
    }
    else{
        $pricing = new Pricinglist([
            "title" => $request->get('title'),
            "Description" => $request->get('Description')
        ]);

        $pricing->save();
    }

        return redirect('/#pricing');
    }

    public function edit($id){
        $pricing = Pricinglist::find($id);
        return view ('Pricing/editpricing', ['pricing' => $pricing]);
    }

    public function update(storePlanrequest $request , $id){

        $pricing = Pricinglist::find($id);

        if ($request->hasFile('file')) {


            $image = $request->file('file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("assets/images"), $new_name);
        
            $pricing->title = $request->title;
            $pricing->img = $new_name;
            $pricing->Description = $request->Description;

        $pricing->save(); // Finally, save the record.
    }
    else{
        $pricing->title = $request->title;
        $pricing->Description = $request->Description;

        $pricing->save();
    }

        return redirect('/#pricing');
    }

    public function delete($id){
        $pricing = Pricinglist::find($id);
        $pricing->delete();

        return redirect('/#pricing');
    }

}

