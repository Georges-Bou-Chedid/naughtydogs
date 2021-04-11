<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\History;

class PetController extends Controller
{

    public function update($id){
        $pet = Pet::find($id);

        $pet->species = request('species');
       $pet->PetName = request('PetName');
       $pet->Breed = request('Breed');
       $pet->Gender = request('Gender');
       $pet->Color = request('Color');
       $pet->DOB = request('DOB');
       $pet->Spayed = request('Spayed');
       $pet->Environment = request('Environment');
       $pet->Exercise = request('Exercise');
       $pet->Travel = request('Travel');
       $pet->VaccinationBook = request('VaccinationBook');
       $pet->Microship = request('Microship');
       $pet->Food = request('Food');
       $pet->Brand = request('Brand');  
       $pet->Qty = request('Qty');
       $pet->Weight = request('Weight');
       $pet->Pregnency = request('Pregnency');

       $pet->save();

       return redirect()->back();
    }
}
