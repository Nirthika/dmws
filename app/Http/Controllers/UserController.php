<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\EU;
use App\PI;
use App\RA;
use App\MOH;
use App\PHI;
use App\RDHS;
use App\User;
use App\Doctor;
use App\Patient;
use App\FieldSurvey;
use App\Notification;
use App\GSDivInDSDiv;
use App\LabTechnician;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOfficersDetails()
    {
        $doctorData = Doctor::where('users.status', 'yes')
                    ->join('users', 'users.id', '=', 'doctors.userId')
                    ->select('users.*', 'doctors.*')
                    ->get();
        $mOHData = MOH::where('users.status', 'yes')
                    ->join('users', 'users.id', '=', 'mOHs.userId')
                    ->select('users.*', 'mOHs.*')
                    ->get();
        $pHIData = PHI::where('users.status', 'yes')
                    ->join('users', 'users.id', '=', 'pHIs.userId')
                    ->select('users.*', 'pHIs.*')
                    ->get();
        $rDHSData = RDHS::where('users.status', 'yes')
                    ->join('users', 'users.id', '=', 'rDHSes.userId')
                    ->select('users.*', 'rDHSes.*')
                    ->get();
        $eUData = EU::where('users.status', 'yes')
                    ->join('users', 'users.id', '=', 'eUs.userId')
                    ->select('users.*', 'eUs.*')
                    ->get();
        $pIData = PI::where('users.status', 'yes')
                    ->join('users', 'users.id', '=', 'pIs.userId')
                    ->select('users.*', 'pIs.*')
                    ->get();
        $lTData = LabTechnician::where('users.status', 'yes')
                    ->join('users', 'users.id', '=', 'labTechnicians.userId')
                    ->select('users.*', 'labTechnicians.*')
                    ->get();
        $rAData = RA::where('users.status', 'yes')
                    ->join('users', 'users.id', '=', 'rAs.userId')
                    ->select('users.*', 'rAs.*')
                    ->get();

        return view('officers', compact('doctorData', 'mOHData', 'pHIData', 'rDHSData', 'eUData', 'pIData', 'rAData', 'lTData'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDetails()
    {
        $from = today()->toDateString();
        $to = today()->toDateString();

        $onsetDates = Notification::select('notifications.onsetDate')
                    ->get();

        $paIds = Notification::where('notifications.onsetDate', '>=', $from)
                    ->where('notifications.onsetDate', '<=', $to)
                    ->select('notifications.paId')
                    ->get();

        $latitude = array();
        $longitude = array();
        $gSDivName = array();

        for ($i = 0; $i < count($paIds); $i++) {  
            $curGSDiv = Patient::where('paId',$paIds[$i]->paId)->first()->curGSDiv;
            $curGSDivName = Patient::where('paId',$paIds[$i]->paId)->first()->curGSDivName;
            array_push($gSDivName, $curGSDivName);
            $lat = GSDivInDSDiv::where('gSDivInDSDivs.gSDiv', $curGSDiv)->first()->latitude;               
            array_push($latitude, $lat);
            $lng = GSDivInDSDiv::where('gSDivInDSDivs.gSDiv', $curGSDiv)->first()->longitude;
            array_push($longitude, $lng);
        }

        $results = FieldSurvey::select('fieldSurveys.*')->get();

        return view('monitoring', compact('from', 'to', 'latitude', 'longitude', 'gSDivName', 'results'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getMapCoordinates(Request $request)
    {
        $from=$request->from;
        $to=$request->to;


        $onsetDates = Notification::select('notifications.onsetDate')
                    ->get();

        $paIds = Notification::where('notifications.onsetDate', '>=', $from)
                    ->where('notifications.onsetDate', '<=', $to)
                    ->select('notifications.paId')
                    ->get();

        $latitude = array();
        $longitude = array();
        $gSDivName = array();

        for ($i = 0; $i < count($paIds); $i++) {  
            $curGSDiv = Patient::where('paId',$paIds[$i]->paId)->first()->curGSDiv;
            $curGSDivName = Patient::where('paId',$paIds[$i]->paId)->first()->curGSDivName;
            array_push($gSDivName, $curGSDivName);
            $lat = GSDivInDSDiv::where('gSDivInDSDivs.gSDiv', $curGSDiv)->first()->latitude;               
            array_push($latitude, $lat);
            $lng = GSDivInDSDiv::where('gSDivInDSDivs.gSDiv', $curGSDiv)->first()->longitude;
            array_push($longitude, $lng);
        }

        $results = FieldSurvey::select('fieldSurveys.*')->get();
        
        return view('monitoring', compact('from', 'to', 'latitude', 'longitude', 'gSDivName', 'results'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $doctor = Doctor::where('userId', $user->id)->first();
        $pHI = PHI::where('userId', $user->id)->first();
        $mOH = MOH::where('userId', $user->id)->first();
        $eU = EU::where('userId', $user->id)->first();
        $rDHS = RDHS::where('userId', $user->id)->first();
        $pI = PI::where('userId', $user->id)->first();
        $rA = RA::where('userId', $user->id)->first();
        $lT = LabTechnician::where('userId', $user->id)->first();

        if ($user->status == 'yes'){
            if ($user->userType == 'Doctor'){
                $firstName = $doctor->firstName;
                $lastName = $doctor->lastName;
                $gender = $doctor->gender;
                $addLine1 = $doctor->addLine1;
                $addLine2 = $doctor->addLine2;
                $province = $doctor->province;
                $district = $doctor->district;
                $contactNoOffice = $doctor->contactNoOffice;
                $contactNoMobile = $doctor->contactNoMobile;
            } else if ($user->userType == 'PHI'){
                $firstName = $pHI->firstName;
                $lastName = $pHI->lastName;
                $gender = $pHI->gender;
                $addLine1 = $pHI->addLine1;
                $addLine2 = $pHI->addLine2;
                $province = $pHI->province;
                $district = $pHI->district;
                $contactNoOffice = $pHI->contactNoOffice;
                $contactNoMobile = $pHI->contactNoMobile;
            } else if ($user->userType == 'MOH'){
                $firstName = $mOH->firstName;
                $lastName = $mOH->lastName;
                $gender = $mOH->gender;
                $addLine1 = $mOH->addLine1;
                $addLine2 = $mOH->addLine2;
                $province = $mOH->province;
                $district = $mOH->district;
                $contactNoOffice = $mOH->contactNoOffice;
                $contactNoMobile = $mOH->contactNoMobile;
            } else if ($user->userType == 'RDHS'){
                $firstName = $rDHS->firstName;
                $lastName = $rDHS->lastName;
                $gender = $rDHS->gender;
                $addLine1 = $rDHS->addLine1;
                $addLine2 = $rDHS->addLine2;
                $province = $rDHS->province;
                $district = $rDHS->district;
                $contactNoOffice = $rDHS->contactNoOffice;
                $contactNoMobile = $rDHS->contactNoMobile;
            } else if ($user->userType == 'EU'){
                $firstName = $eU->firstName;
                $lastName = $eU->lastName;
                $gender = $eU->gender;
                $addLine1 = $eU->addLine1;
                $addLine2 = $eU->addLine2;
                $province = $eU->province;
                $district = $eU->district;
                $contactNoOffice = $eU->contactNoOffice;
                $contactNoMobile = $eU->contactNoMobile;
            } else if ($user->userType == 'Principal Investigator'){
                $firstName = $pI->firstName;
                $lastName = $pI->lastName;
                $gender = $pI->gender;
                $addLine1 = $pI->addLine1;
                $addLine2 = $pI->addLine2;
                $province = $pI->province;
                $district = $pI->district;
                $contactNoOffice = $pI->contactNoOffice;
                $contactNoMobile = $pI->contactNoMobile;
            } else if ($user->userType == 'Laboratory Technician'){
                $firstName = $lT->firstName;
                $lastName = $lT->lastName;
                $gender = $lT->gender;
                $addLine1 = $lT->addLine1;
                $addLine2 = $lT->addLine2;
                $province = $lT->province;
                $district = $lT->district;
                $contactNoOffice = $lT->contactNoOffice;
                $contactNoMobile = $lT->contactNoMobile;
            } else if ($user->userType == 'Research Assistant'){
                $firstName = $rA->firstName;
                $lastName = $rA->lastName;
                $gender = $rA->gender;
                $addLine1 = $rA->addLine1;
                $addLine2 = $rA->addLine2;
                $province = $rA->province;
                $district = $rA->district;
                $contactNoOffice = $rA->contactNoOffice;
                $contactNoMobile = $rA->contactNoMobile;
            }
            return view('profile', compact('user', 'firstName', 'lastName', 'gender', 'addLine1', 'addLine2', 'province', 'district', 'contactNoOffice', 'contactNoMobile', 'doctor', 'pHI', 'mOH', 'rDHS', 'eU', 'pI', 'rA', 'lT'));
        } else {
            return view('profile', compact('user'));
        }
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
        //
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
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword',
        ]);
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
        $user = User::find($id);

        if($request->has('editUserDetails')){
            $this->validate($request,[
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(200, 250)->save( public_path('/uploads/avatars/' . $filename ) );
                $user->avatar = $filename;
            }
        }
        
        if($request->has('resetPassword')){
            $validator = $this->validator($request->all());
            // dd($validator);
            if ($validator->fails()) { 
                // return redirect()->back()->withErrors($validator)->withInput();
                return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            } else if (!(Hash::check($request->currentPassword, Auth::User()->password))) {           
                $error = array('Current Password' => 'Please enter correct current password');
                return response()->json(array('error' => $error), 400); 
                // return redirect()->back()->withErrors($error)->withInput();  
            } else if (strcmp($request->currentPassword, $request->newPassword) == 0) {
                //Current password and new password are same
                $error = array('New Password' => 'New Password cannot be same as your current password. Please choose a different password.');
                return response()->json(array('error' => $error), 400);                        
            }                    
            $user->password = Hash::make($request->newPassword);
        }
        $user->save();

        if($request->has('editDetails')){

        }        
        return redirect()->back()->with("success","Changed successfully!");
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
