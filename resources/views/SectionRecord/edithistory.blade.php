@extends('layouts.Admin')

@section('content')
<div id="wrapper">
	<div id="page" class="container">

    <div >
        <!--section 1 -->
        <section>
        <button id="btn-down">+</button>
        <button id="btn-up">-</button>
        <div class="slideDiv">

        <table  style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 1;border:1px solid; margin-bottom:20px">
            <tr style="border:1px solid"><td class="headerowner"><b>OWNER INfORMATION</b></td></tr>
            <tr ><td  class="bodyowner"><b>Name :</b> {{$history->user->name}}</td></tr>
            <tr ><td  class="bodyowner"><b>Phone Number :</b> {{$history->user->phone}}</td></tr>
            <tr ><td  class="bodyowner"><b>Referal :</b> {{$history->user->Referal }}</td></tr>
            <tr ><td  class="bodyowner"><b>Previous Vet :</b> {{$history->user->PreviousVet}}</td></tr>
            <tr ><td  class="bodyowner"><b>Address :</b> {{$history->user->address}}</td></tr>
            <tr ><td  class="bodyowner"><b>Contact Pref :</b> {{$history->user->ContactPref}}</td></tr>
         
        </table>
        </div>
        </section>

    <!--section 2 -->
        <section>
      <form action="/{{$history->pet->id}}" method="POST">
      @csrf
        <div class="slideDiv">

    <table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 7;border:1px solid">
            <tr style="border:1px solid"><td class="headerowner"><b>PET INfORMATION</b></td></tr>
            <tr ><td  class="bodyowner"><b>Species :</b>

            <select id="species" name="species" focus>
            <option value="NULL"></option>
             <option value="DOG">DOG</option>        
            <option value="CAT">CAT</option>
            </select></td></tr>


            <tr ><td  class="bodyowner"><b>Pet Name :</b> <input type="text" name="PetName"></td></tr>
            <tr ><td  class="bodyowner"><b>Breed :</b> <input type="text" name="Breed"></td></tr>
            <tr ><td  class="bodyowner"><b>Gender :</b> 
            
            <select id="Gender" name="Gender" focus>
            <option value="NULL"></option>
             <option value="Male">Male</option>        
            <option value="Female">Female</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Color :</b> <input type="text" name="Color"></td></tr>
            <tr ><td  class="bodyowner"><b>DOB :</b></td></tr>
            <tr ><td  class="bodyowner"><b>Spayed :</b>

            <select id="Spayed" name="Spayed" focus>
            <option value="NULL"></option>
             <option value="Yes">Yes</option>        
            <option value="No">No</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Environment :</b>

            <select id="Environment" name="Environment" focus>
            <option value="NULL"></option>
             <option value="Indoor">Indoor</option>        
            <option value="Outdoor">Outdoor</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Exercise :</b>

            <select id="Exercise" name="Exercise" focus>
            <option value="NULL"></option>
             <option value="Walk">Walk</option>        
            <option value="Run">Run</option>
            <option value="OnLeash">OnLeash</option>        
            <option value="OfLeash">OfLeash</option>
            <option value="Free">Free</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Travel :</b>

            <select id="Travel" name="Travel" focus>
            <option value="NULL"></option>
             <option value="Yes">Yes</option>        
            <option value="No">No</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Vaccination Book :</b>

            <select id="VaccinationBook" name="VaccinationBook" focus>
            <option value="NULL"></option>
             <option value="Inclinic">Inclinic</option>        
            <option value="With Customer">With Customer</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Microship# :</b> <input type="text" name="Microship"></td></tr>
            <tr ><td  class="bodyowner"><b>Food :</b>

            <select id="Foodd" name="Food" focus>
            <option value="NULL"></option>
             <option value="DryFood">DryFood</option>        
            <option value="WetFood">WetFood</option>
            <option value="RowFood">RowFood</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Brand :</b> <input type="text" name="Brand"></td></tr>
            <tr ><td  class="bodyowner"><b>Qty :</b> <input type="Number" name="Qty"></td></tr>
            <tr ><td  class="bodyowner"><b>Weight :</b> <input type="Number" name="Weight"></td></tr>
            <tr ><td  class="bodyowner"><b>Pregnency :</b> <input type="text" name="Pregnency"></td>
            <td> <button class="btn btn-primary" type="submit">Save</button></td</tr>

    </table>
        </div>
        </form>
        </section>

    </div>
    

        <div class="field is-grouped">
            <div class="control">
           
            <a href="javascript:history.back()" class="btn btn-danger">Back</a>
            </div>
            
            
        </div>

    </div>
</div>
@endsection