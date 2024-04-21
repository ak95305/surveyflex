<div class="container">
	<h3>Users Manage</h3>

	<div class="module_heading mt-4">Edit User</div>

	<form action="" method="post">
		<div class="row mt-3">
			<div class="col-6">
				<input type="text" class="form-control" value="<?= $user['firstname'] ?>" name="firstname" placeholder="First name" aria-label="First name">
			</div>
			<div class="col-6">
				<input type="text" class="form-control" value="<?= $user['lastname'] ?>" name="lastname" placeholder="Last name" aria-label="Last name">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-6">
				<input type="text" class="form-control" value="<?= $user['email'] ?>" name="email" placeholder="Email" aria-label="First name">
			</div>
			<div class="col-6">
				<input type="text" class="form-control" value="<?= $user['contact'] ?>" name="contact" placeholder="Phone Number" aria-label="Last name">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-6">
				<select class="form-select" name="type" aria-label="Default select example">
					<option selected>Select Type</option>
					<option value="1" <?= $user['type'] == 1 ? "selected" : "" ?>>Admin</option>
					<option value="2" <?= $user['type'] == 2 ? "selected" : "" ?>>Staff</option>
					<option value="3" <?= $user['type'] == 3 ? "selected" : "" ?>>Subscriber</option>
				</select>
			</div>
			<div class="col-6">
				<input type="text" class="form-control" value=""  name="password" placeholder="New Password" aria-label="Last name">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-6">
				<button class="btn btn-sm btn-primary">Edit User</button>
			</div>
		</div>
	</form>
</div>