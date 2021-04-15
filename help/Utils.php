<?php
class utils{

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