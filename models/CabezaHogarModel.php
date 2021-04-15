<?php
class CabezaHogarModel{
    private $codCabezaHogar;
    private $dniCabezaHogar;
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $codSexo;
    private $email;
    private $direccion;
    private $cantidadHijo;
    private $conexion;

    /**
     * CabezaHogarModel constructor.
     * @param $conexion
     */
    public function __construct()
    {
        $this->conexion = Database::connect();
    }


    /**
     * @return mixed
     */
    public function getCodCabezaHogar()
    {
        return $this->codCabezaHogar;
    }

    /**
     * @param mixed $codCabezaHogar
     */
    public function setCodCabezaHogar($codCabezaHogar)
    {
        $this->codCabezaHogar = $codCabezaHogar;
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
        return $this->fechaNacimiento;
    }

    /**
     * @param mixed $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getCantidadHijo()
    {
        return $this->cantidadHijo;
    }

    /**
     * @param mixed $cantidadHijo
     */
    public function setCantidadHijo($cantidadHijo)
    {
        $this->cantidadHijo = $cantidadHijo;
    }

    public function save(){

        $dniCabezaHogar = utils::protege($this->getDniCabezaHogar());
        $nombre = utils::protege($this->getNombre());
        $apellido = utils::protege($this->getApellido());
        $fechaNacimiento = utils::protege($this->getFechaNacimiento());
        $codSexo = utils::protege($this->getCodSexo());
        $email = utils::protege($this->getEmail());
        $direccion = utils::protege($this->getDireccion());
        $cantidadHijo = utils::protege($this->getCantidadHijo());

        $sql = "INSERT INTO cabezaHogar VALUES (NULL,'$dniCabezaHogar','$nombre','$apellido','$fechaNacimiento','$codSexo','$email','$direccion','$cantidadHijo')";
        $save = $this->conexion->query($sql);

        if ($save == false){
            return $this->conexion->error;
        }else{
            return TRUE;
        }
    }

    public function searchDni(){
        $dni = utils::protege($this->getDniCabezaHogar());

        $sql = "SELECT * FROM cabezahogar WHERE dniCabezaHogar = '$dni'";
        $registerHistory = $this->conexion->query($sql)->num_rows;

        if ($registerHistory >= 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getTotalChildren(){
        $dni = utils::protege($this->getDniCabezaHogar());

        $sql = "SELECT * FROM total_hijos_vista WHERE dniCabezaHogar = '$dni'";
        $children = $this->conexion->query($sql)->fetch_object();

        if ($children == NULL || $children->hijosTotales < $children->hijo){
            return TRUE;
            
        }else{
            return FALSE;
        }
    }

}