<?php
if (isset($_GET['id'])) {
  $id=base64_decode($_GET['id']);
include_once './assets/includes/header.php';
 $sqli =$link->query("SELECT * FROM `product` WHERE product_id='$id'") ;
 if ($sqli->num_rows > 0) {
   $data = $sqli->fetch_assoc();
?>
				<div class="content">
					<div class="container-fluid">
					 	<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-icon" data-background-color="green">
				<i class="material-icons">&#xE894;</i>
			</div>
			<div class="card-content">
				<h4 class="card-title">Edit product (<?php echo $data['product_id']; ?>)</h4>
        <div class="float-right">
          <a href="view_product.php"><button type="button" class="btn btn-danger" name="button">Back</button></a>

        </div>

					<form method="post" action="" enctype="multipart/form-data">

	                    <div class="form-group label-floating ">
	                        <label class="control-label">Shop Id</label>
	                        <input type="text"name="shop_id" value="<?php echo $data['shop_id']; ?>" class="form-control">
	                    <span class="material-input"></span></div>
                      <div class="form-group label-floating ">
	                        <label class="control-label">Product Name</label>
	                        <input type="text"name="product_name" value="<?php echo $data['product_name']; ?>" class="form-control">
	                    <span class="material-input"></span></div>

                      <div class="form-group label-floating ">
	                        <label class="control-label">Description</label>
	                        <textarea  name="desc"   rows="10"  class="form-control"><?php echo $data['discription']; ?></textarea>
	                    <span class="material-input"></span></div>


                      <div class="form-group label-floating ">
	                        <label class="control-label">Cost</label>
	                        <input type="text"name="cost" value="<?php echo $data['price']; ?>" class="form-control">
	                    <span class="material-input"></span></div>


                      <div class="fileinput text-center fileinput-new" data-provides="fileinput">
  								<div class="fileinput-new thumbnail">
  									<img src="./middleware/media/images/<?php echo $data['image']; ?>" alt="...">
  								</div>
  								<div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
  								<div>
  									<span class="btn btn-rose btn-round btn-file">
  										<span class="fileinput-new">Select image</span>
  										<span class="fileinput-exists">Change</span>
  										<input type="hidden" value="" name="..."><input type="file"  name="image">
  									<div class="ripple-container"></div></span>
  									<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 62.5625px; top: 38.4px; background-color: rgb(255, 255, 255); transform: scale(15.5484);"></div><div class="ripple ripple-on ripple-out" style="left: 104.737px; top: 14.4px; background-color: rgb(255, 255, 255); transform: scale(15.5484);"></div></div></a>
  								</div>
  							</div>


        <br>

        <input type="submit" name="submit" class="btn btn-fill btn-rose" value="Submit">


	                </form>






				</div>


			</div>
		</div>
	</div>







					</div>
				</div>
        <?php if (isset($_POST['submit'])) {

          $i_s1=0;
          $errors= array();
        $shop_id = mysqli_real_escape_string($link,$_REQUEST['shop_id']);
        $name = mysqli_real_escape_string($link,$_REQUEST['product_name']);
        $desc = mysqli_real_escape_string($link,$_REQUEST['desc']);
        $cost = mysqli_real_escape_string($link,$_REQUEST['cost']);
        if(isset($_FILES['image'])){

          $file_name1 = $_FILES['image']['name'];
          $file_size1 = $_FILES['image']['size'];
          $file_tmp1 = $_FILES['image']['tmp_name'];
          $file_type1 = $_FILES['image']['type'];
          $temp_ext1=explode('.',$_FILES['image']['name']);
          $file_ext1=strtolower(end($temp_ext1));
          $expensions= array("jpeg","jpg","png");
          if ($file_name1!="") {
          if(in_array($file_ext1,$expensions)=== false){
            $errors[]="Image 1 , extension not allowed, please choose a JPEG or PNG file.";
          }
          if($file_size1 > 2097152) {
            $errors[]='Image 1 ,File size must be excately 2 MB';
          }
          if(empty($errors)==true) {
            $remove_img='./middleware/media/images/'.$data['image'];
            unlink($remove_img);
            move_uploaded_file($file_tmp1,"./middleware/media/images/".$file_name1);
            $i_s1=1;
          }
          else{
            $errors;

          }

        }
        else {
          $file_name1=$data['image'];
          $i_s1=1;

        }
      }


          if ($i_s1==1) {
            echo $i_s1;
            $sql="UPDATE `product` SET `shop_id`='$shop_id',`product_name`='$name',`price`='$cost',`discription`='$desc',`image`='$file_name1' WHERE `product_id`='$id'";
if(mysqli_query($link, $sql)){
?>
<script>
setTimeout(function() {
swal({
title: "Congratulaions!",
text: "Data Modified successfully",
type: "success",
confirmButtonText: "Ok"
}, function() {
window.location = "view_product.php";
}, 1000);
});
</script>
<?php
}
              }
              else {
                $err=implode(" ",$errors);


                ?>
                <script>
                setTimeout(function() {
                      swal({
                        title: "Error",
                        text: "<?php echo $err; ?>",
                        type: "error",
                        confirmButtonText: "Ok"
                      }, function() {
                        window.location = "";
                      }, 1000);
                    });
                    </script>
               <?php
              }
            } ?>

				<?php
				include_once './assets/includes/footer.php';
      }
      else {
        header('location:view_product.php');
      }
    }
    else {
      header('location:view_product.php');
    }

				 ?>
