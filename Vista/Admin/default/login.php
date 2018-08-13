<?php
session_start();
if (!empty($_SESSION['idRol'])){
    header("Location: Index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>COLTENAZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <?php include ("Includes/imports.php")?>



</head>


<body class="bg-accpunt-pages">


<!-- HOME -->

<section style="background-image: url('assets/images/login.jpg');background-size: cover;background-repeat: no-repeat;">

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="wrapper-page">

                    <div class="account-pages">
                        <div class="account-box">
                            <div class="account-logo-box">
                                <h2 class="text-uppercase text-center">
                                    <a href="index.html" class="text-success">
                                        <span><img src="assets/images/LogoColtenaz18.png" alt="" height="160"></span>
                                    </a>
                                </h2>
                                <h5 class="text-uppercase font-bold m-b-5 m-t-50" align="center">Iniciar sesión  </h5>

                            </div>


                            <div class="account-content">
                                <form id="frmLogin" name="frmLogin" method="post" class="form-horizontal">

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <label for="email">Correo</label>
                                            <input class="form-control" style="background-color: #dbffeb; border: none" id="Email" name="Email" type="" id="Email" required="" >
                                        </div>
                                    </div>

                                    <div class="form-group m-b-20">
                                        <div class="col-xs-12">
                                            <label for="password">Contraseña</label>
                                            <input class="form-control" style="background-color: #dbffeb; border: none" type="password" required="" id="Password" name="Password" >
                                        </div>
                                    </div>

                                    <div class="form-group row text-center m-t-10">
                                        <div class="col-12">
                                            <button class="btn btn-md btn-block btn-success waves-effect waves-light" type="submit"><i class="fa spin fa-spinner"></i>&nbsp INGRESAR</button>
                                        </div>
                                    </div>

                                </form>

                                <p>
                                <div id="resultado" name="resultado" class="ui-widget">  </div>
                                </p>


                            </div>
                        </div>
                    </div>
                    <!-- end card-box-->


                </div>
                <!-- end wrapper -->

            </div>
        </div>
    </div>
</section>
<!-- END HOME -->


<script>
    $("#frmLogin").submit(function(e) {
        e.preventDefault();

        var Email = $("#Email").val();
        var Password = $("#Password").val();

        $.ajax({
            method: "POST",
            url: "../../../Controlador/usuarioController.php?action=Login",
            data: { Email: Email, Password: Password}
        })
            .done(function( msg ) {
                console.log(msg);
                if(msg == "Rector"){
                    window.location.href = "Index.php";
                }else if (msg == "Psicorientador(a)"){
                    window.location.href = "Index.php";
                }else if (msg == "Coordinador(a)"){
                    window.location.href = "Index.php";
                }else if (msg == "Secretaria"){
                    window.location.href = "Index.php";
                }else if (msg == "Docente"){
                    window.location.href = "Index.php";
                }else if (msg == "Acudiente"){
                    window.location.href = "Index.php";
                }else{
                    /*swal(
                        {
                            title: 'Error!',
                            text: ''+msg,
                            type: 'error',
                            confirmButtonColor: '#e81a2d',
                            timer: 5000
                        }
                    );*/
                }
            });

        $.ajax({
            method: "POST",
            url: "../../../Controlador/estudianteController.php?action=Login",
            data: { Email: Email, Password: Password}
        })
            .done(function( msg ) {
                console.log(msg);
                if (msg == "Estudiante"){
                    window.location.href = "Index.php";
                }else{
                    swal(
                        {
                            title: 'Error!',
                            text: ''+msg,
                            type: 'error',
                            confirmButtonColor: '#e81a2d',
                            timer: 5000
                        }
                    );
                }
            });
    });
</script>

<!-- Sweet-Alert  -->
<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>





</body>