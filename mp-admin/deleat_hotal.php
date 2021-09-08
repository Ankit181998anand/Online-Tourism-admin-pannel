<?php
ob_start();
if (isset($_GET['id'])) {
  $id=base64_decode($_GET['id']);
include_once './assets/includes/header.php';
 $sqli =$link->query("SELECT * FROM `hotal` WHERE hotal_id='$id'") ;
 if ($sqli->num_rows > 0) {
   $data = $sqli->fetch_assoc();
   $remove_img='./middleware/media/images/'.$data['img'];
      unlink($remove_img);
      $sql = $link->query("DELETE FROM `hotal` WHERE hotal_id='$id'");
      if ($sql==true){
      exit(header('location:viwe_hotals.php'));
 }
 else {
   header('location:viwe_hotals.php');
 }
?>

 <?php
 include_once './assets/includes/footer.php';
}
else {
  header('location:viwe_hotals.php');
}
}
else {
   header('location:viwe_hotals.php');
 }
 ob_end_flush();
  ?>
