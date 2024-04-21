<div class="container">
	<h3>Users Manage</h3>

	<div class="module_heading mt-4">Add Users</div>

	<form action="" method="post">
		<div class="row mt-3">
			<div class="col-6">
				<input type="text" class="form-control" name="firstname" placeholder="First name" aria-label="First name">
			</div>
			<div class="col-6">
				<input type="text" class="form-control" name="lastname" placeholder="Last name" aria-label="Last name">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-6">
				<input type="text" class="form-control" name="email" placeholder="Email" aria-label="First name">
			</div>
			<div class="col-6">
				<input type="text" class="form-control" name="contact" placeholder="Phone Number" aria-label="Last name">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-6">
				<select class="form-select" name="type" aria-label="Default select example">
					<option selected>Select Type</option>
					<option value="1">Admin</option>
					<option value="2">Staff</option>
					<option value="3">Subscriber</option>
				</select>
			</div>
			<div class="col-6">
				<input type="text" class="form-control"  name="password" placeholder="Password" aria-label="Last name">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-6">
				<button class="btn btn-sm btn-primary">Add User</button>
			</div>
		</div>
	</form>
</div>