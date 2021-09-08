<?php
include_once './assets/includes/header.php';
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
				<h4 class="card-title">Regester Shop</h4>


					<form method="post" action="" enctype="multipart/form-data">

	                    <div class="form-group label-floating is-empty">
	                        <label class="control-label">Shop Name</label>
	                        <input type="text"name="name" class="form-control">
	                    <span class="material-input"></span></div>

                      <div class="form-group label-floating is-empty">
	                        <label class="control-label">Address</label>
	                        <textarea  name="add" class="form-control"></textarea>
	                    <span class="material-input"></span></div>
                      <div class="form-group label-floating is-empty">
	                        <label class="control-label">State</label>
	                        <input type="text"name="state" class="form-control">
	                    <span class="material-input"></span></div>
                      <div class="form-group label-floating is-empty">
	                        <label class="control-label">Rating</label>
	                        <input type="text"name="rate" class="form-control">
	                    <span class="material-input"></span></div>



                      <div class="fileinput text-center fileinput-new" data-provides="fileinput">
  								<div class="fileinput-new thumbnail">
  									<img src="./assets/img/image_placeholder.jpg" alt="...">
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
        $name = mysqli_real_escape_string($link,$_REQUEST['name']);
        $add = mysqli_real_escape_string($link,$_REQUEST['add']);
        $state = mysqli_real_escape_string($link,$_REQUEST['state']);
        $rate = mysqli_real_escape_string($link,$_REQUEST['rate']);
        $token = '02120321236547956984456521236448586SDASYFDASGUYTAWERTYUIOIGDFGH';
        $token = str_shuffle($token);
        $token = substr($token, 0, 5);
        $shop_id='SR_'.$token;
        if(isset($_FILES['image'])){

          $file_name1 = $_FILES['image']['name'];
          $file_size1 = $_FILES['image']['size'];
          $file_tmp1 = $_FILES['image']['tmp_name'];
          $file_type1 = $_FILES['image']['type'];
          $temp_ext1=explode('.',$_FILES['image']['name']);
          $file_ext1=strtolower(end($temp_ext1));
          $expensions= array("jpeg","jpg","png");
          if(in_array($file_ext1,$expensions)=== false){
            $errors[]="Image 1 , extension not allowed, please choose a JPEG or PNG file.";
          }
          if($file_size1 > 2097152) {
            $errors[]='Image 1 ,File size must be excately 2 MB';
          }
          if(empty($errors)==true) {
            move_uploaded_file($file_tmp1,"./middleware/media/images/".$file_name1);
            $i_s1=1;
          }
          else{
            $errors;

          }
        }


          if ($i_s1==1) {
            echo $i_s1;
                $file_name1;
                $sql="SELECT shop_name,states FROM shop_reg WHERE shop_name = '$name' AND states='$state'";
                $row = $link->query($sql);
                if($row->num_rows>0){
                  ?>
                  <script>
                  setTimeout(function() {
                    swal({
                      title: "Error",
                      text: "Shop is already added,for changes please edit it.",
                      type: "error",
                      confirmButtonText: "Ok"
                    }, function() {
                      window.location = "";
                    }, 1000);
                  });
                  </script> <?php
                }
                else {
                  $sql="INSERT INTO `shop_reg`(`shop_id`, `shop_name`, `address`, `states`, `rating`, `img`) VALUES ('$shop_id','$name','$add','$state','$rate','$file_name1')";
                  if(mysqli_query($link, $sql)){
                    ?>
                    <script>
                    setTimeout(function() {
                      swal({
                        title: "Congratulaions!",
                        text: "shop registered successfully",
                        type: "success",
                        confirmButtonText: "Ok"
                      }, function() {
                        window.location = "";
                      }, 1000);
                    });
                    </script>
                    <?php
                  } else{
                    ?>
                    <script>
                    setTimeout(function() {
                      swal({
                        title: "Error!",
                        text: "<?php echo "ERROR: Could not able to execute $sql. " . mysqli_error($link) ?>",
                        type: "error",
                        confirmButtonText: "Ok"
                      }, function() {
                        window.location = "";
                      }, 1000);
                    });
                    </script> <?php
                  }
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
				 ?>
ERROR: Could not able to execute
 INSERT INTO `shop_reg`(`shop_id`, `shop_name`, `address`, `state`, `rating`, `img`) 
 VALUES ('SR_4YS5G','asdf','dbgfsbrn','assam','4','Aoleang-Pc-Ila-Reddy.jpg')).
  You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version
   for the right syntax to use near ')' at line 1