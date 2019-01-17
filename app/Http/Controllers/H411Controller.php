<?php

namespace App\Http\Controllers;

use Auth;
use App\PHI;
use App\User;
use App\H411;
use App\PHIInMOH;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class H411Controller extends Controller
{
    /**
     * Constructor
     */
    public function __construct(User $user ,PHI $pHI, PHIInMOH $pHIInMOH)
    {       
        $this->user = $user;
        $this->pHI = $pHI;
        $this->pHIInMOH = $pHIInMOH;
    }

    /**
     * Display MOH Area and MOH Reg No.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPHIRangeAndRegNo()
    {
        $pHIRange=$this->pHI->where('userId',Auth::user()->id)->first()->pHIRange;
        $pHIRegNo=$this->pHI->where('userId',Auth::user()->id)->first()->pHIRegNo;
        $mOHArea=$this->pHIInMOH->where('pHIRange',$pHIRange)->first()->mOHArea;
        return view('/form/h411', compact('pHIRange','pHIRegNo','mOHArea'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|regex:/^[A-Za-z\s-_]+$/|max:50',
            'lastName' => 'required|regex:/^[A-Za-z\s-_]+$/|max:50',
            'birthDate'  => 'required_without:birthYear',
            'birthYear'  => 'required_without:birthDate',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) { 
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $h411 = new H411;
            $h411->pHIRegNo=$request->pHIRegNo;
            $h411->pHIRange=$request->pHIRange;
            $h411->mOHNotifyNo=$request->mOHNotifyNo;
            $h411->mOHArea=$request->mOHArea;
            $h411->mOHRegNo=$request->mOHRegNo;
            if ($request->has('save')) $h411->status='draft';
            else if ($request->has('send')) $h411->status='sent';
            $h411->diseaseNotified=$request->diseaseNotified;
            $h411->dateNotified=$request->dateNotified;
            $h411->diseaseConfirmed=$request->diseaseConfirmed;
            $h411->dateConfirmed=$request->dateConfirmed;
            $h411->firstName=$request->firstName;
            $h411->lastName=$request->lastName;
            $h411->birthDate=$request->birthDate;
            $h411->birthYear=$request->birthYear;
            $h411->age=$request->age;            
            $h411->gender=$request->gender;            
            $h411->addLine1=$request->addLine1;     
            $h411->addLine2=$request->addLine2;
            $h411->gSDivName=$request->gSDivName;
            $h411->gSDiv=$request->gSDiv;     
            $h411->dSDiv=$request->dSDiv;     
            $h411->district=$request->district;     
            $h411->province=$request->province;     
            $h411->addMOHArea=$request->addMOHArea;     
            $h411->addPHIRange=$request->addPHIRange;
            $h411->ethnicGroup=$request->ethnicGroup;
            $h411->dateOnset=$request->dateOnset;
            $h411->dateHospitalisation=$request->dateHospitalisation;
            $h411->dateDischarge=$request->dateDischarge;
            $h411->hospitalName=$request->hospitalName;
            $h411->movement=$request->movement;
            $h411->outcome=$request->outcome;
            $h411->whereIsolated=$request->whereIsolated;
            $h411->labFinding=$request->labFinding;
            $h411->firstNameHousehold1=$request->firstNameHousehold1;
            $h411->lastNameHousehold1=$request->lastNameHousehold1;
            $h411->ageHousehold1=$request->ageHousehold1;
            $h411->dateSeenHousehold1=$request->dateSeenHousehold1;
            $h411->observationHousehold1=$request->observationHousehold1;
            $h411->firstNameHousehold2=$request->firstNameHousehold2;
            $h411->lastNameHousehold2=$request->lastNameHousehold2;
            $h411->ageHousehold2=$request->ageHousehold2;
            $h411->dateSeenHousehold2=$request->dateSeenHousehold2;
            $h411->observationHousehold2=$request->observationHousehold2;
            $h411->firstNameOther1=$request->firstNameOther1;
            $h411->lastNameOther1=$request->lastNameOther1;
            $h411->ageOther1=$request->ageOther1;
            $h411->dateSeenOther1=$request->dateSeenOther1;
            $h411->observationOther1=$request->observationOther1;
            $h411->firstNameOther2=$request->firstNameOther2;
            $h411->lastNameOther2=$request->lastNameOther2;
            $h411->ageOther2=$request->ageOther2;
            $h411->dateSeenOther2=$request->dateSeenOther2;
            $h411->observationOther2=$request->observationOther2;
            $h411->symptomsDevelopment=$request->symptomsDevelopment;
            $h411->treatmentType=$request->treatmentType;
            $h411->complications=$request->complications;
            $h411->infectionSource=$request->infectionSource;
            if ($request->has('sourceReduction')) $h411->sourceReduction='Yes';
            else $h411->sourceReduction='';
            if ($request->has('bioControl')) $h411->bioControl='Yes';
            else $h411->bioControl='';
            if ($request->has('habitatModification')) $h411->habitatModification='Yes';
            else $h411->habitatModification='';
            if ($request->has('otherControl')) $h411->otherControl='Yes';
            else $h411->otherControl='';
            if ($request->has('removeGabage')) $h411->removeGabage='Yes';
            else $h411->removeGabage='';
            if ($request->has('removeWaterStore')) $h411->removeWaterStore='Yes';
            else $h411->removeWaterStore='';
            if ($request->has('useMosquitoNet')) $h411->useMosquitoNet='Yes';
            else $h411->useMosquitoNet='';
            if ($request->has('useInsectRepellent')) $h411->useInsectRepellent='Yes';
            else $h411->useInsectRepellent='';
            if ($request->has('otherPrevent')) $h411->otherPrevent='Yes';
            else $h411->otherPrevent='';
            $h411->followUp=$request->followUp;
            $h411->save();

            if ($request->has('save')) return redirect("pHIHome")->with('success', 'Data has been saved successfully!');
            if ($request->has('send')) return redirect("pHIHome")->with('success', 'Data has been sent successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $h411Data = H411::where('h411s.h411RecordId', $id)
                    ->select('h411s.*')
                    ->first();
        return view('/form/h411Edit', compact('h411Data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $h411Data = H411::where('h411s.h411RecordId', $id)
                    ->select('h411s.*')
                    ->first();
        return view('/form/h411Edit', compact('h411Data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) { 
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $h411 = H411::where('h411s.h411RecordId', $id)->first();

            $h411->pHIRegNo=$request->pHIRegNo;
            $h411->pHIRange=$request->pHIRange;
            $h411->mOHNotifyNo=$request->mOHNotifyNo;
            $h411->mOHArea=$request->mOHArea;
            $h411->mOHRegNo=$request->mOHRegNo;
            if ($request->has('save')) $h411->status='draft';
            else if ($request->has('send')) $h411->status='sent';
            $h411->diseaseNotified=$request->diseaseNotified;
            $h411->dateNotified=$request->dateNotified;
            $h411->diseaseConfirmed=$request->diseaseConfirmed;
            $h411->dateConfirmed=$request->dateConfirmed;
            $h411->firstName=$request->firstName;
            $h411->lastName=$request->lastName;
            $h411->birthDate=$request->birthDate;
            $h411->birthYear=$request->birthYear;
            $h411->age=$request->age;            
            $h411->gender=$request->gender;            
            $h411->addLine1=$request->addLine1;     
            $h411->addLine2=$request->addLine2;
            $h411->gSDivName=$request->gSDivName;
            $h411->gSDiv=$request->gSDiv;     
            $h411->dSDiv=$request->dSDiv;     
            $h411->district=$request->district;     
            $h411->province=$request->province;     
            $h411->addMOHArea=$request->addMOHArea;     
            $h411->addPHIRange=$request->addPHIRange;
            $h411->ethnicGroup=$request->ethnicGroup;
            $h411->dateOnset=$request->dateOnset;
            $h411->dateHospitalisation=$request->dateHospitalisation;
            $h411->dateDischarge=$request->dateDischarge;
            $h411->hospitalName=$request->hospitalName;
            $h411->movement=$request->movement;
            $h411->outcome=$request->outcome;
            $h411->whereIsolated=$request->whereIsolated;
            $h411->labFinding=$request->labFinding;
            $h411->firstNameHousehold1=$request->firstNameHousehold1;
            $h411->lastNameHousehold1=$request->lastNameHousehold1;
            $h411->ageHousehold1=$request->ageHousehold1;
            $h411->dateSeenHousehold1=$request->dateSeenHousehold1;
            $h411->observationHousehold1=$request->observationHousehold1;
            $h411->firstNameHousehold2=$request->firstNameHousehold2;
            $h411->lastNameHousehold2=$request->lastNameHousehold2;
            $h411->ageHousehold2=$request->ageHousehold2;
            $h411->dateSeenHousehold2=$request->dateSeenHousehold2;
            $h411->observationHousehold2=$request->observationHousehold2;
            $h411->firstNameOther1=$request->firstNameOther1;
            $h411->lastNameOther1=$request->lastNameOther1;
            $h411->ageOther1=$request->ageOther1;
            $h411->dateSeenOther1=$request->dateSeenOther1;
            $h411->observationOther1=$request->observationOther1;
            $h411->firstNameOther2=$request->firstNameOther2;
            $h411->lastNameOther2=$request->lastNameOther2;
            $h411->ageOther2=$request->ageOther2;
            $h411->dateSeenOther2=$request->dateSeenOther2;
            $h411->observationOther2=$request->observationOther2;
            $h411->symptomsDevelopment=$request->symptomsDevelopment;
            $h411->treatmentType=$request->treatmentType;
            $h411->complications=$request->complications;
            $h411->infectionSource=$request->infectionSource;
            if ($request->has('sourceReduction')) $h411->sourceReduction='Yes';
            else $h411->sourceReduction='';
            if ($request->has('bioControl')) $h411->bioControl='Yes';
            else $h411->bioControl='';
            if ($request->has('habitatModification')) $h411->habitatModification='Yes';
            else $h411->habitatModification='';
            if ($request->has('otherControl')) $h411->otherControl='Yes';
            else $h411->otherControl='';
            if ($request->has('removeGabage')) $h411->removeGabage='Yes';
            else $h411->removeGabage='';
            if ($request->has('removeWaterStore')) $h411->removeWaterStore='Yes';
            else $h411->removeWaterStore='';
            if ($request->has('useMosquitoNet')) $h411->useMosquitoNet='Yes';
            else $h411->useMosquitoNet='';
            if ($request->has('useInsectRepellent')) $h411->useInsectRepellent='Yes';
            else $h411->useInsectRepellent='';
            if ($request->has('otherPrevent')) $h411->otherPrevent='Yes';
            else $h411->otherPrevent='';
            $h411->followUp=$request->followUp;
            $h411->save();

            if ($request->has('save')) return redirect("pHIHome")->with('success', 'Data has been updated successfully!');
            if ($request->has('send')) return redirect("pHIHome")->with('success', 'Data has been sent successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $h411 = H411::where('h411s.h411RecordId', $id)->delete();
        return redirect("pHIHome")->with('success', 'Entry has been deleted!');
    }
}
