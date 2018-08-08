<?php

require_once ('db_abstract_class.php');

class asignarDocente extends db_abstract_class
{
    private $idAsignacionDocente;
    private $Year;
    private $idUsuario;
    private $idCurso;
    private $idMateria;

    public function __construct($acacdemiccoltenaz_data=array())
    {

        parent::__construct();

        if (count($acacdemiccoltenaz_data)>1){
            foreach ($acacdemiccoltenaz_data as $campo =>$valor){
                $this->$campo = $valor;
            }
        }else{
            $this->idAsignacionDocente = "";
            $this->Year = "";
            $this->idUsuario = "";
            $this->idCurso = "";
            $this->idMateria = "";

        }
    }



    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
    }

    /**
     * @return mixed
     */
    public function getIdAsignacionDocente()
    {
        return $this->idAsignacionDocente;
    }

    /**
     * @param mixed $idAsignacionDocente
     */
    public function setIdAsignacionDocente($idAsignacionDocente)
    {
        $this->idAsignacionDocente = $idAsignacionDocente;
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
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
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

    public static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    public static function buscar($query)
    {
        $arrayDocente = array();
        $tmp = new asignarDocente();
        $getRows = $tmp->getRows($query);

        foreach ($getRows as $valor){
            $docente = new asignarDocente();
            $docente->idAsignacionDocente = $valor['idAsignacionDocente'];
            $docente->Year = $valor['Year'];
            $docente->idUsuario = $valor['idUsuario'];
            $docente->idCurso = $valor['idCurso'];
            $docente->idMateria = $valor['idMateria'];

            array_push($arrayDocente, $docente);
        }
        $tmp->Disconnect();
        return $arrayDocente;
    }

    public static function getAll()
    {
        return asignarDocente::buscar("SELECT AD.idAsignacionDocente, AD.Year, CONCAT('Cód: ',U.idUsuario, ' - No.Documento: ',U.Documento,' - ',U.Nombres,' ',U.Apellidos, ' - Celular: ',U.Celular) as idUsuario, C.Curso as idCurso, M.Materia as idMateria FROM asignaciondocente AD 
                                            LEFT OUTER JOIN usuario U on AD.idUsuario = U.idUsuario 
                                            LEFT OUTER JOIN curso C on AD.idCurso = C.idCurso 
                                            LEFT OUTER JOIN materia M on AD.idMateria = M.idMateria ");
    }

    public function insertar()
    {


        $this->insertRow("INSERT INTO asignaciondocente VALUE ( NULL , ?, ?, ?, ?)", array(

                $this->Year,
                $this->idUsuario,
                $this->idCurso,
                $this->idMateria


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