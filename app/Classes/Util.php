<?php

namespace App\Classes;

class Util
{
    static public function formatarData($data, $formato = 'd/m/Y')
    {
        $data = trim($data);

        if(substr($data, 2, 1) == '/'){
            $hora = '';
            if(strlen($data) > 10){
                $dataCompleta = explode(' ', $data);
                $data = $dataCompleta[0];
                $hora = ' ' . $dataCompleta[1];
            }
            $data= explode('/', $data);
            return "{$data[2]}-{$data[1]}-{$data[0]}{$hora}";
        } elseif(substr($data, 4, 1) == '-'){
            return date($formato, strtotime($data));
        }
        return $data;
    }
}
