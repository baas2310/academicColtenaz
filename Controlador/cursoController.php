<?php

if(session_id() == "" )
    session_start();

require_once (__DIR__.'/../Modelo/curso.php');

if (!empty($_GET['action'])){
    cursoController::main($_GET['action']);
}else{
    //echo "No se encontro ninguna accion... ";
}

class cursoController
{
    static function main($action){

        if ($action=="crear"){
            cursoController::crear();
        }else if ($action=="editar"){
            cursoController::editar();
        }else if ($action=="selectCurso"){
            cursoController::selectCursos();
        }else if ($action=="adminTableCurso"){
            cursoController::adminTableCurso();
        }

    }

    static public function crear(){

        try{

            $arrayCurso = array();
            $arrayCurso['Curso'] = $_POST['Curso'];


            var_dump($arrayCurso);

            $curso = new Curso($arrayCurso);
            $curso->insertar();

            header("Location: ../Vista/Admin/default/adminCursos.php?respuesta=correcto");


        }catch (Exception $e){


            var_dump($e);

            /* header("Location: ../Vista/Admin/default/registrarCursos.php?respuesta=errorXUsuario"); */
        }

    }

    static public function editar(){

        try{
            $tmpObject = Curso::buscarForId($_SESSION["IdCurso"]);
            $arrayCurso = array();
            $arrayCurso['Curso'] = $_POST['Curso'];
            $arrayCurso['idCurso'] = $_SESSION['IdCurso'];
            $curso = new Curso($arrayCurso);

            var_dump($arrayCurso);

            $curso->editar();
            unset($_SESSION["IdCurso"]);
            header("Location: ../Vista/Admin/default/adminCursos.php?respuesta=correcto&IdCurso=".$arrayCurso['idCurso']);

        }catch (Exception $e){

            var_dump($e);
            /* $txtMensaje = $e->getMessage();

             header("Location: ../Vista/Admin/default/adminCursos.php?respuesta=error&Mensaje=".$txtMensaje); */
        }

    }

    static public function selectCursos($isRequired = true, $id = "idCurso", $nombre = "idCurso", $class = ""){

        $arrCursos = Curso::getAll();
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")."id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($arrCursos) > 0){
            foreach ($arrCursos as $curso)
                $htmlSelect .= "<option value='".$curso->getIdCurso()."'>".$curso->getCurso()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;

    }

    static public function adminTableCurso(){

        $arrCursos = Curso::getAll();
        $tmpCurso = new Curso();
        $arrColumnas = ["Código", "Curso" ];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna){

            $htmltable .= "<th>".$NameColumna."</th>";

        }
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($arrCursos as $objCurso){
            $htmltable .="<tr>";

            $htmltable .= "<td>".$objCurso->getIdCurso()."</td>";
            $htmltable .= "<td>".$objCurso->getDocumento()."</td>";

            $htmltable .= "</tr>";

        }

        $htmltable .= "</tbody>";
        return $htmltable;

    }

}