<?php

if(session_id() == "" )
    session_start();

require_once (__DIR__.'/../Modelo/usuario.php');

if (!empty($_GET['action'])){
    usuarioController::main($_GET['action']);
}else{
    //echo "No se encontro ninguna accion... ";
}

class usuarioController
{
    static function main($action){

        if ($action=="crear"){
            usuarioController::crear();
        }else if ($action=="editar"){
            usuarioController::editar();
        }else if ($action=="selectUsuarios"){
            usuarioController::selectUsuarios();
        }else if ($action=="adminTableUsuario"){
            usuarioController::adminTableUsuario();
        }else if ($action=="inactivarUsuario"){
            usuarioController::CambiarEstado("Inactivo");
        }else if ($action=="activarUsuario"){
            usuarioController::CambiarEstado("Activo");
        }else if ($action=="Login"){
            usuarioController::Login();
        }else if ($action=="CerrarSesion"){
            usuarioController::CerrarSession();
        }

    }

    static public function crear(){

        try{

            $arrayUsuario = array();
            $arrayUsuario['Documento'] = $_POST['Documento'];
            $arrayUsuario['TipoDocumento'] = $_POST['TipoDocumento'];
            $arrayUsuario['Apellidos'] = $_POST['Apellidos'];
            $arrayUsuario['Nombres'] = $_POST['Nombres'];
            $arrayUsuario['Email'] = $_POST['Email'];
            $arrayUsuario['Password'] = $_POST['Password'];
            $arrayUsuario['Celular'] = $_POST['Celular'];
            $arrayUsuario['Direccion'] = $_POST['Direccion'];
            $arrayUsuario['Estado'] = $_POST['Estado'];
            $arrayUsuario['idRol'] = $_POST['idRol'];


            var_dump($arrayUsuario);

            $usuario = new Usuario($arrayUsuario);
            $usuario->insertar();

            header("Location: ../Vista/Admin/default/adminUsuarios.php?respuesta=correcto");


        }catch (Exception $e){


            var_dump($e);

            /* header("Location: ../Vista/Admin/default/registrarUsuarios.php?respuesta=errorXUsuario"); */
        }

    }

    static public function editar(){

        try{
            $tmpObject = Usuario::buscarForId($_SESSION["IdUsuario"]);
            $Estado = $tmpObject->getEstado();
            $arrayUsuario = array();
            $arrayUsuario['Documento'] = $_POST['Documento'];
            $arrayUsuario['TipoDocumento'] = $_POST['TipoDocumento'];
            $arrayUsuario['Apellidos'] = $_POST['Apellidos'];
            $arrayUsuario['Nombres'] = $_POST['Nombres'];
            $arrayUsuario['Email'] = $_POST['Email'];
            $arrayUsuario['Password'] = $_POST['Password'];
            $arrayUsuario['Celular'] = $_POST['Celular'];
            $arrayUsuario['Direccion'] = $_POST['Direccion'];
            $arrayUsuario['Estado'] = $Estado;
            $arrayUsuario['idRol'] = $_POST['idRol'];
            $arrayUsuario['idUsuario'] = $_SESSION['IdUsuario'];
            $usuario = new Usuario($arrayUsuario);

            var_dump($arrayUsuario);

            $usuario->editar();
            unset($_SESSION["IdUsuario"]);
            header("Location: ../Vista/Admin/default/adminUsuarios.php?respuesta=correcto&IdUsuario=".$arrayUsuario['idUsuario']);

        }catch (Exception $e){

            var_dump($e);
            /* $txtMensaje = $e->getMessage();

             header("Location: ../Vista/Admin/default/adminUsuario.php?respuesta=error&Mensaje=".$txtMensaje); */
        }

    }

    static public function selectUsuarios($isRequired = true, $id = "idUsuario", $nombre = "idUsuario", $class = ""){

        $arrUsuarios = Usuario::getAll();
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")."id= '".$id."' name='".$nombre."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";

        if (count($arrUsuarios) > 0){
            foreach ($arrUsuarios as $usuario)
                $htmlSelect .= "<option value='".$usuario->getIdUsuario()."'>"."Cód: ".$usuario->getIdUsuario()." - No.Documento: ".$usuario->getDocumento()." - ".$usuario->getApellidos()." ".$usuario->getNombres()." - Celular: ".$usuario->getCelular()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;

    }

    static public function adminTableUsuario(){

        $arrUsuarios = Usuario::getAll();
        $tmpUsuario = new Usuario();
        $arrColumnas = ["Código", "No. Documento", "Tipo de Doc", "Apellidos", "Nombres", "Email", "Celular", "Direccion", "Cargo o Rol", "Estado" ];
        $htmltable = "<thead>";
        $htmltable .= "<tr>";

        foreach ($arrColumnas as $NameColumna){

            $htmltable .= "<th>".$NameColumna."</th>";

        }
        $htmltable .= "<th style='text-align: center'>Acciones</th>";
        $htmltable .= "</tr>";
        $htmltable .= "</thead>";

        $htmltable .= "<tbody>";
        foreach ($arrUsuarios as $objUsuario){
            $htmltable .="<tr>";

            $htmltable .= "<td>".$objUsuario->getIdUsuario()."</td>";
            $htmltable .= "<td>".$objUsuario->getDocumento()."</td>";
            $htmltable .= "<td>".$objUsuario->getTipoDocumento()."</td>";
            $htmltable .= "<td>".$objUsuario->getApellidos()."</td>";
            $htmltable .= "<td>".$objUsuario->getNombres()."</td>";
            $htmltable .= "<td>".$objUsuario->getEmail()."</td>";
            $htmltable .= "<td>".$objUsuario->getCelular()."</td>";
            $htmltable .= "<td>".$objUsuario->getDireccion()."</td>";

            if ($objUsuario->getIdRol() == "1"){
                $htmltable .= "<td>"."Rector"."</td>";
            }elseif ($objUsuario->getIdRol() == "2"){
                $htmltable .= "<td>"."Psicorientador(a)"."</td>";
            }elseif ($objUsuario->getIdRol() == "3"){
                $htmltable .= "<td>"."Coordinador(a)"."</td>";
            }elseif ($objUsuario->getIdRol() == "4"){
                $htmltable .= "<td>"."Secretaria"."</td>";
            }elseif ($objUsuario->getIdRol() == "5"){
                $htmltable .= "<td>"."Docente"."</td>";
            }elseif ($objUsuario->getIdRol() == "6"){
                $htmltable .= "<td>"."Acudiente"."</td>";
            }

            if ($objUsuario->getEstado() == "Activo"){
                $htmltable .= "<td><span class= 'label label-success'>".$objUsuario->getEstado()."</span></td>";
            }else{
                $htmltable .= "<td><span class='label label-inverse' >".$objUsuario->getEstado()."</span></td>";
            }


            $icons = "";

            if ($objUsuario->getEstado()=="Activo"){
                $icons .= "<a data-toggle='tooltip' title='Inactivar Usuario' data-placement='top' class='btn btn-icon waves-effect waves-light btn-danger newTooltip' href='../../../Controlador/usuarioController.php?action=inactivarUsuario&idUsuario=".$objUsuario->getIdUsuario()."'><i class='fa fa-remove'></i></a>";
            }else{
                $icons .= "<a data-toggle='tooltip' title='Activar Usuario' data-placement='top' class='btn btn-icon waves-effect waves-light btn-success newTooltip' href='../../../Controlador/usuarioController.php?action=activarUsuario&idUsuario=".$objUsuario->getIdUsuario()."'><i class='fa fa-check'></i></a>";
            }

            $icons .= "<a data-toggle='tooltip' title='Editar' data-placement='top' class='btn btn-icon waves-effect waves-light btn-info newTooltip' href='editarUsuarios.php?IdUsuario=".$objUsuario->getIdUsuario()."'><i class='fa fa-pencil'></i></a>";


            $htmltable .= "<td style='text-align: center'>".$icons."</td>";
            $htmltable .= "</tr>";

        }

        $htmltable .= "</tbody>";
        return $htmltable;

    }

    static public function CambiarEstado ($Estado){
        try {
            $idUsuario = $_GET["idUsuario"];
            $ObjUsuario = Usuario::buscarForId($idUsuario);
            $ObjUsuario->setEstado($Estado);
            var_dump($ObjUsuario);
            $ObjUsuario->editar();
            header("Location: ../Vista/Admin/default/adminUsuarios.php?respuesta=correcto");
        }catch (Exception $e){
            $txtMensaje = $e->getMessage();
            header("Location: ../Vista/Admin/default/adminUsuarios.php?respuesta=error&Mensaje=".$txtMensaje);
        }
    }

    public function Login (){

        try {
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
            if(!empty($Email) && !empty($Password)){
                $respuesta = Usuario::Login($Email, $Password);
                if (is_array($respuesta)) {
                    if($respuesta["Estado"] == "Activo" ){
                        if ($respuesta["idRol"] == "1"){
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Rector";
                        }elseif ($respuesta["idRol"] == "2"){
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Psicorientador(a)";
                        }elseif ($respuesta["idRol"] == "3"){
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Coordinador(a)";
                        }elseif ($respuesta['idRol'] == "4"){
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Secretaria";
                        }elseif ($respuesta['idRol'] == "5"){
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Docente";
                        }elseif ($respuesta['idRol'] == "6"){
                            $_SESSION['DataUser'] = $respuesta;
                            echo "Acudiente";
                        }
                    }else{
                        echo "El usuario se encuentra Inactivo";
                    }
                }else if($respuesta == "Contraseña Incorrecta"){
                    echo "La Contraseña No Coincide Con El Usuario";
                }else if($respuesta == "No existe el usuario"){
                    echo "No Existe Un Usuario Con Estos Datos";
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