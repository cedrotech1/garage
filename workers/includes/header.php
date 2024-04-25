<?php
// include('connection.php');
$userid=$_SESSION['id'];
$ok1 = mysqli_query($connection, "select * from users where id=$userid");
                  while ($row = mysqli_fetch_array($ok1)) {
                    $id = $row["id"];
                    $names = $row["names"];
                    $image = $row["image"];
                    $phone = $row["phone"];
                    $email = $row["email"];
                    $about = $row["about"];
                    $role = $row["role"];
                    
                }
?>
<!-- ======= Header ======= -->

<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="" class="logo d-flex align-items-center">
      <!-- <img src="assets/img/icon1.png" alt="" style='height:1.5cm'> -->
      <span class="d-none d-lg-block">ORANGE GARAGE</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
  </div><!-- End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item dropdown">



      </li><!-- End Notification Nav -->

      <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-chat-left-text"></i>
          <span class="badge bg-success badge-number">3</span>
        </a><!-- End Messages Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
          <li class="dropdown-header">
            You have 3 new messages
            <a href="messages.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>


          <li>
            <hr class="dropdown-divider">
          </li>

          <?php
          // Assuming you have already fetched data from the database and stored it in $result
          $query = "SELECT `id`, `name`, `email`, `subject`, `message`, `created_at` FROM `contact_messages` ORDER BY id DESC LIMIT 3";
          $result = mysqli_query($connection, $query);
          if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <li class="message-item">
                <a href="messages.php">
                  <img src="assets/img/profile1.png" alt="" class="rounded-circle">
                  <div>
                    <h4><?php echo $row['name']; ?></h4>
                    <p><?php echo $row['message']; ?></p>
                    <p><?php echo $row['created_at']; ?></p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <?php
            }
          } else {
            echo "No messages found.";
          }
          ?>



          <li class="dropdown-footer">
            <a href="#">Show all messages</a>
          </li>

        </ul><!-- End Messages Dropdown Items -->

      </li><!-- End Messages Nav -->

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="<?php echo $image ?>" alt="Profile" class="rounded-circle" style="height:1cm;width:1cm">
          <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $names; ?></span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?php echo $names;?></h6>
            <span><?php echo $role; ?></span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
              <i class="bi bi-gear"></i>
              <span>Account Settings</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="../index.php">
              <i class="bi bi-question-circle"></i>
              <span>go user page</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="../logout.php">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->