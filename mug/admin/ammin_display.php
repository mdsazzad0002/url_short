		<?php 
			require_once '../../conection/index.php';
		 ?>
			<link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
			     <tr>
			        <th>ID</th>
			        <th>Name</th>
			        <th>Email</th>
			        <th>Control</th>
			         <th>View</th>
			        <th>Delete</th>

			        
			    </tr>
			</thead>
			<tfoot>
			     <tr>
			        <th>ID</th>
			        <th>Name</th>
			        <th>Email</th>
			        <th>Control</th>
			        <th>View</th>
			        <th>Delete</th>

			        
			    </tr>
			</tfoot>
			<tbody>
			 <?php  
			    $row_si=0;
				$student_info_select=mysqli_query($con,"SELECT * FROM `admin_user` ORDER BY `id` DESC");
			        while ($student_info_row=mysqli_fetch_assoc($student_info_select)) {
				?>
			    <tr>
			        <td><?php $row_si++; echo $row_si;?></td>
			        <td><?php echo $student_info_row['name']; ?></td>
			       
			       <td><?php echo $student_info_row['email']; ?></td>
			      
			     
			       <td>
			       	<select class="form-control" onchange="access_change(this,<?= $student_info_row['id']; ?>)">
			       		<option><?php echo $student_info_row['control']; ?></option>
			       		<option>full</option>
			       		<option>half</option>
			       		<option>wait</option>
			       	</select>
			       </td>
			      

                	<td><a class="btn btn-primary btn-sm btn-icon-split" href="javascript:void(0)" data-toggle='modal' data-target='#user_expand<?= $student_info_row['id']; ?>'><span class="icon text-white-50"><i class="bi bi-eye-fill"></i></span><span class="text">View</span> </a>
<!-- ================== information web short title ================== -->
<!-- ================== information web  short title ================== -->
        
                    <div class="modal fade" id="user_expand<?= $student_info_row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Information of User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <table class="table table-bordered table-striped table-hover">
                               <tr>
                                    <td style="text-align:center;" colspan="2"><img style="width:80px; height: auto;" src="/image/<?php echo $student_info_row['file']; ?>" alt="/image/....jpg"></td>
                                </tr>
                               
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo $student_info_row['name']; ?></td>

                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $student_info_row['email']; ?></td>

                                </tr>
                                
                                <tr>
                                    <td>Phone</td>
                                    <td><?php echo $student_info_row['phone']; ?></td>

                                </tr>
                                <tr>
                                    <td>Access Type</td>
                                    <td><?php echo $student_info_row['control']; ?></td>

                                </tr>
                                <tr>
                                    <td colspan="2">Details</td>
                               </tr>
                               <tr>
                               	 <td colspan="2"><?php echo $student_info_row['description']; ?></td>
                               </tr>
                               <tr>
                                    <td>Uploaded by</td>
                                    <td><?php echo $student_info_row['user_type']; ?></td>

                               </tr>
                               <tr>
                                    <td>Uploaded Date</td>
                                    <td><?php echo $student_info_row['date']; ?></td>

                               </tr>
                            </table>
                         
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm btn-icon-split" data-dismiss="modal">
                                <span class="icon text-white-50">X</span>
                                <span class="text">Close</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

<!-- ================== information web short title ================== -->
<!-- ================== information web short title ================== -->


                </td>

			       <td>
			        
			        
			        <a title="This is not good try. you can use control wait. thank you" class="btn btn-danger btn-sm btn-icon-split"  href="javascript:void(0)" onclick="delete_admin(this,'<?= $student_info_row['id'];?>')" class="btn btn-danger myBtn" ><span class="icon text-white-50">
			        <i class="fas fa-trash"></i>
			    </span><span class="text">Delete</span></a>
			        <!-- The Modal -->

			        </td>
			       
			    </tr>
			    <?php } ?>
			</tbody>
			</table>
		<script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
		<script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="/assets/vendor/datatables/datatables-demo.js"></script>
