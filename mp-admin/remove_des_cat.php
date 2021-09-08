<?php
ob_start();
if (isset($_GET['id'])) {
  $id=base64_decode($_GET['id']);
include_once './assets/includes/header.php';
 $sqli =$link->query("SELECT * FROM `cat_destination` WHERE id='$id'") ;
 if ($sqli->num_rows > 0) {
   $data = $sqli->fetch_assoc();
      $sql = $link->query("DELETE FROM `cat_destination` WHERE id='$id'");
      if ($sql==true){
      exit(header('location:des_cat.php'));
 }
 else {
   header('location:des_cat.php');
 }
?>

 <?php
 include_once './assets/includes/footer.php';
}
else {
  header('location:des_cat.php');
}
}
else {
   header('location:des_cat.php');
 }
 ob_end_flush();
  ?>
