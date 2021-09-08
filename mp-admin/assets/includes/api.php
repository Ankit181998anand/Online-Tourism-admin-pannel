<?php
function des_name($id,$link)
{
  $sq =$link->query("SELECT * FROM `destinations` WHERE id='$id'") ;
  if ($sq->num_rows > 0){
    $data = $sq->fetch_assoc();
    echo $data['title'];
  }
}

 ?>
