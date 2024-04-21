<div class="container">
	<h3>Users Manage</h3>

	<div class="module_heading mt-4">Users Listing</div>

	<table class="table mt-3">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">First Name</th>
				<th scope="col">Last Name</th>
				<th scope="col">Email</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if(isset($users) && $users && is_array($users) && count($users) > 0): ?>
			<?php foreach($users as $key => $value): ?>
			<tr>
				<th scope="row"><?= $value['id'] ?></th>
				<td><?= $value['firstname'] ?></td>
				<td><?= $value['lastname'] ?></td>
				<td><?= $value['email'] ?></td>
				<td>
					<a href="<?= base_url("users/edit/".$value['id']); ?>" class="text-primary">
						<i class="ion-android-create"></i>
					</a>
					<a href="<?= base_url("users/delete/".$value['id']); ?>" onclick="return confirm('Do you want to delete this record?')" class="text-danger">
						<i class="ion-android-delete"></i>
					</a>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	
</div>