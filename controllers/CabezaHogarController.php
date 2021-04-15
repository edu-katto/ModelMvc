<?php
require_once 'models/CabezaHogarModel.php';
class CabezaHogarController{

    public function cabezaHogar(){
        require_once 'views/CabezaHogar/cabezaHogar.php';
    }

    public function save(){
        header('Content-Type: application/json');

        if (utils::existPOST(['nombre','apellido','fechaNacimiento','genero','direccion','email','dni','hijo'])){

            $cabezaHogar = new CabezaHogarModel();

            $cabezaHogar->setNombre($_POST['nombre']);
            $cabezaHogar->setApellido($_POST['apellido']);
            $cabezaHogar->setFechaNacimiento($_POST['fechaNacimiento']);
            $cabezaHogar->setCodSexo($_POST['genero']);
            $cabezaHogar->setDireccion($_POST['direccion']);
            $cabezaHogar->setEmail($_POST['email']);
            $cabezaHogar->setDniCabezaHogar($_POST['dni']);
            $cabezaHogar->setCantidadHijo($_POST['hijo']);

            if ($cabezaHogar->searchDni() === TRUE){
                $resultado = array(
                    "message" => "Ya existe un cabeza de hogar con este DNI",
                    "option" => "error"
                );
                return print(json_encode($resultado));
            }

            $consulta = $cabezaHogar->save();

            if ($consulta === TRUE){
                $resultado = array(
                    "message" => "Exito al registrar cabeza de hogar",
                    "option" => "success"
                );
                return print(json_encode($resultado));

            }else{
                $resultado = array(
                    "message" => "Error al insertar datos",
                    "option" => "error",
                    "mysql" => $consulta
                );
                return print(json_encode($resultado));
            }

        }else{
            $resultado = array(
                "message" => "Todos los datos son obligatorios",
                "option" => "error"
            );
            return print(json_encode($resultado));
        }
    }
}