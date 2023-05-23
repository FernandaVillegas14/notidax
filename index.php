<?php
session_start();
include('includes/config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NOTI DAX</title>

  <!-- Bootstrap core CSS -->
  <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">  

  <!-- Custom fonts for this template -->
  <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body>

  <!-- Navigation -->
  <<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    
    <a class="navbar-brand" href="index.php"><img src="https://cdn-icons-png.flaticon.com/512/21/21601.png" height="50"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto" style="font-family: 'Montserrat', sans-serif;">
      <li class="nav-item">
            <a class="nav-link" href="admin/dashbord.php">
              Usuario: 
              <?php
              if (isset($_SESSION['idUsuario'])) {
                echo $_SESSION['usuario'];
              }
              ?>
            </a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="about-us.php"><img src="https://cdn.icon-icons.com/icons2/1369/PNG/512/-person_90382.png" width="20" height="20" class="d-inline-block align-text-top me-2"> FAQs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php"><img src="https://cdn.icon-icons.com/icons2/1369/PNG/512/-home_90315.png" width="20" height="20" class="d-inline-block align-text-top me-2"> NOTICIAS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact-us.php"><img src="https://cdn.icon-icons.com/icons2/1369/PNG/512/-contact-phone_90586.png" width="20" height="20" class="d-inline-block align-text-top me-2"> CONTACTOS</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



  <!-- slider -->
  <link rel="stylesheet" href="slider/ism/css/my-slider.css" />
  <script src="slider/ism/js/ism-2.2.min.js"></script>

  <div class="ism-slider" data-transition_type="fade" data-play_type="loop" id="my-slider">
  <ol>
    <?php
    $query = mysqli_query($con, "SELECT * FROM carrusel_images");
    while ($row = mysqli_fetch_array($query)) {
      ?>
      <li>
        <img src="images/<?php echo htmlentities($row['image_path']);?>" />
        <div class="ism-caption ism-caption-0"><?php echo htmlentities($row['caption']); ?></div>
      </li>
      <?php
    }
    ?>
  </ol>
</div>

  <!-- <div class="ism-slider" data-transition_type="fade" data-play_type="loop" id="my-slider">
    <ol>
      <li>
        <img src="images/3.jpg">

        <div class="ism-caption ism-caption-0 ">Bienvenidos
        </div>
      </li>
      <li>
        <img src="images/sliderVILLA.jpg">
        <div class="ism-caption ism-caption-0">Noticias</div>
      </li>
      <li>
        <img src="images/REGLAMENTO DE ESTUDIANTES.jpeg">
        <div class="ism-caption ism-caption-0">¡Lo mas interesante!</div>
      </li>
      <li>
        <img src="images/1.jpg">
        <div class="ism-caption ism-caption-0">Disfruta</div>
      </li>
    </ol>
  </div> -->
  <!-- end slider -->

  <!-- Page Content -->
  <div class="container">



    <div class="row " style="margin-top: 3%">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <!-- Blog Post -->
        <?php
        if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
        } else {
          $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno - 1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con, $total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


        $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblposts.nombreUser as usuarioname, tblposts.userImagen as userimg, tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
        while ($row = mysqli_fetch_array($query)) {
          ?>


          <div class="card mb-4">
          <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>">
          <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">

    </a>
            <div class="card-body">
              <h2 class="card-title">
               
                  <?php echo htmlentities($row['posttitle']); ?>
              </h2>
            
              <p> <i class="fas fa-solid fa-tags"></i> <b>Categoria : </b> <a
                  href="category.php?catid=<?php echo htmlentities($row['cid']) ?>"><?php echo htmlentities($row['category']); ?></a> </p>

              <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="btn btn-light btn-icon-split">
                <span class="icon text-gray-600">
                  <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Leer mas... </span>
              </a>

            </div>
            <div class="card-footer text-muted">

              <button type="button" class="btn btn-secondary" disabled="disabled">
                <img class="img-profile rounded-circle"
                  src="admin/userimagenes/<?php echo htmlentities($row['userimg']); ?>" width="30" height="30" />
                <strong>Autor: </strong>
                <?php echo htmlentities($row['usuarioname']); ?>
              </button>
              <i class="fas fa-calendar"></i> Publicado en
              <?php echo htmlentities($row['postingdate']); ?>
            </div>
          </div>



        <?php } ?>




        <!-- Pagination -->


        <ul class="pagination justify-content-center mb-4">
          <li class="page-item"><a href="?pageno=1" class="page-link">Primero</a></li>
          <li class="<?php if ($pageno <= 1) {
            echo 'disabled';
          } ?> page-item">
            <a href="<?php if ($pageno <= 1) {
              echo '#';
            } else {
              echo "?pageno=" . ($pageno - 1);
            } ?>"
              class="page-link">Anterior</a>
          </li>
          <li class="<?php if ($pageno >= $total_pages) {
            echo 'disabled';
          } ?> page-item">
            <a href="<?php if ($pageno >= $total_pages) {
              echo '#';
            } else {
              echo "?pageno=" . ($pageno + 1);
            } ?> "
              class="page-link">Siguiente</a>
          </li>
          <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Ultimo</a></li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebar.php'); ?>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include('includes/footer.php'); ?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Código JavaScript para inicializar los dropdowns -->
<script>
  // Inicializar todos los dropdowns
  var dropdowns = document.querySelectorAll('.dropdown-toggle');
  dropdowns.forEach(function(dropdown) {
    dropdown.addEventListener('click', function() {
      var dropdownMenu = this.nextElementSibling;
      if (dropdownMenu.style.display === 'block') {
        dropdownMenu.style.display = '';
      } else {
        dropdownMenu.style.display = 'block';
      }
    });
  });
</script>

  </head>
</body>

</html>