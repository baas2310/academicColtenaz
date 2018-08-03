<?php

require_once('db_abstract_class.php');

class estudiante extends db_abstract_class
{
    private $idEstudiante;
    private $Documento;
    private $TipoDocumento;
    private $Apellidos;
    private $Nombres;
    private $Email;
    private $Password;
    private $Celular;
    private $Direccion;
    private $Estado;
    private $idCurso;
    private $idAcudiente;
    private $idRol;

    public function __construct($acacdemiccoltenaz_data=array())
    {

        parent::__construct();

        if (count($acacdemiccoltenaz_data)>1){
            foreach ($acacdemiccoltenaz_data as $campo =>$valor){
                $this->$campo = $valor;
            }
        }else{
            $this->idEstudiante = "";
            $this->Documento = "";
            $this->TipoDocumento = "";
            $this->Apellidos = "";
            $this->Nombres = "";
            $this->Email = "";
            $this->Password = "";
            $this->Celular = "";
            $this->Direccion = "";
            $this->Estado = "";
            $this->idCurso = "";
            $this->idAcudiente = "";
            $this->idRol = "";


        }
    }



    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return mixed
     */
    public function getIdEstudiante()
    {
        return $this->idEstudiante;
    }

    /**
     * @param mixed $idEstudiante
     */
    public function setIdEstudiante($idEstudiante)
    {
        $this->idEstudiante = $idEstudiante;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->Documento;
    }

    /**
     * @param mixed $Documento
     */
    public function setDocumento($Documento)
    {
        $this->Documento = $Documento;
    }

    /**
     * @return mixed
     */
    public function getTipoDocumento()
    {
        return $this->TipoDocumento;
    }

    /**
     * @param mixed $TipoDocumento
     */
    public function setTipoDocumento($TipoDocumento)
    {
        $this->TipoDocumento = $TipoDocumento;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->Apellidos;
    }

    /**
     * @param mixed $Apellidos
     */
    public function setApellidos($Apellidos)
    {
        $this->Apellidos = $Apellidos;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->Nombres;
    }

    /**
     * @param mixed $Nombres
     */
    public function setNombres($Nombres)
    {
        $this->Nombres = $Nombres;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->Celular;
    }

    /**
     * @param mixed $Celular
     */
    public function setCelular($Celular)
    {
        $this->Celular = $Celular;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @param mixed $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param mixed $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    /**
     * @return mixed
     */
    public function getIdCurso()
    {
        return $this->idCurso;
    }

    /**
     * @param mixed $idCurso
     */
    public function setIdCurso($idCurso)
    {
        $this->idCurso = $idCurso;
    }

    /**
     * @return mixed
     */
    public function getIdAcudiente()
    {
        return $this->idAcudiente;
    }

    /**
     * @param mixed $idAcudiente
     */
    public function setIdAcudiente($idAcudiente)
    {
        $this->idAcudiente = $idAcudiente;
    }

    /**
     * @return mixed
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * @param mixed $idRol
     */
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }

    public static function buscarForId($id)
    {
        $estudiante = new Estudiante();
        if ($id  > 0){
            $getRow = $estudiante->getRow("SELECT * FROM estudiante WHERE idEstudiante =?", array($id));
            $estudiante->idEstudiante = $getRow['idEstudiante'];
            $estudiante->Documento = $getRow['Documento'];
            $estudiante->TipoDocumento = $getRow['TipoDocumento'];
            $estudiante->Apellidos = $getRow['Apellidos'];
            $estudiante->Nombres = $getRow['Nombres'];
            $estudiante->Email = $getRow['Email'];
            $estudiante->Password = $getRow['Password'];
            $estudiante->Celular = $getRow['Celular'];
            $estudiante->Direccion = $getRow['Direccion'];
            $estudiante->Estado = $getRow['Estado'];
            $estudiante->idCurso = $getRow['idCurso'];
            $estudiante->idAcudiente = $getRow['idAcudiente'];
            $estudiante->idRol = $getRow['idRol'];

            $estudiante->Disconnect();
            return $estudiante;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayEst = array();
        $tmp = new Estudiante();
        $getRows = $tmp->getRows($query);

        foreach ($getRows as $valor){
            $estudiante = new Estudiante();
            $estudiante->idEstudiante = $valor['idEstudiante'];
            $estudiante->Documento = $valor['Documento'];
            $estudiante->TipoDocumento = $valor['TipoDocumento'];
            $estudiante->Apellidos = $valor['Apellidos'];
            $estudiante->Nombres = $valor['Nombres'];
            $estudiante->Email = $valor['Email'];
            $estudiante->Password = $valor['Password'];
            $estudiante->Celular = $valor['Celular'];
            $estudiante->Direccion = $valor['Direccion'];
            $estudiante->Estado = $valor['Estado'];
            $estudiante->idCurso = $valor['idCurso'];
            $estudiante->idAcudiente = $valor['idAcudiente'];
            $estudiante->idRol = $valor['idRol'];

            array_push($arrayEst, $estudiante);
        }
        $tmp->Disconnect();
        return $arrayEst;
    }

    public static function getAll()
    {
        return Estudiante::buscar("SELECT * FROM estudiante ");
    }

    public function insertar()
    {


        $this->insertRow("INSERT INTO estudiante VALUE ( NULL , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(

                $this->Documento,
                $this->TipoDocumento,
                $this->Apellidos,
                $this->Nombres,
                $this->Email,
                $this->Password,
                $this->Celular,
                $this->Direccion,
                $this->Estado,
                $this->idCurso,
                $this->idAcudiente,
                $this->idRol


            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $arrUser = (array) $this;
        $this->updateRow("UPDATE estudiante SET  Documento = ?, TipoDocumento = ?, Apellidos = ?, Nombres = ?, Email = ?, Password=?, Celular = ?, Direccion = ?,  Estado = ?, idCurso = ?, idAcudiente = ?, idRol = ? WHERE idEstudiante = ?", array(

                $this->Documento,
                $this->TipoDocumento,
                $this->Apellidos,
                $this->Nombres,
                $this->Email,
                $this->Password,
                $this->Celular,
                $this->Direccion,
                $this->Estado,
                $this->idCurso,
                $this->idAcudiente,
                $this->idRol,
                $this->idEstudiante

            )
        );
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    public static function Login($Email, $Password){
        $arrEstudiantes = array();
        $tmp = new Estudiante();
        $getTempUser = $tmp->getRows("SELECT * FROM estudiante WHERE Email = '$Email'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM estudiante WHERE Email = '$Email' AND Password = '$Password'");
            if(count($getrows) >= 1){
                foreach ($getrows as $valor) {
                    return $valor;
                }
            }else{
                return "Contraseña Incorrecta";
            }
        }else{
            return "No existe el Estudiante";
        }

        $tmp->Disconnect();
        return $arrEstudiantes;
    }

}