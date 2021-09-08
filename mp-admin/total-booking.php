<?php
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
            <h4 class="card-title">Total Booking</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-primary">
                      <th>#</th>
                      <th>Destination</th>
                        <th>Name</th>
                        <th>Moblie</th>
                        <th>Email</th>
                        <th>Booking Time</th>
                        <th>Price</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                      <?php
          $sqli =" SELECT * FROM `booking_des` " ;
          $data = $link->query($sqli);
          if($data->num_rows>0){
            $count=0;
            while ($row = $data->fetch_assoc()) {
              $count++;
              ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php des_name($row['des_id'],$link); ?></td>
                            <td><?php echo $row['f_name']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['book_at']; ?></td>
                            <td class="text-primary">$<?php echo $row['price']; ?></td>
                            <td class="text-danger"><?php if ($row['ispaid']==0): ?>
                              Not Paid
                            <?php endif; ?></td>

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
