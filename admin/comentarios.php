<?php
session_start();
include('includes/config.php');
error_reporting(0);

$rol = $_SESSION['rol'];
if ($rol != '1') {
	// Si el usuario no tiene rol de administrador, redirigir al usuario a la página de inicio de sesión
	header('Location: dashbord.php');
}


if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if( $_GET['disid'])
{
	$id=intval($_GET['disid']);
	$query=mysqli_query($con,"update tblcomments set status='0' where id='$id'");
	$msg="Comentario no aprobado ";
}
// Code for restore
if($_GET['appid'])
{
	$id=intval($_GET['appid']);
	$query=mysqli_query($con,"update tblcomments set status='1' where id='$id'");
	$msg="Comentario aprobado";
}

// Code for deletion
if($_GET['action']=='del' && $_GET['rid'])
{
	$id=intval($_GET['rid']);
	$query=mysqli_query($con,"delete from  tblcomments  where id='$id'");
	$delmsg="Category deleted forever";
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
                                <a class="dropdown-item" href="change-password.php?pid=<?php echo $_SESSION['idUsuario']; ?>">
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
                    <h1 class="h3 mb-2 text-gray-800">Comentarios APROBADOS</h1>
                    <p class="mb-4">Esta tabla contiene los comentarios publicados en las noticas
                          </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <thead>
                            <tr>
                                <th>
                                     <!-- <a href="#" class="btn btn-secondary btn-icon-split"data-toggle="modal" data-target="#agregar_noticia">
                                            <span class="icon text-white-50">
                                            <i class="fa-solid fa-plus"></i>
                                            </span>
                                            <span class="text">Nueva Noticia</span>
                                        </a> -->

                                   
                                        <a href="no_aprobados.php" class="btn btn-secondary btn-icon-split" >
                                            <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">Comentarios por aceptar</span>
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
                                            <th> Nombre</th>
                                             <th>Correo</th>
                                              <th width="300">Comentario</th>
                                               <th>Status</th>
                                              <th>Post</th>
                                              <th>Fecha de comentario</th>
                                             <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th> Nombre</th>
                                             <th>Correo</th>
                                              <th width="300">Comentario</th>
                                               <th>Status</th>
                                              <th>Post</th>
                                              <th>Fecha de comentario</th>
                                             <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	
                                    <?php 
$query=mysqli_query($con,"Select tblcomments.id,  tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle from  tblcomments join tblposts on tblposts.id=tblcomments.postId where tblcomments.status=1");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

 <tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>
<td><?php echo htmlentities($row['name']);?></td>
<td><?php echo htmlentities($row['email']);?></td>
<td><?php echo htmlentities($row['comment']);?></td>
<td><?php $st=$row['status'];
if($st=='0'):
echo "Esperando para aprobar";
else:
echo "Aprobado";
endif;
?></td>


<td><a href="edit-post.php?pid=<?php echo htmlentities($row['postid']);?>"><?php echo htmlentities($row['PostTitle']);?></a> </td>
<td><?php echo htmlentities($row['postingDate']);?></td>
<td>
<?php if($st==0):?>
    <a href="comentarios.php?disid=<?php echo htmlentities($row['id']);?>" title="Disapprove this comment"><i class="ion-arrow-return-right" style="color: #29b6f6;"></i></a> 
<?php else :?>
  <a href="comentarios.php?appid=<?php echo htmlentities($row['id']);?>" title="Approve this comment"><i class="ion-arrow-return-right" style="color: #29b6f6;"></i></a> 
<?php endif;?>

	&nbsp;<a href="comentarios.php?rid=<?php echo htmlentities($row['id']);?>&&action=del" class="btn btn-danger btn-icon-split"> 
    <span class="icon text-white">
    <i class="fas fa-trash"></i></a> </td>
</tr>
<?php
$cnt++;
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

    <!-- Modal Agregar Noticia-->
    <div class="modal fade" id="agregar_noticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">NUEVA NOTICIA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="registrar_noticia.php" method="post">
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Id de la Noticia:</label>
            <input type="text" class="form-control" id="idNoticia" placeholder="123..." name="idNoticia">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Titulo de la Noticia:</label>
            <input type="text" class="form-control" id="titulo" placeholder="Noticia Principal" name="titulo">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Descripcion de la Noticia:</label>
            <textarea type="text" class="form-control" id="editor1" placeholder="Trata sobre..." name="editor1"></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Encabezado de la Noticia:</label>
            <input type="text" class="form-control" id="encabezado" placeholder="Titulo" name="encabezado">
          </div> 
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Usuario de la Noticia:</label>
            <input type="text" class="form-control" id="usuario" placeholder="1" name="usuario" value="<?php echo $row['fkUsuario'];?>">
          </div> 
          <div class="form-group">
            <label for="message-text" class="col-form-label">Fecha de la Noticia:</label>
            <input type="text"  class="form-control" id="fecha" placeholder="10/08/3081" name="fecha">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Etiqueta de la Noticia:</label>
            <input type="text"  class="form-control" id="etiqueta" placeholder="1" name="etiqueta">
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guartdar</button>
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
       
    </div>
  </div>
</div>
<!-- Modal Modificar Noticia-->
    <div class="modal fade" id="modificar_noticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MODIFICAR NOTICIA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="modificar_noticia.php" method="post">
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Id de la Noticia:</label>
            <input type="text" class="form-control" id="idNoticia" value="<?php echo $row['idNoticia'];?>" name="idNoticia">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Titulo de la Noticia:</label>
            <input type="text" class="form-control" id="titulo" value="<?php echo $row['titulo'];?>"  name="titulo">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Descripcion de la Noticia:</label>
            <textarea type="text" class="form-control" id="editor2" value="<?php echo $row['descripcion'];?>"  name="editor2"> </textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Encabezado de la Noticia:</label>
            <input type="text"  class="form-control" id="encabezado" value="<?php echo $row['encabezado'];?>"  name="encabezado">
          </div>
           <div class="form-group">
            <label for="message-text" class="col-form-label">Usuario de la Noticia:</label>
            <input type="text"  class="form-control" id="usuario" value="<?php echo $row['fkUsuario'];?>"  name="usuario">
          </div>
           <div class="form-group">
            <label for="message-text" class="col-form-label">Fecha de la Noticia:</label>
            <input type="date"  class="form-control" id="fecha" value="<?php echo $row['fecha'];?>"  name="fecha">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Etiqueta de la Noticia:</label>
            <input type="listbox"  class="form-control" id="etiqueta" value="<?php echo $row['fkEtiqueta'];?>"  name="etiqueta">
          </div>
          </tr>
            <input type="hidden" name="id" id="id">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" onclick="">Guartdar</button>
        </form>
       
      </div>
      <div class="modal-footer">
      </div>
       </div>
  </div>
</div>


        
        <!-- Editar Modal -->

    <script>
        let modificar_usuario=document.getElementById('modificar_usuario')
        editarModal.addEventListener('shown.bs.modal',event =>{ 
            let button = evet.relatedTarget
            let id = button.getAttribute('dta-bd-id')
            let inputId=modificar_usuario.querySelector('.modal-body #id')

            let url ="modificar_usuario.php"
            let formData=new formData()
            formData.append('id',id)

            fetch(url,{
                method "POST",
                body:formData
            }).then (response => response.json())
            .then(data=>{
                inputId.value=data.id
            }).catch(err => console.loh(err))
        })
    </script>

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