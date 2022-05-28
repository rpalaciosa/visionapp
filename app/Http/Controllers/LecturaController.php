<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturas;

class LecturaController extends Controller
{
    public function curl_lectura($device , $variable)
    {
       

        $ch4 = curl_init();
        curl_setopt($ch4, CURLOPT_URL,"https://industrial.api.ubidots.com/api/v2.0/devices/$device/variables/$variable/?token=BBFF-vSMTMsyKoJnEcuDjrIOul7RZHq40lv");
        //curl_setopt($ch4, CURLOPT_HTTPGET, 1);
	
        $data = array ();
        /*$data = array (
        "token"  		  => "BBFF-vSMTMsyKoJnEcuDjrIOul7RZHq40lv"
            );
           */ 
        //curl_setopt($ch4, CURLOPT_POSTFIELDS, $data );
        curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);
	
	    $respuesta_det= curl_exec($ch4);
	    $info = curl_getinfo($ch4);		
        
	    if (curl_getinfo($ch4, CURLINFO_HTTP_CODE) === 200 ) {
            $json_lecturas = json_decode($respuesta_det,true);	
        
            $lectura = new Lecturas;
            $lectura->name = $json_lecturas["name"];
            $lectura->label = $json_lecturas["label"];
            $lectura->device_tk = $json_lecturas["device"]["id"];
            $lectura->variable_tk = $json_lecturas["id"];
            $lectura->value = $json_lecturas["lastValue"]["value"];

            $lectura->save();
            $ret = "S";
        }else{
            $ret = "E";
        }
        return $ret ;
    }

    public function recuperar(Request $request)
        {

            LecturaController::curl_lectura("6142a2201d8472057c90c758","6142a2211d847205344aa6c0");
            LecturaController::curl_lectura("6142a2201d8472057c90c758","6142a2201d8472057c90c759");
            LecturaController::curl_lectura("6142a2201d8472057c90c758","6142a2201d8472057c90c75a");
            LecturaController::curl_lectura("6142a2201d8472057c90c758","6142a2211d847205344aa6bf");
            LecturaController::curl_lectura("6142a2201d8472057c90c758","6142a2221d8472063629c9d4");
            LecturaController::curl_lectura("6142a2201d8472057c90c758","6142a2221d8472067e28924c");

            return response()->json([
                "message" => "lectura Agregada."
            ], 201);
    
        

    }

    public function index()
    {
        $lecturas = Lecturas::all();
        return response()->json($lecturas);
    }
}
