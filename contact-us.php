<?php
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Contactanos</title>

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
  <?php include('includes/header.php'); ?>
  <!-- Page Content -->
  <div class="container">

    <?php
    $pagetype = 'contactus';
    $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
    while ($row = mysqli_fetch_array($query)) {

      ?>
      <h1 class="mt-4 mb-3">
        <?php echo htmlentities($row['PageTitle']) ?>

      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Intro Content -->
      <div class="row">

        <div class="col-lg-12">

          <p>
            <?php echo $row['Description']; ?>
          </p>
        </div>
      </div>
      <!-- /.row -->
    <?php } ?>

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

</body>

</html>