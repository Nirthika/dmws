<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\FieldSurvey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FieldSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userType = $user->userType;
        return view('fieldSurvey', compact('userType'));
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
        $field = new FieldSurvey;
        $field->month=$request->month;
        $field->year=$request->year;
        $field->visitArea=$request->visitArea;
        $field->waterTank=$request->waterTank;
        $field->bottle=$request->bottle;
        $field->teaCup=$request->teaCup;
        $field->coconutShell=$request->coconutShell;
        $field->flowerPot=$request->flowerPot;
        $field->yoghurtCup=$request->yoghurtCup;
        $field->petWaterSource=$request->petWaterSource;
        $field->fridgeWasteWaterContainer=$request->fridgeWasteWaterContainer;
        $field->other=$request->other;
        $field->totalContainer=$request->totalContainer;
        $field->larvaPositive=$request->larvaPositive;
        $field->containerIndex=$request->containerIndex;
        if ($request->has('aegypti')) $field->aegypti='Yes'; else $field->aegypti='No';         
        if ($request->has('albopictus')) $field->albopictus='Yes'; else $field->albopictus='No';         
        $field->save();

        return redirect("fieldSurvey")->with('success', 'Data has been saved successfully!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFieldSurveySummary()
    {
        $results = FieldSurvey::select('fieldSurveys.*')->get();
        if (Auth::user() == NULL) $userType = '';
        else $userType = Auth::user()->userType;
        return view('fieldSurveySummary', compact('results', 'userType'));
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
        $result = FieldSurvey::where('fieldSurveys.id', $id)
                    ->select('fieldSurveys.*')
                    ->first();
        $userType = Auth::user()->userType;
        return view('fieldSurveyEdit', compact('result', 'userType'));
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
        $fieldResult = FieldSurvey::where('fieldSurveys.id', $id)->first();
        $fieldResult->month=$request->month;
        $fieldResult->year=$request->year;            
        $fieldResult->visitArea=$request->visitArea;            
        $fieldResult->waterTank=$request->waterTank;            
        $fieldResult->bottle=$request->bottle;            
        $fieldResult->teaCup=$request->teaCup;            
        $fieldResult->coconutShell=$request->coconutShell;            
        $fieldResult->flowerPot=$request->flowerPot;            
        $fieldResult->yoghurtCup=$request->yoghurtCup;            
        $fieldResult->petWaterSource=$request->petWaterSource;            
        $fieldResult->fridgeWasteWaterContainer=$request->fridgeWasteWaterContainer;            
        $fieldResult->other=$request->other;            
        $fieldResult->totalContainer=$request->totalContainer;            
        $fieldResult->larvaPositive=$request->larvaPositive;            
        $fieldResult->containerIndex=$request->containerIndex;
        if ($request->has('aegypti')) $fieldResult->aegypti='Yes'; else $fieldResult->aegypti='No';
        if ($request->has('albopictus')) $fieldResult->albopictus='Yes'; else $fieldResult->albopictus='No';
        $fieldResult->save();
        return redirect("fieldSurveySummary")->with('success', 'Data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = FieldSurvey::where('fieldSurveys.id', $id)->delete();
        return redirect("fieldSurveySummary")->with('success', 'Entry has been deleted!');
    }
}
