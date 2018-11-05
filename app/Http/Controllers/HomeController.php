<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Redirect to the users home.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function goToMyHome()
    {
        if(Session::get('currentStatus') == 'no') {
            if(Session::get('userType') == 'EU') {
                return redirect('/eU/create');
            } elseif (Session::get('userType') == 'MOH') {
                return redirect('/mOH/create');
            } elseif (Session::get('userType') == 'PHI') {
                return redirect('/pHI/create');
            } elseif (Session::get('userType') == 'RDHS') {
                return redirect('/rDHS/create');
            } elseif (Session::get('userType') == 'Doctor') {
                return redirect('/doctor/create');
            } else{
                return "Invalid user type";
            }
        } else {
            if(Session::get('userType') == 'EU') {
                return redirect('/eUHome');
            } elseif (Session::get('userType') == 'MOH') {
                return redirect('/mOHHome');
            } elseif (Session::get('userType') == 'PHI') {
                return redirect('/pHIHome');
            } elseif (Session::get('userType') == 'RDHS') {
                return redirect('/rDHSHome');
            } elseif (Session::get('userType') == 'Doctor') {
                return redirect('/doctorHome');
            } else{
                return "Invalid user type";
            }
        }
    }
}
