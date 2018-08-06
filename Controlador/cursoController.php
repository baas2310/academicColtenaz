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
        }else if ($action=="inactivarCurso"){
            cursoController::CambiarEstado("Inactivo");
        }else if ($action=="activarCurso"){
            cursoController::CambiarEstado("Activo");
        }

    }

    static public function crear(){

        try{

            $arrayCurso = array();
            $arrayCurso['Curso'] = $_POST['Curso'];
            $arrayCurso['Estado'] = $_POST['Estado'];


            var_dump($arrayCurso);

            $curso = new Curso($arrayCurso);
            $curso->insertar();

            header("Location: ../Vista/Admin/default/adminCursos.php?respuesta=correcto");


        }catch (Exception $e){


            var_dump($e);

            /* header("Location: ../Vista/Admin/default/registrarCursos.php?respuesta=errorXCurso"); */
        }

    }

    static public function editar(){

        try{
            $tmpObject = Curso::buscarForId($_SESSION["IdCurso"]);
            $Estado = $tmpObject->getEstado();
            $arrayCurso = array();
            $arrayCurso['Curso'] = $_POST['Curso'];
            $arrayCurso['Estado'] = $Estado;
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
        $arrColumnas = ["Código", "Curso", "Estado" ];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna){

            $htmltable .= "<th>".$NameColumna."</th>";

        }
        $htmltable .= "<th style='text-align: center'>Acciones</th>";
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($arrCursos as $objCurso){
            $htmltable .="<tr>";

            $htmltable .= "<td>".$objCurso->getIdCurso()."</td>";
            $htmltable .= "<td>".$objCurso->getCurso()."</td>";

            if ($objCurso->getEstado() == "Activo"){
                $htmltable .= "<td><span class= 'label label-success'>".$objCurso->getEstado()."</span></td>";
            }else{
                $htmltable .= "<td><span class='label label-inverse' >".$objCurso->getEstado()."</span></td>";
            }


            $icons = "";

            if ($objCurso->getEstado()=="Activo"){
                $icons .= "<a data-toggle='tooltip' title='Inactivar Curso' data-placement='top' class='btn btn-icon waves-effect waves-light btn-danger newTooltip' href='../../../Controlador/cursoController.php?action=inactivarCurso&idCurso=".$objCurso->getIdCurso()."'><i class='fa fa-remove'></i></a>";
            }else{
                $icons .= "<a data-toggle='tooltip' title='Activar Curso' data-placement='top' class='btn btn-icon waves-effect waves-light btn-success newTooltip' href='../../../Controlador/cursoController.php?action=activarCurso&idCurso=".$objCurso->getIdCurso()."'><i class='fa fa-check'></i></a>";
            }

            $icons .= "<a data-toggle='tooltip' title='Editar' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='editarCursos.php?IdCurso=".$objCurso->getIdCurso()."'><i class='fa fa-pencil'></i></a>";


            $htmltable .= "<td style='text-align: center'>".$icons."</td>";

            $htmltable .= "</tr>";

        }

        $htmltable .= "</tbody>";
        return $htmltable;

    }

    static public function CambiarEstado ($Estado){
        try {
            $idCurso = $_GET["idCurso"];
            $ObjCurso = Curso::buscarForId($idCurso);
            $ObjCurso->setEstado($Estado);
            var_dump($ObjCurso);
            $ObjCurso->editar();
            header("Location: ../Vista/Admin/default/adminCursos.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Admin/default/adminCursos.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }

}