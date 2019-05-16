<?php

namespace App\Http\Controllers;

use Auth;
use App\MOH;
use App\User;
use App\H399;
use App\H411;
use App\H411a;
use App\Patient;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MOHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mOHRegNo = MOH::where('mOHs.userId', Auth::user()->id)->first()->mOHRegNo;

        $draftH411as = H411a::where('h411as.mOHRegNo', $mOHRegNo)
                    ->where('h411as.status', 'draft')
                    ->select('h411as.*')
                    ->get();

        $sentH411as = H411a::where('h411as.mOHRegNo', $mOHRegNo)
                    ->where('h411as.status', 'sent')
                    ->select('h411as.*')
                    ->get();

        $mOHArea = MOH::where('mOHs.userId', Auth::user()->id)->first()->mOHArea;

        $draftH399s = H399::where('h399s.mOHArea', $mOHArea)
                    ->where('h399s.status', 'draft')
                    ->select('h399s.*')
                    ->get();

        $sentH399s = H399::where('h399s.mOHArea', $mOHArea)
                    ->where('h399s.status', 'sent')
                    ->select('h399s.*')
                    ->get();

        $receivedH544s = Notification::where('notifications.status', 'sent')
                    ->join('patients', 'patients.paId', '=', 'notifications.paId')
                    ->select('patients.*', 'notifications.*')
                    ->get();
        
        $receivedH411s = H411::where('h411s.mOHArea', $mOHArea)
                    ->where('h411s.status', 'sent')
                    ->select('h411s.*')
                    ->get();

        return view('mOHHome', compact('mOHArea', 'draftH411as', 'sentH411as', 'draftH399s', 'sentH399s', 'receivedH544s', 'receivedH411s'));
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
            'mOHRegNo' => 'required|string|max:10|unique:mOHs',
            'mOHArea' => 'required|string|max:50',
            'addLine1' => 'required|string|max:50',
            'addLine2' => 'nullable|string|max:50',
            'district' => 'required|string|max:50',
            'province' => 'required|string|max:50',
            'areaCode' => 'required|digits:3',
            'phoneNo' => 'required|digits:7',
            'phoneMobile' => 'required|digits:10',
            'insName' => 'required|string|max:50',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mOH');
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
            $mOH = new MOH;
            $mOH->userId=Auth::user()->id;
            $mOH->firstName=$request->firstName;
            $mOH->lastName=$request->lastName;
            $mOH->gender=$request->gender;
            $mOH->mOHRegNo=$request->mOHRegNo;
            $mOH->mOHArea=$request->mOHArea;
            $mOH->addLine1=$request->addLine1;
            $mOH->addLine2=$request->addLine2;
            $mOH->district=$request->district;
            $mOH->province=$request->province;
            $mOH->contactNoOffice=$request->areaCode.$request->phoneNo;
            $mOH->contactNoMobile=$request->phoneMobile;
            $mOH->insName=$request->insName;     
            $mOH->save();  

            $user->where('id', '=', $mOH->userId)->update(array('status' => 'yes'));
            
            return redirect("mOHHome");
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
