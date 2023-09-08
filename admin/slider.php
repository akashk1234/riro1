<?php
session_start();
include 'connection.php';

if (isset($_POST['save'])) {
    extract($_POST);
    $dir = "../images/admin";
    $file = basename($_FILES['img']['name']);
    $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $target = $dir . uniqid("images_") . "." . $file_type;
    
    if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
        $q = "INSERT INTO slider (text1, text2, image) VALUES ('$text1', '$text2', '$target')";
        insert($q);
        alert('Slide added successfully');
        redirect("slider.php");
    } else {
        echo "File uploading error occurred";
    }
} 



if (isset($_GET['did'])){
  extract($_GET);
  $q= "DELETE FROM slider WHERE slider_id='$did'";
  delete($q);
  alert('slide deleted successfully!');
  redirect('slider.php');
}
?>




<!DOCTYPE html>
<html>
<head>
  
</head>
<body>
    <div class="modal" id="addSlider" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content container">
            <div class="modal-header">
                    <h5 class="modal-title">Update Slide</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="btn btn-danger">&times;</span>
                    </button>
                </div>

            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputEmail1">Select Image</label>
                <input type="file" class="form-control" name="img" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Slider text 1</label>
                <input type="text"  class="form-control text-white" name="text1" id="exampleInputPassword1" placeholder="Enter slider text 1">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Slider text 2</label>
                <input type="text"  class="form-control text-white" name="text2" id="exampleInputPassword1" placeholder="Enter slider text 2">
              </div>
           
              <button type="submit" name="save" class="btn btn-primary">Submit</button>
            </form>

            </div>
        </div>
    </div>
    <!-- Your other HTML content goes here -->
</html>
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

    <!-- Include Bootstrap CSS and JS -->

  </head>


  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php include 'header.php' ?>


        <div class="main-panel">
          
          
            
            
            
          <div class="row containe">
            <div class="col-6 container">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Slider</h4>
                  <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                   
                  <?php 
                  $q= "select * from slider";
                  $res= select($q);
                  foreach($res as $row){

                   ?>

                    <div class="item">
                      <img src="<?php echo $row['image'] ?>" alt="">
                    </div>
                    
                    <?php
                    }
                    ?>

                  </div>
                  <a class="nav-link btn btn-success create-new-button mb-5 mt-5" data-toggle="modal" data-target="#addSlider" aria-expanded="false" href="#">+ Add New Slider</a>
                  <!-- <button type='button' class="nav-link btn btn-success create-new-button mb-5 mt-5" data-toggle="modal" data-target="#addSlider" aria-expanded="false" href="#">+ Add New Slider</button> -->
                 
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Slider</h4>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Index</th>
                          <th> Image </th>
                          <th> Slide text 1 </th>
                          <th> Slide text 2 </th>
                          <th> Edit </th>
                          <th> Delete </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $q= "select * from slider";
                      $r= select($q);
                      $i= 1;
                      foreach($r as $row){
                        ?>
                        <tr>
                        <td><?php echo $i++; ?></td>
                          <td class="py-1">
                          
                            <img src="<?php echo $row['image']; ?>" height="250" width="250" style="border-radius:0px">
                          </td>
                          <td><?php echo $row['text1']; ?></td>
                          <td><?php echo $row['text2']; ?></td>

                          
                          <td><button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#updateModal"><i class="fa-regular fa-pen-to-square"></i>Update</button></td>
                          <td><button type="button"  class="btn btn-outline-danger"><a href="?did=<?php echo $row['slider_id'] ?>" style="color: inherit;" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash"></i>Delete</a></button></td>
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
          <div id="modalContainer"></div>
          <div id="addModalContainer"></div>

    <script>
       fetch('modals/add-slider.php')
              .then(response => response.text())
              .then(data => {
                document.getElementById('addModalContainer').innerHTML = data;
              });

        // Load modal content  using JavaScript
        fetch('modals/update-slider.php')
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
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Designed by <a href="https://ictglobaltech.com/" target="_blank">ICT Global Tech</a></span>
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