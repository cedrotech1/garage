<?php
$id=$_SESSION['id'];

// $id = $row['id'];
          $privileges_query = "SELECT title FROM privilages WHERE uid = $id";
          $privileges_result = mysqli_query($connection, $privileges_query);
          $privileges = [];
          while ($privilege_row = mysqli_fetch_assoc($privileges_result)) {
            $privileges[] = $privilege_row['title'];
          }
// Output privileges
// foreach ($privileges as $privilege) {
//     echo $privilege . "<br>";
// }
?>
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
       

        <?php if (in_array("Dashboard", $privileges)) : ?>
        <li class="nav-item">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        </li><!-- End Add Product Nav -->
        <?php endif; ?>
        
        <?php if (in_array("Add Product", $privileges)) : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="add_product.php">
                <i class="bi bi-menu-button-wide"></i>
                <span>Add Product</span>
            </a>
        </li><!-- End Add Product Nav -->
        <?php endif; ?>
        
        <?php if (in_array("View Product", $privileges)) : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="view_products.php">
                <i class="bi bi-menu-button-wide"></i>
                <span>View Product</span>
            </a>
        </li><!-- End View Product Nav -->
        <?php endif; ?>

        <?php if (in_array("View Product", $privileges)) : ?>
        <li class="nav-item">
        <a class="nav-link collapsed" href="stockstatus.php">
                <i class="bi bi-menu-button-wide"></i>
                <span>stock - status</span>
            </a>
        </li><!-- End View Product Nav -->
        <?php endif; ?>
        
        <?php if (in_array("Stock Recorded", $privileges)) : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="recorded.php">
                <i class="bi bi-menu-button-wide"></i>
                <span>Stock Recorded</span>
            </a>
        </li><!-- End Stock Recorded Nav -->
        <?php endif; ?>
        
        <?php if (in_array("Add User", $privileges)) : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="add_user.php">
                <i class="bi bi-menu-button-wide"></i>
                <span>manage User</span>
            </a>
        </li><!-- End Add User Nav -->
        <?php endif; ?>
        
        <?php 
// Check if the user has at least one of the specified privileges
if (in_array("Report", $privileges)) : 
?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="report.php">
            <i class="bi bi-menu-button-wide"></i>
            <span>Manage Report</span>
        </a>
    </li><!-- End Report Nav -->
<?php endif; ?>

        
        <?php if (in_array("Messages", $privileges)) : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="messages.php">
                <i class="bi bi-menu-button-wide"></i>
                <span>manage Messages</span>
            </a>
        </li><!-- End Messages Nav -->
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.php">
                <i class="bi bi-menu-button-wide"></i>
                <span>My profile</span>
            </a>
        </li><!-- End Add User Nav -->
    </ul>
</aside><!-- End Sidebar -->
