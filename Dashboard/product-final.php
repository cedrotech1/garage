<?php
include('connection.php');

if (isset($_POST['saveproduct'])) {
    $pname = $_POST['pname'];
    $id = $_POST['id'];
    $des = $_POST['des'];

    if ($pname != '' && $des != '') {
        // Check if the product name already exists in the database
        $result = mysqli_query($connection, "SELECT * FROM `product` WHERE `pname` = '$pname' AND `pid` != $id");
        if (mysqli_num_rows($result) > 0) {
            // Product name already exists
            echo "<script>alert('Product name already exists. Please choose a different name.')</script>";
            echo "<script>window.location.href='stockstatus.php'</script>";
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
            if ($check === false) {
                echo "<script>alert('File is not an image.')</script>";
                echo "<script>window.location.href='stockstatus.php'</script>";
                exit(); // Stop script execution
            }

            // Check file size
            if ($_FILES["image"]["size"] > 5000000) {
                echo "<script>alert('Sorry, your file is too large.')</script>";
                echo "<script>window.location.href='stockstatus.php'</script>";
                exit(); // Stop script execution
            }

            // Allow certain file formats
            $allowed_extensions = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowed_extensions)) {
                echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
                echo "<script>window.location.href='stockstatus.php'</script>";
                exit(); // Stop script execution
            }

            // Move uploaded file to target directory with new filename
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_path = $target_file;
                // Update data in product table with new details
                $ok = mysqli_query($connection, "UPDATE `product` SET `pname`='$pname', `decription`='$des', `image`='$image_path' WHERE `pid`=$id");
                if ($ok) {
                    echo "<script>alert('Product updated successfully.')</script>";
                    echo "<script>window.location.href='stockstatus.php'</script>";
                    exit(); // Stop script execution
                } else {
                    echo "<script>alert('Failed to update product.')</script>";
                }
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
            }
        }
    } else {
        echo "<script>alert('Please fill all fields.')</script>";
    }
}
?>
