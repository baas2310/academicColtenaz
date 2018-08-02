<?php

require_once ('db_abstract_class.php');

class curso extends db_abstract_class
{
    private $idCurso;
    private $Curso;

    public function __construct($acacdemiccoltenaz_data=array())
    {

        parent::__construct();

        if (count($acacdemiccoltenaz_data)>1){
            foreach ($acacdemiccoltenaz_data as $campo =>$valor){
                $this->$campo = $valor;
            }
        }else{
            $this->idCurso = "";
            $this->Curso = "";


        }
    }



    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
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
    public function getCurso()
    {
        return $this->Curso;
    }

    /**
     * @param mixed $Curso
     */
    public function setCurso($Curso)
    {
        $this->Curso = $Curso;
    }

    public static function buscarForId($id)
    {
        $curso = new Curso();
        if ($id  > 0){
            $getRow = $curso->getRow("SELECT * FROM curso WHERE idCurso =?", array($id));
            $curso->idUsuario = $getRow['idCurso'];
            $curso->Documento = $getRow['Curso'];


            $curso->Disconnect();
            return $curso;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayCurso = array();
        $tmp = new Curso();
        $getRows = $tmp->getRows($query);

        foreach ($getRows as $valor){
            $curso = new Curso();
            $curso->idCurso = $valor['idCurso'];
            $curso->Curso = $valor['Curso'];

            array_push($arrayCurso, $curso);
        }
        $tmp->Disconnect();
        return $arrayCurso;
    }

    public static function getAll()
    {
        return Curso::buscar("SELECT * FROM curso ");
    }

    public function insertar()
    {


        $this->insertRow("INSERT INTO curso VALUE ( NULL , ?)", array(

                $this->Curso


            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $arrCurso = (array) $this;
        $this->updateRow("UPDATE curso SET  Curso = ? WHERE idCurso = ?", array(

                $this->Curso,
                $this->idCurso

            )
        );
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

}