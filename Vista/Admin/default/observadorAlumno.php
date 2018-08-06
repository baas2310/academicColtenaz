<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Administrar Cursos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

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
                                <li class="breadcrumb-item active">Observador del Alumno</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title" align="center">Observador del Alumno</h4>
                            <p class="text-muted m-b-30 font-13" align="center">
                                Aquí usted puede ver el Observador del Alumno y ver si tiene anotaciones en él.
                            </p>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>Lista de Observaciones</b></h4>

                                        <div class="table-responsive">
                                            <table id="demo-foo-filtering" class="table m-0 table-colored-bordered table-bordered-inverse" data-page-size="7">
                                                <thead>
                                                <tr>
                                                    <th>Documento</th>
                                                    <th>Apellidos</th>
                                                    <th>Nombres</th>
                                                    <th>Tipo de observación</th>
                                                    <th>Fecha</th>
                                                    <th>Observación</th>
                                                    <th>Autor de la Observación</th>
                                                </tr>
                                                </thead>
                                                <div class="form-inline m-b-20">
                                                    <div class="row">
                                                        <div class="col-md-6 text-xs-center">
                                                            <div class="form-group">
                                                                <label class="control-label m-r-5">Status</label>
                                                                <select id="demo-foo-filter-status" class="form-control input-sm">
                                                                    <option value="">Mostrar Todos</option>
                                                                    <option value="leve">Leve</option>
                                                                    <option value="Grave">Grave</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 text-center text-right">
                                                            <div class="form-group float-right">
                                                                <input id="demo-foo-search" type="text" placeholder="Buscar" class="form-control" autocomplete="on">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <tbody>
                                                <tr>
                                                    <td>1023456789</td>
                                                    <td>Rincón Fonseca</td>
                                                    <td>Dayana Milena</td>
                                                    <td><span class="label label-table label-success">Leve</span></td>
                                                    <td>00-00-0000</td>
                                                    <td>Buen Estudiante</td>
                                                    <td>Profesor a Cargo</td>
                                                </tr>
                                                <tr>
                                                    <td>1023456789</td>
                                                    <td>Rincón Fonseca</td>
                                                    <td>Dayana Milena</td>
                                                    <td><span class="label label-table label-danger">Grave</span></td>
                                                    <td>00-00-0000</td>
                                                    <td>Mal Estudiante</td>
                                                    <td>Profesor a Cargo</td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr class="active">
                                                    <td colspan="5">
                                                        <div class="text-right">
                                                            <ul class="pagination pagination-split footable-pagination m-t-10 m-b-0"></ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

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