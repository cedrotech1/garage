<?php
include ('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>orange garage</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./Dashboard/assets/img/icon1.png" rel="icon">
  <link href="./Dashboard/assets/img/icon1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Garage<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Spare parts</a></li>
          <!-- <li><a href="#events">Events</a></li> -->
          <li><a href="#chefs">Team</a></li>
          <li><a href="#gallery">Gallery</a></li>

          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" href="#contact">Contact us</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div
          class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">WELCAME TO SPARE PARTS</h2>
          <p data-aos="fade-up" data-aos-delay="100">Sed autem laudantium dolores. Voluptatem itaque ea consequatur
            eveniet. Eum quas beatae cumque eum quaerat.</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#contact" class="btn-book-a-table"> contact us !</a>
            <a href="login.php"
              class="btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>click join us
                </span></a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/img/car.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>About Us</h2>
      <p>Learn More <span>About Us</span></p>
    </div>

    <div class="row gy-4">
      <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/svg.svg) ;"
        data-aos="fade-up" data-aos-delay="150">
        <div class="call-us position-absolute" style="border:4px solid red;opacity:0.8;background-color:gray">
          <h4>Tap this phone number</h4>
          <a href="tel:+250788308413" style='font-size:0.6cm'>0788308413</a>
        </div>
      </div>
      <div class="col-lg-5 d-flex" data-aos="fade-up" data-aos-delay="300" style='  '>
        <div class="content ps-0 ps-lg-5">
          <p class="fst-italic">
            Orange Garage and Spare Parts specializes in providing top-quality services for V8 cars. We are committed
            to offering the best automotive solutions to our clients.
          </p>
          <ul>
            <li><i class="bi bi-check2-all"></i> Expert maintenance and repair services for V8 cars.</li>
            <li><i class="bi bi-check2-all"></i> High-quality spare parts specifically designed for V8 engines.</li>
            <li><i class="bi bi-check2-all"></i> Dedicated team providing exceptional customer service and support.</li>
          </ul>
          <p>
            At Orange Garage and Spare Parts, we strive to exceed our clients' expectations by delivering reliable
            solutions tailored to their needs. Trust us for all your V8 car maintenance and spare parts requirements.
          </p>

          <!-- Additional content or image can be added here if needed -->

        </div>
      </div>
    </div>

  </div>
</section><!-- End About Section -->

 <!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us section-bg">
  <div class="container" data-aos="fade-up">
    <div class="row gy-4">
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
       <div class="why-box">
  <h3>Why Choose Orange Garage and Spare Parts?</h3>
  <!-- <p>
    Orange Garage and Spare Parts is your ultimate destination for automotive needs. Here's why you should choose us:
  </p> -->
  <ul>
    <li><i class="bi bi-check2-all"></i> Expertise: Our team of skilled professionals ensures top-notch maintenance and repair services.</li>
    <li><i class="bi bi-check2-all"></i> Quality: We offer premium spare parts tailored for V8 cars, guaranteeing peak performance and longevity.</li>
    <li><i class="bi bi-check2-all"></i> Customer Satisfaction: Your satisfaction is our priority; we go above and beyond to meet your expectations.</li>
    
  <div class="text-center">
    <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
  </div>
</div>

      </div><!-- End Why Box -->
      <div class="col-lg-8 d-flex align-items-center">
        <div class="row gy-4">
          <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-clipboard-data"></i>
              <h4>Expertise</h4>
              <p>Our team consists of highly skilled professionals with years of experience.</p>
            </div>
          </div><!-- End Icon Box -->
          <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-gem"></i>
              <h4>Quality</h4>
              <p>We provide top-quality spare parts specifically designed for V8 cars.</p>
            </div>
          </div><!-- End Icon Box -->
          <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-inboxes"></i>
              <h4>Customer Satisfaction</h4>
              <p>We prioritize customer satisfaction and strive to exceed expectations.</p>
            </div>
          </div><!-- End Icon Box -->
        </div>
      </div>
    </div>
  </div>
</section><!-- End Why Us Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Clients</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Spare parts</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Workers</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Products</h2>
          <p>Check Our <span>spare parts</span></p>
        </div><br>



        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">



          <div class="row gy-5">

            <!-- <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                <h4>Magnam Tiste</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $5.95
                </p>
              </div>   -->


            <?php

            $id = isset($_GET['pid']) ? intval($_GET['pid']) : null;

            // Initialize the query string
            $query = "SELECT p.pid, p.*, s.quantity AS product_quantity, s.unit_cost AS unit_cost, s.total_cost AS total_cost  
        FROM `product` AS p 
        LEFT JOIN `stock` AS s ON p.pid = s.pid Limit 3";

            // Append WHERE clause if ID is provided
            if ($id !== null) {
              $query .= " WHERE p.pid = $id";
            }



            // Retrieve products with updated quantity from the database
            // $query = "SELECT p.pid, p.*, s.quantity AS product_quantity,s.unit_cost AS unit_cost ,s.total_cost AS total_cost  FROM `product` AS p LEFT JOIN `stock` AS s ON p.pid = s.pid where p.pid=$id";
            

            $result = mysqli_query($connection, $query);


            // Check if there are any products
            if (mysqli_num_rows($result) > 0) {
              // Loop through each product
              while ($row = mysqli_fetch_assoc($result)) {
                ?>

                <div class="col-lg-4" style="">

                  <div class="col-lg-12"
                    style="border:1px solid whitesmoke;padding:1cm;margin:0px;background-color:whitesmoke">

                    <a href="Dashboard/<?php echo $row['pname'] ?>" class="glightbox">
                      <img src="./Dashboard/<?php echo $row['image'] ?>" class="menu-img img-fluid" alt=""
                        style="border-radius:2%;height:6cm;width:100%;margin-botton:1cm"/></a>
                    <h4 style='margin-top:0.5cm'><?php echo $row['pname'] ?></h4>
                    <p class="ingredients">
                      <?php echo $row['decription'] ?>
                    </p>
                    <!-- <p class="price">
                    $5.95
                  </p> -->
                  </div>
                </div>

                <?php
              }
            } else {
              // If no products found
              echo '<p>No products found</p>';
            }
            ?>


          </div>
        </div><!-- End Starter Menu Content -->




      </div>
    </section><!-- End Menu Section -->

  
 <!-- ======= Chefs Section ======= -->
<section id="chefs" class="chefs section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Team</h2>
      <p>Our <span>Professional</span> Team</p>
    </div>
    <div class="row gy-4">
      <?php
      // Default bios array
      $default_bios = [
        1 => "We provide the best quality spare parts for your vehicle, ensuring optimal performance and longevity.",
        2 => "Our expert garage team is dedicated to providing top-notch services, from routine maintenance to complex repairs.",
        3 => "With years of experience, our team delivers exceptional customer service and expert advice for all your automotive needs.",
        4 => "From oil changes to engine overhauls, we handle every job with precision and care, keeping your vehicle running smoothly.",
        5 => "As your trusted automotive experts, we're committed to delivering reliable and affordable solutions for all your repair and maintenance needs.",
        // Add more bios as needed
    ];
    
      // Query to select users
      $query = "SELECT * FROM users LIMIT 3";
      $result = mysqli_query($connection, $query);

      // Check if any users were found
      if (mysqli_num_rows($result) > 0) {
        // Loop through each user
        while ($row = mysqli_fetch_assoc($result)) {
          // Get privileges for the current user
          $userId = $row['id'];
          $role = $row['role'];
          $privileges_query = "SELECT title FROM privilages WHERE uid = $userId";
          $privileges_result = mysqli_query($connection, $privileges_query);
          $privileges = [];
          while ($privilege_row = mysqli_fetch_assoc($privileges_result)) {
            $privileges[] = $privilege_row['title'];
          }
          ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="chef-member">
              <div class="member-img">
                <?php
                if ($role == 'admin') {
                  ?>
                  <img src="Dashboard/<?php echo $row['image'] ?>" class="img-fluid" alt="">
                  <?php
                } else {
                  ?>
                  <img src="workers/<?php echo $row['image'] ?>" class="img-fluid" alt="">
                  <?php
                }
                ?>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <br>
              <div class="member-info">
                <h4><?php echo $row['names']; ?></h4>
             
                <p>
                  <?php 
                  // Display default bio based on user ID
                  echo isset($default_bios[$userId]) ? $default_bios[$userId] : "Default bio not available";
                  ?>
                </p>
              </div>
            </div>
          </div><!-- End Chefs Member -->
          <?php
        }
      } else {
        // If no users found
        echo '<p>No users found</p>';
      }
      ?>
    </div>
  </div>
</section><!-- End Chefs Section -->

<?php

$query = "SELECT p.pid, p.*, s.quantity AS product_quantity, s.unit_cost AS unit_cost, s.total_cost AS total_cost  
FROM `product` AS p 
LEFT JOIN `stock` AS s ON p.pid = s.pid";

    // Append WHERE clause if ID is provided
    if ($id !== null) {
      $query .= " WHERE p.pid = $id";
    }



    // Retrieve products with updated quantity from the database
    // $query = "SELECT p.pid, p.*, s.quantity AS product_quantity,s.unit_cost AS unit_cost ,s.total_cost AS total_cost  FROM `product` AS p LEFT JOIN `stock` AS s ON p.pid = s.pid where p.pid=$id";
    

    $result = mysqli_query($connection, $query);


    // Check if there are any products
    if (mysqli_num_rows($result) > 0) {
      ?>
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>gallery</h2>
          <p>Check Our<span> spare parts Gallery</span></p>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">

<?php
      // Loop through each product
      while ($row = mysqli_fetch_assoc($result)) {
        ?>

          <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                href="Dashboard/<?php echo $row['image'] ?>"><img src="Dashboard/<?php echo $row['image'] ?>" class="img-fluid"
                  alt=""></a></div>


<?php
              }
           ?>





          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->
    <?php
     } else {
      // If no products found
      // echo '<p>No products found</p>';
    }
    ?>



    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;"
            src="https://www.google.com/maps/embed/v1/place?q=ICYEREKEZO+(GATSATA),+Kigali,+Rwanda&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
            frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Our Address</h3>
                <p>Kigali city, nyabugogo  Gatsata Road </p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>orangegarage2022@gmail.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+250 788308413</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div><strong>Mon-Sat:</strong> 8AM - 23PM;
                  <strong>Sunday:</strong> Closed
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>
        <div class="row">
          <div class="col-md-4">
          <div class="col-lg-12 reservation-img" style="background-image: url(assets/img/logopic.jpg);"
            data-aos="zoom-out" data-aos-delay="200">
            <img src="./assets/img/logo.jpg" alt="" style='width:100%;height:9cm'>
          </div>
          </div>
          <div class="col-md-8"> 
             <form action="index.php" method="post" role="form" class="p-3 p-md-4" style='background-color:white'>
          <div class="row">
            <div class="col-xl-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div><br>
            <div class="col-xl-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div><br>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div><br>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <!-- <div class="loading">Loading</div> -->
            <div class="error-message"></div>
            <!-- <div class="sent-message">Your message has been sent. Thank you!</div> -->
          </div>
          <div class="text-center"><button type="submit" name="save" class='btn btn-info col-md-12'>Send Message</button></div>
        </form><!--End Contact Form -->
</div>
        </div>

      
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
            Kigali city <br>
            nyabugogo  Gatsata Road<br>
            </p>
          </div>

        </div>

        <div class="col-lg-4 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong>+250 788308413<br>
              <strong>Email:</strong> orangegarage2022@gmail.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat: 8AM</strong> - 23PM<br>
              Sunday: Closed
            </p>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>orangegarage2022</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        Designed by <a href="tel:+250784366616">cedro tech</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>


<?php
// Check if the form is submitted
if (isset($_POST['save'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Connect to the database (replace 'hostname', 'username', 'password', and 'database' with your actual credentials)

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape special characters to prevent SQL injection
    $name = mysqli_real_escape_string($connection, $name);
    $email = mysqli_real_escape_string($connection, $email);
    $subject = mysqli_real_escape_string($connection, $subject);
    $message = mysqli_real_escape_string($connection, $message);

    // Insert form data into the database
    $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($connection, $sql)) {
        echo "<script>alert('Your message has been sent. Thank you!')</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . mysqli_error($connection) . "')</script>";
    }

    // Close database connection
    mysqli_close($connection);
}
?>
