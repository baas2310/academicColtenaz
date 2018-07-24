<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Registro de Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/LogoColtenaz18.ico">

    <?php include ("Includes/imports.php")?>

</head>


<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <?php include ("Includes/topBar.php")?>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <?php include("Includes/leftSideBar.php")?>
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
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title" align="center">Registro de Alumno</h4>
                            <p class="text-muted m-b-30 font-13" align="center">
                                Aquí usted puede registrar el Alumno de acuerdo al Estado(Inscrito, Matriculado, etc...) en que se encuentra con la institución.
                            </p>

                            <form id="wizard-clickable">
                                <fieldset title="1">
                                    <legend>Información Básica</legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="firstname1">* Documento</label>
                                                <input type="text" class="form-control" id="Documento" name="Documento" placeholder="Ingrese aquí el No. de Documento">
                                            </div>

                                            <div class="form-group">
                                                <label for="username1">* Nombres</label>
                                                <input type="text" class="form-control" id="Nombres" name="Nombres" placeholder="Ingrese aquí el Nombre completo">
                                            </div>

                                            <div class="form-group">
                                                <label for="password11">* Email</label>
                                                <input type="password" class="form-control" id="Email" name="Email" placeholder="direccionEmail@dominio.com">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="username">* Tipo de Documento</label>
                                                <select class="form-control">
                                                    <option>C.C</option>
                                                    <option>C.E</option>
                                                    <option>Registro Civil</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="emailaddress1">* Apellidos</label>
                                                <input type="email" class="form-control" id="Apellidos" name="Apellidos" placeholder="Ingrese aquí los Apellidos">
                                            </div>

                                            <div class="form-group">
                                                <label for="password2">* Confirmar Email</label>
                                                <input type="password" class="form-control" id="password2" placeholder="direccionEmail@dominio.com">
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>

                                <fieldset title="2">
                                    <legend>Datos Adicionales</legend>

                                    <div class="row m-t-20">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="phonenumber1">* Número de Celular</label>
                                                <input type="text" class="form-control" id="phonenumber1" placeholder="">
                                            </div>

                                            <div class="form-group">
                                                <label for="address1">* Contraseña</label>
                                                <input type="password" class="form-control" id="address1" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="username">* Estado</label>
                                                <select class="form-control">
                                                    <option>Activo</option>
                                                    <option>Inactivo</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="aboutme1">* Confirmar Contraseña</label>
                                                <input type="password" class="form-control" id="address1" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <button type="submit" class="btn btn-primary stepy-finish"><i class="fa fa-check-square-o"></i>&nbspRegistrar</button>
                            </form>

                            <p class="text-muted m-b-30 font-13">
                                Los campos con un * son obligatorios para completar el Registro.
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

<?php include ("Includes/scripts.php")?>

</body>
</html>