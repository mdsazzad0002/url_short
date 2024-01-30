<?php   include '../../config.php';
			
			require_once '../../conection/index.php';
		 ?>
			<link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
			     <tr>
			       <th>ID</th>
			       
			        <th>Ip address</th>
			        <th>Platform</th>
			        <th>Browser</th>
			        <th>Location</th>
			        <th>Details</th>
			        <th>Delete</th>
			    </tr>
			</thead>
			<tfoot>
			       <tr>
			       <th>ID</th>
			       
			        <th>Ip address</th>
			        <th>Platform</th>
			        <th>Browser</th>
			        <th>Location</th>
			        <th>Details</th>
			        <th>Delete</th>
			    </tr>
			</tfoot>
			<tbody>
				
				<?php


			if (isset($_POST['type'])) {
				if ($_POST['type']=='full') {

					
						$i=0;
						$sql=mysqli_query($con,"SELECT * FROM `information` ORDER BY `id` DESC");
						while($row=mysqli_fetch_assoc($sql)){
							$i++;
						?>
	                   <tr>
	                      <td><?=$i; ?></td>

	                      <td><?php echo $row['remote_ip'];?></td>
	                      <td><?php echo str_replace('"', '', $row['platform']);?></td>
	                      <td><?php echo str_replace('"', '',$row['browser']);?></td>
	                      <td><?php echo $row['country'];?>,&nbsp;<?php echo $row['country_capital'];?></td>
	                      <td>
	                      	<!-- seemore -->
	                      	<!-- seemore -->


	                      	<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['id'];?>">
				<span class="icon"><i class="bi bi-eye"></i></span>
				<span class="text">see more</span>
			  
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalCenter<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Details this</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <table class="table table-bordered table-striped">
			        	<thead>
			        		<tr>
			        			<th colspan="2">Details Information</th>
			        		</tr>
			        	</thead>
			        	<tbody>
			        		<tr>
			        			<th>Creator</th>
			        			<th><?= $row['user_type']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>language</th>
			        			<th><?= str_replace(";", ",  ", $row['language']);?></th>
			        		</tr>
			        		<tr>
			        			<th>Remote port</th>
			        			<th><?= $row['remote_port']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>country code</th>
			        			<th><?= $row['country_code']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>ip version</th>
			        			<th><?= $row['ip_version']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>country phone</th>
			        			<th><?= $row['country_phone']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>org</th>
			        			<th><?= $row['org']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>isp</th>
			        			<th><?= $row['isp']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>timezone</th>
			        			<th><?= $row['timezone']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>timezone name</th>
			        			<th><?= $row['timezone_name']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>ccurrency symbol</th>
			        			<th><?= $row['currency_symbol']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>currency rates</th>
			        			<th><?= $row['currency_rates']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>city</th>
			        			<th><?= $row['city']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>continent</th>
			        			<th><?= $row['continent']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>currency plural</th>
			        			<th><?= $row['currency_plural']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>Flag</th>
			        			<th><img style="width:40px; height:20px;" src="<?= $row['country_flag']; ?>"></th>
			        		</tr>
			        		
			        		<tr>
			        			<th>Url</th>
			        			<th><?php echo APP_URL. $row['url'];?></th>
			        		</tr>
			        		<tr>
			        			<th>Date</th>
			        			<th><?php echo $row['date'];?></th>
			        		</tr>
			        	</tbody>
			        </table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      
			      </div>
			    </div>
			  </div>
			</div>
	                      	<!-- seemore -->
	                      	<!-- seemore -->



	                      </td>
	                      
						  <td><a onclick="information_delete(this, <?php echo $row['id'];?>,'delete')" href="javascript:void(0)">Delete</a>
							</td>
	                   </tr>
                   <?php }

                  }elseif ($_POST['user_admin']) {
                   		$user_type=$_POST['user_admin'];
                   					

                   			$i=0;
							$sql=mysqli_query($con,"SELECT * FROM `information` WHERE `user_type`='$user_type' ORDER BY `id` DESC");
							while($row=mysqli_fetch_assoc($sql)){
								$i++;
							?>
					         <tr>
	                      <td><?=$i; ?></td>
 						  <td><?php echo $row['remote_ip'];?></td>
	                      <td><?php echo $row['platform'];?></td>
	                      <td><?php echo $row['browser'];?></td>
	                      <td><?php echo $row['country'];?>,<?php echo $row['country_capital'];?></td>
	                      
	                      <td>
	                      	<!-- seemore -->
	                      	<!-- seemore -->


	                      	<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-sm btn-icon-split" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['id'];?>">
				<span class="icon"><i class="bi bi-eye"></i></span>
				<span class="text">see more</span>
			  
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalCenter<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Details this</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <table class="table table-bordered table-striped">
			        	<thead>
			        		<tr>
			        			<th colspan="2">Details Information</th>
			        		</tr>
			        	</thead>
			        	<tbody>
			        		<tr>
			        			<th>Creator</th>
			        			<th><?= $row['user_type']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>language</th>
			        			<th><?= str_replace(";", ",  ", $row['language']);?></th>
			        		</tr>
			        		<tr>
			        			<th>Remote port</th>
			        			<th><?= $row['remote_port']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>country code</th>
			        			<th><?= $row['country_code']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>ip version</th>
			        			<th><?= $row['ip_version']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>country phone</th>
			        			<th><?= $row['country_phone']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>org</th>
			        			<th><?= $row['org']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>isp</th>
			        			<th><?= $row['isp']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>timezone</th>
			        			<th><?= $row['timezone']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>timezone name</th>
			        			<th><?= $row['timezone_name']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>ccurrency symbol</th>
			        			<th><?= $row['currency_symbol']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>currency rates</th>
			        			<th><?= $row['currency_rates']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>city</th>
			        			<th><?= $row['city']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>continent</th>
			        			<th><?= $row['continent']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>currency plural</th>
			        			<th><?= $row['currency_plural']; ?></th>
			        		</tr>
			        		<tr>
			        			<th>Flag</th>
			        			<th><img style="width:40px; height:20px;" src="<?= $row['country_flag']; ?>"></th>
			        		</tr>
			        		
			        		<tr>
			        			<th>Url</th>
			        			<th>https://app.tryrst.link/<?php echo $row['url'];?></th>
			        		</tr>
			        		<tr>
			        			<th>Date</th>
			        			<th><?php echo $row['date'];?></th>
			        		</tr>
			        	</tbody>
			        </table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      
			      </div>
			    </div>
			  </div>
			</div>
	                      	<!-- seemore -->
	                      	<!-- seemore -->



	                      </td>
	                      
						  <td><a onclick="information_delete(this, <?php echo $row['id'];?>,'delete')" href="javascript:void(0)">Delete</a>
							</td>
	                   </tr>
                   	<?php }
					}}?>
                         
			</tbody>
			</table>
		<script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
		<script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="/assets/vendor/datatables/datatables-demo.js"></script>
