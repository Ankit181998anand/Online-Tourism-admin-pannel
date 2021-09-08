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
            <h4 class="card-title">Package Categories</h4>

              <button class="btn btn-raised btn-round btn-info" data-toggle="modal" data-target="#noticeModal">
                                    <b>+</b>   Add category
                            <div class="ripple-container"></div></button>


            <div class="table-responsive">
                <table class="table table-shopping">
                    <thead class="text-primary">
                      <th>#</th>
                      <th>category Name</th>
                      <th>Action</th>

                    </thead>
                    <tbody>
                      <?php
          $sqli =" SELECT * FROM `cat_package` " ;
          $data = $link->query($sqli);
          if($data->num_rows>0){
            $count=0;
            while ($row = $data->fetch_assoc()) {
              $count++;
              ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row['name']; ?></td>

                              <td class="td-actions">
                                        <button type="button" rel="tooltip" class="btn btn-success" data-original-title="" title="">
                                          <a href="edit_pac_cat.php?id=<?php echo base64_encode($row['id']); ?>"><i class="material-icons">edit</i></a>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                            <a href="remove_pac_cat.php?id=<?php echo base64_encode($row['id']); ?>"><i class="material-icons">close</i></a>
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
                <h5 class="modal-title" id="myModalLabel">Add Destination Category</h5>
            </div>
            <div class="modal-body">
              <form method="post" action="" enctype="multipart/form-data">

                          <div class="form-group label-floating is-empty">
                              <label class="control-label">Name</label>
                              <input type="text"name="name" class="form-control">
                          <span class="material-input"></span></div>



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
         $name = mysqli_real_escape_string($link,$_REQUEST['name']);
                 $sql="SELECT name from cat_package where name='$name''";
                 $row = $link->query($sql);
                 if($row->num_rows>0){
                   ?>
                   <script>
                   setTimeout(function() {
                     swal({
                       title: "Error",
                       text: "Category already added,for changes please edit it.",
                       type: "error",
                       confirmButtonText: "Ok"
                     }, function() {
                       window.location = "";
                     }, 1000);
                   });
                   </script> <?php
                 }
                 else {
                   $sql="INSERT INTO `cat_package`(`name`) VALUES ('$name')";
                   if(mysqli_query($link, $sql)){
                  exit(header('location:pac_cat.php'));
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
                 ob_end_flush();
              ?>
