<?php

class BeneficiarioModel{
    private $codBeneficiario;
    private $dniBeneficiario;
    private $dniCabezaHogar;
    private $nombre;
    private $apellido;
    private $FechaNacimiento;
    private $codSexo;
    private $estudia;
    private $conexion;

    /**
     * BeneficiarioModel constructor.
     * @param $conexion
     */
    public function __construct()
    {
        $this->conexion = Database::connect();
    }


    /**
     * @return mixed
     */
    public function getCodBeneficiario()
    {
        return $this->codBeneficiario;
    }

    /**
     * @param mixed $codBeneficiario
     */
    public function setCodBeneficiario($codBeneficiario)
    {
        $this->codBeneficiario = $codBeneficiario;
    }

    /**
     * @return mixed
     */
    public function getDniBeneficiario()
    {
        return $this->dniBeneficiario;
    }

    /**
     * @param mixed $dniBeneficiario
     */
    public function setDniBeneficiario($dniBeneficiario)
    {
        $this->dniBeneficiario = $dniBeneficiario;
    }

    /**
     * @return mixed
     */
    public function getDniCabezaHogar()
    {
        return $this->dniCabezaHogar;
    }

    /**
     * @param mixed $dniCabezaHogar
     */
    public function setDniCabezaHogar($dniCabezaHogar)
    {
        $this->dniCabezaHogar = $dniCabezaHogar;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->FechaNacimiento;
    }

    /**
     * @param mixed $FechaNacimiento
     */
    public function setFechaNacimiento($FechaNacimiento)
    {
        $this->FechaNacimiento = $FechaNacimiento;
    }

    /**
     * @return mixed
     */
    public function getCodSexo()
    {
        return $this->codSexo;
    }

    /**
     * @param mixed $codSexo
     */
    public function setCodSexo($codSexo)
    {
        $this->codSexo = $codSexo;
    }

    /**
     * @return mixed
     */
    public function getEstudia()
    {
        return $this->estudia;
    }

    /**
     * @param mixed $estudia
     */
    public function setEstudia($estudia)
    {
        $this->estudia = $estudia;
    }

    public function save(){

        $dniBeneficiario = utils::protege($this->getDniBeneficiario());
        $dniCabezaHogar = utils::protege($this->getDniCabezaHogar());
        $nombre = utils::protege($this->getNombre());
        $apellido = utils::protege($this->getApellido());
        $fechaNacimiento = utils::protege($this->getFechaNacimiento());
        $codSexo = utils::protege($this->getCodSexo());
        $estudia = utils::protege($this->getEstudia());

        $sql = "INSERT INTO beneficiario VALUES (NULL,'$dniBeneficiario','$dniCabezaHogar','$nombre','$apellido','$fechaNacimiento','$codSexo','$estudia')";
        $save = $this->conexion->query($sql);

        if ($save == false){
            return $this->conexion->error;
        }else{
            return TRUE;
        }
    }

    public function searchDni(){
        $dni = utils::protege($this->getDniBeneficiario());

        $sql = "SELECT * FROM beneficiario WHERE dniBeneficiario = '$dni'";
        $dniBeneficiario = $this->conexion->query($sql)->num_rows;

        if ($dniBeneficiario >= 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }

}