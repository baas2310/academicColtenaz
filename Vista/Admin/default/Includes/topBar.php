<?php
if ($_SESSION["user"] == "1"){
    $_SESSION["name"]= "Rector";
}else if ($_SESSION["user"] == "2"){
    $_SESSION["name"]= "Psicorientador(a)";
}else if ($_SESSION["user"] == "3"){
    $_SESSION["name"]= "Coordinador(a)";
}else if ($_SESSION["user"] == "4"){
    $_SESSION["name"]= "Secretaria";
}else if ($_SESSION["user"] == "5"){
    $_SESSION["name"]= "Docente";
}else if ($_SESSION["user"] == "6"){
    $_SESSION["name"]= "Acudiente";
}else if ($_SESSION["user"] == "7"){
    $_SESSION["name"]= "Estudiante";
}
?>
<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="index.php" class="logo">
                                <span>
                                    <img src="assets/images/ESCUDOCOLTENAZ.png" alt="" height="auto" width="210">
                                </span>
            <i>
                <img src="assets/images/LogoColtenaz18.png" alt="" height="45">
            </i>
        </a>
    </div>

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">
            <!--<li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-bell noti-icon"></i>
                    <span class="badge badge-pink noti-icon-badge">4</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">
                    <!-- item
                    <div class="dropdown-item noti-title">
                        <h5><span class="badge badge-danger float-right">5</span>Notification</h5>
                    </div>

                    <!-- item
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-success"><i class="icon-bubble"></i></div>
                        <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small></p>
                    </a>

                    <!-- item
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info"><i class="icon-user"></i></div>
                        <p class="notify-details">New user registered.<small class="text-muted">1 min ago</small></p>
                    </a>

                    <!-- item
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-danger"><i class="icon-like"></i></div>
                        <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">1 min ago</small></p>
                    </a>

                    <!-- All
                    <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">
                        View All
                    </a>

                </div>
            </li>-->

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/users/ESCUDO COLTENAZ 2018.jpg" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow"><small>BIENVENIDO SR(A)</small> </h5>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle"></i> <span><?php echo $_SESSION["name"] ?></span>
                    </a>

                    <!-- item-->
                    <a href="logout.php" class="dropdown-item notify-item">
                        <i class="mdi mdi-power"></i> <span>Cerrar Sesión</span>
                    </a>

                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="dripicons-menu"></i>
                </button>
            </li>
            <!--<li class="hide-phone app-search">
                <form role="search" class="">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </li>-->
        </ul>

    </nav>

</div>
<!-- Top Bar End -->
