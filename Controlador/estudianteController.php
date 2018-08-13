<?php

if(session_id() == "" )
    session_start();

require_once (__DIR__ . '/../Modelo/estudiante.php');

if (!empty($_GET['action'])){
    estudianteController::main($_GET['action']);
}else{
    //echo "No se encontro ninguna accion... ";
}

class estudianteController
{
    static function main($action){

        if ($action=="crear"){
            estudianteController::crear();
        }else if ($action=="editar"){
            estudianteController::editar();
        }else if ($action=="selectEstudiantes"){
            estudianteController::selectEstudiantes();
        }else if ($action=="adminTableEstudiante"){
            estudianteController::adminTableEstudiante();
        }else if ($action=="inactivarEstudiante"){
            estudianteController::CambiarEstado("Inactivo");
        }else if ($action=="activarEstudiante"){
            estudianteController::CambiarEstado("Activo");
        }else if ($action=="Login"){
            estudianteController::Login();
        }else if ($action=="CerrarSesion"){
            estudianteController::CerrarSession();
        }

    }

    static public function crear(){

        try{

            $arrayEstudiante = array();
            $arrayEstudiante['Documento'] = $_POST['Documento'];
            $arrayEstudiante['TipoDocumento'] = $_POST['TipoDocumento'];
            $arrayEstudiante['Apellidos'] = $_POST['Apellidos'];
            $arrayEstudiante['Nombres'] = $_POST['Nombres'];
            $arrayEstudiante['Email'] = $_POST['Email'];
            $arrayEstudiante['Password'] = $_POST['Password'];
            $arrayEstudiante['Celular'] = $_POST['Celular'];
            $arrayEstudiante['Direccion'] = $_POST['Direccion'];
            $arrayEstudiante['Estado'] = $_POST['Estado'];
            $arrayEstudiante['idAcudiente'] = $_POST['idAcudiente'];
            $arrayEstudiante['idRol'] = $_POST['idRol'];


            var_dump($arrayEstudiante);

            $estudiante = new Estudiante($arrayEstudiante);
            $estudiante->insertar();

            header("Location: ../Vista/Admin/default/adminAlumnos.php?respuesta=correcto");


        }catch (Exception $e){


            var_dump($e);

            /* header("Location: ../Vista/Admin/default/registrarAlumnos.php?respuesta=errorXUsuario"); */
        }

    }

    static public function editar(){

        try{
            $tmpObject = Estudiante::buscarForId($_SESSION["IdEstudiante"]);
            $Estado = $tmpObject->getEstado();
            $arrayEstudiante = array();
            $arrayEstudiante['Documento'] = $_POST['Documento'];
            $arrayEstudiante['TipoDocumento'] = $_POST['TipoDocumento'];
            $arrayEstudiante['Apellidos'] = $_POST['Apellidos'];
            $arrayEstudiante['Nombres'] = $_POST['Nombres'];
            $arrayEstudiante['Email'] = $_POST['Email'];
            $arrayEstudiante['Password'] = $_POST['Password'];
            $arrayEstudiante['Celular'] = $_POST['Celular'];
            $arrayEstudiante['Direccion'] = $_POST['Direccion'];
            $arrayEstudiante['Estado'] = $Estado;
            $arrayEstudiante['idAcudiente'] = $_POST['idAcudiente'];
            $arrayEstudiante['idRol'] = $_POST['idRol'];
            $arrayEstudiante['idEstudiante'] = $_SESSION['IdEstudiante'];
            $estudiante = new Estudiante($arrayEstudiante);

            var_dump($arrayEstudiante);

            $estudiante->editar();
            unset($_SESSION["IdEstudiante"]);
            header("Location: ../Vista/Admin/default/adminAlumnos.php?respuesta=correcto&IdEstudiante=".$arrayEstudiante['idEstudiante']);

        }catch (Exception $e){

            var_dump($e);
            /* $txtMensaje = $e->getMessage();

             header("Location: ../Vista/Admin/default/adminalumnos.php?respuesta=error&Mensaje=".$txtMensaje); */
        }

    }

    static public function selectEstudiantes($isRequired = true, $id = "idEstudiante", $nombre = "idEstudiante", $class = ""){

        $arrEstudiantes = Estudiante::getAllEstudiante();
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")."id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($arrEstudiantes) > 0){
            foreach ($arrEstudiantes as $estudiante)
                $htmlSelect .= "<option value='".$estudiante->getIdEstudiante()."'>".$estudiante->getDocumento()." - ".$estudiante->getApellidos()." ".$estudiante->getNombres()." - Celular: ".$estudiante->getCelular()." - Cód: ".$estudiante->getIdEstudiante()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;

    }

    static public function adminTableEstudiante(){

        $arrEstudiantes = Estudiante::getAll();
        $tmpEstudiantes = new Estudiante();
        $arrColumnas = ["Cód. Alumno", "No. Documento", "Tipo de Documento", "Apellidos", "Nombres", "Email", "Celular", "Direccion", "Datos del Acudiente", "Estado" ];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna){

            $htmltable .= "<th style='text-align: center'>".$NameColumna."</th>";

        }
        $htmltable .= "<th style='text-align: center'>Acciones</th>";
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($arrEstudiantes as $objEstudiante){
            $htmltable .="<tr>";

            $htmltable .= "<td>".$objEstudiante->getIdEstudiante()."</td>";
            $htmltable .= "<td>".$objEstudiante->getDocumento()."</td>";
            $htmltable .= "<td>".$objEstudiante->getTipoDocumento()."</td>";
            $htmltable .= "<td>".$objEstudiante->getApellidos()."</td>";
            $htmltable .= "<td>".$objEstudiante->getNombres()."</td>";
            $htmltable .= "<td>".$objEstudiante->getEmail()."</td>";
            $htmltable .= "<td>".$objEstudiante->getCelular()."</td>";
            $htmltable .= "<td>".$objEstudiante->getDireccion()."</td>";
            $htmltable .= "<td>".$objEstudiante->getIdAcudiente()."</td>";

            /*if ($objEstudiante->getIdRol() == "7"){
                $htmltable .= "<td>"."Estudiante"."</td>";
            }*/

            if ($objEstudiante->getEstado() == "Activo"){
                $htmltable .= "<td><span class= 'label label-success'>".$objEstudiante->getEstado()."</span></td>";
            }else{
                $htmltable .= "<td><span class='label label-inverse' >".$objEstudiante->getEstado()."</span></td>";
            }


            $icons = "";

            if ($objEstudiante->getEstado()=="Activo"){
                $icons .= "<a data-toggle='tooltip' title='Inactivar Alumno' data-placement='top' class='btn btn-icon waves-effect waves-light btn-danger newTooltip' href='../../../Controlador/estudianteController.php?action=inactivarEstudiante&idEstudiante=".$objEstudiante->getIdEstudiante()."'><i class='fa fa-remove'></i></a>";
            }else{
                $icons .= "<a data-toggle='tooltip' title='Activar Alumno' data-placement='top' class='btn btn-icon waves-effect waves-light btn-success newTooltip' href='../../../Controlador/estudianteController.php?action=activarEstudiante&idEstudiante=".$objEstudiante->getIdEstudiante()."'><i class='fa fa-check'></i></a>";
            }

            $icons .= "<a data-toggle='tooltip' title='Editar' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='editarAlumnos.php?IdEstudiante=".$objEstudiante->getIdEstudiante()."'><i class='fa fa-pencil'></i></a>";


            $htmltable .= "<td style='text-align: center'>".$icons."</td>";
            $htmltable .= "</tr>";

        }

        $htmltable .= "</tbody>";
        return $htmltable;

    }

    static public function CambiarEstado ($Estado){
        try {
            $idEstudiante = $_GET["idEstudiante"];
            $ObjEstudiante = Estudiante::buscarForId($idEstudiante);
            $ObjEstudiante->setEstado($Estado);
            var_dump($ObjEstudiante);
            $ObjEstudiante->editar();
            header("Location: ../Vista/Admin/default/adminAlumnos.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Admin/default/adminalumnos.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }

    public function Login (){

        try {
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
            if(!empty($Email) && !empty($Password)){
                $respuesta = Estudiante::Login($Email, $Password);
                if (is_array($respuesta)) {
                    if($respuesta["Estado"] == "Activo" ){
                        if ($respuesta["idRol"] == "7"){
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Estudiante";
                        }
                    }else{
                        echo "El usuario se encuentra Inactivo";
                    }
                }else if($respuesta == "Contraseña Incorrecta"){
                    echo "La Contraseña No Coincide Con El Estudiante";
                }else if($respuesta == "No existe el Estudiante"){
                    echo "No Existe Un Estudiante Con Estos Datos";
                }
            }else{
                echo "Datos Vacios";
            }
        } catch (Exception $e) {
            echo "Error No Identificado!!! ".$e;
        }
    }

    public function CerrarSession (){
        session_destroy();
        header("Location: ../Vista/Admin/default/login.php");
    }

}