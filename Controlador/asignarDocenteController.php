<?php

if(session_id() == "" )
    session_start();

require_once (__DIR__.'/../Modelo/asignarDocente.php');

if (!empty($_GET['action'])){
    asignarDocenteController::main($_GET['action']);
}else{
    //echo "No se encontro ninguna accion... ";
}

class asignarDocenteController
{
    static function main($action){

        if ($action=="crear"){
            asignarDocenteController::crear();
        }else if ($action=="adminTableDocente"){
            asignarDocenteController::adminTableDocente();
        }

    }

    static public function crear(){

        try{

            $arrayDocente = array();
            $arrayDocente['Year'] = $_POST['Year'];
            $arrayDocente['idUsuario'] = $_POST['idUsuario'];
            $arrayDocente['idCurso'] = $_POST['idCurso'];
            $arrayDocente['idMateria'] = $_POST['idMateria'];


            var_dump($arrayDocente);

            $docente = new asignarDocente($arrayDocente);
            $docente->insertar();

            header("Location: ../Vista/Admin/default/asignarDocente.php?respuesta=correcto");


        }catch (Exception $e){


            var_dump($e);

            /* header("Location: ../Vista/Admin/default/asignarDocente.php?respuesta=errorXCurso"); */
        }

    }

    static public function adminTableDocente(){

        $arrDocentes = asignarDocente::getAll();
        $tmpDocente = new asignarDocente();
        $arrColumnas = ["Año", "Datos del Docente", "Curso en que Dicta", "Asignatura que Dicta" ];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna){

            $htmltable .= "<th>".$NameColumna."</th>";

        }
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($arrDocentes as $objDocente){
            $htmltable .="<tr>";

            $htmltable .= "<td>".$objDocente->getYear()."</td>";
            $htmltable .= "<td>".$objDocente->getidUsuario()."</td>";
            $htmltable .= "<td>".$objDocente->getidCurso()."</td>";
            $htmltable .= "<td>".$objDocente->getidMateria()."</td>";



            $htmltable .= "</tr>";

        }

        $htmltable .= "</tbody>";
        return $htmltable;

    }

}