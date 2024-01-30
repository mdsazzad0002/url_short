	<div>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="../dashbord/"><i class="bi bi-house"></i> Home</a></li>
				<li class="breadcrumb-item active" style="background: none;" aria-current="page">Link</li>
			</ol>
		</nav>
	</div>


	<div class="">
		<div class="card">
			<div class="card-header h3 text-center">
				Share your link
				<!-- link  add-->
				<!-- link  add-->
				<!-- link  add-->
				<!-- Button trigger modal -->
				<style type="text/css">
					.input-group-text {
						width: auto;
					}
				</style>
				<button title="Add New Link" type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModalCenter">
					+&nbsp;<i class="bi bi-link-45deg"></i>
				</button>

				<!-- Modal -->
				<form id="link_data" class="form-horizontal" role="form" method="post">
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">+ New Link</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">

									<input type="text" hidden name="user_type" value="<?= $user_type; ?>">

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">Link</span>
										</div>
										<input type="textbox" class="form-control" id="link" name="link" placeholder="link" required>
									</div>

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><?=APP_URL;?></span>
										</div>
										<input oninput="exist_link(this)" type="textbox" class="form-control" id="short_link" name="short_link" placeholder="short link" required>
									</div>

									<div class="status">
										<!-- load by ajax -->
									</div>


								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!-- link add -->
				<!-- link add -->
				<!-- link add -->
				<!-- link add -->
			</div>
			<div id="load_link" class="card-body">
				<!-- load by ajax -->
			</div>
		</div>
	</div>

	<script type="text/javascript" src="/assets/vendor/jquery/jquery.min.js"></script>
	<script type="text/javascript">
		// load data
		function load_link() {
			$.ajax({
				type: 'POST',
				url: '/mug/link/load_link.php',
				data: {
					'type': '<?php if (isset($_SESSION['full'])) {
									echo 'full';
								} else {
									echo "half";
								} ?>',
					'user_admin': '<?= $user_type; ?>',
				},
				success: function(data) {
					$('#load_link').html(data);
				}
			})
		}
		load_link()

		//exist link
		function exist_link(thi) {
			$.ajax({
				type: 'POST',
				url: '/mug/link/exist_link.php',
				data: {
					'link': $(thi).val(),
				},
				success: function(data) {
					$('.status').html(data);
					setTimeout(function() {
						$('.status').html('');
					}, 15000)
				}
			})
		}



		//link status
		function status(id, type, status) {
			$.ajax({
				type: 'POST',
				url: '/mug/link/link_status.php',
				data: {
					'id': id,
					'type': type,
					'status': status,
				},
				success: function(data) {
					load_link()
				}
			})
		}


		//insert data link
		$('#link_data').on('submit', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: 'link_insert.php',
				processData: false,
				contentType: false,
				data: new FormData(this),

				success: function(data) {
					$('.status').html(data);
					load_link();
				}
			})
		})


		//delete link
		function link_delete(thi, id, type) {
			$.ajax({
				type: 'POST',
				url: 'link_delete.php',

				data: {
					'id': id,
					'type': type,
				},

				success: function(data) {
					$(thi).parents('tr').hide();
					load_link();
				}
			})
		}
	</script>