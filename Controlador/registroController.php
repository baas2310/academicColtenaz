<?php

if(session_id() == "" )
    session_start();

require_once (__DIR__.'/../Modelo/registro.php');

if (!empty($_GET['action'])){
    registroController::main($_GET['action']);
}else{
    //echo "No se encontro ninguna accion... ";
}

class registroController
{
    static function main($action){

        if ($action=="crear"){
            registroController::crear();
        }else if ($action=="adminTableRegistro"){
            registroController::adminTableRegistro();
        }

    }

    static public function crear(){

        try{

            $arrayRegistro = array();
            $arrayRegistro['Year'] = $_POST['Year'];
            $arrayRegistro['idEstudiante'] = $_POST['idEstudiante'];
            $arrayRegistro['idCurso'] = $_POST['idCurso'];


            var_dump($arrayRegistro);

            $registro = new registro($arrayRegistro);
            $registro->insertar();

            header("Location: ../Vista/Admin/default/asignarEstudiante.php?respuesta=correcto");


        }catch (Exception $e){


            var_dump($e);

            /* header("Location: ../Vista/Admin/default/registro.php?respuesta=errorXCurso"); */
        }

    }

    static public function adminTableRegistro(){

        $arrRegistro = registro::getAll();
        $tmpRegistro = new registro();
        $arrColumnas = ["Año", "Datos del Estudiante", "Curso" ];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna){

            $htmltable .= "<th style='text-align: center'>".$NameColumna."</th>";

        }
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($arrRegistro as $objRegistro){
            $htmltable .="<tr>";

            $htmltable .= "<td>".$objRegistro->getYear()."</td>";
            $htmltable .= "<td>".$objRegistro->getidEstudiante()."</td>";
            $htmltable .= "<td>".$objRegistro->getidCurso()."</td>";



            $htmltable .= "</tr>";

        }

        $htmltable .= "</tbody>";
        return $htmltable;

    }

}