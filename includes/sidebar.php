  <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Buscar</h5>
            <div class="card-body">
                   <form name="search" action="search.php" method="post">
              <div class="input-group">
           
        <input type="text" name="searchtitle" class="form-control" placeholder="Buscar por..." required>
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Buscar</button>
                </span>
              </form>
              </div>
            </div>
          </div>


          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categorias</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    

<?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
while($row=mysqli_fetch_array($query))
{
?>

                    <li>
                     
                 <a href="category.php?catid=<?php echo htmlentities($row['id'])?>" class="btn btn-light btn-icon-split" >
               <span class="icon text-gray-600">
             <i class="fas fa-solid fa-tags"></i>
              </span>
               <span class="text"><?php echo htmlentities($row['CategoryName']);?> </span>
              </a>
                    </li>
<?php } ?>
                  </ul>
                </div>
       
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Noticias recientes</h5>
            <div class="card-body">
                      <ul class="list-unstyled mb-0">
      <?php
      $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 4");
      while ($row=mysqli_fetch_array($query)) {

      ?>

        <li>

        <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-light btn-icon-split" >
               <span class="icon text-gray-600">
             <i class="fas fa-solid fa-newspaper "></i>
              </span>
               <span class="text"><?php echo htmlentities($row['posttitle']);?> </span>
              </a>

                    </li>
            <?php } ?>
          </ul>
            </div>
          </div>

        </div>
