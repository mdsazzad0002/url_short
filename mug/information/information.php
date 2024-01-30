	<div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../dashbord/"><i class="bi bi-house"></i> Home</a></li>
        <li class="breadcrumb-item active" style="background: none;" aria-current="page">Information</li>
      </ol>
    </nav>
  </div>
		

		<div class="">
			<div class="card">
				<div class="card-header h3 text-center">
					Information of a user
			
				</div>
				<div id="load_information" class="card-body">
					<!-- load by ajax -->
				</div>
			</div>
		</div>

		<script type="text/javascript" src="/assets/vendor/jquery/jquery.min.js"></script>
		<script type="text/javascript">


// load data
			function load_information(){
				$.ajax({
					type:'POST',
					url:'/mug/information/load_information.php',
					data:{
						'type':'<?php if (isset($_SESSION['full'])) {echo 'full';}else{echo "half";}?>',
						'user_admin':'<?= $user_type;?>',
					},
					success:function(data){
						$('#load_information').html(data);
					}
				})
			}
			load_information()








//delete link
			function information_delete(thi, id, type){
				$.ajax({
		            type:'POST',
		            url:'information_delete.php',
		        
		            data:{
		            	'id':id,
		            	'type':type,
		            },
		            
		            success:function(data) {
		                $(thi).parents('tr').hide();
		                load_information();
		            }
		        })
			}

		</script>