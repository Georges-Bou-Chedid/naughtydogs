@extends('layouts.Admin')

@section('content')
<div id="wrapper">
	<div id="page" class="container">

    <div >
        <!--section 1 -->
        <section>
        <button id="btn-down"><i class="fas fa-arrow-down"></i></button>
        <button id="btn-up"><i class="fas fa-arrow-up"></i></button>
        <a href="#previous" class="btn btn-link links">Previous Medical</a>
        <a href="#others" class="btn btn-link links">Annual</a>
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
      <form action="/allHistory/edit/{{$pets->id}}" method="POST">
      @csrf
      @method('PUT')
        <div class="slideDiv">

    <table style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 7;border:1px solid">
            <tr style="border:1px solid"><td class="headerowner"><b>PET INfORMATION</b></td></tr>
            <tr ><td  class="bodyowner"><b>Species :</b>

            <select id="species" name="species" focus>
            <option value="">--Select--</option>
             <option value="DOG" {{ ($pets->species) == 'DOG' ? 'selected' : '' }}>DOG</option>        
            <option value="CAT" {{ ($pets->species) == 'CAT' ? 'selected' : '' }}>CAT</option>
            </select></td></tr>


            <tr ><td  class="bodyowner"><b>Pet Name :</b> <input type="text" size="10" value = "{{ $pets->PetName}}" placeholder="Name" name="PetName"></td></tr>
            <tr ><td  class="bodyowner"><b>Breed :</b> <input type="text" size="10" value = "{{ $pets->Breed}}" placeholder="breed" name="Breed"></td></tr>
            <tr ><td  class="bodyowner"><b>Gender :</b> 
            
            <select id="Gender" name="Gender" focus>
            <option value="">--Select--</option>
             <option value="Male" {{ ($pets->Gender) == 'Male' ? 'selected' : '' }}>Male</option>        
            <option value="Female" {{ ($pets->Gender) == 'Female' ? 'selected' : '' }}>Female</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Color :</b> <input type="text" size="7" value = "{{ $pets->Color}}" placeholder="Type The Color" name="Color"></td></tr>
            <tr ><td  class="bodyowner"><b>DOB :</b> <input type ="date" value="{{$pets->DOB}}" name="DOB"></td></tr>
            <tr ><td  class="bodyowner"><b>Spayed :</b>

            <select id="Spayed" name="Spayed" focus>
            <option value="">--Select--</option>
             <option value="Yes" {{ ($pets->Spayed) == 'Yes' ? 'selected' : '' }}>Yes</option>        
            <option value="No" {{ ($pets->Spayed) == 'No' ? 'selected' : '' }}>No</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Environment :</b>

            <select id="Environment" name="Environment" focus>
            <option value="">--Select--</option>
             <option value="Indoor" {{ ($pets->Environment) == 'Indoor' ? 'selected' : '' }}>Indoor</option>        
            <option value="Outdoor" {{ ($pets->Environment) == 'Outdoor' ? 'selected' : '' }}>Outdoor</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Exercise :</b>

            <select id="Exercise" name="Exercise" focus>
            <option value="">--Select--</option>
             <option value="Walk" {{ ($pets->Exercise) == 'Walk' ? 'selected' : '' }}>Walk</option>        
            <option value="Run" {{ ($pets->Exercise) == 'Run' ? 'selected' : '' }}>Run</option>
            <option value="OnLeash" {{ ($pets->Exercise) == 'OnLeash' ? 'selected' : '' }}>OnLeash</option>        
            <option value="OfLeash" {{ ($pets->Exercise) == 'OfLeash' ? 'selected' : '' }}>OfLeash</option>
            <option value="Free" {{ ($pets->Exercise) == 'Free' ? 'selected' : '' }}>Free</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Travel :</b>

            <select id="Travel" name="Travel" focus>
            <option value="">--Select--</option>
             <option value="Yes" {{ ($pets->Travel) == 'Yes' ? 'selected' : '' }}>Yes</option>        
            <option value="No" {{ ($pets->Travel) == 'No' ? 'selected' : '' }}>No</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Vaccination Book :</b>

            <select id="VaccinationBook" name="VaccinationBook" focus>
            <option value="">--Select--</option>
             <option value="Inclinic" {{ ($pets->VaccinationBook) == 'Inclinic' ? 'selected' : '' }}>Inclinic</option>        
            <option value="With Customer" {{ ($pets->VaccinationBook) == 'With Customer' ? 'selected' : '' }}>With Customer</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Microship# :</b> <input type="text" size="5" value="{{$pets->Microship}}" placeholder="#" name="Microship"></td></tr>
            <tr ><td  class="bodyowner"><b>Food :</b>

            <select id="Foodd" name="Food" focus>
            <option value="">--Select--</option>
             <option value="DryFood" {{ ($pets->Food) == 'DryFood' ? 'selected' : '' }}>DryFood</option>        
            <option value="WetFood" {{ ($pets->Food) == 'WetFood' ? 'selected' : '' }}>WetFood</option>
            <option value="RowFood" {{ ($pets->Food) == 'RowFood' ? 'selected' : '' }}>RowFood</option>
            </select></td></tr>

            <tr ><td  class="bodyowner"><b>Brand :</b> <input type="text" size="10" placeholder="brand" value="{{$pets->Brand}}" name="Brand"></td></tr>
            <tr ><td  class="bodyowner"><b>Qty :</b> <input type="Number" size="4" placeholder="qty" value="{{$pets->Qty}}" name="Qty"></td></tr>
            <tr ><td  class="bodyowner"><b>Weight(Kg) :</b> <input type="Number" size="4" placeholder="Kg" value="{{$pets->Weight}}" name="Weight"></td></tr>
            <tr ><td  class="bodyowner"><b>Pregnency :</b> <input type="text" placeholder="?" size="8" value="{{$pets->Pregnency}}" name="Pregnency"></td>
            <td> <button class="btn btn-primary" type="submit">Save</button></td</tr>

    </table>
        </div>
        </form>
        </section>

         <!--section 3 -->
         <section>
        <div>
        <table border="2" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 1;border:1px solid; margin-bottom:15px; margin-top:20px">
            <tr style="border:1px solid"><td class="headersection3" style="font-size:2.5rem"><b>Medical Files</b></td></tr>
            <tr style="border:1px solid"><td class="headerowner" style="font-size:1.5rem"><b>Core Vaccine</b></td></tr>

            <form action="/allHistory/edit/vaccine/{{$history->id}}" method="POST">
                 @csrf
            <tr><table border="2">
            <tr><th class="tablessection3">Vaccin Type</th>
                <th class="tablessection3">Brand</th>
                 <th class="tablessection3">Date</th>
                <th class="tablessection3">Weight(Kg)</th>
                <th style="text-align:center"><button class="btn btn-success" type="submit"><i class="fas fa-plus"></i></button></td></tr>
            </form>

                
                @foreach($vaccine as $vaccines)
                <form action="/allHistory/edit/vaccine1/{{$vaccines->id}}" method="POST">
                 @csrf
                 @method('PUT')

                 <tr><td class="tablessection3">
                 <select id="type" name="type">
                 <option value="">--Select--</option>
               <option value="Parvo Vaccine" {{ ($vaccines->type) == 'Parvo Vaccine' ? 'selected' : '' }}>Parvo Vaccine</option>        
                 <option value="DHPPiL1/CHPPiL1" {{ ($vaccines->type) == 'DHPPiL1/CHPPiL1' ? 'selected' : '' }}>DHPPiL1/CHPPiL1</option>
                <option value="DHPPiL2/CHPPiL2" {{ ($vaccines->type) == 'DHPPiL2/CHPPiL2' ? 'selected' : '' }}>DHPPiL2/CHPPiL2</option>        
                 <option value="Rabies" {{ ($vaccines->type) == 'Rabies' ? 'selected' : '' }}>Rabies</option>
                </select></td> 


                 <td class="tablessection3"> 
                <select id="Brand" name="Brand" focus>
                <option value="">--Select--</option>
               <option value="Fizer" {{ ($vaccines->Brand) == 'Fizer' ? 'selected' : '' }}>Fizer</option>        
                 <option value="Canvac" {{ ($vaccines->Brand) == 'Canvac' ? 'selected' : '' }}>Canvac</option>
                <option value="Virbac" {{ ($vaccines->Brand) == 'Virbac' ? 'selected' : '' }}>Virbac</option>        
                 <option value="Biocan" {{ ($vaccines->Brand) == 'Biocan' ? 'selected' : '' }}>Biocan</option>
                 <option value="Merial" {{ ($vaccines->Brand) == 'Merial' ? 'selected' : '' }}>Merial</option>
                 <option value="Nobivac" {{ ($vaccines->Brand) == 'Nobivac' ? 'selected' : '' }}>Nobivac</option>
                 </select></td>

                 
                
                 <td class="tablessection3"> <input type ="date" value="{{$vaccines->Date}}" name="Date"@foreach ($vaccine1 as $vaccines1) @if($vaccines->id == $vaccines1->id) style="color:red" @endif @endforeach</td>
                 
                 <td class="tablessection3"> <input type ="Number" placeholder="Kg" value="{{$vaccines->Weight}}" name="Weight"></td>
                 <td><button class="white" type="submit"><i class="far fa-save icon1"></i></button></td>
                 </form>
                 <form action="/allHistory/edit/delete/{{$vaccines->id}}" method="POST">
                 @csrf
                 @method('DELETE')
                 <td><button class="white" type="submit"><i class="fas fa-trash icon" style="text-align:center; margin-right:5px"></i></button></td></tr>
                </form>
                 @endforeach
                </table>

                 





            <form action="/allHistory/edit/deworming/{{$history->id}}" method="POST">
            @csrf
            <tr><table border="2" style="margin-top:15px">
            <tr><th class="tablessection3">Deworming</th>
                <th class="tablessection3">Brand</th>
                 <th class="tablessection3">Date</th>
                <th class="tablessection3">Weight(Kg)</th>
                <th style="text-align:center"><button class="btn btn-success" type="submit"><i class="fas fa-plus"></i></button></td></tr>
            </form>

            @foreach($deworming as $dewormings)
                <form action="/allHistory/edit/deworming1/{{$dewormings->id}}" method="POST">
                 @csrf
                 @method('PUT')

                 <tr><td class="tablessection3">
                 <select id="type" name="type">
                 <option value="">--Select--</option>
               <option value="1st Vaccin Deworming" {{ ($dewormings->type) == '1st Vaccin Deworming' ? 'selected' : '' }}>1st Vaccin Deworming</option>        
                 <option value="2nd Vaccin Deworming" {{ ($dewormings->type) == '2nd Vaccin Deworming' ? 'selected' : '' }}>2nd Vaccin Deworming</option>
                <option value="3rd Vaccin Deworming" {{ ($dewormings->type) == '3rd Vaccin Deworming' ? 'selected' : '' }}>3rd Vaccin Deworming</option>        
                 <option value="4th Vaccin Deworming" {{ ($dewormings->type) == '4th Vaccin Deworming' ? 'selected' : '' }}>4th Vaccin Deworming</option>
                </select></td>

                <td class="tablessection3"> 
                <select id="Brand" name="Brand" focus>
                <option value="">--Select--</option>
               <option value="Fizer" {{ ($dewormings->Brand) == 'Fizer' ? 'selected' : '' }}>Fizer</option>        
                 <option value="Canvac" {{ ($dewormings->Brand) == 'Canvac' ? 'selected' : '' }}>Canvac</option>
                <option value="Virbac" {{ ($dewormings->Brand) == 'Virbac' ? 'selected' : '' }}>Virbac</option>        
                 <option value="Biocan" {{ ($dewormings->Brand) == 'Biocan' ? 'selected' : '' }}>Biocan</option>
                 <option value="Merial" {{ ($dewormings->Brand) == 'Merial' ? 'selected' : '' }}>Merial</option>
                 <option value="Nobivac" {{ ($dewormings->Brand) == 'Nobivac' ? 'selected' : '' }}>Nobivac</option>
                 </select></td>
                 <td class="tablessection3"> <input type ="date" value="{{$dewormings->Date}}" name="Date" @foreach ($deworming1 as $dewormings1) @if($dewormings->id == $dewormings1->id) style="color:red" @endif @endforeach></td>
                 <td class="tablessection3"> <input type ="Number" placeholder="Kg" value="{{$dewormings->Weight}}" name="Weight"></td>
                 <td><button class="white" type="submit"><i class="far fa-save icon1"></i></button></td>
                 </form>
                 <form action="/allHistory/edit/deletedeworming/{{$dewormings->id}}" method="POST">
                 @csrf
                 @method('DELETE')
                 <td><button class="white" type="submit"><i class="fas fa-trash icon" style="text-align:center; margin-right:5px"></i></button></td></tr>
                </form>
                 @endforeach

            </table>
        </table>
        </div>
        </section>



        <!--section 4 -->
        <section id="others">
        <div>
        <table border="2" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 1;border:1px solid; margin-bottom:15px; margin-top:15px">
            <tr style="border:1px solid"><td class="headersection3" style="font-size:2.5rem"><b>Annual Vaccin - Deworming - Spot On</b></td></tr>
            <form action="/allHistory/edit/annual/{{$history->id}}" method="POST">
                 @csrf
            <tr><table border="2">
            <tr><th colspan="6" class="headerparts">Annual Vaccin</th></tr>
            <tr><th class="tablessection3">Vaccin Type</th>
                <th class="tablessection3">Brand</th>
                 <th class="tablessection3">Date</th>
                <th class="tablessection3">Weight(Kg)</th>
                <th style="text-align:center"><button class="btn btn-success" type="submit"><i class="fas fa-plus"></i></button></td></tr>
            </form>

                
                @foreach($annualvaccin as $annualvaccins)
                <form action="/allHistory/edit/annual1/{{$annualvaccins->id}}" method="POST">
                 @csrf
                 @method('PUT')

                 <tr><td class="tablessection3">
                 <input id="type" name="type" placeholder="Vaccine Type" value="{{$annualvaccins->type}}"></input>

                 <td class="tablessection3"> 
                <select id="Brand" name="Brand" focus>
                <option value="">--Select--</option>
               <option value="Fizer" {{ ($annualvaccins->Brand) == 'Fizer' ? 'selected' : '' }}>Fizer</option>        
                 <option value="Canvac" {{ ($annualvaccins->Brand) == 'Canvac' ? 'selected' : '' }}>Canvac</option>
                <option value="Virbac" {{ ($annualvaccins->Brand) == 'Virbac' ? 'selected' : '' }}>Virbac</option>        
                 <option value="Biocan" {{ ($annualvaccins->Brand) == 'Biocan' ? 'selected' : '' }}>Biocan</option>
                 <option value="Merial" {{ ($annualvaccins->Brand) == 'Merial' ? 'selected' : '' }}>Merial</option>
                 <option value="Nobivac" {{ ($annualvaccins->Brand) == 'Nobivac' ? 'selected' : '' }}>Nobivac</option>
                 </select></td>
                 <td class="tablessection3"> <input type ="date" value="{{$annualvaccins->Date}}" name="Date" @foreach ($annualvaccin1 as $annualvaccins1) @if($annualvaccins->id == $annualvaccins1->id) style="color:red" @endif @endforeach></td>
                 <td class="tablessection3"> <input type ="Number" placeholder="Kg" value="{{$annualvaccins->Weight}}" name="Weight"></td>
                 <td><button class="white" type="submit"><i class="far fa-save icon1"></i></button></td>
                 </form>
                 <form action="/allHistory/edit/deleteannualvaccin/{{$annualvaccins->id}}" method="POST">
                 @csrf
                 @method('DELETE')
                 <td><button class="white" type="submit"><i class="fas fa-trash icon" style="text-align:center; margin-right:5px"></i></button></td></tr>
                </form>
                 @endforeach
                </table>

                 





            <form action="/allHistory/edit/trimestre/{{$history->id}}" method="POST">
            @csrf
            <tr><table border="2" style="margin-top:15px">
            <tr><th colspan="6" class="headerparts">Deworming</th></tr>
            <tr><th class="tablessection3">Deworming</th>
                <th class="tablessection3">Brand</th>
                 <th class="tablessection3">Date</th>
                <th class="tablessection3">Weight(Kg)</th>
                <th style="text-align:center"><button class="btn btn-success" type="submit"><i class="fas fa-plus"></i></button></td></tr>
            </form>

            @foreach($tridewor as $tridewors)
                <form action="/allHistory/edit/trimestre1/{{$tridewors->id}}" method="POST">
                 @csrf
                 @method('PUT')

                 <tr><td class="tablessection3">
                 <input id="type" name="type" placeholder="Deworming type" value="{{$tridewors->type}}"></input>

                 <td class="tablessection3"> 
                 <input id="Brand" name="Brand" placeholder="brand" value="{{$tridewors->Brand}}"></input>

                 <td class="tablessection3"> <input type ="date" value="{{$tridewors->Date}}" name="Date" @foreach ($tridewor1 as $tridewors1) @if($tridewors->id == $tridewors1->id) style="color:red" @endif @endforeach></td>
                 <td class="tablessection3"> <input type ="Number" placeholder="Kg" value="{{$tridewors->Weight}}" name="Weight"></td>
                 <td><button class="white" type="submit"><i class="far fa-save icon1"></i></button></td>
                 </form>
                 <form action="/allHistory/edit/deletetrimestre/{{$tridewors->id}}" method="POST">
                 @csrf
                 @method('DELETE')
                 <td><button class="white" type="submit"><i class="fas fa-trash icon" style="text-align:center; margin-right:5px"></i></button></td></tr>
                </form>
                 @endforeach

            </table>





            <form action="/allHistory/edit/kystes/{{$history->id}}" method="POST">
            @csrf
            <tr><table border="2" style="margin-top:15px">
            <tr><th colspan="6" class="headerparts">Anti kystes</th></tr>
            <tr><th class="tablessection3">Anti Kyste</th>
                <th class="tablessection3">Brand</th>
                 <th class="tablessection3">Date</th>
                <th class="tablessection3">Weight(Kg)</th>
                <th style="text-align:center"><button class="btn btn-success" type="submit"><i class="fas fa-plus"></i></button></td></tr>
            </form>

            @foreach($kyste as $kystes)
                <form action="/allHistory/edit/kystes1/{{$kystes->id}}" method="POST">
                 @csrf
                 @method('PUT')

                 <tr><td class="tablessection3">
                 <input id="spot" name="spot" placeholder="spot" value="{{$kystes->Spot}}"></input>

                 <td class="tablessection3"> 
                 <input id="Brand" name="Brand" placeholder="brand" value="{{$kystes->Brand}}"></input>

                 <td class="tablessection3"> <input type ="date" value="{{$kystes->Date}}" name="Date" @foreach ($kyste1 as $kystes1) @if($kystes->id == $kystes1->id) style="color:red" @endif @endforeach></td>
                 <td class="tablessection3"> <input type ="Number" placeholder="Kg" value="{{$kystes->Weight}}" name="Weight"></td>
                 <td><button class="white" type="submit"><i class="far fa-save icon1"></i></button></td>
                 </form>
                 <form action="/allHistory/edit/deletekystes/{{$kystes->id}}" method="POST">
                 @csrf
                 @method('DELETE')
                 <td><button class="white" type="submit"><i class="fas fa-trash icon" style="text-align:center; margin-right:5px"></i></button></td></tr>
                </form>
                 @endforeach

            </table>





            <form action="/allHistory/edit/monthly/{{$history->id}}" method="POST">
            @csrf
            <tr><table border="2" style="margin-top:15px">
            <tr><th colspan="6" class="headerparts">External Parasites</th></tr>
            <tr><th class="tablessection3">Spot On</th>
                <th class="tablessection3">Brand</th>
                 <th class="tablessection3">Date</th>
                <th class="tablessection3">Weight(Kg)</th>
                <th style="text-align:center"><button class="btn btn-success" type="submit"><i class="fas fa-plus"></i></button></td></tr>
            </form>

            @foreach($monthly as $monthlys)
                <form action="/allHistory/edit/monthly1/{{$monthlys->id}}" method="POST">
                 @csrf
                 @method('PUT')

                 <tr><td class="tablessection3">
                 <input id="spot" name="spot" placeholder="spot" value="{{$monthlys->Spot}}"></input>

                 <td class="tablessection3"> 
                 <input id="Brand" name="Brand" placeholder="brand" value="{{$monthlys->Brand}}"></input>

                 <td class="tablessection3"> <input type ="date" value="{{$monthlys->Date}}" name="Date" @foreach ($monthly1 as $monthlys1) @if($monthlys->id == $monthlys1->id) style="color:red" @endif @endforeach></td>
                 <td class="tablessection3"> <input type ="Number" placeholder="Kg" value="{{$monthlys->Weight}}" name="Weight"></td>
                 <td><button class="white" type="submit"><i class="far fa-save icon1"></i></button></td>
                 </form>
                 <form action="/allHistory/edit/deletemonthlys/{{$monthlys->id}}" method="POST">
                 @csrf
                 @method('DELETE')
                 <td><button class="white" type="submit"><i class="fas fa-trash icon" style="text-align:center; margin-right:5px"></i></button></td></tr>
                </form>
                 @endforeach

            </table>
            
     			
</table>
        </div>
    </section>

        <!--section 5 -->
        <section id="previous">
        <table border="2" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 1;border:1px solid; margin-bottom:15px; margin-top:25px">
            <tr style="border:1px solid"><td class="headersection3"><b>Previous Medical History</b></td></tr>
            <form action="/allHistory/edit/previous/{{$history->id}}" method="POST">
                 @csrf
            <tr><table border="2" style="margin-bottom:15px">
            <tr><th class="tablessection3">Date</th>
                <th class="tablessection3">Case Diagnosis</th>
                 <th class="tablessection3">Procedure</th>
                <th class="tablessection3">Treatment</th>
                <th class="tablessection3">Weight</th>
                <th class="tablessection3">Medications</th>
                <th class="tablessection3">Dosage</th>
                <th class="tablessection3">Frequency</th>
                <th class="tablessection3">Notes</th>
                <th style="text-align:center"><button class="btn btn-success" type="submit"><i class="fas fa-plus"></i></button></td></tr>
            </form>

            @foreach($previous as $previouses)
                <form action="/allHistory/edit/previous1/{{$previouses->id}}" method="POST">
                 @csrf
                 @method('PUT')

                
                 <tr><td class="tablessection3"> <input type ="date" value="{{$previouses->Date}}" name="Date" @foreach ($previous1 as $previouses1) @if($previouses->id == $previouses1->id) style="color:red" @endif @endforeach></td>
                 <td class="tablessection3"><input id="Case" size="6" name="Case" placeholder="case" value="{{$previouses->Case}}"></input></td>
                 <td class="tablessection3"><input id="Procedure" size="9" name="Procedure" placeholder="procedure" value="{{$previouses->Procedure}}"></input></td>
                 <td class="tablessection3"><input id="Treatment" size="8" name="Treatment" placeholder="treatment" value="{{$previouses->Treatment}}"></input></td>
                 <td class="tablessection3"><input id="Weight" size="4" name="Weight" placeholder="kg" value="{{$previouses->Weight}}"></input></td>
                 <td class="tablessection3"><input id="Medications" size="8" name="Medications" placeholder="all" value="{{$previouses->Medications}}"></input></td>
                 <td class="tablessection3"><input id="Dosage" size="7" name="Dosage" placeholder="dosage" value="{{$previouses->Dosage}}"></input></td>
                 <td class="tablessection3"><input id="Frequency" size="7" name="Frequency" placeholder="frequency" value="{{$previouses->Frequency}}"></input></td>
                 <td class="tablessection3"><input id="Notes" size="6" name="Notes" placeholder="note" value="{{$previouses->Notes}}"></input></td>

                 <td><button class="white" type="submit"><i class="far fa-save icon1"></i></button></td>
                 </form>

                 <form action="/allHistory/edit/deleteprevious/{{$previouses->id}}" method="POST">
                 @csrf
                 @method('DELETE')
                 <td><button class="white" type="submit"><i class="fas fa-trash icon" style="text-align:center; margin-right:5px"></i></button></td></tr>
                </form>
                 @endforeach
                
                
                </table>
</table>
</section>

<textarea id="w3review" name="w3review" rows="3" placeholder="notes" cols="150">{{$previouses->Notes}}</textarea>

   
    

        <div class="field is-grouped">
            <div class="control">
           
            <a href="javascript:history.back()" class="btn btn-danger">Back</a>
            </div>
            
            
        </div>
</div>
@endsection