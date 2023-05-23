<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submitsubcat'])) {

        $user = $_POST['usarionombre'];
        $rol = $_POST['rol'];
        $password = md5($_POST['pass']);
        $status = 1;
        $id = intval($_GET['pid']);

        // manejar la carga de la imagen
    if ($_FILES['imagen']['name']) {
        $imgfile = $_FILES["imagen"]["name"];
        $extension = pathinfo($imgfile, PATHINFO_EXTENSION);
        $new_img_name = uniqid() . "." . $extension;
        $imgpath = "userimagenes/" . $new_img_name;
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $imgpath);
    } else {
        // si no se selecciona una imagen, dejar la imagen anterior
        $query1 = mysqli_query($con, "select imagen from usuarios where idUsuario='$id'");
        $row1 = mysqli_fetch_array($query1);
        $new_img_name = $row1['imagen'];
    }

        $query = mysqli_query($con, "UPDATE usuarios SET userName='$user', password='$password', Is_Active='$status', rol='$rol', imagen='$new_img_name' WHERE idUsuario=$id");

        if ($query) {
            $msg = "Usuario actualizado correctamente ";
        } else {
            $error = "Sucedio un error . Please try again.";
        }
    }
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>NOTICIAS</title>

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- ALERTAS -->
        <link rel="stylesheet" type="text/css" href="alert/dist/sweetalert2.min.css">
        <script>
function validateForm() {
  var passwordField = document.forms["category"]["pass"];
  if (passwordField.value == "") {
    alert("Por favor, ingrese su contraseña");
    return false;
  }
  return true;
}
</script>


    </head>

    <body id="page-top">


        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include('includes/slide.php'); ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa- sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>



                            </li>



                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        <?php echo $_SESSION['usuario'];
                                        ?>
                                    </span>
                                    <img class="img-profile rounded-circle"
                                        src="userimagenes/<?php echo $_SESSION['avatar']; ?>" width="30px">
                                    <!-- <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg"> -->
                                </a>
                                <!-- Dropdown - INFORMACION DE USUARIO -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Hola Admin
                                    </a>
                                    <a class="dropdown-item" href="change-password.php">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Cambiar contraseña
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php" data-toggle="modal"
                                        data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Salir
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">AÑADIR USUARIOS NUEVOS</h1>
                        <p class="mb-4">Aqui puede añadir usuarios nuevos a la plataforma
                        </p>


                        <div class="col-sm-6">
                            <!---Success Message--->
                        <?php if ($msg) { ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Hecho!</strong>
                            <?php echo htmlentities($msg); ?>
                        </div>
                        <?php } ?>

                        <!---Error Message--->
                        <?php if ($error) { ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Oh no!</strong>
                            <?php echo htmlentities($error); ?>
                        </div>
                        <?php } ?>
                    </div>

                    <?php
                    $postid = intval($_GET['pid']);
                    $query = mysqli_query($con, "SELECT idUsuario, userName, password, rol, imagen FROM usuarios WHERE idUsuario = $postid AND Is_Active = 1");

                    while ($row = mysqli_fetch_array($query)) {
                        ?>


                    <!-- DataTales Example -->
                            <div class="card shadow mb-2">
                                <div class="card-header py-3">
                                    <thead>
                                        <tr>
                                            <th>

                                                <a href="usuarios.php" class="btn btn-secondary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </span>
                                                    <span class="text">Regresar a lista</span>
                                                </a>
                                </div>

                                </th>
                                </tr>
                                </thead>


                                <div class="col-md-10 col-md-offset-1">
                                    <div class="p-6">
                                        <div class="">
                                            <form id="category-form" name="category" method="post" enctype="multipart/form-data"  onsubmit="return validateForm()">
                                                <div class="form-group m-b-20">
                                                    <label for="exampleInputEmail1"> </label>
                                                    <h5 class="card-title text-info "><strong>Rol: </strong></h5>
                                                    <div class="col-md-10">
                                                        <select class="form-control" name="rol">
                                                            <option value=" <?php echo htmlentities($row['rol']); ?>">

                                                                <?php
                                                                if ($row['rol'] == 1) {
                                                                    echo "Admin";
                                                                } else {
                                                                    echo "Usuario";
                                                                } ?>
                                                            </option>

                                                            <option value="0">Usuario</option>
                                                            <option value="1">Admin</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group m-b-20">
                                                    <label for="exampleInputEmail1"> </label>
                                                    <h5 class="card-title"><strong>Nombre del usuario </strong></h5>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo htmlentities($row['userName']); ?>"
                                                        name="usarionombre" required>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>Contraseña:</b></h4>
                                                            <input type="text" class="form-control" id="password"
                                                                value=""
                                                                name="pass" >
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- otros campos del formulario -->
                                                <div class="form-group m-b-20">
                                                    <label for="exampleInputEmail1"> </label>
                                                    <h5 class="card-title"><strong>Imagen</strong></h5>
                                                    <img src="userimagenes/<?php echo htmlentities($row['imagen']);?>" width="300"/>
                                                    <input type="file" class="form-control" name="imagen">

                                                    <input type="hidden" name="userid"
                                                        value="<?php echo $row['idUsuario']; ?>">
                                                </div>
                                            <?php } ?>
                                            <!----ESTO ES UN ESPACIO TE SERVIRA DESPUES-->
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">&nbsp;</label>
                                                <div class="col-md-10">
                                                    <!----ESTO ES UN ESPACIO TE SERVIRA DESPUES-->

                                                    <!-- DataTales Example -->
                                                    <div class="card shadow mb-2">
                                                        <div class="card-header py-3">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <a href="#" class="btn btn-success btn-icon-split"  onclick="guardarDatos()">
                                                                            <span class="icon text-white-50">
                                                                                <i class="fas fa-check"></i>
                                                                            </span>
                                                                            <button type="submit" name="submitsubcat"
                                                                                class="btn btn-success ">Guardar</button>
                                                                        </a>
                                                                        <a href="usuarios.php"
                                                                            class="btn btn-danger btn-icon-split" onclick="descartarDatos()">
                                                                            <span class="icon text-white-50">
                                                                                <i class="fas fa-trash"></i>
                                                                            </span>
                                                                            <button type="button"
                                                                                class="btn btn-danger">Descartar</button>
                                                                        </a>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </div>
                                                    </div>

                                        </form>

                                    </div>
                                </div> <!-- end p-20 -->


                            </div> <!-- end col -->

                        </div> <!-- end row -->


                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Seguro quiere Salir?
                            <?php echo $_SESSION['usuario'];
                            ?>
                        </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecciona "Salir" para cerrar la sesion.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="logout.php">Salir</a>
                    </div>
                </div>
            </div>
        </div>




        <!-- Bootstrap core JavaScript-->
        <script>
function validateForm() {
  var passwordField = document.forms["category"]["pass"];
  if (passwordField.value == "") {
    alert("Por favor, ingrese su contraseña actual o una nueva");
    return false;
  }
  return true;
}

</script>
        <script src="vendor/jquery/jquery.min.js"></>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Funciones Ajax -->
        <script src="js/funciones.js" crossorigin="anonymous"></script>
        <script src="js/jquery-1.6.2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

        <!-- Iconos -->
        <script src="https://kit.fontawesome.com/1fb2d410de.js" crossorigin="anonymous"></script>


        <!-- Alertas -->
        <script src="alert/dist/sweetalert2.all.min"></script>
    </body>

    </html>
<?php } ?>