<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\User;
use App\Doctor;
use App\MOH;
use App\RDHS;
use App\PHI;
use App\EU;
use Image;

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

        return view('officers', compact('doctorData', 'mOHData', 'pHIData', 'rDHSData', 'eUData'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile', array('user' => Auth::user()) );
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
     * Update avatar for the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAvatar(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(200, 250)->save( public_path('/uploads/avatars/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('profile', array('user' => Auth::user()) );
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
