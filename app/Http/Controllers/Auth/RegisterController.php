<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\storeUserequest;
use App\Http\Requests\storeupdateuserrequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registerview(){
        return view('auth/register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(storeUserequest $request)
    {

        $users = new User();

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->role = User::MEMBER;
        $users->phone = $request->phone;
        $users->Referal = request('Referal');
        $users->PreviousVet = request('PreviousVet');
        $users->address = request('address');
        $users->ContactPref = request('ContactPref');
        $users->status = true;

        $users->save();

        return redirect('/');
    
    }

    public function geteditUser(){
        $getSelectValue = Request::input('username2');
        $users = User::where('id' , $getSelectValue)->first();

     return view('auth/editregister' , ['users' => $users]);
    }   

    public function storeUser(storeupdateuserrequest $request , $id){

        $users = User::find($id);

        $users->name = $request->name;
        $users->email = $request->email;
         $users->password = Hash::make($request->password);
        $users->role = User::MEMBER;
        $users->phone = $request->phone;
        $users->Referal = request('Referal');
        $users->PreviousVet = request('PreviousVet');
        $users->address = request('address');
        $users->ContactPref = request('ContactPref');
        $users->status = true;

        $users->save();

        return redirect('/')->With('edit' , 'Client Edited Successfully');
       
    }
}
