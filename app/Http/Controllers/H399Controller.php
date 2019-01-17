<?php

namespace App\Http\Controllers;

// use DB;
use Auth;
use App\MOH;
use App\User;
use App\H399;
use App\Total;
use App\Patient;
use App\PHIInMOH;
use App\Notification;
use App\WeeklySummary;
use App\MOHInDistrict;
use App\RDHSDivInDistrict;
use App\DistrictInProvince;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Kayts;
use App\Kopay;
use App\Nallur;
use App\Jaffna;
use App\Uduvil;
use App\Karaveddy;
use App\Chankanai;
use App\Pointpedro;
use App\Sandilipay;
use App\Thellipalai;
use App\Chavakachcheri;

class H399Controller extends Controller
{
    /**
     * Constructor
     */
    public function __construct(User $user, MOH $mOH, PHIInMOH $pHIInMOH)
    {       
        $this->user = $user;
        $this->mOH = $mOH;
        $this->pHIInMOH = $pHIInMOH;
    }

    /**
     * Display MOH Area and MOH Reg No.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMOHAreaPHIRange()
    {
        $mOHArea = $this->mOH->where('userId',Auth::user()->id)->first()->mOHArea;
        $pHIRanges = $this->pHIInMOH->where('mOHArea',$mOHArea)->select('pHIInMOHs.pHIRange')
                    ->get();
        $district = MOHInDistrict::where('mOHArea',$mOHArea)->first()->district;
        $rDHSDiv = RDHSDivInDistrict::where('district',$district)->first()->rDHSDiv;
        $province = DistrictInProvince::where('district',$district)->first()->province;
        $diseaseData = Patient::where('patients.curMOHArea', $mOHArea)
                    ->join('notifications', 'notifications.paId', '=', 'patients.paId')
                    ->select('patients.curPHIRange', 'notifications.diseaseName')
                    ->get();

        return view('/form/h399', compact('mOHArea', 'pHIRanges', 'district', 'rDHSDiv', 'province', 'diseaseData'));
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
        $h399 = new H399;
        if ($request->has('save')) $h399->status='draft';
        else if ($request->has('send')) $h399->status='sent';
        $h399->weekEndDate=$request->weekEndDate;
        $h399->province=$request->province;
        $h399->district=$request->district;
        $h399->rDHSDiv=$request->rDHSDiv;
        $h399->mOHArea=$request->mOHArea;
        $h399->save();

        $mOHArea = $this->mOH->where('userId',Auth::user()->id)->first()->mOHArea;
        $pHIRanges = $this->pHIInMOH->where('mOHArea',$mOHArea)->select('pHIInMOHs.pHIRange')
                    ->get();
        $diseases = array('internationallyNotifiableDiseases', 'acutePoliomyelitis', 'chickenPox', 'dengueFever', 'diphtheria', 'dysentery', 'encephalitis', 'entericFever', 'foodPoisoning', 'humanRabies', 'leishmaniasis', 'leprosy', 'leptospirosis', 'malaria', 'neasles', 'meningities', 'mumps', 'neonatalTetanus', 'rubella', 'simpleConFever', 'tetanus', 'tuberculosis', 'typhusFever', 'viralHepatitis', 'whoopingCough');
        
        $mOHAreas = MOHInDistrict::where('district',$h399->district)->select('mOHInDistricts.mOHArea')->get();

        for ($k = 0; $k < count($mOHAreas); $k++) {
            if ($request->mOHArea == $mOHAreas[$k]->mOHArea) {
                for ($i = 0; $i < count($pHIRanges); $i++) {
                    if ($request->mOHArea == 'Nallur') $mOH = new Nallur;
                    else if ($request->mOHArea == 'Chankanai') $mOH = new Chankanai;
                    else if ($request->mOHArea == 'Chavakachcheri') $mOH = new Chavakachcheri;
                    else if ($request->mOHArea == 'Jaffna') $mOH = new Jaffna;
                    else if ($request->mOHArea == 'Karaveddy') $mOH = new Karaveddy;
                    else if ($request->mOHArea == 'Kayts') $mOH = new Kayts;
                    else if ($request->mOHArea == 'Kopay') $mOH = new Kopay;
                    else if ($request->mOHArea == 'Point Pedro') $mOH = new PointPedro;
                    else if ($request->mOHArea == 'Sandilipay') $mOH = new Sandilipay;
                    else if ($request->mOHArea == 'Thellipalai') $mOH = new Thellipalai;
                    else if ($request->mOHArea == 'Uduvil') $mOH = new Uduvil;

                    $mOH->h399RecordId=$h399->h399RecordId;

                    $pHIRange=$pHIRanges[$i]->pHIRange;
                    $mOH->pHIRange=$request->$pHIRange;

                    for ($j = 0; $j < count($diseases); $j++) {
                        $x = 'numR'.($i+1).'C'.($j+1);
                        $disease = trim($diseases[$j]);
                        $mOH->$disease=$request->$x;
                    }

                    $mOH->save();
                }            
            } 
        }

        $total = new Total;
        $total->h399RecordId=$h399->h399RecordId;
        $total->mOHArea=$request->mOHArea;
        for ($j = 0; $j < count($diseases); $j++) {
            $x = 'total'.($j+1);
            $disease = trim($diseases[$j]);
            $total->$disease=$request->$x;
        }
        $total->save();

        $summaryes = array('Cases awaiting investigation at the end of the week', 'Cases confirmed as a non-notifiable disease during the week', 'Cases confirmed as a notifiable disease during the week', 'Cases decided as belonging to other MOH areas during the week', 'Cases decided as untraceable during the week', 'Cases informed earlier and awaiting investigation at beginning of the week', 'New cases notified during the week');
        
        for ($i = 0; $i < count($summaryes); $i++) {
            $weeklySummary = new WeeklySummary;
            $weeklySummary->h399RecordId=$h399->h399RecordId;
            $weeklySummary->summary=$summaryes[$i];

            for ($j = 0; $j < count($diseases); $j++) {
                $x = 'countR'.($i+1).'C'.($j+1);
                $disease = trim($diseases[$j]);
                $weeklySummary->$disease=$request->$x;
            }            
            $weeklySummary->save();
        }

        if ($request->has('save')) return redirect("mOHHome")->with('success', 'Data has been saved successfully!');
        if ($request->has('send')) return redirect("mOHHome")->with('success', 'Data has been sent successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mOHArea = $this->mOH->where('userId',Auth::user()->id)->first()->mOHArea;
        $pHIRanges = $this->pHIInMOH->where('mOHArea',$mOHArea)->select('pHIInMOHs.pHIRange')
                    ->get();
        $diseaseData = Patient::where('patients.curMOHArea', $mOHArea)
                    ->join('notifications', 'notifications.paId', '=', 'patients.paId')
                    ->select('patients.curPHIRange', 'notifications.diseaseName')
                    ->get();

        $h399Data = H399::where('h399s.h399RecordId', $id)->select('h399s.*')->first();
        // $totalData = Total::where('totals.h399RecordId', $id)->select('totals.*')->first();
        $summaryData = WeeklySummary::where('weeklySummarys.h399RecordId', $id)
                        ->select('weeklySummarys.*')->get();

        $diseases = array('internationallyNotifiableDiseases', 'acutePoliomyelitis', 'chickenPox', 'dengueFever', 'diphtheria', 'dysentery', 'encephalitis', 'entericFever', 'foodPoisoning', 'humanRabies', 'leishmaniasis', 'leprosy', 'leptospirosis', 'malaria', 'neasles', 'meningities', 'mumps', 'neonatalTetanus', 'rubella', 'simpleConFever', 'tetanus', 'tuberculosis', 'typhusFever', 'viralHepatitis', 'whoopingCough');

        // if ($h399Data->mOHArea == 'Nallur') 
        //     $mOHData = Nallur::where('nallurs.h399RecordId', $id)->select('nallurs.*')->get();
        // else if ($h399Data->mOHArea == 'Chankanai') 
        //     $mOHData = Chankanai::where('chankanais.h399RecordId', $id)->select('chankanais.*')->get();
        // else if ($h399Data->mOHArea == 'Chavakachcheri') 
        //     $mOHData = Chavakachcheri::where('chavakachcheris.h399RecordId', $id)->select('chavakachcheris.*')
        //                 ->get();
        // else if ($h399Data->mOHArea == 'Jaffna') 
        //     $mOHData = Jaffna::where('jaffnas.h399RecordId', $id)->select('jaffnas.*')->get();
        // else if ($h399Data->mOHArea == 'Karaveddy') 
        //     $mOHData = Karaveddy::where('karaveddys.h399RecordId', $id)->select('karaveddys.*')->get();
        // else if ($h399Data->mOHArea == 'Kayts') 
        //     $mOHData = Kayts::where('kaytses.h399RecordId', $id)->select('kaytses.*')->get();
        // else if ($h399Data->mOHArea == 'Kopay') 
        //     $mOHData = Kopay::where('kopays.h399RecordId', $id)->select('kopays.*')->get();
        // else if ($h399Data->mOHArea == 'Point Pedro') 
        //     $mOHData = PointPedro::where('pointPedros.h399RecordId', $id)->select('pointPedros.*')->get();
        // else if ($h399Data->mOHArea == 'Sandilipay') 
        //     $mOHData = Sandilipay::where('sandilipays.h399RecordId', $id)->select('sandilipays.*')->get();
        // else if ($h399Data->mOHArea == 'Thellipalai') 
        //     $mOHData = Thellipalai::where('thellipalais.h399RecordId', $id)->select('thellipalais.*')->get();
        // else if ($h399Data->mOHArea == 'Uduvil') 
        //     $mOHData = Uduvil::where('uduvils.h399RecordId', $id)->select('uduvils.*')->get();

        return view('/form/h399Edit', compact('pHIRanges', 'diseaseData', 'h399Data', 'summaryData', 'diseases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mOHArea = $this->mOH->where('userId',Auth::user()->id)->first()->mOHArea;
        $pHIRanges = $this->pHIInMOH->where('mOHArea',$mOHArea)->select('pHIInMOHs.pHIRange')
                    ->get();
        $diseaseData = Patient::where('patients.curMOHArea', $mOHArea)
                    ->join('notifications', 'notifications.paId', '=', 'patients.paId')
                    ->select('patients.curPHIRange', 'notifications.diseaseName')
                    ->get();
        $h399Data = H399::where('h399s.h399RecordId', $id)->select('h399s.*')->first();
        $summaryData = WeeklySummary::where('weeklySummarys.h399RecordId', $id)
                        ->select('weeklySummarys.*')->get();

        $diseases = array('internationallyNotifiableDiseases', 'acutePoliomyelitis', 'chickenPox', 'dengueFever', 'diphtheria', 'dysentery', 'encephalitis', 'entericFever', 'foodPoisoning', 'humanRabies', 'leishmaniasis', 'leprosy', 'leptospirosis', 'malaria', 'neasles', 'meningities', 'mumps', 'neonatalTetanus', 'rubella', 'simpleConFever', 'tetanus', 'tuberculosis', 'typhusFever', 'viralHepatitis', 'whoopingCough');

        return view('/form/h399Edit', compact('pHIRanges', 'diseaseData', 'h399Data', 'summaryData', 'diseases'));
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
        $h399 = H399::where('h399s.h399RecordId', $id)->first();
        if ($request->has('save')) $h399->status='draft';
        else if ($request->has('send')) $h399->status='sent';
        $h399->weekEndDate=$request->weekEndDate;
        $h399->province=$request->province;
        $h399->district=$request->district;
        $h399->rDHSDiv=$request->rDHSDiv;
        $h399->mOHArea=$request->mOHArea;
        $h399->save();

        // $mOHArea = $this->mOH->where('userId',Auth::user()->id)->first()->mOHArea;
        // $pHIRanges = $this->pHIInMOH->where('mOHArea',$mOHArea)->select('pHIInMOHs.pHIRange')
        //             ->get();
        
        // $mOHAreas = MOHInDistrict::where('district',$h399->district)->select('mOHInDistricts.mOHArea')->get();

        // for ($k = 0; $k < count($mOHAreas); $k++) {
        //     if ($request->mOHArea == $mOHAreas[$k]->mOHArea) {
        //         for ($i = 0; $i < count($pHIRanges); $i++) {
        //             if ($request->mOHArea == 'Nallur') {
        //                 $mOHData = Nallur::where('nallurs.h399RecordId', $id)->select('nallurs.*')->get();
        //                 $mOH = $mOHData[$i];
        //             }
        //             else if ($request->mOHArea == 'Chankanai') $mOH = new Chankanai;
        //             else if ($request->mOHArea == 'Chavakachcheri') $mOH = new Chavakachcheri;
        //             else if ($request->mOHArea == 'Jaffna') $mOH = new Jaffna;
        //             else if ($request->mOHArea == 'Karaveddy') $mOH = new Karaveddy;
        //             else if ($request->mOHArea == 'Kayts') $mOH = new Kayts;
        //             else if ($request->mOHArea == 'Kopay') $mOH = new Kopay;
        //             else if ($request->mOHArea == 'Point Pedro') $mOH = new PointPedro;
        //             else if ($request->mOHArea == 'Sandilipay') $mOH = new Sandilipay;
        //             else if ($request->mOHArea == 'Thellipalai') $mOH = new Thellipalai;
        //             else if ($request->mOHArea == 'Uduvil') $mOH = new Uduvil;

        //             $mOH->h399RecordId=$h399->id;

        //             $pHIRange=$pHIRanges[$i]->pHIRange;
        //             $mOH->pHIRange=$request->$pHIRange;

        //             for ($j = 0; $j < count($diseases); $j++) {
        //                 $x = 'numR'.($i+1).'C'.($j+1);
        //                 $disease = trim($diseases[$j]);
        //                 $mOH->$disease=$request->$x;
        //             }
        //             $mOH->save();
        //         }            
        //     } 
        // }

        // $total = new Total;
        // $total->h399RecordId=$h399->id;
        // $total->mOHArea=$request->mOHArea;
        // for ($j = 0; $j < count($diseases); $j++) {
        //     $x = 'total'.($j+1);
        //     $disease = trim($diseases[$j]);
        //     $total->$disease=$request->$x;
        // }
        // $total->save();

        $diseases = array('internationallyNotifiableDiseases', 'acutePoliomyelitis', 'chickenPox', 'dengueFever', 'diphtheria', 'dysentery', 'encephalitis', 'entericFever', 'foodPoisoning', 'humanRabies', 'leishmaniasis', 'leprosy', 'leptospirosis', 'malaria', 'neasles', 'meningities', 'mumps', 'neonatalTetanus', 'rubella', 'simpleConFever', 'tetanus', 'tuberculosis', 'typhusFever', 'viralHepatitis', 'whoopingCough');
        
        $summaryes = array('Cases awaiting investigation at the end of the week', 'Cases confirmed as a non-notifiable disease during the week', 'Cases confirmed as a notifiable disease during the week', 'Cases decided as belonging to other MOH areas during the week', 'Cases decided as untraceable during the week', 'Cases informed earlier and awaiting investigation at beginning of the week', 'New cases notified during the week');
        
        $summaryData = WeeklySummary::where('weeklySummarys.h399RecordId', $id)->select('weeklySummarys.*')->get();
        // $summaryData = DB::table('weeklySummarys')->where('weeklySummarys.h399RecordId', $id)
        //                 ->select('weeklySummarys.*')->get();
        // dd($summaryData);
        for ($i = 0; $i < count($summaryes); $i++) {
            $weeklySummary = $summaryData[$i];
            $weeklySummary->h399RecordId=$h399->h399RecordId;
            $weeklySummary->summary=$summaryes[$i];

            for ($j = 0; $j < count($diseases); $j++) {
                $x = 'countR'.($i+1).'C'.($j+1);
                $disease = trim($diseases[$j]);
                $weeklySummary->$disease=$request->$x;
            }
            $weeklySummary->save();
        }

        if ($request->has('save')) return redirect("mOHHome")->with('success', 'Data has been updated successfully!');
        if ($request->has('send')) return redirect("mOHHome")->with('success', 'Data has been sent successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $h399 = H399::where('h399s.h399RecordId', $id)->first();
   
        if ($h399->mOHArea == 'Nallur') $mOH = Nallur::where('nallurs.h399RecordId', $id)->delete();
        else if ($h399->mOHArea == 'Chankanai') $mOH = Chankanai::where('chankanais.h399RecordId', $id)->delete();
        else if ($h399->mOHArea == 'Chavakachcheri') $mOH = Chavakachcheri::where('chavakachcheris.h399RecordId', $id)->delete();
        else if ($h399->mOHArea == 'Jaffna') $mOH = Jaffna::where('jaffnas.h399RecordId', $id)->delete();
        else if ($h399->mOHArea == 'Karaveddy') $mOH = Karaveddy::where('karaveddys.h399RecordId', $id)->delete();
        else if ($h399->mOHArea == 'Kayts') $mOH = Kayts::where('kaytses.h399RecordId', $id)->delete();
        else if ($h399->mOHArea == 'Kopay') $mOH = Kopay::where('kopays.h399RecordId', $id)->delete();
        else if ($h399->mOHArea == 'Point Pedro') $mOH = PointPedro::where('pointPedros.h399RecordId', $id)->delete();
        else if ($h399->mOHArea == 'Sandilipay') $mOH = Sandilipay::where('sandilipays.h399RecordId', $id)->delete();
        else if ($h399->mOHArea == 'Thellipalai') $mOH = Thellipalai::where('thellipalais.h399RecordId', $id)->delete();
        else if ($h399->mOHArea == 'Uduvil') $mOH = Uduvil::where('uduvils.h399RecordId', $id)->delete();

        $total = Total::where('totals.h399RecordId', $id)->delete();
        $weeklySummary = WeeklySummary::where('weeklySummarys.h399RecordId', $id)->delete();
        $h399 = H399::where('h399s.h399RecordId', $id)->delete();

        return redirect("mOHHome")->with('success', 'Entry has been deleted!');
    }
}
