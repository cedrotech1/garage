<?php
include('connection.php');
$id=$_GET['pid'];
// if (!isset($id)) {
//     echo "<script>window.location.href='stockstatus.php'</script>";
//   }


    $ok1 = mysqli_query($connection, "select * from product where pid=$id");
        while ($row = mysqli_fetch_array($ok1)) {
        $pname = $row["pname"];
        $image = $row["image"];
        $decription = $row["decription"];
        }




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OGB GARAGE-product</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon1.png" rel="icon">
  <link href="assets/img/icon1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

<?php  
include("./includes/header.php");
include("./includes/menu.php");
?>



<main id="main" class="main">



    <section class="section dashboard">
      <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-5" style='margin-right:0.5cm'>
          <div class="row">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <img src="<?php echo $image ?>" class="card-img-top" alt="<?php echo $pname; ?>">
            </div>
          </div>
    
   
          </div>

      </div>
        <!-- Left side columns -->
        <!-- <div class="col-lg-1"></div> -->

        <div class="col-lg-5">
          <div class="row">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">EDIT PRODUCT FORM</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action='product-final.php' method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                <input type="text" class="form-control" id="floatingName" placeholder="product name" name='id' value="<?php echo $id; ?>" hidden>
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="product name" name='pname' value="<?php echo $pname; ?>">
                    <label for="floatingName">PRODUCT NAME</label>
                  </div>
                </div>
               
             
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" name="des" placeholder="Address" id="floatingTextarea" style="height: 100px;"><?php echo $decription; ?></textarea>
                    <label for="floatingTextarea">PRODUCT DESCRIPTION</label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="file" class="form-control" id="image" name='image' required onchange="previewImage(this)">
                    <label for="floatingName">PRODUCT IMAGE</label>
                  </div>
                  <div id="imagePreviewContainer">
                    <!-- Image preview will be displayed here -->
                  </div>
                </div>
          
                <div class="text-center">
                  <button type="submit" name="saveproduct" class="btn btn-primary">save change</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>
    
   
          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
<?php  
include("./includes/footer.php");
?>
 
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    function previewImage(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          var imagePreview = document.createElement('img');
          imagePreview.src = e.target.result;
          imagePreview.style.maxWidth = '100%';
          imagePreview.style.height = 'auto';
          
          var previewContainer = document.getElementById('imagePreviewContainer');
          previewContainer.innerHTML = ''; // Clear previous preview
          previewContainer.appendChild(imagePreview);
        }

        reader.readAsDataURL(input.files[0]); // Read the selected file as a data URL
      }
    }
  </script>

</body>

</html>

