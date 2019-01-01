<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\H411a;
use App\User;
use App\MOH;
use Auth;

class H411aController extends Controller
{
    /**
     * Constructor
     */
    public function __construct(User $user ,MOH $mOH)
    {       
        $this->user = $user;
        $this->mOH = $mOH;       
    }

    /**
     * Display MOH Area and MOH Reg No.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMOHAreaAndRegNo()
    {
        $mOHArea=$this->mOH->where('userId',Auth::user()->id)->first()->mOHArea;
        $mOHRegNo=$this->mOH->where('userId',Auth::user()->id)->first()->mOHRegNo;
        return view('/form/h411a', compact('mOHArea','mOHRegNo'));
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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'occupation' => 'required|regex:/^[A-Za-z\s-_]+$/|max:50',
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
            $h411a = new H411a;
            $h411a->rDHSDiv=$request->rDHSDiv;
            $h411a->mOHArea=$request->mOHArea;
            $h411a->mOHRegNo=$request->mOHRegNo;
            if ($request->has('save')) $h411a->status='draft';
            if ($request->has('send')) $h411a->status='sent';
            $h411a->notifiedDisease=$request->notifiedDisease;
            $h411a->notificationDate=$request->notificationDate;
            $h411a->confirmedDisease=$request->confirmedDisease;
            $h411a->confirmationDate=$request->confirmationDate;
            $h411a->birthDate=$request->birthDate;
            $h411a->birthYear=$request->birthYear;
            $h411a->age=$request->age;
            $h411a->gender=$request->gender;
            $h411a->confirmedBy=$request->confirmedBy;
            $h411a->occupation=$request->occupation;
            $h411a->sourceOfNotify=$request->sourceOfNotify;
            $h411a->natureOfConf=$request->natureOfConf;
            $h411a->officeUseOnly=$request->officeUseOnly;
            if (($request->sourceOfNotify) == 'Other Source'){
                $h411a->specify=$request->specify;
            } else {
                $h411a->specify="";
            }   
            $h411a->save();

            if ($request->has('save')) return redirect("mOHHome")->with('success', 'Data has been saved successfully!');
            if ($request->has('send')) return redirect("mOHHome")->with('success', 'Data has been sent successfully!');
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
