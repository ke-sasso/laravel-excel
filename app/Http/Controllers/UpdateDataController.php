<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Laratrust\Helper;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;
use Exception;
use \Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Facades\Crypt;
use \Illuminate\Support\Facades\Log;
use \Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Core\Number;
use Excel;
use App\Http\Imports\WithHeaderImport;
use App\Mail\SendEmails;
use Illuminate\Support\Facades\Mail;

class UpdateDataController extends Controller
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request)
    {
        $parametros=[];$infousuarios=[];
        $file = request()->file('file');
        $data = $this->getDataFromExcelFile(new \App\Http\Imports\WithHeaderImport, $file);
        $yearnow = date('Y');
        $datenow = date('Y-m-d');
        //dd($data[0]);
        foreach($data[0] as $d){
            $convertir = ($d['fecha_nacimiento'] - 25569) * 86400;
            $fechamd = gmdate("m-d", $convertir);
            $hdbnow = $yearnow.'-'.$fechamd;
            if($hdbnow == $datenow){
                array_push($infousuarios,$d);
            }
        }
        $parametros['usuarios'] =  $infousuarios;
        //return (new SendEmails($parametros, 'RECORDATORIO DE CUMPLEAÑEROS DIARIOS'))->render();
        //dd($parametros);
        Mail::to('sasso@gmail.com')
        ->cc(['ke@gmail.com','jo@gmail.com'])->send(new SendEmails($parametros, 'RECORDATORIO DE CUMPLEAÑEROS DIARIOS'));

        return $data;
    }

    function getDataFromExcelFile($import, $file){
        if(empty($file)) return null;
        try {
            $data = Excel::toArray($import, $file);
            return $data;
        } catch (\Throwable $th) {
            report($th);
            return null;
        }
    }



}
