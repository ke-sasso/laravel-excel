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
        if($request->has('file')){
            $file = request()->file('file');
            $fileName = 'usuarios'.'.'.$request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);
        }else{
            if(!file_exists('uploads\usuarios.xlsx')){
                Session::flash('message-error',  'Estimado usuario es necesario adjuntar un archivo excel.  <b>¡Vuelva a intentarlo!</b>.');
                return back();
            }
        }
        $archivo = public_path('uploads\usuarios.xlsx');
        $data = $this->getDataFromExcelFile(new \App\Http\Imports\WithHeaderImport,$archivo);
        $yearnow = date('Y');
        $datenow = date('Y-m-d');
        foreach($data[0] as $d){
            $convertir = ($d['fecha_nacimiento'] - 25569) * 86400;
            $fechamd = gmdate("m-d", $convertir);
            $hdbnow = $yearnow.'-'.$fechamd;
            $d['fecha_nacimiento'] = gmdate("Y-m-d", $convertir);
            if($hdbnow == $datenow){
                array_push($infousuarios,$d);
            }
        }
        $parametros['usuarios'] =  $infousuarios;
        //return (new SendEmails($parametros, 'RECORDATORIO DE CUMPLEAÑEROS DIARIOS'))->render();
        //dd($parametros);
        /*Mail::to('kevinsasso005@gmail.com')
        ->cc(['ke@gmail.com','jo@gmail.com'])->send(new SendEmails($parametros, 'RECORDATORIO DE CUMPLEAÑEROS DIARIOS'));*/
        //Mail::to('f.moran@riottbwa.com')->cc(['kevinsasso005@gmail.com','andy.webdesign@gmail.com'])->send(new SendEmails($parametros, 'RECORDATORIO DE CUMPLEAÑEROS DIARIOS'));
        Mail::to('kevinsasso005@gmail.com')->send(new SendEmails($parametros, 'RECORDATORIO DE CUMPLEAÑEROS DIARIOS'));

        Session::flash('message-success',  'La información se a procesado con éxito, te hemos enviado la lista de usuarios que estan cumpliendo años el día de ahora.');
        return back();
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
