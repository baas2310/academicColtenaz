<?php

require_once ('db_abstract_class.php');

class usuario extends db_abstract_class
{
    private $idUsuario;
    private $Documento;
    private $TipoDocumento;
    private $Apellidos;
    private $Nombres;
    private $Email;
    private $Password;
    private $Celular;
    private $Direccion;
    private $Estado;
    private $idRol;

    public function __construct($acacdemiccoltenaz_data=array())
    {

        parent::__construct();

        if (count($acacdemiccoltenaz_data)>1){
            foreach ($acacdemiccoltenaz_data as $campo =>$valor){
                $this->$campo = $valor;
            }
        }else{
            $this->idUsuario = "";
            $this->Documento = "";
            $this->TipoDocumento = "";
            $this->Apellidos = "";
            $this->Nombres = "";
            $this->Email = "";
            $this->Password = "";
            $this->Celular = "";
            $this->Direccion = "";
            $this->Estado = "";
            $this->idRol = "";


        }
    }



    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return string
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param string $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return string
     */
    public function getDocumento()
    {
        return $this->Documento;
    }

    /**
     * @param string $Documento
     */
    public function setDocumento($Documento)
    {
        $this->Documento = $Documento;
    }

    /**
     * @return string
     */
    public function getTipoDocumento()
    {
        return $this->TipoDocumento;
    }

    /**
     * @param string $TipoDocumento
     */
    public function setTipoDocumento($TipoDocumento)
    {
        $this->TipoDocumento = $TipoDocumento;
    }

    /**
     * @return string
     */
    public function getApellidos()
    {
        return $this->Apellidos;
    }

    /**
     * @param string $Apellidos
     */
    public function setApellidos($Apellidos)
    {
        $this->Apellidos = $Apellidos;
    }

    /**
     * @return string
     */
    public function getNombres()
    {
        return $this->Nombres;
    }

    /**
     * @param string $Nombres
     */
    public function setNombres($Nombres)
    {
        $this->Nombres = $Nombres;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param string $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param string $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    /**
     * @return string
     */
    public function getCelular()
    {
        return $this->Celular;
    }

    /**
     * @param string $Celular
     */
    public function setCelular($Celular)
    {
        $this->Celular = $Celular;
    }

    /**
     * @return string
     */
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @param string $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param string $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    /**
     * @return string
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * @param string $idRol
     */
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }


    public static function buscarForId($id)
    {
        $usuario = new Usuario();
        if ($id  > 0){
            $getRow = $usuario->getRow("SELECT * FROM usuario WHERE idUsuario =?", array($id));
            $usuario->idUsuario = $getRow['idUsuario'];
            $usuario->Documento = $getRow['Documento'];
            $usuario->TipoDocumento = $getRow['TipoDocumento'];
            $usuario->Apellidos = $getRow['Apellidos'];
            $usuario->Nombres = $getRow['Nombres'];
            $usuario->Email = $getRow['Email'];
            $usuario->Password = $getRow['Password'];
            $usuario->Celular = $getRow['Celular'];
            $usuario->Direccion = $getRow['Direccion'];
            $usuario->Estado = $getRow['Estado'];
            $usuario->idRol = $getRow['idRol'];


            $usuario->Disconnect();
            return $usuario;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayUsu = array();
        $tmp = new Usuario();
        $getRows = $tmp->getRows($query);

        foreach ($getRows as $valor){
            $usuario = new Usuario();
            $usuario->idUsuario = $valor['idUsuario'];
            $usuario->Documento = $valor['Documento'];
            $usuario->TipoDocumento = $valor['TipoDocumento'];
            $usuario->Apellidos = $valor['Apellidos'];
            $usuario->Nombres = $valor['Nombres'];
            $usuario->Email = $valor['Email'];
            $usuario->Password = $valor['Password'];
            $usuario->Celular = $valor['Celular'];
            $usuario->Direccion = $valor['Direccion'];
            $usuario->Estado = $valor['Estado'];
            $usuario->idRol = $valor['idRol'];

            array_push($arrayUsu, $usuario);
        }
        $tmp->Disconnect();
        return $arrayUsu;
    }

    public static function getAll()
    {
        return Usuario::buscar("SELECT * FROM usuario ");
    }

    public static function getAllAcudientes()
    {
        return Usuario::buscar("SELECT * FROM usuario WHERE idRol = 6 AND Estado = 'Activo' ");
    }

    public static function getAllDocentes()
    {
        return Usuario::buscar("SELECT * FROM usuario WHERE idRol = 5 AND Estado = 'Activo' ");
    }

    public function insertar()
    {


        $this->insertRow("INSERT INTO usuario VALUE ( NULL , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(

                $this->Documento,
                $this->TipoDocumento,
                $this->Apellidos,
                $this->Nombres,
                $this->Email,
                $this->Password,
                $this->Celular,
                $this->Direccion,
                $this->Estado,
                $this->idRol


            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $arrUser = (array) $this;
        $this->updateRow("UPDATE usuario SET  Documento = ?, TipoDocumento = ?, Apellidos = ?, Nombres = ?, Email = ?, Password=?, Celular = ?, Direccion = ?,  Estado = ?, idRol = ? WHERE idUsuario = ?", array(

                $this->Documento,
                $this->TipoDocumento,
                $this->Apellidos,
                $this->Nombres,
                $this->Email,
                $this->Password,
                $this->Celular,
                $this->Direccion,
                $this->Estado,
                $this->idRol,
                $this->idUsuario

            )
        );
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }


    public static function Login($Email, $Password){
        $arrUsuarios = array();
        $tmp = new Usuario();
        $getTempUser = $tmp->getRows("SELECT * FROM usuario WHERE Email = '$Email'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM usuario WHERE Email = '$Email' AND Password = '$Password'");
            if(count($getrows) >= 1){
                foreach ($getrows as $valor) {
                    return $valor;
                }
            }else{
                return "Contraseña Incorrecta";
            }
        }else{
            return "No existe el usuario";
        }

        $tmp->Disconnect();
        return $arrUsuarios;
    }

}