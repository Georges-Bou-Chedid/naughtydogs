<?php

namespace App\Http\Controllers;

use App\Models\Pricinglist;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
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

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
        ]);

        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

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
        return view ('Upgrade/editpricing', ['pricing' => $pricing]);
    }

    public function update(Request $request , $id){

        $pricing = Pricinglist::find($id);
        
        $request->validate([
            'title' => 'required',
        ]);

        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

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

