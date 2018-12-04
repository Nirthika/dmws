<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Doctor;
use App\Patient;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $draftNotifications = Notification::where('notifications.userId', Auth::user()->id)
                    ->where('notifications.status', 'draft')
                    ->join('patients', 'patients.paId', '=', 'notifications.paId')
                    ->select('patients.*', 'notifications.*')
                    ->get();

        $sentNotifications = Notification::where('notifications.userId', Auth::user()->id)
                    ->where('notifications.status', 'sent')
                    ->join('patients', 'patients.paId', '=', 'notifications.paId')
                    ->select('patients.*', 'notifications.*')
                    ->get();

        return view('doctorHome', compact('draftNotifications', 'sentNotifications'));
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
            'gender' => 'required|string|max:8',
            'doctorRegNo' => 'required|string|max:10|unique:doctors',
            'designation' => 'required|string|max:35',
            'addLine1' => 'required|string|max:50',
            'addLine2' => 'nullable|string|max:50',
            'district' => 'required|string|max:50',
            'province' => 'required|string|max:50',
            'areaCode' => 'required|digits:3',
            'phoneNo' => 'required|digits:7',
            'phoneMobile' => 'required|digits:10',
            'hospital11' => 'nullable|string|max:35',
            'hospital12' => 'nullable|string|max:35',
            'hospital2' => 'nullable|string|max:35',
            'hospital3' => 'nullable|string|max:35',
            'hospital4' => 'nullable|string|max:35',
            'hospital5' => 'nullable|string|max:35',
            'otherHospital' => 'nullable|string|max:35',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) { 
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $doctor=new Doctor;
            $doctor->userId=Auth::user()->id;
            $doctor->firstName=$request->firstName;
            $doctor->lastName=$request->lastName;
            $doctor->gender=$request->gender;
            $doctor->doctorRegNo=$request->doctorRegNo;
            $doctor->designation=$request->designation;
            $doctor->addLine1=$request->addLine1;
            $doctor->addLine2=$request->addLine2;
            $doctor->district=$request->district;
            $doctor->province=$request->province;
            $doctor->contactNoOffice=$request->areaCode.$request->phoneNo;
            $doctor->contactNoMobile=$request->phoneMobile;
            if ($request->has('otherNew')){
                $doctor->hospital1=$request->hospital12;
            } else {
                $doctor->hospital1=$request->hospital11;
            }
            $doctor->hospital2=$request->hospital2;     
            $doctor->hospital3=$request->hospital3;     
            $doctor->hospital4=$request->hospital4;     
            $doctor->hospital5=$request->hospital5;     
            $doctor->otherHospital=$request->otherHospital;     
            $doctor->save();  

            $user->where('id', '=', $doctor->userId)->update(array('status' => 'yes'));
            
            return redirect("doctorHome");
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
