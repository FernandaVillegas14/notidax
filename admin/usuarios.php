<?php
session_start();
include('includes/config.php');
error_reporting(0);

$rol = $_SESSION['rol'];
if ($rol != '1') {
	// Si el usuario no tiene rol de administrador, redirigir al usuario a la página de inicio de sesión
	header('Location: dashbord.php');
}

if (strlen($_SESSION['login']) == 0) {

} else {

    if ($_GET['action'] = 'restore') {
        $postid = intval($_GET['pid']);
        $query = mysqli_query($con, "update usuarios set Is_Active=1 where id='$postid'");
        if ($query) {
            $msg = "Post restored successfully ";
        } else {
            $error = "Something went wrong . Please try again.";
        }
    }

    if ($_GET['presid']) {
        $id = intval($_GET['presid']);
        $query = mysqli_query($con, "delete from  usuarios  where idUsuario='$id'");
        $delmsg = "Usuario eliminado correctamente";
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

                                <div class="topbar-divider d-none d-sm-block"></div>

                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usuario'];
                                        ?>
                                    </span>
                                
                                        <img class="img-profile rounded-circle" src="userimagenes/<?php echo $_SESSION['avatar']; ?>" width="30px">
                            
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
                                        
                                        <a class="dropdown-item" href="change-password.php?pid=<?php echo $_SESSION['idUsuario']; ?>?pid=<?php echo $_SESSION['idUsuario']; ?>">
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
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800">USUARIOS</h1>
                            <p class="mb-4">Esta tabla contiene usuarios
                                  </p>
          <?php if ($delmsg) { ?>
                <div class="alert alert-success" role="alert">
                <strong>Hecho!</strong> <?php echo htmlentities($delmsg); ?></div>
        <?php } ?>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <thead>
                                    <tr>
                                        <th>
                                              
                                             <a href="add-usuario.php" class="btn btn-primary btn-icon-split" >
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-plus"></i>
                                                    </span>
                                                    <span class="text">Agregar Usuario</span>
                                                </a>
                                    </div>
                                        
                                        </th>
                                </tr>
                                   </thead>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                <th>#</th>                       
                                                     <th>Nombre</th>
                                                      <th>Contraseña</th>
                                                       <th>Rol</th>
                                                       <th>Imagen</th>
                                                     <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                <th>#</th>                       
                                                     <th>Nombre</th>
                                                      <th>Contraseña</th>
                                                       <th>Rol</th>
                                                       <th>Imagen</th>
                                                     <th>Opciones</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                   
        <?php
        $query = mysqli_query($con, "select idUsuario,userName,password,rol,imagen from usuarios where Is_Active=1");
        $rowcount = mysqli_num_rows($query);
        if ($rowcount == 0) {
            ?>

            <?php
        } else {
            while ($row = mysqli_fetch_array($query)) {
                ?>
                         <tr>
                         <td><b><?php echo htmlentities($row['idUsuario']); ?></b></td>
                        <td><?php echo htmlentities($row['userName']) ?></td>
                        <td><?php echo htmlentities($row['password']) ?></td>

                        <td><?php if ($row['rol'] == 1) {
                            echo "Admin";
                        } else {
                            echo "Normal";
                        } ?></td>

                        <td><img class="img-profile rounded-circle" src="userimagenes/<?php echo htmlentities($row['imagen']); ?>" width="70" height="70"/></td>
                                            
                        <td><a href="edit-usuario.php?pid=<?php echo htmlentities($row['idUsuario']); ?>"  class="btn btn-primary btn-icon-split" >
                        <span class="icon text-white">
                        <i class="fa fa-pencil" ></i></a> 




                            <a href="usuarios.php?presid=<?php echo htmlentities($row['idUsuario']); ?>&&action=del" class="btn btn-danger btn-icon-split"  onclick="return confirm('Esta seguro de eliminar este usuario?')"> 
                            <span class="icon text-white">
                            <i class="fas fa-trash"></i></a> </td>
                         </tr>
                <?php }
        } ?>

                                                </tr>
                                  
                                            </tbody>
                                    
                                        </table>
                                    </div>
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


           <!-- Alertas -->
            <script src="alert/dist/sweetalert2.all.min"></script>
        </body>

        </html>
<?php } ?>

