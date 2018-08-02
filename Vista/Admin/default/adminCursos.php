<?php

session_start();
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
    <title>Administrar Cursos</title>
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
                                <li class="breadcrumb-item active">Administrar Cursos</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title" align="center">Registro de Cursos</h4>
                            <p class="text-muted m-b-30 font-13" align="center">
                                Aquí usted puede registrar y Administrar los Cursos del plantel educativo.
                            </p>

                            <form role="form">
                                <div class="form-group">
                                    <label for="Curso">Cursos</label>
                                    <input type="text" class="form-control" id="Curso" name="Curso" placeholder="Ingrese el nuevo curso">
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i>&nbspRegistrar</button>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- End row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="text-center text-custom"><strong>LISTA DE CURSOS</strong></h4>
                            <p class="text-muted m-b-30 font-13" align="center">
                                Aquí usted puede ver y editar la lista de Cursos Registrados en el sistema.
                            </p>

                            <div class="panel-body">
                                <table class="table table-hover m-0 table-colored-bordered table-bordered-inverse tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">

                                    <?php echo cursoController::adminTableCurso(); ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!--<div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title" align="center"><b>Lista de Cursos</b></h4>
                            <p class="text-muted font-13 m-b-30" align="center">
                                Aquí usted puede ver la lista de los Cursos que se han registrado en el sistema.
                            </p>

                            <div class="table-responsive">
                                <table id="mainTable" class="table m-0 table-colored-bordered table-bordered-inverse">
                                    <thead>
                                    <tr>
                                        <th>Cursos</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    <tr>
                                        <td>Primero</td>
                                    </tr>
                                    <tr>
                                        <td>Quinto</td>
                                    </tr>
                                    <tr>
                                        <td>Séptimo</td>
                                    </tr>
                                    <tr>
                                        <td>Decimo</td>
                                    </tr>
                                    <tr>
                                        <td>Preescolar</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>--> <!-- end row -->

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