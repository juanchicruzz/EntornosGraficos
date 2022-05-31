<?php

//UTILS
class Utils{
    static function getParamsAsString(array $params){
        $bindString = "";
        foreach($params as $p){
            switch ($p) {
                case is_double($p):
                    $bindString.="d";
                    break;
                case is_string($p):
                    $bindString.="s";
                    break;
                case is_int($p):
                    $bindString.="i";
                    break;
            } 
        }
        return $bindString;
    }
    static function customBindParams(array $params, $stmt){
        $bindString = self::getParamsAsString($params);
        $nArgs = count($params);
        switch ($nArgs){
            case 1: 
                $stmt->bind_param(
                    $bindString, $params[0]);
                break;
            case 2: 
                $stmt->bind_param(
                    $bindString, $params[0], $params[1]);
                break;
            case 3: 
                return $stmt->bind_param(
                    $bindString, $params[0], $params[1], $params[2]);
                break;  
            case 4: 
                return $stmt->bind_param(
                    $bindString, $params[0], $params[1], $params[2], $params[3]);
                break;   
        }
    }
}

?>