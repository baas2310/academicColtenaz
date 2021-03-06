<?php

session_start();

require "../../../Modelo/estudiante.php";

if (empty($_SESSION["DataUser"]["idRol"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["idRol"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "2" && $_SESSION["user"] != "3" && $_SESSION["user"] != "4"){
    header('Location: Index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Registro de Alumno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Controlador Necesario -->
    <?php require "../../../Controlador/usuarioController.php" ?>

    <?php include("Includes/imports.php") ?>

</head>


<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <?php include("Includes/topBar.php") ?>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <?php include("Includes/leftSideBar.php") ?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <!-- start row -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title float-left">Sistema de Gestión de Procesos Academicos Institución Educativa Técnica de Nazareth Nobsa.</h4>

                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Administración</a></li>
                                <li class="breadcrumb-item active">Registrar Alumno</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->
                <!-- Clickable Wizard -->
                <div class="row">

                    <div id="alertas" class="center-page">
                        <?php if(!empty($_GET["respuesta"]) && $_GET["respuesta"] == "correcto"){ ?>
                            <div class="alert alert-icon alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="mdi mdi-check-all"></i>
                                <strong>Registrado!</strong> Ha registrado exitosamente el Alumno. Para ver los Alumnos
                                registrados ingrese
                                <a href="adminAlumnos.php" class="alert-link">Aquí</a> .
                            </div>
                        <?php } ?>

                    </div>

                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="text-center text-custom"><strong>REGISTRO DE ALUMNO</strong></h4>
                            <p class="text-muted m-b-30 font-13" align="center">
                                Aquí usted puede registrar el Alumno de acuerdo a su Estado(Inscrito, Matriculado,etc...) y al Grado (Primero, Sexto, Once, etc...) que va a cursar; tambien usted debe registrar al Acudiente del mismo.
                            </p>

                            <p class="text-muted m-b-30 font-13">
                                <span class="text-danger">*</span> Primero debe registrar los datos del Acudiente ingresando <a href="registrarUsuarios.php" class="alert-link">Aquí</a> para poder generar el Código del Acudiente y así completar el Registro del Alumno.
                            </p>

                            <form id="wizard-clickable" role="form" method="post" action="../../../Controlador/estudianteController.php?action=crear">
                                <fieldset title="1">
                                    <legend>Información Básica del Alumno</legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Documento"><span class="text-danger">*</span> Documento de Identidad</label>
                                                <input type="text" class="form-control" id="Documento" name="Documento"
                                                       placeholder="Ingrese aquí el No. de Documento"
                                                       data-parsley-type="number" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Nombres"><span class="text-danger">*</span> Nombres</label>
                                                <input type="text" class="form-control" id="Nombres" name="Nombres"
                                                       placeholder="Ingrese aquí el Nombre completo"
                                                       parsley-trigger="change" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Email"><span class="text-danger">*</span> Email</label>
                                                <input type="email" class="form-control" id="Email" name="Email"
                                                       placeholder="direccionEmail@dominio.com"
                                                       parsley-trigger="change" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="TipoDocumento"><span class="text-danger">*</span> Tipo de Documento</label>
                                                <select class="form-control" id="TipoDocumento" required name="TipoDocumento">
                                                    <option>T.I</option>
                                                    <option>Registro Civil</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="Apellidos"><span class="text-danger">*</span> Apellidos</label>
                                                <input type="text" class="form-control" id="Apellidos" name="Apellidos"
                                                       placeholder="Ingrese aquí los Apellidos"
                                                       parsley-trigger="change" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Numero"><span class="text-danger">*</span> Número de Celular</label>
                                                <input type="text" class="form-control" id="Celular" name="Celular"
                                                       placeholder="3xx xxx xxxx" parsley-trigger="change" required>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>

                                <fieldset title="2">
                                    <legend>Datos Adicionales</legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="Direccion"><span class="text-danger">*</span> Dirección</label>
                                                <input type="text" class="form-control" id="Direccion" name="Direccion"
                                                       placeholder="Calle xx No. xx - xx" parsley-trigger="change" required>
                                            </div>

                                            <div class="form-group" style="display: none">
                                                <label for="Cargo"><span class="text-danger">*</span> Cargo o Rol</label>
                                                <select class="form-control" id="idRol" required name="idRol">
                                                    <option value="7">Estudiante</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="Password"><span class="text-danger">*</span> Contraseña</label>
                                                <input type="password" class="form-control" id="Password" name="Password"
                                                       placeholder="" parsley-trigger="change" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group" style="display: none">
                                                <label for="Estado"><span class="text-danger">*</span> Estado</label>
                                                <select class="form-control" id="Estado" required name="Estado">
                                                    <option>Activo</option>
                                                    <option>Inactivo</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="Acudiente"><span class="text-danger">*</span> Código y Datos del Acudiente:</label>
                                                <?php echo usuarioController::selectUsuariosAcudientes(true, "idUsuario", "idUsuario", "form-control"); ?>
                                                <!--<label for="Acudiente"><span class="text-danger">*</span> Código del Acudiente</label>
                                                <input type="text" class="form-control" id="idAcudiante" name="idAcudiente"
                                                       placeholder="Ingrese aquí el código del Acudiente"
                                                       parsley-trigger="change" >-->
                                            </div>

                                            <div class="form-group">
                                                <label for="Password2"><span class="text-danger">*</span> Confirmar Contraseña</label>
                                                <input data-parsley-equalto="#Password"type="password" class="form-control"
                                                       id="Password2" name="Password2" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <button type="submit" class="btn btn-primary stepy-finish"><i class="fa fa-check-square-o"></i>&nbspRegistrar</button>
                            </form>

                            <p class="text-muted m-b-30 font-13">
                                Los campos con un <span class="text-danger">*</span> son obligatorios para completar el Registro.
                            </p>

                        </div>
                    </div>
                </div>
                <!-- End row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2018 © Institución Educativa Técnica de Nazareth Nobsa
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php include("Includes/scripts.php") ?>

</body>
</html>