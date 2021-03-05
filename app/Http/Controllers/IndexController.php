<?php

namespace App\Http\Controllers;

use App\Models\Pricinglist;
use App\Models\User;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storeUserequest;
use App\Http\Requests\storePlanrequest;
use Illuminate\Support\Facades\File;

class IndexController extends Controller
{
    /*
    * @return void
    */
    public function index(){
        $users = User::all();
        if(!auth()->user()){
            return view ('Roles/welcome');
        }

        if(auth()->user()->role == User::MEMBER){
            if(auth()->user()->status == false){
            Auth::logout();
            return view('unauthorized');
            }
            return view('Roles/Member');
             }
        return view('Roles/Admin',['users' => $users]);
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

    public function getplans(){
        $pricing = Pricinglist::latest()->get();
        return view ('Pricing/getplan' , ['pricing' => $pricing]);
    }

    public function getadmin(){
        $pricing = Pricinglist::latest()->get();
        return view ('Pricing/adminplan' , ['pricing' => $pricing]);
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

        return redirect('/adminplans');
    }

    public function edit($id){
        $pricing = Pricinglist::find($id);
        return view ('Pricing/editpricing', ['pricing' => $pricing]);
    }

    public function update(storePlanrequest $request , $id){

        $pricing = Pricinglist::find($id);

        if ($request->hasFile('file')) {

            $filePath = public_path('assets/images/'.$pricing->img); 
             if(File::exists($filePath)) {
                 File::delete($filePath);
             }

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

    return redirect('/adminplans');
    }

    public function delete($id){
        $pricing = Pricinglist::find($id);
        $filePath = public_path('assets/images/'.$pricing->img); 
         if(File::exists($filePath)) {
          File::delete($filePath);
        }
        $pricing->delete();

        return redirect('/adminplans');
    }

}

