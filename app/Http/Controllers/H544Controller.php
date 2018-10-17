<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Patient;
use App\Notification;
use App\Doctor;
use App\User;
use Auth;

class H544Controller extends Controller
{
    /**
     * Constructor
     */
    public function __construct(User $user ,Doctor $doctor)
    {       
        $this->user = $user;
        $this->doctor = $doctor;       
    }

    /**
     * Display designation.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDesignation()
    {
        $designation=$this->doctor->where('userId',Auth::user()->id)->first()->designation;
        return view('/form/h544', compact('designation'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|regex:/^[A-Za-z\s-_]+$/|max:50',
            'lastName' => 'required|regex:/^[A-Za-z\s-_]+$/|max:50',
            'nickName' => 'nullable|regex:/^[A-Za-z\s-_]+$/|max:50', 
            'areaCode' => 'required|digits:3',
            'phoneNo' => 'required|digits:7',
            'phoneMobile' => 'required|digits:10',
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
            $patient = new Patient;
            $patient->userId=Auth::user()->id;
            if (($request->institute) == 'Government'){
                $patient->insName=$request->govHospital;
            } else {
                $patient->insName=$request->pvtHospital;
            }
            $patient->firstName=$request->firstName;
            $patient->lastName=$request->lastName;
            $patient->nickName=$request->nickName;
            $patient->gender=$request->gender;
            $patient->visitArea=$request->visitArea; 
            $patient->birthYear=$request->birthYear;
            $patient->birthDate=$request->birthDate;
            $patient->age=$request->age;
            $patient->nextOfKinFirstName=$request->nextOfKinFirstName;     
            $patient->nextOfKinLastName=$request->nextOfKinLastName;     
            $patient->childGuardian=$request->childGuardian;     
            $patient->childGuardianFirstName=$request->childGuardianFirstName;     
            $patient->childGuardianLastName=$request->childGuardianLastName;  
            $patient->resAddLine1=$request->resAddLine1;     
            $patient->resAddLine2=$request->resAddLine2;     
            $patient->resGSDivName=$request->resGSDivName;     
            $patient->resGSDiv=$request->resGSDiv;     
            $patient->resDSDiv=$request->resDSDiv;     
            $patient->resDistrict=$request->resDistrict;     
            $patient->resProvince=$request->resProvince;     
            $patient->resMOHArea=$request->resMOHArea;     
            $patient->resPHIRange=$request->resPHIRange;     
            $patient->resLandmark=$request->resLandmark; 
            if ($request->has('sameAddress')) {
                $patient->curAddLine1=$request->resAddLine1;     
                $patient->curAddLine2=$request->resAddLine2;     
                $patient->curGSDivName=$request->resGSDivName;     
                $patient->curGSDiv=$request->resGSDiv;     
                $patient->curDSDiv=$request->resDSDiv;     
                $patient->curDistrict=$request->resDistrict;     
                $patient->curProvince=$request->resProvince;     
                $patient->curMOHArea=$request->resMOHArea;     
                $patient->curPHIRange=$request->resPHIRange;     
                $patient->curLandmark=$request->resLandmark;
            } else {
                $patient->curAddLine1=$request->curAddLine1;     
                $patient->curAddLine2=$request->curAddLine2;     
                $patient->curGSDivName=$request->curGSDivName;     
                $patient->curGSDiv=$request->curGSDiv;     
                $patient->curDSDiv=$request->curDSDiv;     
                $patient->curDistrict=$request->curDistrict;     
                $patient->curProvince=$request->curProvince;     
                $patient->curMOHArea=$request->curMOHArea;     
                $patient->curPHIRange=$request->curPHIRange;     
                $patient->curLandmark=$request->curLandmark;
            }                  
            $patient->contactNoMobile=$request->phoneMobile;     
            $patient->contactNoHome=$request->areaCode.$request->phoneNo;     
            $patient->save();


            $notification = new Notification;
            $notification->userId=Auth::user()->id;
            if (($request->institute) == 'Government'){
                $notification->insName=$request->govHospital;
            } else {
                $notification->insName=$request->pvtHospital;
            }
            $notification->paId=$patient->id;
            $notification->diseaseGroup=$request->diseaseGroup;
            if (($request->diseaseGroup) == 'Group A'){
                $notification->diseaseName=$request->diseaseGroupA;
            } else {
                $notification->diseaseName=$request->diseaseGroupB;
            }
            $notification->onsetDate=$request->onsetDate;
            $notification->admissionDate=$request->admissionDate;
            $notification->regOrBHTNo=$request->regOrBHTNo;
            $notification->ward=$request->ward;
            if ($request->has('ns1')) $notification->ns1='yes'; else $notification->ns1='';
            if ($request->has('igm')) $notification->igm='yes'; else $notification->igm='';
            if ($request->has('igg')) $notification->igg='yes'; else $notification->igg='';
            $notification->designation=$request->designation;
            $notification->save();

            return redirect("home");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
