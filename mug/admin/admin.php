  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../dashbord/"><i class="bi bi-house"></i> Home</a></li>
        <li class="breadcrumb-item active" style="background: none;" aria-current="page">Admin</li>
      </ol>
    </nav>
  </div>
          


<!-- ============= admin insert ====================== -->
<!-- ============= admin insert ====================== -->
<form method="post" id="admin_from" enctype="multipart/form-data">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Catagory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<!-- ========== row =============== -->
           <div class="row">
           	<!-- col -->
           	<!-- who insert data -->
           	<input hidden type="text" name="user_type" value="<?=$user_type;?>">
				<div class="col-md-6">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle mr-2"></i> Name</span>
						</div>
						<input value="<?php if(isset($name)){echo $name;} ?>" required class="form-control" type="text" placeholder="Name" name="name">
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope mr-2"></i> Email</span>
						</div>
						<input required class="form-control" type="email" placeholder="Email" value="<?php if(isset($email)){echo $email;} ?>" name="email">
					</div>


					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="bi bi-fonts mr-2"></i> Type of admin</span>
						</div>
							<select required class="form-control" name="control">
								<option value="full">Full Control</option>
								<option value="half">Half Control</option>
							</select>
					</div>
			</div>
			<!-- end col -->

			<!-- col -->
			<div class="col-md-6">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="bi bi-phone mr-2"></i> Phone: +88</span>
					</div>
					<input value="<?php if(isset($phone)){echo $phone;} ?>" required class="form-control" type="number" placeholder="phone" name="phone">
				</div>


				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill mr-2"></i>Password</span>
					</div>
					<input required class="form-control" type="password" placeholder="Enter you Password" name="password">
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill mr-2"></i>Re Type Password</span>
					</div>
					<input required class="form-control" type="password" placeholder="Confirm password" name="c_password">
				</div>

			</div>
			<!-- end col -->

			<!-- col -->
			<div class="col-md-12">
			   <div class="input-group mb-3">
				  <div class="input-group-prepend">
				   	 <span class="input-group-text" id="basic-addon1"><i class="bi bi-fonts mr-2"></i>Description</span>
				  </div>
				  <textarea  placeholder="please tell something about you" required class="form-control" rows="5" name="description"><?php if(isset($description)){echo $description;} ?></textarea>
				</div>
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->

		<input   required type="checkbox" id="check" name="agree">
		<label for="check"> Are you agree Terms and condition</label>


        <div class="status">
                <!-- RESPONSE BY AJAX  -->
        </div>
      </div>
      <div class="modal-footer">
       		<button type="button" class="btn btn-secondary btn-sm btn-icon-split" data-dismiss="modal">
              <span class="icon text-white-50">X</span>
              <span class="text">Close</span>
          </button>
          <button type="submit" class="btn btn-primary btn-sm btn-icon-split">
              <span class="icon text-white-50"><i class="bi bi-upload"></i></span>
              <span class="text">Save changes</span>
          </button>
      </div>
    </div>
  </div>
</div>
</form>
 
 
<!-- ============= admin insert ====================== -->
<!-- ============= admin insert ====================== -->







<div class="card">
    <div class="card-header h2 text-center">
        Admin panel
        <a class="btn btn-primary float-right" data-target="#exampleModal" data-toggle="modal">
          <i class="bi bi-person-plus"></i>
        </a>
    </div>
    <div class="card-body">
    	<div class="admin_display">
    		<!-- load by ajax dispaly -->
    	</div>
    </div>
</div>


<script type="text/javascript">
	function admin_display(){
		$.ajax({
			type:'POST',
			url:'ammin_display.php',
			success:function(data){
				$('.admin_display').html(data);
			}
		})
	}

	admin_display();


// insert admin
$('#admin_from').on('submit',function(e){
	e.preventDefault();
	$.ajax({
		type:'POST',
		url:'insert_admin.php',
		contentType:false,
		processData:false,
		data:new FormData(this),
		success:function(data) {
			$('.status').html(data);
			admin_display();
			setTimeout(function(){
				$('.status').html('');
			},1500)
		}
	})
})


// delete amdin
function delete_admin(thi, id){
	$.ajax({
		type:'POST',
		url:'delete_admin.php',
		data:{
			'id':id,
		},success:function(data){
				$(this).html(data);
                 data = data.replace(/\s/g, '');
                
                if (data=="Delete") {
                    $(this).html(data);
                    $(thi).parents('tr').hide();
                }else{
                     console.log(data)
                }
		}
	})
}

// access change
function access_change(thi,id){
	$.ajax({
		type:'post',
		url:'access_change.php',
		data:{
			'id':id,
			'change':$(thi).val(),
		},success:function(data) {
			console.log(data);
		}
	})
}

</script>