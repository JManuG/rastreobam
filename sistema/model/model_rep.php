<?php

//model model_rep
//0430080126
//
ini_set('post_max_size', '100M');
ini_set('upload_max_filesize', '100M');
ini_set('max_execution_time', '1000');
ini_set('max_input_time', '1000');

include('../../class/db.php');

class model_rep extends Db
{
    public function __construct()
    {
        $db = Db::getInstance();
    }

    public function informe1($date1, $date2)
    {
        $db=Db::getInstance();

        $sql_c = "
SELECT m.id_chk,c.chk_descripcion, count(m.id_movimiento) as cantidad FROM `movimiento` m inner join chk_id c on m.id_chk=c.id_chk where m.fecha_date between '$date1' and '$date2' group by 1,2 
 ";

        $c= $db->consultar($sql_c);
        while ($row=$c->fetch(PDO::FETCH_OBJ))
        {
            $data[] = $row;
        }
        if(!empty($data)) {
            return $data;
        }else
            return $sql_c;
    }

}