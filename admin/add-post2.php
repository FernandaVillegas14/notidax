
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
   
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid" >
                    <!-- DataTales Example -->
                    <div class="card shadow mb-2">
                        <div class="card-header py-3">
                            <thead>
                            <tr>
                                <th>
                                <h1 class="h3 mb-2 text-gray-800">AÑADIR NOTICIAS</h1>
                            </div>       
                                </th>
                             </tr>
                           </thead>

                           
                    <div class="col-md-10 col-md-offset-1">
                    <div class="p-6">
                    <div class="">
                    <form name="addpost" method="post" enctype="multipart/form-data">
                    <div class="form-group m-b-20">
                    <label for="exampleInputEmail1"> </label>
                    <h5 class="card-title text-info "><strong>Titulo de la noticia: </strong></h5>
                    <input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Escribe el titulo" required>
                    </div>

                    <div class="form-group m-b-20">

                    <h5 class="card-title">Categoria:</h5>
                    <select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
                    <option value="">Selecciona la Categoria </option>
                    </select> 
                    </div>
    
                    <div class="form-group m-b-20">

                    <h5 class="card-title">Sub Categoria:</h5>
                    <select class="form-control" name="subcategory" id="subcategory" required>

                    </select> 
                    </div>
         

                    <div class="row">
                    <div class="col-sm-12">
                    <div class="card-box">
                    <h4 class="m-b-30 m-t-0 header-title"><b>Descripcion de la Noticia:</b></h4>
                    <textarea class="editor1" id="editor1" name="postdescription" required></textarea>
                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-sm-12">
                    <div class="card-box">
                    <h4 class="m-b-30 m-t-0 header-title"><b>Subir portada de la noticia:</b></h4>
                    <input type="file" class="form-control" id="postimage" name="postimage"  required>
                    </div>
                    </div>
                    </div>

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
                                 <button type="submit" name="submit" class="btn btn-success ">Guardar y publicar</button>
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
                        <span>Copyright &copy; HOLA</span>
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


    <!-- Editor de Textos -->
    <script src="ckeditor/ckeditor.js"></script>

    <script >
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
   </script>

</body>

</html>
