<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\History;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
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

        return view('Upgrade/AdminHistory' ,['histories' => $history],['users' => $users]);

    }
    public function getHistory(){
        $getSelectValue = Request::input('username');

        if($getSelectValue == auth()->user()->id){
            return redirect('/allHistory');
        }
        else{
        $history = History::where('user_id', $getSelectValue)->orderBy('DueDate', 'asc')->get();
        $users = User::all();
        $users1 = User::where('id' , $getSelectValue)->get();

        return view('Upgrade/History' ,['histories' => $history ,'users' => $users, 'users1' => $users1]);
        }

    }

    public function create(){
        $users = User::all();
        return view('Upgrade/CreateHistory', ['users' => $users]);
    }

    public function store(storeHistoryrequest $request){
       $validated = $request->validated();

        $history = new History();

        $history->user_id = request('createuser');
        $history->title = request('title');
        $history->Description = request('Description');
        $history->DueDate = request('DueDate');

        $history->save();

        return redirect('/allHistory');
    }


    public function edit($id){
        $users = User::all();
        $history = History::find($id);
        return view ('Upgrade/edithistory', ['history' => $history], ['users' => $users]);
    }

    public function update($id){
        $history = History::find($id);
        
        $history->user_id = request('createuser');
        $history->title = request('title');
        $history->Description = request('Description');
        $history->DueDate = request('DueDate');
       
        $history->save();

        return redirect('/allHistory');
    }

    public function delete($id){
        $history = History::find($id);
        $history->delete();

        return redirect('/allHistory');
    }

    public function addToCart($id){
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        
        $cart = Cart::where('user_id', auth()->id())->get();

        if($cart->isEmpty()){
            $cart = Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'Qty'=> 1,
                'Price' => $product->Price,
            ]);
            return redirect('/')->with('success', 'Product added to cart successfully!');
        }

        
        if($userproduct = $cart->where('product_id' , $id)->first()){

                
                if($userproduct->Qty >= $product->Quantity){
                    return redirect('/')->with('failure', 'Out Of Stock');
                }
               else{
                $newquantity = $userproduct->Qty + 1;

                $userproduct->update([
                    'Qty' => $newquantity,
                    'Price' => $product->Price * $newquantity
                ]);

                return redirect('/')->with('success', 'Product added to cart successfully!');
               }
            }

            else{
                Cart::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product->id,
                    'Qty'=> 1,
                    'Price' => $product->Price,
                ]);
                return redirect('/')->with('success', 'Product added to cart successfully!');
        }
            }
}
