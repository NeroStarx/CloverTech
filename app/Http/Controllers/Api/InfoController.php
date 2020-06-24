<?php

namespace App\Http\Controllers\Api;

use App\Decision;
use App\Http\Controllers\Controller;
use App\User;
use App\Wilaya;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function  EnvoyerEtat(Request $request){


        $wilayaE=new Wilaya();
        $wilayaE=Wilaya::where('name',$request->wilaya)->first();

        return response()->json([
            'success'=>true,
            'wilaya'=>$wilayaE]);



    } public function  EnvoyerDecisions(Request $request){


    $wilaya=Wilaya::where('name',$request->wilaya)->first();
    $decisions=Decision::where('wilaya_id',$wilaya->id)->get();
    foreach ($decisions as $decision){

        $decision->user=User::where('id',$decision->user_id)->first();

    }

    return response()->json([
        'success'=>true,
        'content'=>$decisions
    ]);

    $wilaya=Wilaya::where('name','relizane')->get();


}
    public function  EnvoyerEtatAvecDecisions(Request $request){



        $wilaya=Wilaya::where('name',$request->wilaya)->first();
        $decisions=Decision::where('wilaya_id',$wilaya->id)->get();

        return response()->json([
            'success'=>true,
            'wilaya'=>$wilaya,
            'Dicisions'=>$decisions]);



    }
}
