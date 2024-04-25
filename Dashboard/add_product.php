<?php
include ('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Product</title>
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
        <!-- Left side columns -->
        <div class="col-lg-10">
          <div class="row">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ADD PRODUCT FORM</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action='add_product.php' method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" placeholder="product name" name='pname'>
                    <label for="floatingName">PRODUCT NAME</label>
                  </div>
                </div>
               
             
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" name="des" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
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
                  <button type="submit" name="saveproduct" class="btn btn-primary">save product</button>
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
<?php
if (isset($_POST['saveproduct'])) {
    $pname = $_POST['pname'];
    $des = $_POST['des'];

    if ($pname != '' && $des != '') {
        // Check if the product name already exists in the database
        $result = mysqli_query($connection, "SELECT * FROM `product` WHERE `pname` = '$pname'");
        if (mysqli_num_rows($result) > 0) {
            // Product name already exists
            echo "<script>alert('Product name already exists. Please choose a different name.')</script>";
        } else {
            // File upload
            $target_dir = "upload/"; // Directory where files will be saved
            $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION)); // Get the file extension

            // Generate a unique filename using timestamp
            $timestamp = time();
            $target_file = $target_dir . $timestamp . '.' . $imageFileType; // New filename with timestamp

            // Check if file already exists (unlikely with timestamp, but just in case)
            while (file_exists($target_file)) {
                $timestamp = time(); // Regenerate timestamp if filename already exists
                $target_file = $target_dir . $timestamp . '.' . $imageFileType;
            }

            // Check if file is an actual image
            $check = getimagesize($_FILES["image"]["tmp_name"]);

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "<script>alert('Sorry, file already exists.')</script>";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["image"]["size"] > 5000000) {
                echo "<script>alert('Sorry, your file is too large.')</script>";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<script>alert('Sorry, your file was not uploaded.')</script>";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image_path = $target_file;
                    // Insert data into product table
                    $ok = mysqli_query($connection, "INSERT INTO `product`(`pid`, `pname`, `decription`, `image`) 
                    VALUES (null,'$pname','$des','$image_path')");
                    if ($ok) {
                        // Get the ID of the inserted product
                        $last_id = mysqli_insert_id($connection);
                        // Insert data into stock table with a quantity of zero
                        $stock_ok = mysqli_query($connection, "INSERT INTO `stock`(`id`, `pid`, `quantity`) 
                        VALUES (null, '$last_id', 0)");
                        if ($stock_ok) {
                            echo "<script>alert('Product inserted successfully.')</script>";
                            echo "<script>window.location.href='view_products.php'</script>";
                        }
                    } else {
                        echo "<script>alert('Failed to insert product.')</script>";
                    }
                } else {
                    echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
                }
            }
        }
    } else {
        echo "<script>alert('Please fill all fields.')</script>";
    }
}
?>
