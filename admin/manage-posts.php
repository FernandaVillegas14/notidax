<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if ($_GET['action'] = 'del') {
        $postid = intval($_GET['pid']);
        $query = mysqli_query($con, "update tblposts set Is_Active=0 where id='$postid'");
        if ($query) {
            $msg = "Noticia eliminada";
        } else {
            $error = "Something went wrong . Please try again.";
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
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">NotiDax</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="dashbord.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    MENU
                </div>

                <!-- Nav Item - NOTICIAS -->
                <li class="nav-item">
                    <a class="nav-link" href="manage-posts.php">
                        <i class="fa-solid fa-file"></i>
                        <span>NOTICIAS</span></a>
                </li>

                <?php if ($_SESSION['rol'] == 1) { ?>
                    <!-- Nav Item - COMENTARIOS -->
                    <li class="nav-item">
                        <a class="nav-link" href="comentarios.php">
                            <i class="fa-sharp fa-solid fa-comments"></i>
                            <span>COMENTARIOS</span></a>
                    </li>

                    <!-- Nav Item - USUARIOS -->
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.php">
                            <i class="fa-sharp fa-solid fa-user"></i>
                            <span>USUARIOS</span></a>
                    </li>
                    <!-- Nav Item - ROLES -->
                    <li class="nav-item">
                        <a class="nav-link" href="roles.php">
                            <i class="fa-sharp fa-solid fa-users"></i>
                            <span>ROLES</span></a>
                    </li>
                    <?php } ?>
                    <!-- Nav Item - ARCHIVOS -->
                <li class="nav-item">
                    <a class="nav-link" href="../index.php"  target="_blank">
                        <i class="fa-sharp fa-solid fa-house"></i>
                        <span>FRONT</span></a>
                </li>
               


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
                                        Hola
                                        <?php 
                                         if ($_SESSION['rol'] == 1) {
                                            echo "Admin";
                                        } else {
                                            echo "Usuario";
                                        } ?>
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
                        <h1 class="h3 mb-2 text-gray-800">NOTICIAS</h1>
                        <p class="mb-4">Esta tabla contiene informacion sobre las noticias
                        </p>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="add-post.php" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                                <span class="text">Agregar Noticia</span>
                                            </a>

                                            <?php if ($_SESSION['rol'] == 1) { ?>
                                                <a href="manage-categories.php" class="btn btn-primary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </span>
                                                    <span class="text">Categorias</span>
                                                </a>

                                                <a href="manage-subcategories.php" class="btn btn-secondary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </span>
                                                    <span class="text">Sub Categorias</span>
                                                </a>
                                            <?php } ?>
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
                                                <th>Titulo</th>
                                                <th>Categoria</th>
                                                <th>SubCategoria</th>
                                                <th>Autor</th>
                                                <th>Fecha</th>
                                                <?php if ($_SESSION['rol'] == 1) { ?>
                                                    <th> Opciones</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Titulo</th>
                                                <th>Categoria</th>
                                                <th>SubCategoria</th>
                                                <th>Autor</th>
                                                <th>Fecha</th>

                                                <?php if ($_SESSION['rol'] == 1) { ?>
                                                    <th> Opciones</th>
                                                <?php } ?>

                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php
                                            $query = mysqli_query($con, "select tblposts.id as postid,tblposts.PostTitle as title, tblposts.fkUser as user, tblposts.nombreUser as usuarioname ,
tblcategory.CategoryName as category, tblposts.PostingDate as postingdate,
tblsubcategory.Subcategory as subcategory from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 ");
                                            $cnt = 1;
                                            $rowcount = mysqli_num_rows($query);
                                            if ($rowcount == 0) {
                                                ?>
                                                <tr>

                                                    <td colspan="4" align="center">
                                                        <h3 style="color:red">No record found</h3>
                                                    </td>
                                                <tr>
                                                    <?php
                                            } else {
                                                while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <tr>
                                                        <th scope="row">
                                                            <?php echo htmlentities($cnt); ?>
                                                        </th>
                                                        <td><b>
                                                                <?php echo htmlentities($row['title']); ?>
                                                            </b></td>
                                                        <td>
                                                            <?php echo htmlentities($row['category']) ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($row['subcategory']) ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($row['usuarioname']) ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($row['postingdate']) ?>
                                                        </td>
                                                        <?php if ($_SESSION['rol'] == 1) { ?>
                                                            <td><a href="edit-post.php?pid=<?php echo htmlentities($row['postid']); ?>"
                                                                    class="btn btn-primary btn-icon-split">
                                                                    <span class="icon text-white">
                                                                        <i class="fa fa-pencil"></i></a>
                                                                <a href="manage-posts.php?pid=<?php echo htmlentities($row['postid']); ?>&&action=del"
                                                                    class="btn btn-danger btn-icon-split"
                                                                    onclick="return confirm('Esta seguro de eliminar esta noticia ?')">
                                                                    <span class="icon text-white">
                                                                        <i class="fas fa-trash"></i></a>
                                                            </td>
                                                        <?php } ?>

                                                    </tr>


                                                    <?php
                                                    $cnt++;
                                                }
                                            } ?>
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

        <script>
            CKEDITOR.replace('editor1');
            CKEDITOR.replace('editor2');
        </script>

        <!-- Alertas -->
        <script src="alert/dist/sweetalert2.all.min"></script>
    </body>

    </html>
<?php } ?>