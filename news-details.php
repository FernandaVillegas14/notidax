<?php
session_start();
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['submit'])) {
  //Verifying CSRF Token
  if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];
      $postid = intval($_GET['nid']);
      $st1 = '0';
      $query = mysqli_query($con, "insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
      if ($query):
        echo "<script>alert('comentario enviado. Tu comentario sera aprobado por un admin ');</script>";
        unset($_SESSION['token']);
      else:
        echo "<script>alert('Something went wrong. Please try again.');</script>";

      endif;

    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Noti Dax</title>

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


  <!-- Bootstrap core JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

  <!-- Navigation -->
  <?php include('includes/header.php'); ?>



  <!-- Page Content -->
  <div class="container my-custom-container">
  <style>
  .my-custom-container {
    max-width: 1200px; /* Ajusta el valor según tus necesidades */
    margin: 0 auto; /* Centra el contenedor horizontalmente */
  }
</style>



    <div class="row" style="margin-top: 4%">

      <!-- Blog Entries Column -->
      <div class="col-md-8 offset-md-2">

        <!-- Blog Post -->
        <?php
        $pid = intval($_GET['nid']);
        $query = mysqli_query($con, "select tblposts.PostTitle as posttitle,tblposts.PostImage,tblposts.nombreUser as usuarioname, tblposts.userImagen as userimg, tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
        while ($row = mysqli_fetch_array($query)) {
          ?>

          <div class="card mb-4">

            <div class="card-body">
              <h2 class="card-title">
                <?php echo htmlentities($row['posttitle']); ?>
              </h2>
              <p> <i class="fas fa-solid fa-tags"></i> <b>Categoria : </b> <a
                  href="category.php?catid=<?php echo htmlentities($row['cid']) ?>"><?php echo htmlentities($row['category']); ?></a> |
                <b>Sub Categoria: </b>
                <?php echo htmlentities($row['subcategory']); ?> <i class="fas fa-calendar"></i> <b> Publicado en </b>
                <?php echo htmlentities($row['postingdate']); ?>
              </p>
              <button type="button" class="btn btn-secondary" disabled="disabled">
                <img class="img-profile rounded-circle"
                  src="admin/userimagenes/<?php echo htmlentities($row['userimg']); ?>" width="30" height="30" />
                <strong>Autor: </strong>
                <?php echo htmlentities($row['usuarioname']); ?>
              </button>
              <hr />

              <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                alt="<?php echo htmlentities($row['posttitle']); ?>">

              <p class="card-text">
                <?php
                $pt = $row['postdetails'];
                echo (substr($pt, 0)); ?>
              </p>

            </div>
            <div class="card-footer text-muted">


            </div>
          </div>
        <?php } ?>

      </div>

      <!-- Sidebar Widgets Column -->
      <!-- php include('includes/sidebar.php');  -->
    </div>
    <!-- /.row -->
    <!---Comment Section --->

    <div class="row" style="margin-top: -8%">
      <div class="col-md-8 offset-md-2">
        <div class="card my-4">
          <h5 class="card-header">Comentar:</h5>
          <div class="card-body">
            <form name="Comment" method="post">
              <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Escribe tu nombre" required>
              </div>

              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Escribe un email" required>
              </div>


              <div class="form-group">
                <textarea class="form-control" name="comment" rows="3" placeholder="Comentario" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
            </form>
          </div>
        </div>

        <!---Comment Display Section --->

        <?php
        $sts = 1;
        $query = mysqli_query($con, "select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
        while ($row = mysqli_fetch_array($query)) {
          ?>
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
          <div class="media-body">
            <h5 class="mt-0">
              <?php echo htmlentities($row['name']); ?> <br />
              <span style="font-size:11px;"><b>El</b>
                <?php echo htmlentities($row['postingDate']); ?>
              </span>
            </h5>

            <?php echo htmlentities($row['comment']); ?>
          </div>
        </div>
        <?php } ?>

      </div>
    </div>
  </div>


  <?php include('includes/footer.php'); ?>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

  <!-- Referencias a los archivos de Bootstrap -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>

  <!-- Código JavaScript para inicializar los dropdowns -->
  <script>
    // Inicializar todos los dropdowns
    var dropdowns = document.querySelectorAll('.dropdown-toggle');
    dropdowns.forEach(function (dropdown) {
      dropdown.addEventListener('click', function () {
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