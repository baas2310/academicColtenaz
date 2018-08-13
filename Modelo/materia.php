<?php

require_once ('db_abstract_class.php');

class materia extends db_abstract_class
{
    private $idMateria;
    private $Materia;
    private $Estado;

    public function __construct($acacdemiccoltenaz_data=array())
    {

        parent::__construct();

        if (count($acacdemiccoltenaz_data)>1){
            foreach ($acacdemiccoltenaz_data as $campo =>$valor){
                $this->$campo = $valor;
            }
        }else{
            $this->idMateria = "";
            $this->Materia = "";
            $this->Estado = "";

        }
    }

    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return mixed
     */
    public function getIdMateria()
    {
        return $this->idMateria;
    }

    /**
     * @param mixed $idMateria
     */
    public function setIdMateria($idMateria)
    {
        $this->idMateria = $idMateria;
    }

    /**
     * @return mixed
     */
    public function getMateria()
    {
        return $this->Materia;
    }

    /**
     * @param mixed $Materia
     */
    public function setMateria($Materia)
    {
        $this->Materia = $Materia;
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

    public static function buscarForId($id)
    {
        $materia = new Materia();
        if ($id  > 0){
            $getRow = $materia->getRow("SELECT * FROM materia WHERE idMateria =?", array($id));
            $materia->idMateria = $getRow['idMateria'];
            $materia->Materia = $getRow['Materia'];
            $materia->Estado = $getRow['Estado'];


            $materia->Disconnect();
            return $materia;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayMateria = array();
        $tmp = new Materia();
        $getRows = $tmp->getRows($query);

        foreach ($getRows as $valor){
            $materia = new Materia();
            $materia->idMateria = $valor['idMateria'];
            $materia->Materia = $valor['Materia'];
            $materia->Estado = $valor['Estado'];

            array_push($arrayMateria, $materia);
        }
        $tmp->Disconnect();
        return $arrayMateria;
    }

    public static function getAll()
    {
        return Materia::buscar("SELECT * FROM materia ");
    }

    public static function getAllMaterias()
    {
        return Materia::buscar("SELECT * FROM materia WHERE Estado = 'Activo' ");
    }

    public function insertar()
    {


        $this->insertRow("INSERT INTO materia VALUE ( NULL , ?, ?)", array(

                $this->Materia,
                $this->Estado


            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $arrMateria = (array) $this;
        $this->updateRow("UPDATE materia SET  Materia = ?,  Estado = ? WHERE idMateria = ?", array(

                $this->Materia,
                $this->Estado,
                $this->idMateria

            )
        );
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

}