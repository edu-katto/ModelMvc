<?php
require_once 'models/BeneficiarioModel.php';
require_once 'models/CabezaHogarModel.php';

class BeneficiarioController{

    public function registro(){
        require_once 'views/Beneficiario/beneficiario.php';
    }

    public function save(){
        header('Content-Type: application/json');

        if (utils::existPOST(['nombre','apellido','fechaNacimiento','genero','estudia','dni','dniCabezaHogar'])){

            $beneficiario = new BeneficiarioModel();
            $cabezaHogar = new CabezaHogarModel();

            $beneficiario->setNombre($_POST['nombre']);
            $beneficiario->setApellido($_POST['apellido']);
            $beneficiario->setFechaNacimiento($_POST['fechaNacimiento']);
            $beneficiario->setCodSexo($_POST['genero']);
            $beneficiario->setEstudia($_POST['estudia']);
            $beneficiario->setDniBeneficiario($_POST['dni']);
            $beneficiario->setDniCabezaHogar($_POST['dniCabezaHogar']);

            //buscamos cabezaHogar para ver si existe
            $cabezaHogar->setDniCabezaHogar($_POST['dniCabezaHogar']);
            if ($cabezaHogar->searchDni() === FALSE){
                $resultado = array(
                    "message" => "No existe ningun cabeza de hogar con ese DNI",
                    "option" => "error"
                );
                return print(json_encode($resultado));
            }

            //buscamos para ver sin el cabezaHogar tiene aun espacio para insertar un hijo
            $cabezaHogar->setDniCabezaHogar($_POST['dniCabezaHogar']);
            if ($cabezaHogar->getTotalChildren() === FALSE){
                $resultado = array(
                    "message" => "Esta cabeza de hogar no cuanta con mas espacio para hijos",
                    "option" => "error"
                );
                return print(json_encode($resultado));

            }else{

                //buscar que el mismo cabeza de hogar no se pueda registrar como beneficiario
                $cabezaHogar->setDniCabezaHogar($_POST['dni']);
                if ($cabezaHogar->searchDni() === TRUE){
                    $resultado = array(
                        "message" => "Usted es un cabeza de hogar no un benefeciario",
                        "option" => "error"
                    );
                    return print(json_encode($resultado));
                }

                //comprobamos que no exista un registro con el mismo DNI
                if ($beneficiario->searchDni() === TRUE){
                    $resultado = array(
                        "message" => "Ya existe un beneficiario con este DNI",
                        "option" => "error"
                    );
                    return print(json_encode($resultado));
                }

                $consulta = $beneficiario->save();


                if ($consulta === TRUE){
                    $resultado = array(
                        "message" => "Exito al registrar beneficiario",
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