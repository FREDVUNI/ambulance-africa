<div class="content-wrapper" style="min-height:540.031px">
	<div class="content-header">
		<div class="container-fluid">
			<section class="content">
				<div class="card card-earnings">
					<div class="p-2 card">
						<form class="user" id="validate" method="post" novalidate="novalidate"
							action="<?php echo base_url('certificate');?>" enctype="multipart/form-data">
							<div class="form-group">
								<label htmlFor="student">Student</label>
								<input type="text"
									class="form-control form-control-user <?php if(form_error('student')): echo "is-invalid"; endif;?>"
									id="student" name="student" required placeholder="Enter student name"
									value="<?php echo set_value('student');?>" />
								<span class="is-invalid"><?php echo form_error('student');?></span>
							</div>
							<div class="form-group">
								<label htmlFor="student_no">Student no.</label>
								<input type="text"
									class="form-control form-control-user <?php if(form_error('student_no')): echo "is-invalid"; endif;?>"
									id="student_no" name="student_no" required placeholder="Enter student number"
									value="<?php echo set_value('student_no');?>" />
								<span class="is-invalid"><?php echo form_error('student_no');?></span>
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
							<div class="row">
								<div class="form-group col-md-4">
									<div class="grid-margin stretch-card">
										<div class="d-flex flex-row">
											<embed src="<?php echo base_url('assets/uploads/certificates/noimage.png');?>"
												alt="certificate" class="" id="certificate" width="240" height="250">
											<input type="file" id="userfile" name="userfile" style="display: none;"
												accept=".pdf" />
										</div>
										<div class="col-md-12 text-center">
											<div class="row ml-3">
												<div class="mt-2">
													<a href="javascript:upload_pdf()">upload</a>
													<a class="text-danger ml-4" href="javascript:DeletePdf()">Remove</a>
												</div>
											</div>
										</div>
										<span class="text-danger ml-4" id="pdferror"></span>
									</div>
								</div>
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
			student: {
				required: true,
			},
			student_no: {
				required: true,
			},
			expiration: {
				required: true,
			},
			userfile: {
				required: true,
				accept: 'image/*'
			},

		},
		messages: {
			student: {
				required: "The student name field is required",
			},
			student_no: {
				required: "The student number field is required",
			},
			expiration: {
				required: "The expiration date field is required",
			},
			userfile: {
				required: "A PDF file is required",
				accept: "The file should be a PDF",
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
