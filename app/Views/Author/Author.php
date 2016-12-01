<div class="row">
	<div class="col-lg-12">
		<div class="ibox">
			<div class="ibox-content">
				<a href="<?=DIR;?>admin/role" class="btn-link">
					<h2><?= $title ?></h2>
				</a>
				<button data-toggle="modal" data-target="#newItem"class="btn btn-sm btn-primary">Create</button>
				<div class="table-responsive">
					<table id="tblItems"
							class="table table-bordered table-hover table-striped">
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="newItem" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Add Role</h4>
			</div>
			<form id="newItemForm" class="form-horizontal" method="POST">
				<div class="modal-body">
					<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-10">
										<input type="text" class="name form-control" name="name" >
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Full Name</label>
									<div class="col-sm-10">
										<input type="text" class="fullName form-control" name="fullName" >
									</div>
								</div>
								<div class="form-group">
										<label for="name" class="col-sm-2 control-label">Birthdate</label>
										<div class="col-sm-10">
											<input type="text" class="dateInput birthDate form-control" name="birthDate" >
										</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Short Name</label>
									<div class="col-sm-10">
										<input type="text" class="shortName form-control" name="shortName" >
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
										<input type="file" class="avatar form-control" name="image" >
										<img width="120px" class="img-rounded preview1" src="http://localhost/cat-prj/assets/images/default.png"  />
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Bio</label>
									<div class="col-sm-10">
										<textarea class="form-control bio editor" name="bio"></textarea>
									</div>
								</div>
				</div>
				<div class="modal-footer">
					<button type="button" onclick="insertItem();" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="updateItem" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Edit Role</h4>
				</div>
					<form id="updateItemForm" class="form-horizontal" method="POST">
				<div class="modal-body">
								<input type="text" class="id form-control hide" name="id" >
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-10">
										<input type="text" class="name form-control" name="name" >
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Full Name</label>
									<div class="col-sm-10">
										<input type="text" class="fullName form-control" name="fullName" >
									</div>
								</div>
								<div class="form-group">
										<label for="name" class="col-sm-2 control-label">Birthdate</label>
										<div class="col-sm-10">
											<input type="text" class="dateInput birthDate form-control" name="birthDate" >
										</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Short Name</label>
									<div class="col-sm-10">
										<input type="text" class="shortName form-control" name="shortName" >
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Image</label>
									<div class="col-sm-10">
										<input type="file" class="avatar form-control" name="image" >
										<img width="120px" class="img-rounded preview1" src="http://localhost/cat-prj/assets/images/default.png"  />
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Bio</label>
									<div class="col-sm-10">
										<textarea class="form-control bio editor" name="bio"></textarea>
									</div>
								</div>
				</div>
				<div class="modal-footer">
						<button type="button" onclick="update();" class="btn btn-primary">Edit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
Assets::js([
	Url::templatePath().'js/page/author-admin.js'
]);
?>