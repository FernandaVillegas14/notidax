  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="https://cdn-icons-png.flaticon.com/512/21/21601.png" height="50"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorías
            </a>
            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
              <?php
              $query=mysqli_query($con,"select id,CategoryName from tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>
              <li>
                <a class="dropdown-item" href="category.php?catid=<?php echo htmlentities($row['id'])?>">
                  <span class="icon text-gray-600">
                    <i class="fas fa-solid fa-tags"></i>
                  </span>
                  <?php echo htmlentities($row['CategoryName']);?>
                </a>
              </li>
              <?php } ?>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="recentNewsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Noticias recientes
            </a>
            <ul class="dropdown-menu" aria-labelledby="recentNewsDropdown">
              <?php
              $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 4");
              while ($row=mysqli_fetch_array($query)) {
              ?>
              <li>
                <a class="dropdown-item" href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>">
                  <span class="icon text-gray-600">
                    <i class="fas fa-solid fa-newspaper "></i>
                  </span>
                  <?php echo htmlentities($row['posttitle']);?>
                </a>
              </li>
              <?php } ?>
            </ul>
          </li>
        
          <li class="nav-item">
            <form class="form-inline" name="search" action="search.php" method="post">
              <input class="form-control mr-sm-2" type="search" name="searchtitle" placeholder="Buscar por..." required>
              <button class="btn btn-secondary" type="submit">Buscar</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
