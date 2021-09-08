<?php
ob_start();
if (isset($_GET['id'])) {
  $id=base64_decode($_GET['id']);
include_once './assets/includes/header.php';
 $sqli =$link->query("SELECT * FROM `cat_destination` WHERE id='$id'") ;
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
				<h4 class="card-title">Edit Destination Category (<?php echo $data['name']; ?>)</h4>
        <div class="float-right">
          <a href="des_cat.php"><button type="button" class="btn btn-danger" name="button">Back</button></a>

        </div>

					<form method="post" action="" enctype="multipart/form-data">

	                    <div class="form-group label-floating">
	                        <label class="control-label">Name</label>
	                        <input type="text"name="name" value="<?php echo $data['name']; ?>" class="form-control">
	                    <span class="material-input"></span></div>



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

            $sql="UPDATE `cat_destination` SET `name`='$name' WHERE id='$id'";
if(mysqli_query($link, $sql)){
header('location:pac_cat.php');
}
              }

     ?>

				<?php
				include_once './assets/includes/footer.php';
      }
      else {
        header('location:des-banner.php');
      }
    }
    else {
      header('location:des-banner.php');
    }
 ob_end_flush();
				 ?>
