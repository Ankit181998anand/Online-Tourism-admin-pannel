<?php
ob_start();
include_once './assets/includes/header.php';
require_once  './assets/includes/api.php';
 ?>

				<div class="content">
					<div class="container-fluid">
					 	<div class="row">
	<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Testimonial</h4>

              <button class="btn btn-raised btn-round btn-info" data-toggle="modal" data-target="#noticeModal">
                                    <b>+</b>   Add Testimonial
                            <div class="ripple-container"></div></button>


            <div class="table-responsive">
                <table class="table table-shopping">
                    <thead class="text-primary">
                      <th>#</th>
                      <th>Service Name</th>
                        <th>Image</th>
                        <th>Action</th>


                    </thead>
                    <tbody>
                      <?php
          $sqli =" SELECT * FROM `testimonial` " ;
          $data = $link->query($sqli);
          if($data->num_rows>0){
            $count=0;
            while ($row = $data->fetch_assoc()) {
              $count++;
              ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row['name_e']; ?></td>
                            <td>
                              <img src="./middleware/media/images/<?php echo $row['image']; ?>" style="width:48px; height:48px;"  alt="">
                              </td>
                              <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                          <a href="edit-testimonial.php?id=<?php echo base64_encode($row['id']); ?>"><i class="material-icons">edit</i></a>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                            <a href="remove_services.php?id=<?php echo base64_encode($row['id']); ?>"><i class="material-icons">close</i></a>
                                        </button>
                                    </td>


                        </tr>
                        <?php

                      }
                    } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
	</div>
</div>







					</div>
				</div>
        <?php
        include_once './assets/includes/footer.php';

         ?>

      <!-------------------------------->
      <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title" id="myModalLabel">Add Testimonial</h5>
            </div>
            <div class="modal-body">
              <form method="post" action="" enctype="multipart/form-data">

                          <div class="form-group label-floating is-empty">
                              <label class="control-label">Name</label>
                              <input type="text"name="title" class="form-control">
                          <span class="material-input"></span></div>
                          <div class="form-group label-floating is-empty">
                              <label class="control-label">Details</label>
                              <input type="text"name="details" class="form-control">
                          <span class="material-input"></span></div>
                          <div class="form-group label-floating is-empty">
                              <label class="control-label">Rating</label>
                              <input type="text"name="rating" class="form-control">
                          <span class="material-input"></span></div>
                          <div class="form-group label-floating is-empty">
                              <label class="control-label">Views</label>
                              <input type="text"name="views" class="form-control">
                          <span class="material-input"></span></div>
                          <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                      <div class="fileinput-new thumbnail">
                        <label class="control-label">Service Image(48*48)px</label>
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

            <input type="submit" name="submit" class="btn btn-info btn-round" value="Submit">
                      </form>

        </div>
    </div>
</div>
<!------------------------------------>

         <?php if (isset($_POST['submit'])) {

           $i_s1=0;
           $errors= array();
         $title = mysqli_real_escape_string($link,$_REQUEST['title']);
         $details = mysqli_real_escape_string($link,$_REQUEST['details']);
         $rating = mysqli_real_escape_string($link,$_REQUEST['rating']);
         $details = mysqli_real_escape_string($link,$_REQUEST['views']);
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
                 $sql="SELECT name_e from testimonial where name_e='name_e''";
                 $row = $link->query($sql);
                 if($row->num_rows>0){
                   ?>
                   <script>
                   setTimeout(function() {
                     swal({
                       title: "Error",
                       text: "Testimonial already added,for changes please edit it.",
                       type: "error",
                       confirmButtonText: "Ok"
                     }, function() {
                       window.location = "";
                     }, 1000);
                   });
                   </script> <?php
                 }
                 else {
                   $sql="INSERT INTO `testimonial`(`name_e`, `details`, `rating`, `des`, `image`) VALUES ('$title','$details ','$rating','$details','$file_name1')";
                   if(mysqli_query($link, $sql)){
                  exit(header('location:testimonial.php'));
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
             }
                 ob_end_flush();
              ?>
