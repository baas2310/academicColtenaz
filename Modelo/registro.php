<?php

require_once ('db_abstract_class.php');

class registro extends db_abstract_class
{
    private $idRegistro;
    private $Year;
    private $idEstudiante;
    private $idCurso;

    public function __construct($acacdemiccoltenaz_data=array())
    {

        parent::__construct();

        if (count($acacdemiccoltenaz_data)>1){
            foreach ($acacdemiccoltenaz_data as $campo =>$valor){
                $this->$campo = $valor;
            }
        }else{
            $this->idRegistro = "";
            $this->Year = "";
            $this->idEstudiante = "";
            $this->idCurso = "";

        }
    }



    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return mixed
     */
    public function getIdRegistro()
    {
        return $this->idRegistro;
    }

    /**
     * @param mixed $idRegistro
     */
    public function setIdRegistro($idRegistro)
    {
        $this->idRegistro = $idRegistro;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->Year;
    }

    /**
     * @param mixed $Year
     */
    public function setYear($Year)
    {
        $this->Year = $Year;
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

    public static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    public static function buscar($query)
    {
        $arrayRegistro = array();
        $tmp = new registro();
        $getRows = $tmp->getRows($query);

        foreach ($getRows as $valor){
            $registro = new registro();
            $registro->idRegistro = $valor['idRegistro'];
            $registro->Year = $valor['Year'];
            $registro->idEstudiante = $valor['idEstudiante'];
            $registro->idCurso = $valor['idCurso'];

            array_push($arrayRegistro, $registro);
        }
        $tmp->Disconnect();
        return $arrayRegistro;
    }

    public static function getAll()
    {
        return registro::buscar("SELECT R.idRegistro,R.Year, CONCAT('Cód: ',E.idEstudiante, ' - No.Documento: ',E.Documento,' - ',E.Nombres,' ',E.Apellidos, ' - Celular: ',E.Celular) as idEstudiante,C.Curso as idCurso FROM registro R 
                                            LEFT OUTER JOIN estudiante E on R.idEstudiante = E.idEstudiante 
                                            LEFT OUTER JOIN curso C on R.idCurso = C.idCurso ");
    }

    public function insertar()
    {


        $this->insertRow("INSERT INTO registro VALUE ( NULL , ?, ?, ?)", array(

                $this->Year,
                $this->idEstudiante,
                $this->idCurso


            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        // TODO: Implement editar() method.
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

}