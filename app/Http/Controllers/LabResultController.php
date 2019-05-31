<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Patient;
use App\LabResult;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LabResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Notification::where('notifications.insName', 'Jaffna Teaching Hospital')
                    ->where('notifications.mMERLTest', 'no')
                    ->where('notifications.status', 'sent')
                    ->join('patients', 'patients.paId', '=', 'notifications.paId')
                    ->select('patients.*', 'notifications.*')
                    ->get();
        $user = Auth::user();
        $userType = $user->userType;

        return view('labResults', compact('patients', 'userType'));
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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Notification $notification)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) { 
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $labResult = new LabResult;
            $labResult->admissionDate=$request->admissionDate;
            $labResult->bHTNo=$request->bHTNo;
            $labResult->paId=$request->paId;
            $labResult->firstName=$request->firstName;
            $labResult->lastName=$request->lastName;
            $labResult->curAddLine1=$request->curAddLine1;
            $labResult->curAddLine2=$request->curAddLine2;
            $labResult->curGSDivName=$request->curGSDivName;
            $labResult->curGSDiv=$request->curGSDiv;
            $labResult->curDSDiv=$request->curDSDiv;
            $labResult->curDistrict=$request->curDistrict;
            $labResult->curProvince=$request->curProvince;
            $labResult->curMOHArea=$request->curMOHArea;
            $labResult->curPHIRange=$request->curPHIRange;
            if ($request->has('ns1')) $labResult->ns1=$request->ns1; else $labResult->ns1=null;
            if ($request->has('igm')) $labResult->igm=$request->igm; else $labResult->igm=null;
            if ($request->has('igg')) $labResult->igg=$request->igg; else $labResult->igg=null;
            if ($request->has('denv1')) $labResult->denv1='Yes'; else $labResult->denv1='';
            if ($request->has('denv2')) $labResult->denv2='Yes'; else $labResult->denv2='';
            if ($request->has('denv3')) $labResult->denv3='Yes'; else $labResult->denv3='';
            if ($request->has('denv4')) $labResult->denv4='Yes'; else $labResult->denv4='';           
            $labResult->save();

            $notification->where('regOrBHTNo', '=', $labResult->bHTNo)->update(array('mMERLTest' => 'yes'));

            return redirect("labResults")->with('success', 'Data has been saved successfully!');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLabResultsSummary()
    {
        $results = LabResult::select('labResults.*')->get();        
        if (Auth::user() == NULL) $userType = '';
        else $userType = Auth::user()->userType;
        return view('labResultsSummary', compact('results', 'userType'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDeatailsForLabTestGraph()
    {
        $denvData = LabResult::select('labResults.admissionDate', 'labResults.denv1', 'labResults.denv2', 'labResults.denv3', 'labResults.denv4')
                    ->get();
        return view('labTest', compact('denvData'));
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
        $result = LabResult::where('labResults.id', $id)
                    ->select('labResults.*')
                    ->first();
        $userType = Auth::user()->userType;
        return view('labResultsEdit', compact('result', 'userType'));
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
        $labResult = LabResult::where('labResults.id', $id)->first();
        $labResult->admissionDate=$request->admissionDate;
        $labResult->bHTNo=$request->bHTNo;            
        if ($request->has('ns1')) $labResult->ns1=$request->ns1; else $labResult->ns1=null;
        if ($request->has('igm')) $labResult->igm=$request->igm; else $labResult->igm=null;
        if ($request->has('igg')) $labResult->igg=$request->igg; else $labResult->igg=null;
        if ($request->has('denv1')) $labResult->denv1='Yes'; else $labResult->denv1='';
        if ($request->has('denv2')) $labResult->denv2='Yes'; else $labResult->denv2='';
        if ($request->has('denv3')) $labResult->denv3='Yes'; else $labResult->denv3='';
        if ($request->has('denv4')) $labResult->denv4='Yes'; else $labResult->denv4='';           
        $labResult->save();
        return redirect("labResultsSummary")->with('success', 'Data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Notification $notification)
    {
        $bHTNo = LabResult::where('labResults.id', $id)->first()->bHTNo;
        $notification->where('regOrBHTNo', '=', $bHTNo)->update(array('mMERLTest' => 'no'));
        $result = LabResult::where('labResults.id', $id)->delete();
        return redirect("labResultsSummary")->with('success', 'Entry has been deleted!');
    }
}
