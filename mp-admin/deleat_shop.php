<?php
ob_start();
if (isset($_GET['id'])) {
  $id=base64_decode($_GET['id']);
include_once './assets/includes/header.php';
 $sqli =$link->query("SELECT * FROM `shop_reg` WHERE shop_id='$id'") ;
 if ($sqli->num_rows > 0) {
   $data = $sqli->fetch_assoc();
   $remove_img='./middleware/media/images/'.$data['img'];
      unlink($remove_img);
      $sql = $link->query("DELETE FROM `shop_reg` WHERE shop_id='$id'");
      if ($sql==true){
      exit(header('location:view_shop.php'));
 }
 else {
   header('location:view_shop.php');
 }
?>

 <?php
 include_once './assets/includes/footer.php';
}
else {
  header('location:view_shop.php');
}
}
else {
   header('location:view_shop.php');
 }
 ob_end_flush();
  ?>
