<?php

$dirRoot = $_SERVER['DOCUMENT_ROOT'] . '/ModelMvc/'; //direccion completa del proyecto
require_once $dirRoot . 'serverside/config/serverSideConfig.php'; //llamamos a la configuracion del objeto

utils::isSessionInit(); //proteger api
$serverSide = new ServerSide(); //creamos una instancia del objeto para usar serverside

$listaCampos = ['campo0','campo1']; // lista de campos db

$serverSide->get('vista_consolidado','cod_consolidado', $listaCampos); // invocamos la funcion para traer los datos