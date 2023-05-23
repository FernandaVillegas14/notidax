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

        // Para poner foto de perfil
        $imgfile = $_FILES["postimage"]["name"];
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Formato invalido. Acepta jpg / jpeg/ png /gif de formato');</script>";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["postimage"]["tmp_name"], "userimagenes/" . $imgnewfile);
            //Fin de poner foto de perfil

            $status = 1;
            $query = mysqli_query($con, "insert into usuarios(userName,password,Is_Active,rol,imagen) values('$user','$password','$status','$rol','$imgnewfile')");
            if ($query) {
                $msg = "Usuario nuevo registrado correctamente ";
            } else {
                $error = "Sucedio un error . Please try again.";
            }
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


    </head>

    <body id="page-top">

   
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php  include('includes/slide.php'); ?>

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
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usuario'];
                                    ?></span>
                                    <img class="img-profile rounded-circle"
                                        src="img/undraw_profile.svg">
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
                                    <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Salir
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid" >

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">AÑADIR USUARIOS NUEVOS</h1>
                        <p class="mb-4">Aqui puede añadir usuarios nuevos a la plataforma
                              </p>


    <div class="col-sm-6">  
    <!---Success Message--->  
<?php if ($msg) { ?>
<div class="alert alert-success" role="alert">
<strong>Hecho!</strong> <?php echo htmlentities($msg); ?>
</div>
<?php } ?>

<!---Error Message--->
<?php if ($error) { ?>
<div class="alert alert-danger" role="alert">
<strong>Oh no!</strong> <?php echo htmlentities($error); ?></div>
<?php } ?>
</div>
                   

                    <!-- DataTales Example -->
                        <div class="card shadow mb-2">
                            <div class="card-header py-3">
                                <thead>
                                <tr>
                                    <th>
                                       
                                            <a href="usuarios.php" class="btn btn-secondary btn-icon-split" >
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
                <form name="category" method="post" enctype="multipart/form-data">
                <div class="form-group m-b-20">
                <label for="exampleInputEmail1"> </label>
                <h5 class="card-title text-info "><strong>Rol: </strong></h5>
                <div class="col-md-10">
                <select class="form-control" name="rol" required>
                <option value="">Selecciona el rol </option>
           
                <option value="0">Normal Usuario</option>
                <option value="1">Admin</option>

                </select> 
                </div>
                </div>

                <div class="form-group m-b-20">
                <label for="exampleInputEmail1"> </label>
                <h5 class="card-title"><strong>Nombre del usuario </strong></h5>
                <input type="text" class="form-control" value="" name="usarionombre" required>
                </div>

                <div class="row">
                <div class="col-sm-12">
                <div class="card-box">
                <h4 class="m-b-30 m-t-0 header-title"><b>Contraseña:</b></h4>
                <input type="password" class="form-control" value="" name="pass" required>
                </div>
                </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                <h4 class="m-b-30 m-t-0 header-title"><b>Foto de perfil:</b></h4>
                <input type="file" class="form-control" id="postimage" name="postimage"  required>
                        </div>
                    </div>
                </div>

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
                                    <a href="#" class="btn btn-success btn-icon-split" >
                                    <span class="icon text-white-50">
                                     <i class="fas fa-check"></i>
                                     </span>
                                     <button type="submit" name="submitsubcat" class="btn btn-success ">Guardar</button>
                                    </a>


                                    <a href="#" class="btn btn-danger btn-icon-split" >
                                    <span class="icon text-white-50">
                                     <i class="fas fa-trash"></i>
                                     </span>
                                     <button type="button" class="btn btn-danger">Descartar</button>
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
                        <h5 class="modal-title" id="exampleModalLabel"> Seguro quiere Salir? <?php echo $_SESSION['usuario'];
                        ?> </h5>
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
        <script src="vendor/jquery/jquery.min.js"></script>
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

        <!-- Editor de Textos -->
        <script src="ckeditor/ckeditor.js"></script>

        <script >
            CKEDITOR.replace('editor1');
            CKEDITOR.replace('editor2');
       </script>

       <!-- Alertas -->
        <script src="alert/dist/sweetalert2.all.min"></script>
    </body>

    </html>
<?php } ?>