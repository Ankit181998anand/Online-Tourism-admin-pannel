<?php
include_once './assets/includes/header.php';
 ?>

				<div class="content">
					<div class="container-fluid">

            <br><br><br><br>
                    <div class="row">

                      <?php
          $sqli =" SELECT * FROM `shop_reg` " ;
          $data = $link->query($sqli);
          if($data->num_rows>0){
            $count=0;
            while ($row = $data->fetch_assoc()) {
              $count++;
              ?>

                    	<div class="col-md-4">
                    		<div class="card card-product" data-count="0">

                    			<div class="card-image animated" data-header-animation="true">
                    				<a href="#pablo">
                    					<img class="img" src="./middleware/media/images/<?php echo $row['img']; ?>">
                    				</a>
                    			<div class="ripple-container"></div></div>

                    			<div class="card-content">
                    				<div class="card-actions">
                    					<button type="button" class="btn btn-danger btn-simple fix-broken-card">
                    						<i class="material-icons">build</i>
                    					<div class="ripple-container"></div></button>

                    					<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="View">
                    						<i class="material-icons">art_track</i>
                    					</button>
                    					<button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Edit">
                    						<i class="material-icons"><a href="edit_shop.php?id=<?php echo base64_encode($row['shop_id']); ?>">edit</a> </i>
                    					<div class="ripple-container"></div></button>
                    					<button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="" data-original-title="Remove">
                    						<i class="material-icons"><a href="deleat_shop.php?id=<?php echo base64_encode($row['shop_id']); ?>">delete</a> </i>
                    					<div class="ripple-container"></div></button>
                    				</div>

                    				<h4 class="card-title">
                    					<a href="#pablo"><?php echo $row['shop_name']; ?></a>
                    				</h4>
                    				<div class="card-description">
                              <?php echo substr($row['address'],0,80)."..."; ?>
                            		</div>
                    			</div>
                                <div class="card-footer">
                    				<div class="price">
                    					<h4><?php echo $row['shop_id']; ?></h4>
                    				</div>
                    				<div class="stats pull-right">
                    					<p class="category"><i class="material-icons">place</i> <?php echo $row['states']; ?>, India</p>
                    				</div>
                    			</div>
                    		</div>
                    	</div>

                      <?php
                    }
                  }
                       ?>




                    </div>







					</div>
				</div>

				<?php
				include_once './assets/includes/footer.php';
				 ?>
