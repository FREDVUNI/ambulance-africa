<div class="content-wrapper" style="min-height:540.031px">
	<div class="content-header">
		<div class="container-fluid">
			<section class="content">
				<?php echo $this->session->flashdata('message');?>
				<div class="card card-earnings">
					<div class="p-2 card">
						<div class="mb-3">
							<a href="<?php echo base_url('certificate');?>">
								<button class="btn btn-success btn-sm float-right">
									Add certificate
								</button>
							</a>
						</div>
						<table id="example1" class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>student</th>
									<th>student number</th>
									<th>Expiration</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($student as $key=>$row): ?>
								<tr>
									<td><?php echo $key + 1; ?></td>
									<td><?php echo $row['student']; ?></td>
									<td><?php echo $row['student_no']; ?></td>
									<td><?php echo $row['expiration']; ?></td>
									<td>
										<a href="<?php echo site_url($row['slug'].'/certificate');?>"
											class="btn btn-light btn-sm">
											<i class="fa fa-pencil-alt"></i>
										</a>
										<button class="btn btn-light btn-sm" data-toggle="modal"
											data-target="#delete<?php print $row['id']; ?>">
											<i class="fa fa-trash"></i>
										</button>
									</td>
								</tr>
								<?php endforeach;?>
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>student</th>
									<th>student number</th>
									<th>Expiration</th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php foreach($student as $key=>$row): ?>
<div class="modal" id="delete<?php echo $row['id'];?>">
	<div class="modal-dialog modal-confirm" role="document">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="fa fa-exclamation"></i>
				</div>
				<h4 class="modal-title w-100">Are you sure?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>
					Do you really want to delete <strong><?php echo word_limiter( $row['student'],3);?> </strong>?
					<br>
					This process cannot be undone.
				</p>
			</div>
			<div class="modal-footer justify-content-center mb-3">
				<?php echo form_open_multipart('certificate/'.$row['id'].'/delete');?>
				<input type="hidden" name="id" value="<?php echo $row['id'];?>">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Delete</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>
