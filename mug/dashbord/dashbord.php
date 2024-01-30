  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../dashbord/"><i class="bi bi-house"></i> Home</a></li>
        <li class="breadcrumb-item active" style="background: none;" aria-current="page">Dashboard</li>
      </ol>
    </nav>
  </div>

<style type="text/css">
	.border-4{
		border-width: 8px;
	}
	.border-start{
		border-bottom-width: 1px;
		border-right-width: 1px;
		border-top-width: 1px;
	}
	.card-raised{
		margin-bottom: 5px;
	}


</style>
                <!-- Begin Page Content -->
                <div class="">
                    <!-- Page Heading -->
                    <div class="row">

                    	<?php 
                    			if (isset($_SESSION['full'])) {?>
                    				
                    		

	                    <!-- box start total bannar -->
                    	<div class=" col-md-6 col-xl-4">
                    		<div class="card card-raised border-start border-success border-4 ">
	                     <div class="card-header h3">
	                      	<?php echo $total_banner=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `information`")); ?> 
	                      	<i class="bi bi-people-fill float-right text-success"></i>
	                      </div>  
	                       <div class="card-body text-dark">
	                      	User Information
	                      </div>    
	                        
	                    </div>
                    	</div>
	                    
	                   
	                    <!-- next box -->


	                   
	                      <!-- box start total bannar -->
                    	<div class=" col-md-6 col-xl-4">
                    		<div class="card card-raised border-start border-success border-4 ">
	                      <div class="card-header h3">
	                      	<?php echo $total_banner=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `shorturl`")); ?> 
	                      	<i class="bi bi-link-45deg float-right text-success"></i>

	                      </div>  
	                       <div class="card-body text-dark">
	                      	Total Link
	                      </div>  
	                        
	                    </div>
                    	</div>
	                    
	                   
	                    <!-- next box -->
	                   
	                     <!-- box start total bannar -->
                    	<div class=" col-md-6 col-xl-4">
                    		<div class="card card-raised border-start border-success border-4 ">
	                      <div class="card-header h3">
	                      	<?php 

	                      		$result = $con->query("SELECT SUM(hit_count) from shorturl");

														while($row = mysqli_fetch_array($result)){
															echo $row['SUM(hit_count)'];
															
														}

	                      	 ?> 
	                      		<i class="bi bi-link-45deg float-right text-success"></i>

	                      </div>  
	                       <div class="card-body text-dark">
	                      	Hit counter
	                      </div>  
	                        
	                    </div>
                    	</div>
	                    
	                   
	                    <!-- next box -->






	                     <!-- box start total bannar -->
                    	<div class=" col-md-6 col-xl-4">
                    		<div class="card card-raised border-start border-primary border-4 ">
	                      <div class="card-header h3">
	                      	<?php echo $total_banner=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `admin_user`")); ?> 
	                      	<i class="bi bi-person float-right text-primary"></i>
	                      </div>  
	                       <div class="card-body text-dark">
	                      	Admin
	                      </div>  
	                        
	                    </div>
                    	</div>
	                    
	                   	<?php }elseif (isset($_SESSION['half'])) {?>
	                   		

	                   		      <!-- box start total bannar -->
                    	<div class=" col-md-6 col-xl-4">
                    		<div class="card card-raised border-start border-success border-4 ">
	                     <div class="card-header h3">
	                      	<?php echo $total_banner=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `information` WHERE `user_type`='$user_type'")); ?> 
	                      	<i class="bi bi-people-fill float-right text-success"></i>
	                      </div>  
	                       <div class="card-body text-dark">
	                      	User Information
	                      </div>    
	                        
	                    </div>
                    	</div>
	                    
	                   
	                    <!-- next box -->


	                   
	                      <!-- box start total bannar -->
                    	<div class=" col-md-6 col-xl-4">
                    		<div class="card card-raised border-start border-success border-4 ">
	                      <div class="card-header h3">
	                      	<?php echo $total_banner=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `shorturl` WHERE `user_type`='$user_type'")); ?> 
	                      	<i class="bi bi-link-45deg float-right text-success"></i>

	                      </div>  
	                       <div class="card-body text-dark">
	                      	Total Link
	                      </div>  
	                        
	                    </div>
                    	</div>
	                    
	                   
	                    <!-- next box -->
	                   
	                     <!-- box start total bannar -->
                    	<div class=" col-md-6 col-xl-4">
                    		<div class="card card-raised border-start border-success border-4 ">
	                      <div class="card-header h3">
	                      	<?php 

	                      		$result = $con->query("SELECT SUM(hit_count) from `shorturl` WHERE `user_type`='$user_type' ");

														while($row = mysqli_fetch_array($result)){
															echo $row['SUM(hit_count)'];
															
														}

	                      	 ?> 
	                      		<i class="bi bi-link-45deg float-right text-success"></i>

	                      </div>  
	                       <div class="card-body text-dark">
	                      	Hit counter
	                      </div>  
	                        
	                    </div>
                    	</div>
	                    
	                   
	                    <!-- next box -->






	            

	                   	<?php }?>
	                  
	                   </div>
	               </div>

                  

                <!-- /.container-fluid -->

