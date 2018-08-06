<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menú Administrativo</li>
                <?php if ($_SESSION['user'] == "1" || $_SESSION['user'] == "2" || $_SESSION['user'] == "3" || $_SESSION['user'] == "4") { ?>
                <li>
                    <a href="javascript: void(0);"><i class="icon-people"></i>
                        <span> Administración </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="../default/registrarUsuarios.php"><i class="icon-user-follow"></i>Registrar Usuario</a></li>
                        <li><a href="../default/adminUsuarios.php"><i class="fa spin fa-refresh"></i>Administrar Usuarios</a></li>
                        <li><a href="../default/adminAsignaturas.php"><i class="icon-note"></i>Admin Asignaturas</a></li>
                        <li><a href="../default/adminCursos.php"><i class="icon-pencil"></i>Administrar Cursos</a></li>
                        <li><a href="#"><i class="fa spin fa-refresh"></i>Asiganción Docente</a></li>
                        <li><a href="../default/registrarAlumno.php"><i class="icon-graduation"></i>Registrar Alumno</a></li>
                        <li><a href="../default/adminAlumnos.php"><i class="fa spin fa-refresh"></i>Administrar Alumnos</a></li>
                        <li><a href="../default/observadorAlumnoAdmin.php"><i class="icon-book-open"></i>Observador del Alumno</a></li>
                        <li><a href="#"><i class="icon-share-alt"></i>Crear Anuncio</a></li>
                    </ul>
                </li>
                <?php } ?>

                <?php if ($_SESSION['user'] == "1" || $_SESSION['user'] == "5") { ?>
                <li>
                    <a href="javascript: void(0);"><i class="fa fa-group"></i>
                        <span> Docentes </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="../default/adminTareas.php"><i class="icon-pencil"></i>Administrar Tareas</a></li>
                        <li><a href="#"><i class="icon-chart"></i>Administrar Notas</a></li>
                        <li><a href="../default/observadorAlumnoAdmin.php"><i class="icon-book-open"></i>Observador del Alumno</a></li>
                        <li><a href="#"><i class="icon-share-alt"></i>Crear Anuncio</a></li>
                    </ul>
                </li>
                <?php } ?>

                <?php if ($_SESSION['user'] == "1" || $_SESSION['user'] == "7") { ?>
                <li>
                    <a href="javascript: void(0);"><i class="fa fa-user-o "></i>
                        <span> Alumno </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="#"><i class="icon-pencil"></i>Tareas y Pendientes</a></li>
                        <li><a href="#"><i class="icon-chart"></i>Rendimiento Académico</a></li>
                        <li><a href="../default/observadorAlumno.php"><i class="icon-book-open"></i>Observador del Alumno</a></li>
                    </ul>
                </li>
                <?php } ?>

                <?php if ($_SESSION['user'] == "1" ||$_SESSION['user'] == "6") { ?>
                <li>
                    <a href="javascript: void(0);"><i class="fa fa-user-circle-o"></i>
                        <span> Acudiente </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="#"><i class="icon-pencil"></i>Tareas del Alumno</a></li>
                        <li><a href="#"><i class="icon-chart"></i>Renidimiento Académico</a></li>
                        <li><a href="../default/observadorAlumno.php"><i class="icon-book-open"></i>Observador del Alumno</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->