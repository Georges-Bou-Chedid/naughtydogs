@extends('layouts.Member')

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
            <tr ><td  class="bodyowner" ><b>Species :</b>@if($pets->species == NULL) Not Specified @else {{$pets->species}} @endif</td></tr>


            <tr ><td  class="bodyowner"><b>Pet Name :</b>@if($pets->PetName == NULL) Not Specified @else {{$pets->PetName}} @endif</td></tr>
            <tr ><td  class="bodyowner"><b>Breed :</b>@if($pets->Breed == NULL) Not Specified @else {{$pets->Breed}} @endif</td></tr>

            <tr ><td  class="bodyowner"><b>Gender :</b>@if($pets->Gender == NULL) Not Specified @else {{$pets->Gender}} @endif</td></tr>

            <tr ><td  class="bodyowner"><b>Color :</b>@if($pets->Color == NULL) Not Specified @else {{$pets->Color}} @endif</td></tr>
            <tr ><td  class="bodyowner"><b>DOB :</b>@if($pets->DOB == NULL) Not Specified @else {{$pets->DOB}} @endif</td></tr>
            <tr ><td  class="bodyowner"><b>Spayed :</b>@if($pets->Spayed == NULL) Not Specified @else {{$pets->Spayed}} @endif</td></tr>

            <tr ><td  class="bodyowner"><b>Environment :</b>@if($pets->Environment == NULL) Not Specified @else {{$pets->Environment}} @endif</td></tr>

            <tr ><td  class="bodyowner"><b>Exercise :</b>@if($pets->Exercise == NULL) Not Specified @else {{$pets->Exercise}} @endif</td></tr>

            <tr ><td  class="bodyowner"><b>Travel :</b>@if($pets->Travel == NULL) Not Specified @else {{$pets->Travel}} @endif</td></tr>

            <tr ><td  class="bodyowner"><b>Vaccination Book :</b>@if($pets->VaccinationBook == NULL) Not Specified @else {{$pets->VaccinationBook}} @endif</td></tr>

            <tr ><td  class="bodyowner"><b>Microship# :</b>@if($pets->Miroship == NULL) Not Specified @else {{$pets->Microship}} @endif</td></tr>
            <tr ><td  class="bodyowner"><b>Food :</b>@if($pets->Food == NULL) Not Specified @else {{$pets->Food}} @endif</td></tr>

            <tr ><td  class="bodyowner"><b>Brand :</b>@if($pets->Brand == NULL) Not Specified @else {{$pets->Brand}} @endif</td></tr>
            <tr ><td  class="bodyowner"><b>Qty :</b>@if($pets->Qty == NULL) Not Specified @else {{$pets->Qty}} @endif</td></tr>
            <tr ><td  class="bodyowner"><b>Weight(Kg) :</b>@if($pets->Weight == NULL) Not Specified @else {{$pets->Weight}} @endif</td></tr>
            <tr ><td  class="bodyowner"><b>Pregnency :</b>@if($pets->Pregnency == NULL) Not Specified @else {{$pets->Pregnency}} @endif</td</tr>

    </table>
        </div>
        </form>
        </section>

         <!--section 3 -->
         <section>
        <div>
        <table border="2" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 1;border:1px solid; margin-bottom:15px; margin-top:20px">
            <tr style="border:1px solid"><td class="headersection3"><b>Medical Files</b></td></tr>
            <tr style="border:1px solid"><td class="headerowner"><b>Core Vaccine</b></td></tr>

            <tr><table border="2">
            <tr><th class="tablessection3">Vaccin Type</th>
                <th class="tablessection3">Brand</th>
                 <th class="tablessection3">Date</th>
                <th class="tablessection3">Weight(Kg)</th>

                
                @foreach($vaccine as $vaccines)

                 <tr><td class="tablessection3">
                 @if($vaccines->type == NULL) Not Specified @else {{$vaccines->type}} @endif</td> 


                 <td class="tablessection3"> 
                 @if($vaccines->Brand == NULL) Not Specified @else {{$vaccines->Brand}} @endif</td>

                 <td class="tablessection3">@if($vaccines->Date == NULL) Not Specified @else {{$vaccines->Date}} @endif</td>
                 <td class="tablessection3">@if($vaccines->Weight == NULL) Not Specified @else {{$vaccines->Weight}} @endif</td>

                 @endforeach
                </table>

                 



            <tr><table border="2" style="margin-left:340px; margin-top:15px">
            <tr><th class="tablessection3">Deworming</th>
                <th class="tablessection3">Brand</th>
                 <th class="tablessection3">Date</th>
                <th class="tablessection3">Weight(Kg)</th>

            @foreach($deworming as $dewormings)
        
            <tr><td class="tablessection3">
                 @if($dewormings->type == NULL) Not Specified @else {{$dewormings->type}} @endif</td> 


                 <td class="tablessection3"> 
                 @if($dewormings->Brand == NULL) Not Specified @else {{$dewormings->Brand}} @endif</td>

                 <td class="tablessection3">@if($dewormings->Date == NULL) Not Specified @else {{$dewormings->Date}} @endif</td>
                 <td class="tablessection3">@if($dewormings->Weight == NULL) Not Specified @else {{$dewormings->Weight}} @endif</td>

                 @endforeach

            </table>
        </table>
        </div>
        </section>



        <!--section 4 -->
        <section id="others">
        <div>
        <table border="2" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 1;border:1px solid; margin-bottom:15px; margin-top:15px">
            <tr style="border:1px solid"><td class="headersection3"><b>Annual Vaccin &Dewormin& Spot On</b></td></tr>
    
            <tr><table border="2">
            <tr><th colspan="6" class="headerparts">Annual Vaccin</th></tr>
            <tr><th class="tablessection3">Vaccin Type</th>
                <th class="tablessection3">Brand</th>
                 <th class="tablessection3">Date</th>
                <th class="tablessection3">Weight(Kg)</th>

                
                @foreach($annualvaccin as $annualvaccins)
       
                <tr><td class="tablessection3">
                 @if($annualvaccins->type == NULL) Not Specified @else {{$annualvaccins->type}} @endif</td> 


                 <td class="tablessection3"> 
                 @if($annualvaccins->Brand == NULL) Not Specified @else {{$annualvaccins->Brand}} @endif</td>

                 <td class="tablessection3">@if($annualvaccins->Date == NULL) Not Specified @else {{$annualvaccins->Date}} @endif</td>
                 <td class="tablessection3">@if($annualvaccins->Weight == NULL) Not Specified @else {{$annualvaccins->Weight}} @endif</td>

                 @endforeach
                </table>

                 


            <tr><table border="2" style="margin-left:340px; margin-top:15px">
            <tr><th colspan="6" class="headerparts">Trimesters Deworming</th></tr>
            <tr><th class="tablessection3">Deworming</th>
                <th class="tablessection3">Brand</th>
                 <th class="tablessection3">Date</th>
                <th class="tablessection3">Weight(Kg)</th>
           

            @foreach($tridewor as $tridewors)
             
            <tr><td class="tablessection3">
                 @if($tridewors->type == NULL) Not Specified @else {{$tridewors->type}} @endif</td> 


                 <td class="tablessection3"> 
                 @if($tridewors->Brand == NULL) Not Specified @else {{$tridewors->Brand}} @endif</td>

                 <td class="tablessection3">@if($tridewors->Date == NULL) Not Specified @else {{$tridewors->Date}} @endif</td>
                 <td class="tablessection3">@if($tridewors->Weight == NULL) Not Specified @else {{$tridewors->Weight}} @endif</td>

                 @endforeach

            </table>




            <tr><table border="2" style="margin-top:15px">
            <tr><th colspan="6" class="headerparts">Anti kystes</th></tr>
            <tr><th class="tablessection3">Spot On</th>
                <th class="tablessection3">Brand</th>
                 <th class="tablessection3">Date</th>
                <th class="tablessection3">Weight(Kg)</th>
        

            @foreach($kyste as $kystes)
         
            <tr><td class="tablessection3">
                 @if($kystes->Spot == NULL) Not Specified @else {{$kystes->Spot}} @endif</td> 


                 <td class="tablessection3"> 
                 @if($kystes->Brand == NULL) Not Specified @else {{$kystes->Brand}} @endif</td>

                 <td class="tablessection3">@if($kystes->Date == NULL) Not Specified @else {{$kystes->Date}} @endif</td>
                 <td class="tablessection3">@if($kystes->Weight == NULL) Not Specified @else {{$kystes->Weight}} @endif</td>

                 @endforeach

            </table>





            <tr><table border="2" style="margin-left:340px; margin-top:15px">
            <tr><th colspan="6" class="headerparts">Monthly Spot On</th></tr>
            <tr><th class="tablessection3">Spot On</th>
                <th class="tablessection3">Brand</th>
                 <th class="tablessection3">Date</th>
                <th class="tablessection3">Weight(Kg)</th>
              

            @foreach($monthly as $monthlys)
              
            <tr><td class="tablessection3">
                 @if($monthlys->Spot == NULL) Not Specified @else {{$monthlys->Spot}} @endif</td> 


                 <td class="tablessection3"> 
                 @if($monthlys->Brand == NULL) Not Specified @else {{$monthlys->Brand}} @endif</td>

                 <td class="tablessection3">@if($monthlys->Date == NULL) Not Specified @else {{$monthlys->Date}} @endif</td>
                 <td class="tablessection3">@if($monthlys->Weight == NULL) Not Specified @else {{$monthlys->Weight}} @endif</td>

                 @endforeach

            </table>
            
     			
</table>
        </div>
    </section>

        <!--section 5 -->
        <section id="previous">
        <table border="2" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 1;border:1px solid; margin-bottom:15px; margin-top:25px">
            <tr style="border:1px solid"><td class="headersection3"><b>Previous Medical History</b></td></tr>
          
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
            
            @foreach($previous as $previouses)
                
                 <tr><td class="tablessection3">@if($previouses->Date == NULL) Not Specified @else {{$previouses->Date}} @endif</td>
                 <td class="tablessection3">@if($previouses->Case == NULL) Not Specified @else {{$previouses->Case}} @endif</td>
                 <td class="tablessection3">@if($previouses->Procedure == NULL) Not Specified @else {{$previouses->Procedure}} @endif</td>
                 <td class="tablessection3">@if($previouses->Treatment == NULL) Not Specified @else {{$previouses->Treatment}} @endif</td>
                 <td class="tablessection3">@if($previouses->Weight == NULL) Not Specified @else {{$previouses->Weight}} @endif</td>
                 <td class="tablessection3">@if($previouses->Medications == NULL) Not Specified @else {{$previouses->Medications}} @endif</td>
                 <td class="tablessection3">@if($previouses->Dosage == NULL) Not Specified @else {{$previouses->Dosage}} @endif</td>
                 <td class="tablessection3">@if($previouses->Frequency == NULL) Not Specified @else {{$previouses->Frequency}} @endif</td>
                 <td class="tablessection3">@if($previouses->Notes == NULL) Not Specified @else {{$previouses->Notes}} @endif</td>

                 @endforeach
                
                
                </table>
</table>
</section>

<p>{{$previouses->Notes}}</p>

   
    

        <div class="field is-grouped">
            <div class="control">
           
            <a href="javascript:history.back()" class="btn btn-danger">Back</a>
            </div>
            
            
        </div>
</div>
@endsection