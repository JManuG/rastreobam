<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;

class Reportes extends Controller
{

    public function rep_detalle(Request $request)
    {
       /* $tipo=$request->input('tipo');
        $fecha1=$request->input('f1');
        $fecha2=$request->input('f2');*/

        $sql="select * from moviemintos where id_envio in (
            select id_envio from guia where fecha_date between '2021-01-01' and '2021-01-19')
            group by 2";

        $data=DB::select($sql);

        return $data;

    }
    
}
