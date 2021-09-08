<?php
ob_start();
if (isset($_GET['id'])) {
  $id=base64_decode($_GET['id']);
include_once './assets/includes/header.php';
 $sqli =$link->query("SELECT * FROM `home_banner` WHERE id='$id'") ;
 if ($sqli->num_rows > 0) {
   $data = $sqli->fetch_assoc();
   $remove_img='./middleware/media/images/'.$data['imagename'];
      unlink($remove_img);
      $sql = $link->query("DELETE FROM `home_banner` WHERE id='$id'");
      if ($sql==true){
      exit(header('location:home_banner.php'));
 }
 else {
   header('location:home_banner.php');
 }
?>

 <?php
 include_once './assets/includes/footer.php';
}
else {
  header('location:home_banner.php');
}
}
else {
   header('location:home_banner.php');
 }
 ob_end_flush();
  ?>
