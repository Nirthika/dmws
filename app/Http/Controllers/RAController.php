<?php

namespace App\Http\Controllers;

use Auth;
use App\RA;
use App\User;
use App\Patient;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Notification::where('notifications.insName', 'Jaffna Teaching Hospital')
                    ->join('patients', 'patients.paId', '=', 'notifications.paId')
                    ->select('patients.*', 'notifications.*')
                    ->get();
        return view('labResults', compact('patients'));
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
            'addLine1' => 'required|string|max:50',
            'addLine2' => 'nullable|string|max:50',
            'district' => 'required|string|max:50',
            'province' => 'required|string|max:50',
            'areaCode' => 'required|digits:3',
            'phoneNo' => 'required|digits:7',
            'phoneMobile' => 'required|digits:10',
            'insName' => 'required|string|max:60',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rA');
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
            $rA = new RA;
            $rA->userId=Auth::user()->id;
            $rA->firstName=$request->firstName;
            $rA->lastName=$request->lastName;
            $rA->gender=$request->gender;
            $rA->addLine1=$request->addLine1;
            $rA->addLine2=$request->addLine2;
            $rA->district=$request->district;
            $rA->province=$request->province;
            $rA->contactNoOffice=$request->areaCode.$request->phoneNo;
            $rA->contactNoMobile=$request->phoneMobile;
            $rA->insName=$request->insName;     
            $rA->save();  

            $user->where('id', '=', $rA->userId)->update(array('status' => 'yes'));
            
            return redirect("labResults");
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
