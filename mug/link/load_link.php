<?php 
include '../../config.php';
			require_once '../../conection/index.php';
		 ?>
			<link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
			     <tr>
			        <th>ID</th>
			         <th>Cretor</th>
			        <th>Short Link</th>
			        <th>long link</th>
			        <th>Hit</th>
			        <th>Status</th>
			        <th>Delete</th>
			    </tr>
			</thead>
			<tfoot>
			      <tr>
			        <th>ID</th>
			         <th>Cretor</th>
			        <th>Short Link</th>
			        <th>long link</th>
			        <th>Hit</th>
			        <th>Status</th>
			        <th>Delete</th>
			    </tr>
			</tfoot>
			<tbody>
				
				<?php


			if (isset($_POST['type'])) {
				if ($_POST['type']=='full') {

					
						$i=0;
						$sql=mysqli_query($con,"select * from shorturl");
						while($row=mysqli_fetch_assoc($sql)){
							$i++;
						?>
	                   <tr>
	                      <td><?=$i; ?></td>
	                      <td><?php echo $row['user_type'];?></td>
	                      <td title="Click to copy">
	                      	<?php echo APP_URL.$row['short_link'];?>
	                      	<br>
	                      	<?php echo APP_URL.$row['short_link'];?>
	                      
	                      </td>
	                      <td style="max-width: 300px"><a title="<?php echo $row['link'];?>" href="<?php echo $row['link'];?>" target="_blank">Long link visit</a></td>

	                      <td><?php echo $row['hit_count'];?></td>
	                     
						  <td>
						  
						  <?php
						  if($row['status']==1){
							?><a onclick="status(<?php echo $row['id']?>,'status','deactive')" href="javascript:void(0)">Active</a><?php
						  }else{
							?><a onclick="status(<?php echo $row['id']?>,'status','active')" href="javascript:void(0)">Deactive</a><?php
						  }
						  ?>

						  </td>
						  <td><a onclick="link_delete(this, <?php echo $row['id'];?>,'delete')" href="javascript:void(0)">Delete</a>
							</td>
	                   </tr>
                   <?php }

                  }elseif ($_POST['user_admin']) {
                   		$user_type=$_POST['user_admin'];
                   					

                   				$i=0;
										$sql=mysqli_query($con,"select * from shorturl where `user_type`='$user_type'");
										while($row=mysqli_fetch_assoc($sql)){
											$i++;
										?>
					                   <tr>
					                      <td><?=$i; ?></td>
					                      <td><?php echo $row['user_type'];?></td>
					                      <td title="Click to copy">https://short.ttcm.pw/<?php echo $row['short_link'];?>
					                      
					                     
					                  
					                      </td>
					                      <td style="max-width: 300px"><a title="<?php echo $row['link'];?>" href="<?php echo $row['link'];?>" target="_blank">Long link visit</a></td>

					                      <td><?php echo $row['hit_count'];?></td>
					                     
										  <td>
										  
										  <?php
										  if($row['status']==1){
											?><a onclick="status(<?php echo $row['id']?>,'status','deactive')" href="javascript:void(0)">Active</a><?php
										  }else{
											?><a onclick="status(<?php echo $row['id']?>,'status','active')" href="javascript:void(0)">Deactive</a><?php
										  }
										  ?>

										  </td>
										  <td><a onclick="link_delete(this, <?php echo $row['id'];?>,'delete')" href="javascript:void(0)">Delete</a>
											</td>
					                   </tr>
                   	<?php }
					}}?>
                         
			</tbody>
			</table>
		<script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
		<script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="/assets/vendor/datatables/datatables-demo.js"></script>
