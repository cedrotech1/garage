<?php
include('connection.php');
$id=$_GET['pid'];
if (!isset($id)) {
    echo "<script>window.location.href='stockstatus.php'</script>";
  }


    $ok1 = mysqli_query($connection, "select * from stock where pid=$id");
        while ($row = mysqli_fetch_array($ok1)) {
        $existingquantity = $row["quantity"];
        $existingunit_cost = $row["unit_cost"];
        $existingtotal_cost = $row["total_cost"];
        }
        if($existingquantity ==0 && $existingunit_cost == 0 ){
            $ok=mysqli_query($connection,"delete from product where pid='$id'");
            if($ok){
                echo "<script>alert('deleted')</script>";
                echo "<script>window.location.href='stockstatus.php'</script>";
            }
        }else{
            echo "<script>alert('you can not delete product recorded in stock !')</script>";
            echo "<script>window.location.href='stockstatus.php'</script>";
        }
// }



?>