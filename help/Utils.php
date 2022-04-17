<?php
class utils{

    public static function acento($texto){
        //Minuscula
        $texto = str_replace("&aacute;", "á", $texto);
        $texto = str_replace("&eacute;", "é", $texto);
        $texto = str_replace("&iacute;", "í", $texto);
        $texto = str_replace("&oacute;", "ó", $texto);
        $texto = str_replace("&uacute;", "ú", $texto);
        $texto = str_replace("&ntilde;", "ñ", $texto);
        //Mayuscula
        $texto = str_replace("&Aacute;", "Á", $texto);
        $texto = str_replace("&Eacute;", "É", $texto);
        $texto = str_replace("&Iacute;", "Í", $texto);
        $texto = str_replace("&Oacute;", "Ó", $texto);
        $texto = str_replace("&Uacute;", "Ú", $texto);
        $texto = str_replace("&Ntilde;", "Ñ", $texto);
        //caracter especial
        $texto = htmlspecialchars_decode($texto, ENT_NOQUOTES);
        $texto = str_replace("&nbsp;", "", $texto);
        $texto = str_replace("&quot;", "", $texto);
        return $texto;
    }

    public static function protege($texto){
        $texto = str_replace("'", "\'", $texto);
        $texto = htmlspecialchars ($texto);
        $texto = htmlentities ($texto);
        $texto = trim ($texto);
        $texto = stripslashes($texto);
        return $texto;
    }

    public static function isAdmin(){
        if (!isset($_SESSION['rol']) && $_SESSION['rol'] != 1){
            header("location: ". base_url . "registerHistory/ListaRegistros");
        }else{
            return true;
        }
    }

    public static function isLoggedin(){
        if (isset($_SESSION['loggedin'])){
            header("location: ". base_url . "registerHistory/ListaRegistros");
            exit();
        }else{
            return true;
        }
    }

    public static function isSessionInit(){
        if (!isset($_SESSION['loggedin'])){
            header("location: ". base_url);
            exit();
        }else{
            return true;
        }
    }


    public static function existPOST($params){
        foreach ($params as $param) {
            if(empty($_POST[$param])){
                return false;
            }
        }
        return true;
    }

    public static function existGET($params){
        foreach ($params as $param) {
            if(!isset($_GET[$param])){
                return false;
            }
        }
        return true;
    }

}