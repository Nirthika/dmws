<?php

namespace App\Http\Controllers;

use Auth;
use App\PHI;
use App\User;
use App\H411;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PHIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pHIRegNo = PHI::where('pHIs.userId', Auth::user()->id)->first()->pHIRegNo;

        $draftH411s = H411::where('h411s.pHIRegNo', $pHIRegNo)
                    ->where('h411s.status', 'draft')
                    ->select('h411s.*')
                    ->get();

        $sentH411s = H411::where('h411s.pHIRegNo', $pHIRegNo)
                    ->where('h411s.status', 'sent')
                    ->select('h411s.*')
                    ->get();

        return view('pHIHome', compact('draftH411s', 'sentH411s'));
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
            'pHIRegNo' => 'required|string|max:10|unique:pHIs',
            'pHIRange' => 'required|string|max:50',
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
        return view('pHI');
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
            $pHI = new PHI;
            $pHI->userId=Auth::user()->id;
            $pHI->firstName=$request->firstName;
            $pHI->lastName=$request->lastName;
            $pHI->gender=$request->gender;
            $pHI->pHIRegNo=$request->pHIRegNo;
            $pHI->pHIRange=$request->pHIRange;
            $pHI->addLine1=$request->addLine1;
            $pHI->addLine2=$request->addLine2;
            $pHI->district=$request->district;
            $pHI->province=$request->province;
            $pHI->contactNoOffice=$request->areaCode.$request->phoneNo;
            $pHI->contactNoMobile=$request->phoneMobile;
            $pHI->insName=$request->insName;     
            $pHI->save();  

            $user->where('id', '=', $pHI->userId)->update(array('status' => 'yes'));
            
            return redirect("pHIHome");
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
