<?php
session_start();
include 'connection.php';

if (isset($_POST['save'])) {
  $checkBox = implode(', ', $_POST['size']);
  extract($_POST);
  $dir = "../images/admin";
  $file = basename($_FILES['image']['name']);
  $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
  $target = $dir . uniqid("images_") . "." . $file_type;

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      // Create a new PDO connection (adjust the connection details as needed)
      $pdo = new PDO("mysql:host=localhost;dbname=riro", "root", "");

      // Define the SQL query with placeholders
      $sql = "INSERT INTO product (product_name, product_image, product_price, product_desc, cat_id, size) 
              VALUES (:name, :target, :price, :desc, :category, :checkBox)";

      // Prepare the SQL statement
      $stmt = $pdo->prepare($sql);

      // Bind parameters
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':target', $target);
      $stmt->bindParam(':price', $price);
      $stmt->bindParam(':desc', $desc);
      $stmt->bindParam(':category', $category);
      $stmt->bindParam(':checkBox', $checkBox);

      // Execute the prepared statement
      if ($stmt->execute()) {
          alert('Product added successfully');
          redirect("Products.php");
      } else {
          echo "Product adding error occurred";
      }
  } else {
      echo "File upload error occurred";
    }
}



if (isset($_GET['did'])) {
  extract($_GET);
  $q = "DELETE FROM product WHERE product_id='$did'";
  delete($q);
  alert('Product deleted successfully!');
  redirect('Products.php');
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
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <!-- <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html">RIRO</a>
          <a class="sidebar-brand brand-logo-mini" href="index.html">RIRO</a>
          
        </div> -->

      <ul class="nav">
        <!-- Profile -->
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle" src="assets/images/favicon.png" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">Riro Admin</h5>
              </div>
            </div>
          </div>
        </li>

        <!-- Navigation Category -->
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>

        <!-- Dashboard -->
        <li class="nav-item menu-items">
          <a class="nav-link" href="index.html">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

        <!-- Website Management Dropdown -->
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#website-management" aria-expanded="false"
            aria-controls="website-management">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Website Management</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="website-management">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="slider.html">Slider</a></li>
              <li class="nav-item"> <a class="nav-link" href="privacy-policy.html">Privacy Policy</a></li>
              <li class="nav-item"> <a class="nav-link" href="refund-policy.html">Refund Policy</a></li>
              <li class="nav-item"> <a class="nav-link" href="terms-of-use.html">Terms of use</a></li>
            </ul>
          </div>
        </li>

        <!-- Product Management Dropdown -->
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#product-management" aria-expanded="false"
            aria-controls="product-management">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Product Management</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="product-management">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="category.html">Category</a></li>
              <li class="nav-item"> <a class="nav-link" href="Products.html">Product</a></li>
            </ul>
          </div>
        </li>

        <!-- Order Management Dropdown -->
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#order-management" aria-expanded="false"
            aria-controls="order-management">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Order Management</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="order-management">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="new-orders.html">New Orders</a></li>
              <li class="nav-item"> <a class="nav-link" href="shipped-orders.html">Shipped Orders</a></li>
              <li class="nav-item"> <a class="nav-link" href="delivered-orders.html">Delivered Orders</a></li>
            </ul>
          </div>
        </li>
      </ul>

    </nav>
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
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Products</h4>
        <a class="nav-link btn btn-success create-new-button mb-5 mt-5" data-toggle="modal"
          data-target="#addModal" aria-expanded="false" href="#">+ Add New Product</a>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> No.</th>
                <th> Category Name </th>
                <th> Product Image </th>
                <th> Product Name </th>
                <th> Product Price </th>
                <th> Product Description </th>
                <th> Available sizes </th>
                <th> Edit </th>
                <th> Delete </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $q = "select * from product inner join category using(cat_id)";
              $res = select($q);
              $i = 1;
              foreach ($res as $row) {
              ?>
                <tr>
                  <td>
                    <?php echo $i++ ?>
                  </td>
                  <td>
                    <?php echo $row['cat_name'] ?>
                  </td>
                  <td class="py-1 p-4">
                    <img style="border-radius: 0px; width: 100px; height: 120px;"
                      src="<?php echo $row['product_image'] ?>" alt="image" />
                  </td>
                  <td>
                    <?php echo $row['product_name'] ?>
                  </td>
                  <td>
                    <?php echo $row['product_price'] ?>
                  </td>
                  <td>
                    <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;"><?php echo $row['product_desc'] ?></p>
                  </td>
                  <td>
                    <?php echo $row['size'] ?>
                  </td>
                  <td><button type="button" class="btn btn-outline-warning" data-toggle="modal"
                      data-target="#updateModal"><i class="fa-regular fa-pen-to-square"></i>Update</button></td>
                  <td><button type="button" class="btn btn-outline-danger"><a
                        href="?did=<?php echo $row['product_id'] ?>" style="color: inherit;"
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
              


          <div id="updateModalContainer"></div>

          <!-- modal.html -->
          <div class="modal" id="addModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="btn btn-danger">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Input fields for updating information -->
                  <form method="POST" enctype="multipart/form-data">
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
                      <label for="field1">Product image</label>
                      <input type="file" name="image" class="form-control text-white" id="field1">
                    </div>
                    <div class="form-group">
                      <label for="field2">Product name</label>
                      <input type="text" name="name" class="form-control text-white" id="field2"
                        placeholder="Enter product name">
                    </div>
                    <div class="form-group">
                      <label for="field2">Product Price</label>
                      <input type="text" name="price" class="form-control text-white" id="field2"
                        placeholder="Enter product price">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Product Description</label>
                      <textarea class="form-control text-white" name="desc" id="exampleFormControlTextarea1" rows="3"
                        placeholder="Enter Product description"></textarea>
                    </div>

                    <div class="container mb-3">
                      <p style="color:gray;">Select Available Sizes</p>

                      <div class="row ms-5">
                        <div class="col-6">
                          <div class="form-check">
                            <input class="form-check-input" name="size[]" type="checkbox" value="S"
                              id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                              S
                            </label>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-check">
                            <input class="form-check-input" name="size[]" type="checkbox" value="M"
                              id="flexCheckChecked1">
                            <label class="form-check-label" for="flexCheckChecked1">
                              M
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-6">
                          <div class="form-check">
                            <input class="form-check-input" name="size[]" type="checkbox" value="L"
                              id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">
                              L
                            </label>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-check">
                            <input class="form-check-input" name="size[]" type="checkbox" value="XL"
                              id="flexCheckChecked2">
                            <label class="form-check-label" for="flexCheckChecked2">
                              XL
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-6">
                          <div class="form-check">
                            <input class="form-check-input" name="size[]" type="checkbox" value="XXL"
                              id="flexCheckChecked3">
                            <label class="form-check-label" for="flexCheckChecked3">
                              XXL
                            </label>
                          </div>
                        </div>
                      </div>
                      <hr style="border-top: 1px dashed gray;">


                      <p style="color:gray;">Select Dhoti Type</p>

                      <div class="row">
                        <div class="col-6">
                          <div class="form-check">
                            <input class="form-check-input" name="size[]" type="checkbox" value="Single"
                              id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">
                              Single
                            </label>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-check">
                            <input class="form-check-input" name="size[]" type="checkbox" value="Double"
                              id="flexCheckChecked2">
                            <label class="form-check-label" for="flexCheckChecked2">
                              Double
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>




                    <div class="modal-footer">
                      <button type="submit" name="save" class="btn btn-primary">Add Product</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
          <script>
            // Load add product modal content using JavaScript
            fetch('modals/add-product.html')
              .then(response => response.text())
              .then(data => {
                document.getElementById('addModalContainer').innerHTML = data;
              });

            // Load update product modal content using JavaScript
            fetch('modals/update-product.html')
              .then(response => response.text())
              .then(data => {
                document.getElementById('updateModalContainer').innerHTML = data;
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