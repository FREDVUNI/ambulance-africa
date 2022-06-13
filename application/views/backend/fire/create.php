<div class="content-wrapper" style="min-height:540.031px">
	<div class="content-header">
		<div class="container-fluid">
			<section class="content">
				<div class="card card-earnings">
					<div class="p-2 card">
						<form class="user" id="validate" method="post" novalidate="novalidate"
							action="<?php echo base_url('fire-extinguisher');?>" enctype="multipart/form-data">
							<div class="form-group">
								<label htmlFor="client">Client</label>
								<input type="text"
									class="form-control form-control-user <?php if(form_error('client')): echo "is-invalid"; endif;?>"
									id="client" name="client" required placeholder="Enter client name"
									value="<?php echo set_value('client');?>" />
								<span class="is-invalid"><?php echo form_error('client');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="fill_date">Fill date</label>
								<input type="date"
									class="form-control form-control-user <?php if(form_error('fill_date')): echo "is-invalid"; endif;?>"
									id="fill_date" name="fill_date" required placeholder="Enter certificate fill_date"
									value="<?php echo set_value('fill_date');?>" />
								<span class="is-invalid"><?php echo form_error('fill_date');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="expiration">Expiration date</label>
								<input type="date"
									class="form-control form-control-user <?php if(form_error('expiration')): echo "is-invalid"; endif;?>"
									id="expiration" name="expiration" required
									placeholder="Enter certificate expiration"
									value="<?php echo set_value('expiration');?>" />
								<span class="is-invalid"><?php echo form_error('expiration');?></span>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-sm">
									create
								</button>
							</div>
						</form>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<script src="<?php echo base_url("assets/backend/plugins/jquery/jquery.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/jquery/jquery.validate.min.js");?>"></script>
<script src="<?php echo base_url("assets/backend/plugins/jquery/additional-methods.min.js");?>"></script>
<script>
	$('#validate').validate({
		rules: {
			client: {
				required: true,
			},
			fill_date: {
				required: true,
			},
			expiration: {
				required: true,
			},

		},
		messages: {
			client: {
				required: "The client name field is required",
			},
			fill_date: {
				required: "The fill date field is required",
			},
			expiration: {
				required: "The expiration date field is required",
			},

		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
	});

</script>

<script>
	function upload_pdf() {
		$('#userfile').click();
	}
	$('#userfile').change(function () {
		var imgLivePath = this.value;
		var img_extions = imgLivePath.substring(imgLivePath.lastIndexOf('.') + 1).toLowerCase();
		if (img_extions == "pdf")
			readURL(this);
		else
			$('#pdferror').text('Please select a valid PDF file.')
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.readAsDataURL(input.files[0]);
			reader.onload = function (e) {
				$('#certificate').attr('src', e.target.result);
				$('#pdferror').text('')
			};
		}
	}

	function DeleteImage() {
		$('#certificate').attr('src', '<?php echo base_url('assets/uploads/certificates/noimage.png');?>');
		$('#pdferror').text('')
	}

</script>
