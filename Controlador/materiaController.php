<?php

if(session_id() == "" )
    session_start();

require_once (__DIR__.'/../Modelo/materia.php');

if (!empty($_GET['action'])){
    materiaController::main($_GET['action']);
}else{
    //echo "No se encontro ninguna accion... ";
}

class materiaController
{
    static function main($action){

        if ($action=="crear"){
            materiaController::crear();
        }else if ($action=="editar"){
            materiaController::editar();
        }else if ($action=="selectCurso"){
            materiaController::selectMaterias();
        }else if ($action=="adminTableCurso"){
            materiaController::adminTableMateria();
        }else if ($action=="inactivarCurso"){
            materiaController::CambiarEstado("Inactivo");
        }else if ($action=="activarCurso"){
            materiaController::CambiarEstado("Activo");
        }

    }

    static public function crear(){

        try{

            $arrayMateria = array();
            $arrayMateria['Materia'] = $_POST['Materia'];
            $arrayMateria['Estado'] = $_POST['Estado'];


            var_dump($arrayMateria);

            $materia = new Materia($arrayMateria);
            $materia->insertar();

            header("Location: ../Vista/Admin/default/adminAsignaturas.php?respuesta=correcto");


        }catch (Exception $e){


            var_dump($e);

            /* header("Location: ../Vista/Admin/default/adminAsignaturas.php?respuesta=errorXCurso"); */
        }

    }

    static public function editar(){

        try{
            $tmpObject = Materia::buscarForId($_SESSION["IdMateria"]);
            $Estado = $tmpObject->getEstado();
            $arrayMateria = array();
            $arrayMateria['Materia'] = $_POST['Materia'];
            $arrayMateria['Estado'] = $Estado;
            $arrayMateria['idMateria'] = $_SESSION['IdMateria'];
            $materia = new Materia($arrayMateria);

            var_dump($arrayMateria);

            $materia->editar();
            unset($_SESSION["IdMateria"]);
            header("Location: ../Vista/Admin/default/adminAsignaturas.php?respuesta=correcto&IdMateria=".$arrayMateria['idMateria']);

        }catch (Exception $e){

            var_dump($e);
            /* $txtMensaje = $e->getMessage();

             header("Location: ../Vista/Admin/default/adminAsignaturas.php?respuesta=error&Mensaje=".$txtMensaje); */
        }

    }

    static public function selectMaterias($isRequired = true, $id = "idMateria", $nombre = "idMateria", $class = ""){

        $arrMaterias = Materia::getAll();
        $htmlSelect = "<select class=\"form-control\" ".(($isRequired) ? "required" : "")."id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($arrMaterias) > 0){
            foreach ($arrMaterias as $materia)
                $htmlSelect .= "<option value='".$materia->getIdMateria()."'>".$materia->getMateria()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;

    }

    static public function adminTableMateria(){

        $arrMaterias = Materia::getAll();
        $tmpMateria = new Materia();
        $arrColumnas = ["Código", "Materia", "Estado" ];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna){

            $htmltable .= "<th>".$NameColumna."</th>";

        }
        $htmltable .= "<th style='text-align: center'>Acciones</th>";
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($arrMaterias as $objMateria){
            $htmltable .="<tr>";

            $htmltable .= "<td>".$objMateria->getIdMateria()."</td>";
            $htmltable .= "<td>".$objMateria->getMateria()."</td>";

            if ($objMateria->getEstado() == "Activo"){
                $htmltable .= "<td><span class= 'label label-success'>".$objMateria->getEstado()."</span></td>";
            }else{
                $htmltable .= "<td><span class='label label-inverse' >".$objMateria->getEstado()."</span></td>";
            }


            $icons = "";

            if ($objMateria->getEstado()=="Activo"){
                $icons .= "<a data-toggle='tooltip' title='Inactivar Materia' data-placement='top' class='btn btn-icon waves-effect waves-light btn-danger newTooltip' href='../../../Controlador/materiaController.php?action=inactivarCurso&idMateria=".$objMateria->getIdMateria()."'><i class='fa fa-remove'></i></a>";
            }else{
                $icons .= "<a data-toggle='tooltip' title='Activar Materia' data-placement='top' class='btn btn-icon waves-effect waves-light btn-success newTooltip' href='../../../Controlador/materiaController.php?action=activarCurso&idMateria=".$objMateria->getIdMateria()."'><i class='fa fa-check'></i></a>";
            }

            $icons .= "<a data-toggle='tooltip' title='Editar' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='editarAsignaturas.php?IdMateria=".$objMateria->getIdMateria()."'><i class='fa fa-pencil'></i></a>";


            $htmltable .= "<td style='text-align: center'>".$icons."</td>";

            $htmltable .= "</tr>";

        }

        $htmltable .= "</tbody>";
        return $htmltable;

    }

    static public function CambiarEstado ($Estado){
        try {
            $idMateria = $_GET["idMateria"];
            $ObjMateria = Materia::buscarForId($idMateria);
            $ObjMateria->setEstado($Estado);
            var_dump($ObjMateria);
            $ObjMateria->editar();
            header("Location: ../Vista/Admin/default/adminAsignaturas.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Admin/default/adminAsignaturas.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }

}