<?php
session_start();
include 'connection.php';

if (isset($_POST['save'])) {
  extract($_POST);
    $q = "INSERT INTO subcategory (cat_id, subcategory) VALUES ('$category', '$subcatname')";
    insert($q);
    alert('Subcategory added successfully');
    redirect("subcategory.php");
} 




if (isset($_GET['did'])) {
  extract($_GET);
  $q = "DELETE FROM subcategory WHERE subcat_id='$did'";
  delete($q);
  alert('Subcategory deleted successfully!');
  redirect('subcategory.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Riro Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <?php include 'header.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar p-0 fixed-top d-flex flex-row">

        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>

          <ul class="navbar-nav navbar-nav-right">




            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle" src="assets/images/favicon.png" alt="">
                  <p class="mb-0 d-none d-sm-block navbar-profile-name">Riro Admin</p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                aria-labelledby="profileDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Log out</p>
                  </div>
                </a>

              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">







        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Categories</h4>
                  <a class="nav-link btn btn-success create-new-button mb-5 mt-5" data-toggle="modal"
                    data-target="#addCategory " aria-expanded="false" href="#">+ Add New Subcategory</a>

                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>


                        <tr>
                          <th>  # </th>
                          <th> Category Name </th>

                          <th>Subcategory</th>
                          <th> Edit </th>
                          <th> Delete </th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        $q = "select * from subcategory inne join category using(cat_id)";
                        $res = select($q);
                        $i = 1;
                        foreach ($res as $row) {
                          ?>
                          <tr>
                            <td>
                              <?php echo $i++ ?>
                            </td>

                            <td class="py-1">
                            <?php echo $row['cat_name'] ?>
                            </td>
                            <td>
                            <?php echo $row['subcategory'] ?>
                            </td>

                            <td><button type="button" class="btn btn-outline-warning" data-toggle="modal"
                                data-target="#updateModal"><a href="?cid=<?php echo $row['cat_id'] ?>" style="color: inherit;"><i class="fa-regular fa-pen-to-square"></i>Update</a></button></td>

                            <td><button type="button" class="btn btn-outline-danger"><a
                                  href="?did=<?php echo $row['subcat_id'] ?>" style="color: inherit;"
                                  onclick="return confirm('Are you sure you want to delete this item?');"><i
                                    class="fa-solid fa-trash"></i>Delete</a></button></td>
                          </tr>
                          <?php
                        }
                        ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- modal.html update -->

          <?php
          if (isset($_GET['cid'])){
            $cid=$_GET['cid'];
            $q= "select * from category where cat_id='$cid'";
            $res= select($q);
          
          ?>
          <div class="modal" id="updateModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Category</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="btn btn-light">&times;</span>
                  </button>
                </div>
                <form method="post">
                  <div class="modal-body">
                    <!-- Input fields for updating information -->
                    <div class="form-group">
                      <label for="field1">Category image</label>
                      <input type="file" name="image" value="<?php echo $res[0]['cat_image'] ?>" class="form-control text-white" id="field1">
                    </div>
                    <div class="form-group">
                      <label for="field2">Category name</label>
                      <input type="text" name="name" value="<?php echo $res[0]['cat_name'] ?>" class="form-control text-white" id="field2" placeholder="Enter category name">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <?php } ?>




          <!-- modal.html add -->
          <div class="modal" id="addCategory" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add Subcategory</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="btn btn-danger">&times;</span>
                  </button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <!-- Input fields for updating information -->
                    <div class="form-group">
                    <select class="form-select form-control text-white" name="category"
                        aria-label="Default select example">
                        <option selected>Select Category</option>
                        <?php
                        $q = "select * from category";
                        $res = select($q);
                        foreach ($res as $row) {
                          ?>
                          <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="field2">Subcategory name</label>
                      <input type="text" name="subcatname" class="form-control text-white" id="field2"
                        placeholder="Enter category name">
                    </div>



                  </div>

                  <div class="modal-footer">
                    <button type="submit" name="save" class="btn btn-primary">Add Subcategory</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <script>
            fetch('modals/add-slider.php')
              .then(response => response.text())
              .then(data => {
                document.getElementById('addModalContainer').innerHTML = data;
              });
            // Load modal content  using JavaScript
            fetch('modals/update-category.html')
              .then(response => response.text())
              .then(data => {
                document.getElementById('modalContainer').innerHTML = data;
              });
          </script>
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Riro.com 2023</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Designed by <a
                href="https://ictglobaltech.com/" target="_blank">ICT Global Tech</a></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>

</html>